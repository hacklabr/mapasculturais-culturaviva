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
        $app->hook('mapasculturais.body:before', function() {
            echo '
            <div id="barra-brasil">
                <a href="http://brasil.gov.br" style="background:#7F7F7F; height: 20px; padding:4px 0 4px 10px; display: block; font-family:sans,sans-serif; text-decoration:none; color:white; ">Portal do Governo Brasileiro</a>
            </div>
            <script src="http://barra.brasil.gov.br/barra.js" type="text/javascript" defer async></script>
            ';
        });

        if (!$app->user->is('guest')) {
            $ids = json_decode($app->user->redeCulturaViva);

            // TODO: verifica em que casos vem null
            if($ids !== null) {
                $this->jsObject['redeCulturaViva'] = $ids;
            }
        }

        $this->assetManager->publishAsset('img/bg.png', 'img/bg.png');

        
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->jsObject['templateUrl']['taxonomyCheckboxes'] = $this->asset('js/directives/taxonomy-checkboxes.html', false);
            $area = $app->getRegisteredTaxonomy('MapasCulturais\Entities\Agent', 'area');
            $this->jsObject['areasDeAtuacao'] = array_values($area->restrictedTerms);
        });
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
        $this->enqueueScript('culturaviva', 'cadastro-directive', 'js/cadastro-directive.js', ['cadastro-app']);
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
                'semCNPJ' => [
                    'label' => 'CNPJ',
                    'required' => true,
                    'private' => true
                ],
                'tipoPontoCulturaDesejado' => [
                    'label' => 'Tipo de Ponto de Cultura',
                    'required' => true,
                    'private' => true,
                    'type' => 'select',
                    'options' => array(
                        'ponto' => 'Ponto',
                        'pontao' => 'Pontão'
                    )
                ],
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
                    'private' => true,
                    'options' => array(
                        'ponto_coletivo' => 'Ponto de Cultura - Grupo ou Coletivo',
                        'ponto_entidade' => 'Ponto de Cultura - Entidade',
                        'pontao_entidade' => 'Pontão de Cultura - Entidade'
                    )
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
                'numEdital' => [
                    'label' => 'Número do Edital de Seleção',
                    'required' => true,
                    'private' => true
                ],
                'anoEdital' => [
                    'label' => 'Ano do Edital de Seleção',
                    'required' => true,
                    'private' => true
                ],
                'nomeProjeto' => [
                    'label' => 'Nome do Projeto',
                    'required' => true,
                    'private' => true
                ],
                'localRealizacao' => [
                    'label' => 'Local de Realização',
                    'required' => true,
                    'private' => true
                ],
                'etapaProjeto' => [
                    'label' => 'Etapa do Projeto',
                    'required' => true,
                    'private' => true
                ],
                'proponente' => [
                    'label' => 'Proponente',
                    'required' => true,
                    'private' => true
                ],
                'resumoProjeto' => [
                    'label' => 'Resumo do projeto (objeto)',
                    'required' => true,
                    'private' => true
                ],
//                Este metadado é uma tabela no formulário. Precisamos estudar como vai ser.
//                'recursosProjeto' => [
//                    'label' => 'Recursos do Projeto Selecionado',
//                    'required' => true,
//                    'private' => true
//                ],
                'prestacaoContasEnvio' => [
                    'label' => 'Prestação de Contas - Envio',
                    'required' => true,
                    'private' => true,
                    'type' => 'select',
                    'options' => array(
                        'enviada' => 'Enviada',
                        'naoEnviada' => 'Não Enviada',
                        'premiado' => 'Ponto de Cultura Premiado'
                    )
                ],
                'prestacaoContasStatus' => [
                    'label' => 'Prestação de Contas - Status',
                    'required' => false,
                    'private' => true,
                    'type' => 'select',
                    'options' => array(
                        'aprovada' => 'Aprovada',
                        'naoaprovada' => 'Não Aprovada',
                        'analise' => 'Em análise'
                    )
                ],
                 'vigenciaProjeto' => [
                    'label' => 'Vigência',
                    'required' => true,
                    'private' => true
                ],
                'recebeOutrosFinanciamentos' => [
                    'label' => 'Recebe ou recebeu outros financiamentos? (apoios, patrocínios, prêmios, bolsas, convênios, etc)',
                    'required' => true,
                    'private' => true
                ],
                'descOutrosFinanciamentos' => [
                    'label' => 'Descrição dos outros financiamentos (apoios, patrocínios, prêmios, bolsas, convênios, etc)',
                    'required' => false,
                    'private' => true
                ],

                // Seu Ponto no Mapa
                'mesmoEndereco' => [
                    'label' => 'Mesmo Endereco',
                    'required' => false,
                    'private' => true
                ],

                'tem_sede' => [
                    'label' => 'Tem sede propria?',
                    'required' => true
                ],
                'sede_cnpj' => [
                    'label' => 'O endereço da sede é o mesmo registrado para o CNPJ?',
                    'required' => false
                ],

                'cep' => [
                    'label' => 'CEP',
                    'required' => true,
                    'validations' => array(
                        'v::regex("#^\d\d\d\d\d-\d\d\d$#")' => 'Use cep no formato 99999-999'
                    )
                ],
                'estado' => [
                    'label' => 'Estado',
                    'required' => true
                ],
                'cidade' => [
                    'label' => 'Cidade',
                    'required' => true
                ],
                'bairro' => [
                    'label' => 'Bairro',
                    'required' => true
                ],
                'numero' => [
                    'label' => 'Numero',
                    'required' => true
                ],
                'rua' => [
                    'label' => 'Rua',
                    'required' => true
                ],
                'complemento' => [
                    'label' => 'Rua',
                    'required' => false
                ],

                'local_de_acao_estado' => [
                    'label' => 'Estado',
                    'required' => false
                ],
                'local_de_acao_cidade' => [
                    'label' => 'Cidade',
                    'required' => false
                ],
                'local_de_acao_espaco' => [
                    'label' => 'Espaço',
                    'required' => false
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
            $app->registerTaxonomy('MapasCulturais\Entities\Agent', $def);
        }
    }
}
