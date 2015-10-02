<?php
$config['routes']['default_controller_id'] = 'rede';

return [
    'app.geoDivisionsHierarchy' => [
        'estado'    => 'Estado',        // metadata: geoEstado
        'municipio' => 'Município',     // metadata: geoMunicipio
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
];