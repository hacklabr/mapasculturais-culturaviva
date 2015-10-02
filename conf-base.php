<?php

$config['routes']['default_controller_id'] = 'rede';
$config['auth.config']['onCreateRedirectUrl'] = $config['base.url'] . 'rede';

return [
    'app.siteName' => 'Rede Cultura Viva',
    'app.siteDescription' => '',

    'app.geoDivisionsHierarchy' => [
        'estado' => 'Estado',       // metadata: geoEstado
        'municipio' => 'Município', // metadata: geoMunicipio
    ],
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
    'registration.propertiesToExport' => array(
        'id',
        'name',
        'nomeCompleto',
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
        'atividadesEmRealizacao',
        'cpf',
        'cnpj',
        'endereco',
        'telefone1',
        'telefone1_operadora',
        'telefone2',
        'telefone2_operadora',
        'telefonePublico',
        'telefonePublico_operadora',
        'emailPrivado',
        'emailPublico',
        'site',
        'googleplus',
        'facebook',
        'twitter',
        'flickr',
        'diaspora',
        'youtube'
    ),
];
