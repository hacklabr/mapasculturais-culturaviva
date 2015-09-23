<?php
namespace CulturaViva\Controllers;

use MapasCulturais\App;

class Cadastro extends \MapasCulturais\Controller{
    protected function _validateUser(){
        $this->requireAuthentication();
        
        $app = App::i();
        
        if(!$app->user->redeCulturaViva){
            $app->redirect($app->createUrl('rede', 'index'), 307);
        }
    }
    
    function ALL_index(){
        $this->_validateUser();
        
        $this->render('index');
    }
    
    function GET_responsavel(){
        $this->_validateUser();
        
        $this->render('responsavel');
    }
    
    function GET_entidadeDados(){
        $this->_validateUser();
        
        $this->render('entidade-dados');
    }
    
    function GET_entidadeContatos(){
        $this->_validateUser();
        
        $this->render('entidade-contatos');
    }
    
    function GET_pontoMapa(){
        $this->_validateUser();
        
        $this->render('ponto-mapa');
    }
    
    function GET_portifolio(){
        $this->_validateUser();
        
        $this->render('portifolio');
    }
    
    function GET_pontoMais(){
        $this->_validateUser();
        
        $this->render('ponto-mais');
    }
    
    function POST_registra(){
        $this->requireAuthentication();
        $app = App::i();
        
        if(!$app->user->redeCulturaViva){
            $user = $app->user;
            
            $project = $app->repo('Project')->find($app->config['redeCulturaViva.projectId']); //By(['owner' => 1], ['id' => 'asc'], 1);
            //
            // define o agente padrão (profile) como rascunho
            $app->disableAccessControl(); // não sei se é necessário desabilitar
            
            // criando o agente coletivo vazio
            $entidade = new \MapasCulturais\Entities\Agent;
            $entidade->parent = $user->profile;
            $entidade->name = '';
            $entidade->status = \MapasCulturais\Entities\Agent::STATUS_DRAFT;
            $entidade->save(true);
            
            // criando o agente coletivo vazio
            $ponto = new \MapasCulturais\Entities\Agent;
            $ponto->parent = $user->profile;
            $ponto->name = '';
            $ponto->status = \MapasCulturais\Entities\Agent::STATUS_DRAFT;
            $ponto->save(true);
            
            // criando a inscrição
            
            // relaciona o agente responsável, que é o proprietário da inscrição
            $registration = new \MapasCulturais\Entities\Registration;
            $registration->owner = $user->profile;
            $registration->project = $project;
            
            // inserir que as inscricoes online estao ativadas
            $registration->save(true);
            
            $user->redeCulturaViva = json_encode([
                'agenteIndividual' => $user->profile->id,
                'agenteEntidade' => $entidade->id,
                'agentePonto' => $ponto->id,
                'inscricao' => $registration->id,
                'comCNPJ' => isset($this->postData['comCNPJ']) && $this->postData['comCNPJ']
            ]);
            
            $user->save(true);
            
            // relaciona o agente coletivo
            $registration->createAgentRelation($entidade, 'entidade', false, true, true);
            $registration->createAgentRelation($ponto, 'ponto', false, true, true);
            
            $app->enableAccessControl();
        }
        $app->user->refresh();
        $app->redirect($app->createUrl('cadastro','index'),307);
    }
}