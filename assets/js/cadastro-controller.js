(function(angular){
    'use strict';
    var app = angular.module('culturaviva.controllers', []);

    var termos = {
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

    function extendController($scope, $timeout, Entity, agent_id){
        $scope.messages = {
            status: null,
            text: ''
        };

        $scope.$watch('messages.status', function(new_status, old_status){
            if(new_status === null){
                $scope.messages.text = '';
                return;
            }

            var timeout = 1500;

            if(new_status === 'error'){
                timeout = 5000;
            }else if(new_status === 'saved'){
                $scope.messages.text = 'alterações salvas';

            }else if(new_status === 'saving'){
                $scope.messages.text = 'salvando alterações';

            }

            $timeout(function(){
                $scope.messages.status = null;
            }, timeout);
        });

        $scope.save_field = function save_field(field) {
            var agent_update = {};
            agent_update[field] = $scope.agent[field];
            $scope.messages.status = 'saving';
            Entity.patch({'id': agent_id}, agent_update, function(agent){
                $scope.messages.status = 'saved';
            }, function(error){
                try{
                    $scope.messages.text = error.data.data[field].toString();
                    $scope.messages.status = 'error';
                }catch(e){
                    $scope.messages.text = '';
                    $scope.messages.status = '';
                }
            });
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


    // TODO: Tranforma em diretiva
     app.controller('ImageUploadCtrl', ['$scope', 'Entity', 'MapasCulturais', 'Upload', '$timeout', '$http',
        function ImageUploadCtrl($scope, Entity, MapasCulturais, Upload, $timeout, $http) {

            // FIXME passar como parametro para generalizar
            var agent_id = MapasCulturais.redeCulturaViva.agentePonto;

            var params = {
                'id': agent_id,
                '@select': 'id,files',
                '@permissions': 'view'
            };

            $scope.agent = Entity.get(params);
            $scope.agent.$promise.then(function(){
                $scope.agent.files.gallery = $scope.agent.files.gallery || [];
            });

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

            $scope.deleteFile = function(file){

                $http.delete(MapasCulturais.createUrl('file','single',[file.id])).then(function(){
                    if(file.group === 'gallery'){
                        $scope.agent.files.gallery.forEach(function(f, index){
                            if(file.id === f.id){
                                $scope.agent.files.gallery.splice(index,1);
                            }
                        });
                    }else{
                        $scope.agent.files[file.group] = null;
                    }
                }, function(a,b,c){
                    console.log('não foi possível apagar a imagem', a,b,c);
                });
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
                        if (response.data.error) {
                            alert(response.data.data.portifolio);
                            return;
                        }
                        if (group === 'gallery') {
                            $scope.agent.files.gallery.push(response.data.gallery[0]);
                        } else {
                            $scope.agent.files[group] = response.data[group];
                        }

                        $timeout(function () {
                            file.result = response.data;
                        });

                        $timeout(function(){
                            $scope.f = 0;
                        }, 1500);
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


    // Controller do 'Informações do responsável'
    app.controller('ResponsibleCtrl', ['$scope', 'Entity', 'MapasCulturais', 'Upload', '$timeout',
        function ResponsibleCtrl($scope, Entity, MapasCulturais, Upload, $timeout)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agenteIndividual;
//            BaseAgentCtrl.call(this, $scope, Agent, MapasCulturais, agent_id, Upload, $timeout);

            var params = {
                'id': agent_id,
                '@select': 'id,singleUrl,name,rg,rg_orgao,relacaoPonto,cpf,geoEstado,terms,'+
                           'emailPrivado,telefone1,telefone1_operadora,nomeCompleto,'+
                           'geoMunicipio,facebook,twitter,googleplus,mesmoEndereco,shortDescription',

                '@files':'(avatar.avatarBig,portifolio,gallery.avatarBig):url',
                '@permissions': 'view'
            };

            $scope.agent = Entity.get(params);

            extendController($scope, $timeout, Entity, agent_id);

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

            extendController($scope, $timeout, Entity, agent_id);
        }
    ]);


    // Controller do 'Seu ponto no Mapa'
    app.controller('PointCtrl', ['$scope', 'Entity', 'MapasCulturais', 'Upload', '$timeout', 'geocoder', 'cepcoder',
        function PointCtrl($scope, Entity, MapasCulturais, Upload, $timeout, geocoder, cepcoder)
        {
            var agent_id = MapasCulturais.redeCulturaViva.agentePonto;

            var params = {
                'id': agent_id,
                '@select': 'id,terms,name,shortDescription,cep,tem_sede,sede_realizaAtividades,mesmoEndereco,geoEstado,geoMunicipio,'+
                    'En_Bairro,En_Num,En_Nome_Logradouro,En_Complemento,localRealizacao_estado,localRealizacao_cidade,'+
                    'localRealizacao_cidade,localRealizacao_espaco,location',
                '@files':'(avatar.avatarBig,portifolio,gallery.avatarBig):url',
                '@permissions': 'view'
            };

            $scope.markers = {};
            $scope.agent = Entity.get(params, function(agent){
                $scope.markers.main = {
                    lat: agent.location.latitude,
                    lng: agent.location.longitude,
                    message: agent.endereco
                };
            });

            extendController($scope, $timeout, Entity, agent_id);

            $scope.termos = termos;



            $scope.$watch('markers.main', function(point){
                if(point && point.lat && point.lng) {
                    $scope.agent['location'] = [point.lng, point.lat];
                    $scope.save_field('location');
                }
            }, true);

            $scope.cepcoder = {
                busy: false,
                code: function(cep){
                    $scope.agent.cep = cep;
                    $scope.save_field('cep');
                    $scope.cepcoder.busy = true;
                    cepcoder.code(cep).then(function(res){
                        var addr = res.data;
                        if(addr){
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

                        }

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

    app.controller('EntityCtrl', ['$scope', '$timeout', 'Entity', 'MapasCulturais',
        function($scope, $timeout, Entity, MapasCulturais){
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

            extendController($scope, $timeout, Entity, agent_id);

        }
    ]);

    app.controller('EntityContactCtrl', ['$scope', 'Entity', 'MapasCulturais', '$timeout',
        function($scope, Entity, MapasCulturais, $timeout){
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

            extendController($scope, $timeout, Entity, agent_id);

        }
    ]);

})(angular);
