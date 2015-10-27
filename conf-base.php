<?php

$config['routes']['default_controller_id'] = 'rede';
$config['routes']['shortcuts']['busca'] = ['site', 'search'];
$config['auth.config']['onCreateRedirectUrl'] = $config['base.url'] . 'rede/entrada/';

return [
    'app.siteName' => 'Rede Cultura Viva',
    'app.siteDescription' => '',
    'rcv.apiCNPJ' => 'http://dev.culturaviva.gov.br/wp-admin/admin-ajax.php',
    'rcv.apiHeader' => 'http://culturaviva.gov.br/wp-admin/admin-ajax.php',

    // desabilitando as divisões geográficas porque não foram importados os shapefiles
    'app.geoDivisionsHierarchy' => [],

    'redeCulturaViva.projectId' => 1,
    'registration.ownerDefinition' => [
        'required' => true,
        'label' => 'Agente responsável pelo ponto de cultura',
        'agentRelationGroupName' => 'owner',
        'description' => 'Agente individual',
        'type' => 1,
        'requiredProperties' => []
    ],
    'registration.agentRelations' => [
        [
            'required' => false,
            'label' => 'Entidade',
            'agentRelationGroupName' => 'entidade',
            'description' => 'Agente coletivo (Entidade)',
            'type' => 2,
            'requiredProperties' => []
        ],
        [
            'required' => false,
            'label' => 'Ponto/Pontão de Cultura',
            'agentRelationGroupName' => 'ponto',
            'description' => 'Agente coletivo (Ponto/Pontão de Cultura)',
            'type' => 2,
            'requiredProperties' => []
        ]
    ],
    'registration.propertiesToExport.owner' => array(
        'id',
        'createTimestamp',
        'name',
        'nomeCompleto',
        'cpf',
        'emailPrivado',
        'telefone1',
        'telefone1_operadora',
        'relacaoPonto',

        'geoEstado',
        'geoMunicipio',

        'facebook',
        'twitter',
        'googleplus',
        'youtube',
        'diaspora',
        'flickr',

        'genero',
        'raca'
    ),
    'registration.propertiesToExport.entidade' => array(
        'id',
        'tipoOrganizacao',
        'tipoPontoCulturaDesejado',
        'cnpj',
        'name',
        'nomeCompleto',
        'representanteLegal',
        'responsavel_cargo',
        'responsavel_email',
        'responsavel_nome',
        'responsavel_telefone',
        'responsavel_operadora',
        'emailPrivado',

        'telefone1',
        'telefone1_operadora',
        'telefone2',
        'telefone2_operadora',

        'geoEstado',
        'geoMunicipio',
        'En_Bairro',
        'En_Complemento',
        'En_Nome_Logradouro',
        'En_Num',

        'foiFomentado',
        'tipoFomento',
        'tipoFomentoOutros',

        'tipoReconhecimento',

        'edital_num',
        'edital_ano',
        'edital_prestacaoContas_envio',
        'edital_prestacaoContas_status',
        'edital_projeto_etapa',
        'edital_projeto_nome',
        'edital_localRealizacao',
        'edital_proponente',
        'edital_projeto_resumo',
        'edital_projeto_vigencia_fim',
        'edital_projeto_vigencia_inicio',
    ),

    'registration.propertiesToExport.ponto' => array(
        'id',
        'name',
        'term',

        'shortDescription',
        'longDescription',
        'cep',

        'geoEstado',
        'geoMunicipio',
        'En_Bairro',
        'En_Complemento',
        'En_Nome_Logradouro',
        'En_Num',
        'location',

        'tem_sede',
        'sede_realizaAtividades',

        'site',
        'facebook',
        'flickr',
        'googleplus',
        'diaspora',
        'twitter',
        'youtube',

        'parceriaPoderPublico',
        'participacaoForumCultura',
        'participacaoMovPolitico',
        'atividadesEmRealizacao',

        'pontoContrataServicos',
        'pontoContrataServicosOutros',
        'pontoCustoAnual',
        'pontoEconomiaCultura',
        'pontoEconomiaCulturaDescricao',
        'pontoEconomiaSolidaria',
        'pontoEconomiaSolidariaDescricao',
        'pontoInvestColetivosOutros',
        'pontoInvestimentosColetivos',
        'pontoMoedaSocial',
        'pontoMoedaSocialDescricao',
        'pontoMovimentos',
        'pontoNumPessoasApoiadores',
        'pontoNumPessoasColaboradores',
        'pontoNumPessoasIndiretas',
        'pontoNumPessoasNucleo',
        'pontoNumPessoasParceiros',
        'pontoNumRedes',
        'pontoOutrosRecursosRede',
        'pontoRedesDescricao',
        'pontoTrocasServicos',
        'pontoTrocasServicosOutros',

        'formador1_areaAtuacao',
        'formador1_bio',
        'formador1_email',
        'formador1_facebook',
        'formador1_google',
        'formador1_nome',
        'formador1_operadora',
        'formador1_telefone',
        'formador1_twitter',

        'espacoAprendizagem1_atuacao',
        'espacoAprendizagem1_tipo',
        'espacoAprendizagem1_desc',

        'metodologia1_nome',
        'metodologia1_desc',
        'metodologia1_necessidades',
        'metodologia1_capacidade',
        'metodologia1_cargaHoraria',
        'metodologia1_certificacao',
        'metodologia1_tipo',

    ),
];
