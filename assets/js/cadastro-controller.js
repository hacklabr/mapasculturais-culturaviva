(function(angular){
    'use strict';

    var app = angular.module('culturaviva.controllers', []);

    // Função base para os outros controllers """herdarem"""
    function BaseAgentCtrl($scope, Agent, MapasCulturais, agent_id)
    {
        $scope.errors = {};
        $scope.agent = Agent.get({
            'id': agent_id
        });

        var _saved_agent = angular.copy($scope.agent);

        $scope.save_field = function save_field(field, force_patch) 
        {
            
            var new_value = $scope.agent[field] || "";
            var old_value = _saved_agent[field] || "";

            if(force_patch || (new_value || old_value) && new_value !== old_value)
            {
                $scope.agent.patch(field).then(function(res)
                {
                    if(res.data && res.data.error)
                    {   // aconteceu algum erro de validação
                        $scope.errors[field] = res.data.data[field];
                    }
                    else
                    {   // deu tudo certo
                        $scope.errors[field] = null;
                        _saved_agent[field] = angular.copy(new_value);
                    }
                })
                ['catch'](function()
                {
                    $scope.errors[field] = ['O sistema não conseguir interpretar essa informação'];
                });
            }
        };
        
        $scope.termos = {
            area: MapasCulturais.areasDeAtuacao,
            
            local_realizacao: [
                'Escolas', 
                'Universidades', 
                'Praças', 
                'Salas', 
                'CEUs', 
                'Feiras', 
                'Eventos'
            ],

            contemplado_edital: [
                'Ponto de Cultura',
                'Pontão de Cultura',
                'Ponto de Mídia Livre',
                'Ponto de Memória',
                'Ponto de Leitura',
                'Ponto de Cultura Indígena',
                'Pontinho de Cultura',
                'Pontão de Bens Registrados',
                'Ainda não fui contemplado'
            ],

            acao_estruturante: [
                'Conhecimentos tradicionais',
                'Cultura, comunicação e mídia livre',
                'Cultura e educação',
                'Economia criativa e solidária',
                'Cultura digital',
                'Cultura e juventude',
                'Intercâmbio e residências artístico-culturais',
                'Cultura e saúde',
                'Cultura e direitos humanos',
                'Livro, Leitura e literatura',
                'Memória e patrimônio cultural',
                'Cultura e meio ambiente',
                'Cultura, infância e adolescência',
                'Agente cultura viva',
                'Cultura circense'
            ],

            publico_participante: [
                'Afro-Brasileiros',
                'Ciganos',
                'Estudantes',
                'Grupos artísticos e culturais independentes',
                'Idosos ',
                'Imigrantes',
                'Indígenas',
                'Crianças e Adolescentes',
                'Juventude',
                'LGBT',
                'Mulheres',
                'Pescadores',
                'Pessoas com deficiência',
                'Pessoas em situação de sofrimento psíquico',
                'População de Rua',
                'População em regime prisional',
                'Povos e Comunidades Tradicionais de Matriz Africana',
                'Público em Geral',
                'Quilombolas',
                'Ribeirinhos',
                'População Rural',
                'População de Baixa Renda',
                'Grupos assentados de reforma agrária',
                'Mestres, praticantes, brincantes e grupos culturais populares, urbanos e rurais',
                'Pessoas ou grupos vítimas de violência',
                'População sem teto',
                'Populações atingida por barragens',
                'Populações de regiões fronteiriças',
                'Populações em áreas de vulnerabilidade social'
            ]
        };
    }

    // Controller do 'Informações do responsável'
    app.controller('ResponsibleCtrl', ['$scope', 'Agent', 'MapasCulturais',
        function ResponsibleCtrl($scope, Agent, MapasCulturais)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agenteIndividual;
            BaseAgentCtrl.call(this, $scope, Agent, MapasCulturais, agent_id);
       }
    ]);

    // Controller do 'Seu ponto no Mapa'
    app.controller('PointCtrl', ['$scope', 'Agent', 'MapasCulturais', 'geocoder', 'cepcoder',
        function PointCtrl($scope, Agent, MapasCulturais, geocoder, cepcoder)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agentePonto;
            BaseAgentCtrl.call(this, $scope, Agent, MapasCulturais, agent_id);
            
            $scope.markers = {};

            // verifica se agente tem o local fornecido
            $scope.check_espaco = function check_espaco(espaco) {
                var agent = $scope.agent;
                return agent && espaco &&
                       angular.isArray(agent.local_de_acao_espaco) &&
                       agent.local_de_acao_espaco.indexOf(espaco) > -1;
            };

            // seleciona ou remove um espaco do agente e salva na api
            $scope.toggle_espaco = function toggle_espaco(espaco) {
                var agent = $scope.agent;
                
                if(!angular.isArray(agent.local_de_acao_espaco)) {
                    agent.local_de_acao_espaco = [espaco];
                } else {
                    var idx = agent.local_de_acao_espaco.indexOf(espaco);
                    if(idx < 0)
                    {
                        agent.local_de_acao_espaco.push(espaco);
                    }
                    else
                    {
                        agent.local_de_acao_espaco.splice(idx, 1);
                    }
                }
                $scope.save_field('local_de_acao_espaco');
            };

            $scope.cepcoder = {
                busy: false,
                code: function(cep){
                    $scope.cepcoder.busy = true;
                    cepcoder.code(cep).then(function(res){
                        var addr = res.data;
                        $scope.agent.cidade = addr.localidade;
                        $scope.save_field('cidade');

                        $scope.agent.bairro = addr.bairro;
                        $scope.save_field('bairro');

                        $scope.agent.rua = addr.logradouro;
                        $scope.save_field('rua');

                        $scope.agent.estado = addr.uf;
                        $scope.save_field('estado');

                        var string = (addr.logradouro ? addr.logradouro+', ':'') +
                                     (addr.bairro ? addr.bairro+', ':'') +
                                     (addr.localidade ? addr.localidade+', ':'') +
                                     (addr.uf ? addr.uf+' - ':'');

                        return geocoder.code(string);
                    }).then(function(point){
                        point.zoom = 14;
                        $scope.markers.main = point;
                    })['catch'](function(){
                        $scope.markers.main = undefined;
                    }).finally(function(){
                        $scope.cepcoder.busy = false;
                    });
                }
            };
        }
    ]);

    app.controller('EntityCtrl', ['$scope', 'Entity', 'MapasCulturais',
        function($scope, Entity, MapasCulturais){
            var agent_id = MapasCulturais.redeCulturaViva.agenteEntidade;

            var params = {
                'id': agent_id,
                '@select': 'id,name,nomeCompleto,cnpj,representanteLegal,semCNPJ,' +
                    'tipoPontoCulturaDesejado,tipoOrganizacao,tipoCertificacao,foiFomentado,' +
                    'tipoReconhecimento,numEdital,anoEdital,nomeProjeto,localRealizacao,etapaProjeto,' +
                    'proponente,resumoProjeto,prestacaoContasEnvio,prestacaoContasStatus,inicioVigenciaProjeto,' +
                    'fimVigenciaProjeto,recebeOutrosFinanciamentos,descOutrosFinanciamentos',

                '@permissions': 'view'
            };

            $scope.entity = Entity.get(params);

            $scope.save_field = function save_field(field) {
                var entity_update = {};
                entity_update[field] = $scope.entity[field];
                Entity.patch({'id': agent_id}, entity_update);
//                $scope.entity.$patch({'id': agent_id}, entity_update);
            };
        }
    ]);

})(angular);
