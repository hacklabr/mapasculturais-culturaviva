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
        $this->assetManager->publishAsset('img/simpson.jpg', 'img/simpson.jpg');
    }
    
    protected function _enqueueStyles(){

    }
    
    protected function _enqueueScripts(){
       
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
