(function(angular){
    'use strict';

    var app = angular.module('culturaviva.controllers', []);

    // Função base para os outros controllers """herdarem"""
    function BaseAgentCtrl($scope, Agent, MapasCulturais, agent_id, Upload, $timeout, $http)
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
    
    app.controller('DashboardCtrl', ['$scope', 'Entity', 'MapasCulturais', '$http',
        function($scope, Entity, MapasCulturais, $http){
            $scope.enviar = function(){
                $http.post(MapasCulturais.createUrl('cadastro', 'enviar')).
                        then(function successCallback(response) {
                            console.log('SUCESSO: ', response);
                        }, function errorCallback(response) {
                            console.log('ERRO: ', response);
                        });
            };
        }
    ]);

    // Controller do 'Informações do responsável'
    app.controller('ResponsibleCtrl', ['$scope', 'Agent', 'MapasCulturais', 'Upload', '$timeout',
        function ResponsibleCtrl($scope, Agent, MapasCulturais, Upload, $timeout)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agenteIndividual;
            BaseAgentCtrl.call(this, $scope, Agent, MapasCulturais, agent_id, Upload, $timeout);
       }
    ]);

    // FIXME Refatorar daqui pra cima! Nao reutilizar daqui pra cima!!!!

    // TODO: Tranforma em diretiva
     app.controller('ImageUploadCtrl', ['$scope', 'Entity', 'MapasCulturais', 'Upload', '$timeout',
        function ImageUploadCtrl($scope, Entity, MapasCulturais, Upload, $timeout) {

            // FIXME passar como parametro para generalizar
            var agent_id = MapasCulturais.redeCulturaViva.agentePonto;

            var params = {
                'id': agent_id,
                '@select': 'id',
                '@files':'(avatar.avatarBig,portifolio,gallery.avatarBig):url',
                '@permissions': 'view'
            };

            $scope.agent = Entity.get(params);

            $scope.config = {
                images: {
                    maxUploadSize: '2MB',
                    validation: 'image/(p?jpeg|png)'
                },
                pdf: {
                    maxUploadSize: '8MB',
                    validation: 'application/pdf'
                }
            };

            $scope.uploadFile = function(file, group) {
                $scope.f = file;
                if (file && !file.$error) {
                    var data = {};
                    data[group] = file;
                    file.upload = Upload.upload({
                        url: MapasCulturais.createUrl('agent', 'upload', [agent_id]),
                        data: data
                    });

                    file.upload.then(function (response) {
                        if(group === 'avatar'){
                            $scope.agent['@files:avatar.avatarBig'] = {url: response.data.avatar.files.avatarBig.url};

                        } else if(group === 'portifolio'){
                            if (response.data.error) {
                                alert(response.data.data.portifolio);
                            } else {
                                $scope.agent['@files:portifolio'] = {url: response.data.portifolio.url};
                            }
                        } else if(group === 'gallery'){
                            $scope.agent['@files:gallery.avatarBig'] = $scope.agent['@files:gallery.avatarBig'] || [];
                            $scope.agent['@files:gallery.avatarBig'].push({url: response.data.gallery[0].files.avatarBig.url});
                        }
                        $timeout(function () {
                            file.result = response.data;
                        });
                    }, function (response) {
                        if (response.status > 0)
                            $scope.errorMsg = response.status + ': ' + response.data;
                    });

                    file.upload.progress(function (evt) {
                        file.progress = Math.min(100, parseInt(100.0 *
                                                               evt.loaded / evt.total));
                    });
                }
            };

       }
    ]);
    
    app.controller('PortifolioCtrl', ['$scope', 'Entity', 'MapasCulturais', 'Upload', '$timeout', 'geocoder', 'cepcoder',
        function PointCtrl($scope, Entity, MapasCulturais, Upload, $timeout, geocoder, cepcoder)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agentePonto;
            
                var params = {
                'id': agent_id,
                '@select': 'id,longDescription,atividadesEmRealizacao,site,facebook,twitter,googleplus,flickr,diaspora,youtube',
                '@files':'(avatar.avatarBig,portifolio,gallery.avatarBig):url',
                '@permissions': 'view'
            };

            $scope.agent = Entity.get(params);
            
            $scope.save_field = function save_field(field) {
                var agent_update = {};
                agent_update[field] = $scope.agent[field];
                Entity.patch({'id': agent_id}, agent_update);
            };
        }
    ]);


    // Controller do 'Seu ponto no Mapa'
    app.controller('PointCtrl', ['$scope', 'Entity', 'MapasCulturais', 'Upload', '$timeout', 'geocoder', 'cepcoder',
        function PointCtrl($scope, Entity, MapasCulturais, Upload, $timeout, geocoder, cepcoder)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agentePonto;

            var params = {
                'id': agent_id,
                '@select': 'id,terms,name,shortDescription,cep,tem_sede,mesmoEndereco,geoEstado,geoMunicipio,'+
                    'En_Bairro,En_Num,En_Nome_Logradouro,En_Complemento,localRealizacao_estado,localRealizacao_cidade,'+
                    'localRealizacao_cidade,localRealizacao_espaco,location',
                '@files':'(avatar.avatarBig,portifolio,gallery.avatarBig):url',
                '@permissions': 'view'
            };

            $scope.agent = Entity.get(params);

            $scope.save_field = function save_field(field) {
                var agent_update = {};
                agent_update[field] = $scope.agent[field];
                Entity.patch({'id': agent_id}, agent_update);
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
                ]
            };

            $scope.markers = {};

            $scope.cepcoder = {
                busy: false,
                code: function(cep){
                    $scope.agent.cep = cep;
                    $scope.save_field('cep');
                    $scope.cepcoder.busy = true;
                    cepcoder.code(cep).then(function(res){
                        var addr = res.data;
                        $scope.agent.geoEstado = addr.uf;
                        $scope.save_field('geoEstado');

                        $scope.agent.geoMunicipio = addr.localidade;
                        $scope.save_field('geoMunicipio');

                        $scope.agent.En_Bairro = addr.bairro;
                        $scope.save_field('En_Bairro');

                        $scope.agent.En_Nome_Logradouro = addr.logradouro;
                        $scope.save_field('En_Nome_Logradouro');


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
                    'fomento_tipo,fomento_tipo_outros,fomento_tipoReconhecimento,edital_num,' + 
                    'edital_ano,edital_projeto_nome,edital_localRealizacao,edital_projeto_etapa,' +
                    'edital_proponente,edital_projeto_resumo,edital_prestacaoContas_envio,' + 
                    'edital_prestacaoContas_status,edital_projeto_vigencia_inicio,' +
                    'edital_projeto_vigencia_fim,outrosFinanciamentos,outrosFinanciamentos_descricao',

                '@files':'(avatar.avatarBig,portifolio,gallery.avatarBig):url',

                '@permissions': 'view'
            };

            $scope.entity = Entity.get(params);
            
            $scope.entity.$promise.then(function(){
                console.log($scope.entity);
            });
            
            $scope.save_field = function save_field(field) {
                var entity_update = {};
                entity_update[field] = $scope.entity[field];
                Entity.patch({'id': agent_id}, entity_update);
            };
        }
    ]);

    app.controller('EntityContactCtrl', ['$scope', 'Entity', 'MapasCulturais',
        function($scope, Entity, MapasCulturais){
            var agent_id = MapasCulturais.redeCulturaViva.agenteEntidade;

            var params = {
                'id': agent_id,

                '@select': 'id,emailPrivado,telefone1,telefone1_operadora,telefone2,telefone2_operadora,' +
                    'responsavel_nome,responsavel_email,responsavel_cargo,responsavel_telefone,' +
                    'geoEstado,geoMunicipio,En_Bairro,En_Num,En_Nome_Logradouro,En_Complemento',

                '@files':'(avatar.avatarBig,portifolio,gallery.avatarBig):url',

                '@permissions': 'view'
            };

            $scope.entity = Entity.get(params);

            $scope.save_field = function save_field(field) {
                var entity_update = {};
                entity_update[field] = $scope.entity[field];
                Entity.patch({'id': agent_id}, entity_update);
            };
        }
    ]);

})(angular);
