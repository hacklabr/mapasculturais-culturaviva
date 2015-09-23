<?php
namespace CulturaViva;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        return array(
            'site: owner' => 'Ministério da Cultura',
            'site: by the site owner' => 'pelo Ministério da Cultura',

        );
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    protected function _init(){
        parent::_init();
        $this->_enqueueStyles();
        $this->_enqueueScripts();
        $this->_publishAssets();
        
        $app = App::i();
        
        $app->hook('auth.createUser:after', function($user, $data) use ($app) {
            $project = $app->repo('Project')->find(1); //By(['owner' => 1], ['id' => 'asc'], 1);
            //
            // define o agente padrão (profile) como rascunho
            $app->disableAccessControl(); // não sei se é necessário desabilitar
            $user->profile->status = \MapasCulturais\Entities\Agent::STATUS_DRAFT;
            $user->profile->save(true);
            
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
            
            $user->inscricaoCulturaViva = json_encode([
                'agenteIndividual' => $user->profile->id,
                'agenteEntidade' => $entidade->id,
                'agentePonto' => $ponto->id,
                'inscricao' => $registration->id
            ]);
            $user->save(true);
            
            // relaciona o agente coletivo
            $registration->createAgentRelation($entidade, 'entidade', false, true, true);
            $registration->createAgentRelation($ponto, 'ponto', false, true, true);
            
            $app->enableAccessControl();
            //$app->em->flush(); sem o true no save, ele cria um transaction no bd
        });
        
        if (!$app->user->is('guest')) {
            $ids = json_decode($app->user->inscricaoCulturaViva);
            
            $inscricao = $app->repo('Registration')->find($ids->inscricao);
            $agenteIndividual = $app->repo('Agent')->find($ids->agenteIndividual);
            $agenteEntidade = $app->repo('Agent')->find($ids->agenteEntidade);
            $agentePonto = $app->repo('Agent')->find($ids->agentePonto);
            
            $this->jsObject['culturaViva'] = [
                'agenteIndividual' => $agenteIndividual,
                'agenteEntidade' => $agenteEntidade,
                'agentePonto' => $agentePonto,
                'inscricao' => $inscricao
            ];
        }

        $this->assetManager->publishAsset('img/bg.png', 'img/bg.png');

    }
    
    
    protected function _enqueueStyles(){

    }
    
    protected function _enqueueScripts(){
       $this->enqueueScript('culturaviva', 'cadastro-app', 'js/cadastro-app.js');
       $this->enqueueScript('culturaviva', 'cadastro-controller', 'js/cadastro-controller.js');
       $this->enqueueScript('culturaviva', 'cadastro-service', 'js/cadastro-service.js');
    }
    
    protected function _publishAssets(){
        
    }
    
    function head() {
        parent::head();
        if($this->controller->id === 'cadastro' || $this->controller->id == 'rede'){
            $this->printStyles('culturaviva');
            $this->printScripts('culturaviva');
        }
    }
    
    
    public function addDocumentMetas() {
        parent::addDocumentMetas();
        if(in_array($this->controller->action, ['single', 'edit'])){
            return;
        }
        $app = App::i();
        foreach ($this->documentMeta as $key => $meta){
            if(isset($meta['property']) && ($meta['property'] === 'og:image' || $meta['property'] === 'og:image:url')){
                $this->documentMeta[$key] = array('property' => $meta['property'] , 'content' => $app->view->asset('img/cultura-viva-share.png', false));
            }
        }
    }
    
    
    
    public function register() {
        $app = App::i();
        $app->registerController('rede', 'CulturaViva\Controllers\Rede');
        $app->registerController('cadastro', 'CulturaViva\Controllers\Cadastro');
        
        $metadata = [
            'MapasCulturais\Entities\User' => [
                'inscricaoCulturaViva' => [
                    'label' => 'Id do Agente, Agente Coletivo e Registro da inscrição',
                    'private' => true
                ]
            ]
        ];
        
        foreach($metadata as $entity_class => $metas){
            foreach($metas as $key => $cfg){
                $def = new \MapasCulturais\Definitions\Metadata($key, $cfg);
                $app->registerMetadata($def, $entity_class);
            }
        }
    }
}
