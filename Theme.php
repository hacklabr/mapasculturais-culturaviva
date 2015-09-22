<?php
namespace CulturaViva;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        $self = App::i()->view;
        
        return array(
            'cadastro: titulo - responsavel' => 'Informações do Responsável',
            'cadastro: titulo - entidade dados' => 'Dados da Entidade',
            'cadastro: titulo - entidade contatos' => 'Contatos da Entidade',
            'cadastro: titulo - ponto mapa' => 'Seu Ponto no Mapa',
            'cadastro: titulo - portifolio' => 'Portifólio',
            'cadastro: titulo - ponto mais' => 'Fale mais sobre seu ponto',
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
        
        if (!$app->user->is('guest')) {
            $this->jsObject['ids'] = json_decode($app->user->cultura_viva_ids);
        }
        
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
            
            // criando a inscrição
            //$projeto = $projects[0];
            // relaciona o agente responsável, que é o proprietário da inscrição
            $registration = new \MapasCulturais\Entities\Registration;
            $registration->owner = $user->profile;
            $registration->project = $project;
            
            // inserir que as inscricoes online estao ativadas
            $registration->save(true);
            $user->cultura_viva_ids = json_encode([
                'agente_individual' => $user->profile->id,
                'agente_coletivo'   => $entidade->id,
                'inscricao'         => $registration->id
            ]);
            $user->save(true);
            
            // relaciona o agente coletivo
            $registration->createAgentRelation($entidade, 'entidade', false, true, true);
            $app->enableAccessControl();
            //$app->em->flush(); sem o true no save, ele cria um transaction no bd
        });
        if (!$app->user->is('guest')) {
            $this->jsObject['ids'] = json_decode($app->user->cultura_viva_ids);
        }
    }
    
    
    protected function _enqueueStyles(){
        $this->enqueueStyle('culturaviva', 'bootstrap', 'css/bootstrap.css');
    }
    
    protected function _enqueueScripts(){
        $this->enqueueScript('culturaviva', 'bootstrap', 'js/bootstrap.js');
    }
    
    protected function _publishAssets(){
        $this->assetManager->publishAsset('img/simpson.jpg', 'img/simpson.jpg');
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
        
//        //$url = $app->createUrl('site');
//        $def = new \MapasCulturais\Definitions\Metadata('cultura_viva_ids', [
//            'label' => 'Id do Agente, Agente Coletivo e Registro da inscrição',
//            'private' => true
//        ]);
//        $app->registerMetadata($def, 'MapasCulturais\Entities\User');
//        foreach ($this->agent_metadata as $k => $v) {
//            $def = new \MapasCulturais\Definitions\Metadata($k, $v);
//            $app->registerMetadata($def, 'MapasCulturais\Entities\Agent', 1);
//            $app->registerMetadata($def, 'MapasCulturais\Entities\Agent', 2);
//        }
//        $metalist_definition = new Definitions\MetaListGroup('projetos', [
//            'title' => ['label' => 'Nome'],
//            'value' => [
//                'label' => 'Projeto',
//                'validations' => [
//                    'required' => 'O json dos projetos é obrigatório',
//                    "v::json()" => "Json inválido"
//                ]
//            ]
//        ]);
//        $app->registerMetaListGroup('agent', $metalist_definition);
    }
}
