<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = '2. Dados da Entidade ou Coletivo Cultural';
    $this->cadastroText = 'Inclua os dados da Entidade ou Coletivo Cultural responsável pelo Ponto de Cultura';
    $this->cadastroIcon = 'icon-home';
    $this->cadastroPageClass = 'dados-entidade page-base-form';
    $this->cadastroLinkContinuar = 'entidadeFinanciamento';
?>


<form ng-controller="EntityCtrl">
    <?php $this->part('messages'); ?>
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Tipo de organização*</span>
                <select name="tipoOrganizacao"
                        ng-change="save_field('tipoOrganizacao')"
                        ng-model="agent.tipoOrganizacao">
                    <option value="coletivo">Coletivo Cultural (CPF)</option>
                    <option value="entidade">Entidade (CNPJ)</option>
                </select>
            </label>
            <label class="colunm-50" ng-show="agent.tipoOrganizacao">
                <span class="destaque">Quero ser*</span>
                <select name="tipoPontoCulturaDesejado"
                        ng-change="save_field('tipoPontoCulturaDesejado')"
                        ng-model="agent.tipoPontoCulturaDesejado">
                    <option value="ponto">Ponto de Cultura</option>
                    <option value="pontao">Pontão de Cultura</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>

        <div ng-show="agent.tipoOrganizacao==='coletivo'">
            <div class="row">
                <label class="colunm-50">
                    <span class="destaque">Nome do Coletivo Cultura* <i>?</i>
                    </span>
                    <input type="text" ng-blur="save_field('name')" ng-model="agent.name">
                </label>
            </div>
            <div class="clear"></div>
        </div>

        <div ng-show="agent.tipoOrganizacao">
            <div ng-show="agent.tipoOrganizacao==='entidade'">
                <div class="row">
                    <label class="colunm-50">
                        <span class="destaque">CNPJ da Entidade*</span>
                        <input type="text"
                               ng-blur="save_field('cnpj')"
                               ng-model="agent.cnpj"
                               ng-disabled="agent.semCNPJ == '1'"
                               ui-mask="99.999.999/9999-99">
                    </label>
                </div>
                <!--<div ng-show="agent.semCNPJ">-->
                <div class="clear"></div>
                <div class="row">
                    <label class="colunm-50">
                        <span class="destaque">Nome do Representante Legal* <i class='hltip' title='Pessoa que está habilitada juridicamente a representar a Entidade'>?</i></span>
                        <input type="text" ng-blur="save_field('representanteLegal')" ng-model="agent.representanteLegal" >
                    </label>

                    <label class="colunm-50">
                        <span class="destaque">Nome Fantasia* <i class='hltip' title='Nome da Entidade, tal como se reconhece e é reconhecida junto à comunidade'>?</i></span>
                        </span>
                        <div ng-messages="agent.name.$error" style="color:maroon" role="alert">
                            <div ng-message="required">You did not enter a field</div>
                            <div ng-message="minlength">Your field is too short</div>
                            <div ng-message="maxlength">Your field is too long</div>
                        </div>
                        <input type="text" ng-blur="save_field('name')" ng-model="agent.name" >
                    </label>
                </div>
                <div class="clear"></div>
                <?php /*
                <div class="row">
                    <label class="colunm-50">
                        <span class="destaque">Tipo de Certificação* <i>?</i></span>
                        <select name="tipoCertificacao"
                                ng-change="save_field('tipoCertificacao')"
                                ng-model="agent.tipoCertificacao">
                            <option value="ponto_coletivo">Ponto de Cultura - Grupo ou Coletivo</option>
                            <option value="ponto_entidade">Ponto de Cultura - Entidade</option>
                            <option value="pontao_entidade">Pontão de Cultura - Entidade</option>
                        </select>
                    </label>
                </div>
                <div class="clear"></div>
                */ ?>
            </div>
        </div>
        <div class="row">
            <label class="colunm-full">
                <span>Email institucional*</span>
                <input type="email" ng-blur="save_field('emailPrivado')" ng-model="agent.emailPrivado" />
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm05">
                <span>Telefone institucional*</span>
                <input type="text" ng-blur="save_field('telefone1')" ng-model="agent.telefone1" ui-mask="(99) ?99999-9999">
            </label>

            <label class="colunm02">
                <span>Operadora*</span>
                <input type="text" ng-blur="save_field('telefone1_operadora')" ng-model="agent.telefone1_operadora">
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm05">
                <span>Outro Telefone*</span>
                <input type="text" ng-blur="save_field('telefone2')" ng-model="agent.telefone2" ui-mask="(99) ?99999-9999">
            </label>

            <label class="colunm02">
                <span>Operadora*</span>
                <input type="text" ng-blur="save_field('telefone2_operadora')" ng-model="agent.telefone2_operadora">
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm1">
                <span class="destaque">Nome do Responsável* <i class='hltip' title='Pessoa que representa o Ponto de Cultura'>?</i></span>
                <input type="text" ng-blur="save_field('responsavel_nome')" ng-model="agent.responsavel_nome" />
            </label>

            <label class="colunm2">
                <span>Cargo do Responsável*</span>
                <input type="text" ng-blur="save_field('responsavel_cargo')" ng-model="agent.responsavel_cargo"/>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm1">
                <span>Email do Responsável* </span>
                <input type="email" ng-blur="save_field('responsavel_email')" ng-model="agent.responsavel_email" />
            </label>

            <label class="colunm2">
                <span>Telefone do Responsável*</span>
                <input type="text" ng-blur="save_field('responsavel_telefone')" ng-model="agent.responsavel_telefone"/>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm1">
                <span class="destaque">Endereço* <i class='hltip' title='Refere-se ao endereço atrelado ao CNPJ (não precisa ser o mesmo endereço do Ponto de Cultura)'>?</i></span>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm05">
                <span>Estado*</span>
                <select ng-blur="save_field('geoEstado')" ng-model="agent.geoEstado">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </label>
            <label class="colunm2">
                <span>Cidade*</span>
                <input type="text" ng-blur="save_field('geoMunicipio')" ng-model="agent.geoMunicipio"/>
            </label>
            <label class="colunm3">
                <span>Bairro*</span>
                <input type="text" ng-blur="save_field('En_Bairro')" ng-model="agent.En_Bairro"/>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm05">
                <span>Número* </span>
                <input type="text" ng-blur="save_field('En_Num')" ng-model="agent.En_Num"/>
            </label>

            <label class="colunm2">
                <span>Rua*</span>
                <input type="text" ng-blur="save_field('En_Nome_Logradouro')" ng-model="agent.En_Nome_Logradouro"/>
            </label>
            <label class="colunm3">
                <span>Complemento*</span>
                <input type="text" ng-blur="save_field('En_Complemento')" ng-model="agent.En_Complemento"/>
            </label>
        </div>
        <div class="clear"></div>
    </div>
</form>
