<?php

$app = MapasCulturais\App::i();
$em = $app->em;
$conn = $em->getConnection();

return [
    'create project rede cultura viva' => function() use ($app) {
        $project = new MapasCulturais\Entities\Project;
        $owner = $app->repo('Agent')->find(1); // usuario admin
        $project->owner = $owner;
        $project->name = 'Rede Cultura Viva';
        $project->useRegistrations = true;
        $project->categories = ['Ponto de Cultura', 'Pontão de Cultura'];
        $project->registrationFrom = new \DateTime('2015-01-01');
        $project->registrationTo = new \DateTime('2099-12-31');
        $project->type = 9;
        $project->save(true);
    },
    'recreate agent metadata rcv_tipo' => function() use($conn) {
        $conn->executeQuery("DELETE FROM agent_meta WHERE key = 'rcv_tipo'");
        $rs = $conn->fetchAll("SELECT * FROM user_meta WHERE key = 'redeCulturaViva'");
        
        foreach($rs as $r){
            $ids = json_decode($r['value']);
            
            $conn->executeQuery("INSERT INTO agent_meta (object_id, key, value) VALUES ('{$ids->agenteIndividual}', 'rcv_tipo', 'responsavel')");
            $conn->executeQuery("INSERT INTO agent_meta (object_id, key, value) VALUES ('{$ids->agenteEntidade}', 'rcv_tipo', 'entidade')");
            $conn->executeQuery("INSERT INTO agent_meta (object_id, key, value) VALUES ('{$ids->agentePonto}', 'rcv_tipo', 'ponto')");
        }
    }
];
        