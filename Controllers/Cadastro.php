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

        if($agent->semCNPJ && $agent->semCNPJ !== 'false'){
            $required_properties = [
                // dados da entidade
                'tipoPontoCulturaDesejado',
                'tipoOrganizacao',
                'name',
                'foiFomentado',
                'descOutrosFinanciamentos',

                // contatos da entiadade
                'emailPrivado',
                'telefone1',
                'telefone1_operadora',
                'telefone2',
                'telefone2_operadora',
                'responsavelNome',
                'responsavelCargo',
                'responsavelEmail',
                'responsavelTelefone',
                'geoEstado',
                'geoMunicipio',
                'En_Bairro',
                'En_Num',
                'En_Nome_Logradouro'
            ];
        }else{
            $required_properties = [
                'cnpj',
                'name',
                'nomeCompleto',
                'representanteLegal',
                'foiFomentado',
                'tipoCertificacao',
                'tipoReconhecimento',
                'numEdital',
                'anoEdital',
                'localRealizacao',
                'etapaProjeto',
                'proponente',
                'resumoProjeto',
                'prestacaoContasEnvio',
                'prestacaoContasStatus',
                'recebeOutrosFinanciamentos',
                'descOutrosFinanciamentos'
            ];
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
            'rg',
            'rg_orgao',
            'relacaoPonto',
            'cpf',
            'geoEstado',
            'emailPrivado',
            'telefone1',
            'telefone1_operadora'
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
            $app->redirect($app->createUrl('rede', 'index'), 307);
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
