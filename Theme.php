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

        if (!$app->user->is('guest')) {
            $ids = json_decode($app->user->redeCulturaViva);

            // TODO: verifica em que casos vem null
            if($ids !== null) {
                $this->jsObject['redeCulturaViva'] = $ids;
            }
        }

        $this->assetManager->publishAsset('img/bg.png', 'img/bg.png');

    }


    protected function _enqueueStyles(){
        $this->enqueueStyle('culturaviva', 'circle', 'css/circle.css');
        $this->enqueueStyle('culturaviva', 'fonts-culturavivaiicon', 'css/fonts-icon-culturaviva.css');
    }

    protected function _enqueueScripts(){
        $this->enqueueScript('culturaviva', 'angular-resource', 'vendor/angular-resource.js');
        $this->enqueueScript('culturaviva', 'cadastro-app', 'js/cadastro-app.js', ['angular-resource']);
        $this->enqueueScript('culturaviva', 'cadastro-controller', 'js/cadastro-controller.js', ['cadastro-app']);
        $this->enqueueScript('culturaviva', 'cadastro-service', 'js/cadastro-service.js', ['cadastro-app']);
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
        parent::register();
        
        $app = App::i();
        $app->registerController('rede', 'CulturaViva\Controllers\Rede');
        $app->registerController('cadastro', 'CulturaViva\Controllers\Cadastro');

        $metadata = [
            'MapasCulturais\Entities\User' => [
                'redeCulturaViva' => [ 'private' => true, 'label' => 'Id do Agente, Agente Coletivo e Registro da inscrição' ]
            ],

            'MapasCulturais\Entities\Agent' => [
                'rg' => [
                    'label' => 'RG',
                    'required' => true,
                    'private' => true
                ],
                'rg_orgao' => [
                    'label' => 'Órgão Expedidor',
                    'required' => true,
                    'private' => true
                ],
                'cpf' => [
                    'label' => 'CPF',
                    'required' => true,
                    'private' => true
                ],
                'telefone1_operadora' => [
                    'label' => 'Operadora do Telefone 1',
                    'required' => true,
                    'private' => true
                ],
                'relacaoPonto' => [
                    'label' => 'Relação com o Ponto de Cultura',
                    'required' => true,
                    'private' => true,
                    'type' => 'select',
                    'options' => array(
                        'responsavel' => 'Sou o responsável pelo Ponto/Pontão de Cultura',
                        'funcionario' => 'Trabalho no Ponto/Pontão de Cultura',
                        'parceiro' => 'Sou parceiro do Ponto/Pontão e estou ajudando a cadastrar'
                    )
                ],

                // Metados do Agente tipo Entidade
                'tipoOrganizacao' => [
                    'label' => 'Tipo de Organização',
                    'required' => true,
                    'private' => true,
                    'type' => 'select',
                    'options' => array(
                        'coletivo' => 'Coletivo Cultural',
                        'entidades' => 'Entidade Cultural'
                    )
                ],

                'cnpj' => [
                    'label' => 'CNPJ',
                    'required' => true,
                    'private' => true
                ],
                'representanteLegal' => [
                    'label' => 'Representante Legal',
                    'required' => true,
                    'private' => true
                ],
                'tipoCertificacao' => [
                    'label' => 'Tipo de Certificação',
                    'required' => true,
                    'private' => true
                ],
                'foiFomentado' => [
                    'label' => 'Você já foi fomentado pelo MinC',
                    'required' => true,
                    'private' => true
                ],
                'tipoReconhecimento' => [
                    'label' => 'Tipo de Reconhecimento',
                    'required' => true,
                    'private' => true,
                    'type' => 'select',
                    'options' => array(
                        'minc' => 'Direto com o MinC',
                        'estadual' => 'Estatual',
                        'municipal' => 'Municipal',
                        'intermunicpal' => 'Intermunicipal'
                    )
                ],
                
                'mesmoEndereco' => [
                    'label' => 'Mesmo Endereco',
                    'required' => false,
                    'private' => true
                ],
            ]
        ];

        foreach($metadata as $entity_class => $metas){
            foreach($metas as $key => $cfg){
                $def = new \MapasCulturais\Definitions\Metadata($key, $cfg);
                $app->registerMetadata($def, $entity_class);
            }
        }

        $taxonomies = [
            'contemplado_edital' => 'Editais do Ministério da Cultura em que foi contemplado',
            'acao_estruturante' => 'Ações Estruturantes',
            'publico_participante' => 'Públicos que participam das ações',
            'local_realizacao' => 'Locais onde são realizadas as ações culturais'
        ];

        $id = 10;

        foreach ($taxonomies as $slug => $description){
            $id++;
            $def = new \MapasCulturais\Definitions\Taxonomy($id, $slug, $description);
            $app->registerTaxonomy($slug, $def);
        }
    }
}
