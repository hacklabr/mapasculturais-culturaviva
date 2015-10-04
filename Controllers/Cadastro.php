<?php
namespace CulturaViva\Controllers;

use MapasCulturais\App;

class Cadastro extends \MapasCulturais\Controller{
    /**
     * Objeto com os ids dos agentes, inscrição e se o usuário informou um cnpj ou não.
     *
     * @var stdClass
     */
    protected $_usermeta = null;

    /**
     * Inscrição no edital Cultura Viva
     * @var \MapasCulturais\Entities\Registration
     */
    protected $_inscricao = null;

    /**
     * Agente individual (Responsável pelo Ponto de Cultura)
     * @var \MapasCulturais\Entities\Agent
     */
    protected $_responsavel = null;

    /**
     * Agente coletivo (Entidade)
     * @var \MapasCulturais\Entities\Agent
     */
    protected $_entidade = null;

    /**
     * Agente coletivo (Ponto/Pontão de Cultura)
     * @var \MapasCulturais\Entities\Agent
     */
    protected $_ponto = null;

    protected function __construct() {
        $app = App::i();

        if (!$app->user->is('guest')) {
            $this->_usermeta = json_decode($app->user->redeCulturaViva);

            if($this->_usermeta) {

                $this->_inscricao   = $app->repo('Registration')->find($this->_usermeta->inscricao);
                $this->_responsavel = $app->repo('Agent')->find($this->_usermeta->agenteIndividual);
                $this->_entidade    = $app->repo('Agent')->find($this->_usermeta->agenteEntidade);
                $this->_ponto       = $app->repo('Agent')->find($this->_usermeta->agentePonto);
            }
        }
    }

    /**
     * Objeto com os ids dos agentes, inscrição e se o usuário informou um cnpj ou não.
     *
     * @return stdClass
     */
    function getUsermeta (){
        return $this->_usermeta;
    }

    /**
     * Inscrição no edital Cultura Viva
     * @return \MapasCulturais\Entities\Registration
     */
    function getInscricao(){
        return $this->_inscricao;
    }

    /**
     * Agente individual (Responsável pelo Ponto de Cultura)
     * @return \MapasCulturais\Entities\Agent
     */
    function getResponsavel(){
        return $this->_responsavel;
    }

    /**
     * Agente coletivo (Entidade)
     * @return \MapasCulturais\Entities\Agent
     */
    function getEntidade(){
        return $this->_entidade;
    }

    /**
     * Agente coletivo (Ponto/Pontão de Cultura)
     * @return \MapasCulturais\Entities\Agent
     */
    function getPonto(){
        return $this->_ponto;
    }

    /**
     * Propriedades obrigatórias do Ponto/Pontão de Cultura
     * @return array
     */
    function getPontoRequiredProperties(){
        return [
            'name',
            'shortDescription',
            'cep',
            'tem_sede',
            'geoEstado',
            'geoMunicipio',
            'En_Bairro',
            'En_Num',
            'En_Nome_Logradouro',
            'location', // ponto no mapa

            //portifólio
            'atividadesEmRealizacao'
        ];
    }

    /**
     * Propriedades obrigatórias da Entidade
     * @return array
     */
    function getEntidadeRequiredProperties(){
        $agent = $this->getEntidade();
        $required_properties = [
            'name',
            'tipoOrganizacao',
            'foiFomentado',
            'fomento_tipo',
            'fomento_tipo_outros',
            'fomento_tipoReconhecimento',
            'edital_num',
            'edital_ano',
            'edital_projeto_nome',
            'edital_localRealizacao',
            'edital_projeto_etapa',
            'edital_proponente',
            'edital_projeto_resumo',
            'edital_prestacaoContas_envio',
            'edital_projeto_vigencia_inicio',
            'edital_projeto_vigencia_fim',
            'outrosFinanciamentos',

        ];

        if(!$agent->semCNPJ){
            $required_properties[] = 'cnpj';
            $required_properties[] = 'nomeCompleto';
        }

        if($agent->edital_prestacaoContas_envio === 'enviada'){
            $required_properties[] = 'edital_prestacaoContas_status';
        }

        return $required_properties;
    }

    /**
     * Propriedades Obrigatórias do Agente Responsável
     * @return array
     */
    function getResponsavelRequiredProperties(){
        return [
            'nomeCompleto',
            'relacaoPonto',
            'cpf',
            'emailPrivado',
            'telefone1',
            'telefone1_operadora',
            'relacaoPonto'
        ];
    }

    /**
     * Verifica se o usuário está logado e tem o metadado 'redeCulturaViva'.
     * Se não tiver redireciona para a action rede.index
     */
    protected function _validateUser(){
        $this->requireAuthentication();

        $app = App::i();

        if(!$app->user->redeCulturaViva){
            $app->redirect($app->createUrl('rede', 'entrada'), 307);
        }
    }

    protected function _checkPermissionsToViewErrors($agent){
        $this->requireAuthentication();
        $agent->checkPermission('@control');
    }

    protected function _getErrors(\MapasCulturais\Entities\Agent $entity, array $required_properties, array $required_taxonomies = []){
        $errors = [];
        foreach($required_properties as $prop){
            if(is_null($entity->$prop) || $entity->$prop === ''){
                $errors[] = $prop;
            }
        }

        return $errors;
    }

    protected function _getErrorsResponsavel(){
        $agent = $this->getResponsavel();
        $this->_checkPermissionsToViewErrors($agent);
        $required_properties = $this->getResponsavelRequiredProperties();


        return $this->_getErrors($agent, $required_properties);
    }

    protected function _getErrorsEntidade(){
        $agent = $this->getEntidade();
        $this->_checkPermissionsToViewErrors($agent);
        $required_properties = $this->getEntidadeRequiredProperties();

        return $this->_getErrors($agent, $required_properties);
    }

    protected function _getErrorsPonto(){
        $agent = $this->getPonto();
        $this->_checkPermissionsToViewErrors($agent);
        $required_properties = $this->getPontoRequiredProperties();

        return $this->_getErrors($agent, $required_properties);
    }

    protected function _populateAgents($responsavel, $entidade, $ponto){
/*
    [Id] => 1
    [Pk_Codigo] =>
    [Id_Longitude] => -67,809832
    [Id_Latitude] => -9,973551
    [Id_Tipogeo] => 2
    [Sg_UF] => AC
    [Fk_Cod_IBGE] => 1200203
    [Nm_Municipio] => Cruzeiro do Sul
    [Nm_Entidade] => Governo do Estado do Acre
    [Nm_Ponto] => Pontão de Cultura Náuas
    [En_Endereco_Original] => Avenida Brasil, 297 – Centro
    [En_Tipo_Logradouro] => AV
    [En_Nome_Logradouro] => BRASIL
    [En_Num] => 297
    [En_Km] =>
    [En_Complemento] =>
    [En_Bairro] => CENTRO
    [End_CEP] => 69900100
    [Ds_Edital] => abr/05
    [Ds_Instrumento] => Pontão
    [Ds_Tipo_ponto] => Direto
    [Id_Tipo_Esfera] => Federal
    [Cod_CNPJ] => 63.606.479/0001-24
    [Cod_pronac] => 66496
    [Cod_salic] => 685
    [Cod_scdc] => 55
    [Nr_DDD1] =>
    [Nr_Telefone1] =>
    [Nr_DDD2] =>
    [Nr_Telefone2] =>
    [Nr_DDD3] =>
    [Nr_Telefone3] =>
    [Lk_Site] =>
    [Nm_Responsavel] =>
    [Ee_email_reponsavel] =>
    [Ee_email1] => gabinete.governador@ac.gov.br
    [Ee_email2] =>
    [Ee_email3] =>
*/
        if(isset($this->data['comCNPJ']) && $this->data['comCNPJ'] && isset($this->data['CNPJ']) && $this->data['CNPJ']){
            $d = json_decode(file_get_contents('http://dev.culturaviva.gov.br/wp-admin/admin-ajax.php?action=get_cultura&cnpj=' . $this->data['CNPJ']));
            if(is_object($d)){
                echo '<pre>';
                die(print_r($d));

                // responsável
                $responsavel->nomeCompleto = $d->Nm_Responsavel;

                // entidade
                $entidade->cnpj = $this->data['CNPJ'];

                // ponto
                $ponto->location = ['latitude' => $d->Id_Latitude, 'longitude' => $d->Id_Longitude];
                $ponto->En_Nome_Logradouro  = $d->En_Nome_Logradouro;
                $ponto->En_Num              = $d->En_Num;
                $ponto->En_Complemento      = $d->En_Complemento;
                $ponto->En_Bairro           = $d->En_Bairro;
                $ponto->cep                 = $d->End_CEP;
                $ponto->endereco            = $d->En_Endereco_Original;
                $ponto->En_Nome_Logradouro = $d->En_Nome_Logradouro;
            }
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

    function ALL_registra(){
        $this->requireAuthentication();
        $app = App::i();

        if(!$app->user->redeCulturaViva){
            /*
             * CAMPOS DOS CNPJs
             * Id
             * Pk_Codigo
             * Id_Longitude
             * Id_Latitude
             * Id_Tipogeo
             * Sg_UF
             * Fk_Cod_IBGE
             * Nm_Municipio
             * Nm_Entidade
             * Nm_Ponto
             * En_Endereco_Original
             * En_Tipo_Logradouro
             * En_Nome_Logradouro
             * En_Num
             * En_Km
             * En_Complemento
             * En_Bairro
             * End_CEP
             * Ds_Edital
             * Ds_Instrumento
             * Ds_Tipo_ponto
             * Id_Tipo_Esfera
             * Cod_CNPJ
             * Cod_pronac
             * Cod_salic
             * Cod_scdc
             * Nr_DDD1
             * Nr_Telefone1
             * Nr_DDD2
             * Nr_Telefone2
             * Nr_DDD3
             * Nr_Telefone3
             * Lk_Site
             * Nm_Responsavel
             * Ee_email_reponsavel
             * Ee_email1
             * Ee_email2
             * Ee_email3
             */


            $user = $app->user;

            $project = $app->repo('Project')->find($app->config['redeCulturaViva.projectId']); //By(['owner' => 1], ['id' => 'asc'], 1);
            //
            // define o agente padrão (profile) como rascunho
            $app->disableAccessControl(); // não sei se é necessário desabilitar

            // criando o agente coletivo vazio
            $entidade = new \MapasCulturais\Entities\Agent;
            $entidade->type = 2;
            $entidade->parent = $user->profile;
            $entidade->name = '';
            $entidade->status = \MapasCulturais\Entities\Agent::STATUS_DRAFT;
            $entidade->save(true);

            // criando o agente coletivo vazio
            $ponto = new \MapasCulturais\Entities\Agent;
            $ponto->type = 2;
            $ponto->parent = $user->profile;
            $ponto->name = '';
            $ponto->status = \MapasCulturais\Entities\Agent::STATUS_DRAFT;
            $ponto->save(true);

            $this->_populateAgents($app->user->profile, $entidade, $ponto);

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
                'comCNPJ' => isset($this->data['comCNPJ']) && $this->data['comCNPJ']
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

    function GET_errosResponsavel(){
        $this->json($this->_getErrorsResponsavel());
    }

    function GET_errosEntidade(){
        $this->json($this->_getErrorsEntidade());
    }

    function GET_errosPonto(){
        $this->json($this->_getErrorsPonto());
    }

    function ALL_enviar(){
        $inscricao = $this->getInscricao();

        if($inscricao){
            $inscricao->checkPermission('send');
        }else{
            $this->errorJson('O usuário ainda não fez o cadastro na rede', 400);
        }

        $erros_responsavel = $this->_getErrorsResponsavel();
        $erros_entidade = $this->_getErrorsEntidade();
        $erros_ponto = $this->_getErrorsPonto();

        if(!$erros_responsavel && !$erros_entidade && !$erros_ponto){
            $responsavel = $this->getResponsavel();
            $entidade = $this->getEntidade();
            $ponto = $this->getPonto();

            $responsavel->publish(true);
            $entidade->publish(true);
            $ponto->publish(true);

            if($ponto->sede_realizaAtividades){
                $espaco = new \MapasCulturais\Entities\Space;
                $espaco->type = 125; // ponto de cultura
                $espaco->owner = $ponto;
                $espaco->name = $ponto->name;
                $espaco->nomeCompleto = $ponto->nomeCompleto;
                $espaco->shortDescription = $ponto->shortDescription;
                $espaco->longDescription = $ponto->longDescription;
                $espaco->location = $ponto->location;
                $espaco->geoEstado = $ponto->geoEstado;
                $espaco->geoMunicipio = $ponto->geoMunicipio;
                $espaco->En_Bairro = $ponto->En_Bairro;
                $espaco->En_Num = $ponto->En_Num;
                $espaco->En_Nome_Logradouro = $ponto->En_Nome_Logradouro;
                $espaco->En_Complemento = $ponto->En_Complemento;
                $espaco->endereco = "{$espaco->En_Nome_Logradouro} {$espaco->En_Num}, {$espaco->En_Bairro}, {$espaco->geoMunicipio}, {$espaco->geoEstado}";
                $espaco->terms = $ponto->terms;

                $espaco->save(true);

            }

            $inscricao->send();

        } else {
            $this->errorJson([
                'responsavel' => $erros_responsavel,
                'entidade' => $erros_entidade,
                'ponto' => $erros_ponto
            ], 400);
        }
    }
}
