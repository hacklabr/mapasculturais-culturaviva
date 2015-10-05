<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Dados da Entidade ou Coletivo Cultural';
    $this->cadastroText = 'Inclua os dados da Entidade ou Coletivo Cultural responsável pelo Ponto de Cultura';
    $this->cadastroIcon = 'icon-vcard';
    $this->cadastroPageClass = 'dados-entidade page-base-form';
    $this->cadastroLinkContinuar = 'entidadeFinanciamento';
?>


<form ng-controller="EntityCtrl">
    <?php $this->part('messages'); ?>
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Tipo de organização* <i>?</i></span>
                <select name="tipoOrganizacao"
                        ng-change="save_field('tipoOrganizacao')"
                        ng-model="agent.tipoOrganizacao">
                    <option value="coletivo">Coletivo Cultural</option>
                    <option value="entidade">Entidade (CNPJ)</option>
                </select>
            </label>
            <label class="colunm-50" ng-show="agent.tipoOrganizacao">
                <span class="destaque">Quero ser* <i>?</i></span>
                <select name="tipoPontoCulturaDesejado"
                        ng-change="save_field('tipoPontoCulturaDesejado')"
                        ng-model="agent.tipoPontoCulturaDesejado">
                    <option value="ponto">Ponto</option>
                    <option value="pontao">Pontão</option>
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
                        <span class="destaque">Nome do Representante Legal* <i>?</i></span>
                        <input type="text" ng-blur="save_field('representanteLegal')" ng-model="agent.representanteLegal" >
                    </label>

                    <label class="colunm-50">
                        <span class="destaque">Nome Fantasia* <i>?</i></span>
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
        <div class="clear"></div>

        <div ng-show="agent.foiFomentado">
            <div class="row">
                <label class="colunm-1">
                    <span class="destaque" ng-show="agent.tipoOrganizacao==='entidade'">Qual o principal financiamento que a Entidade recebe ou recebeu?</span>
                    <span class="destaque" ng-show="agent.tipoOrganizacao==='coletivo'">Qual o principal financiamento que o Coletivo recebe ou recebeu?</span>
                    <label class="label-radio"><input type="radio"
                                                     name="tipoFomento"
                                                     value="tcc"
                                                     ng-change="save_field('tipoFomento')"
                                                     ng-model="agent.tipoFomento" > TCC - Celebração de Termo de Compromisso Cultural como resultado de seleção em edital público do Ministério da Cultura ou de entes federados parceiros nas Redes Estaduais/Municipais/Intermunicipais de Pontos e Pontões de Cultura.</label>
                    <label class="label-radio"><input type="radio"
                                                     name="tipoFomento"
                                                     value="premio"
                                                     ng-change="save_field('tipoFomento')"
                                                     ng-model="agent.tipoFomento" > Prêmio - Recebimento de Premiação em recursos financeiros como resultado de seleção em edital público do Ministério da Cultura ou de entes federados parceiros nas Redes Estaduais/Municipais/Intermunicipais de Pontos e Pontões de Cultura.</label>
                    <label class="label-radio"><input type="radio"
                                                     name="tipoFomento"
                                                     value="bolsa"
                                                     ng-change="save_field('tipoFomento')"
                                                     ng-model="agent.tipoFomento" > Bolsa - Recebimento de Bolsa como resultado de seleção em edital público do Ministério da Cultura ou de entes federados parceiros nas Redes Estaduais/Municipais/Intermunicipais de Pontos e Pontões de Cultura.</label>
                    <label class="label-radio"><input type="radio"
                                                     name="tipoFomento"
                                                     value="convenio"
                                                     ng-change="save_field('tipoFomento')"
                                                     ng-model="agent.tipoFomento" > Convênio - Celebração de Convênio com o Ministério da Cultura ou com entes federados parceiros nas Redes Estaduais/Municipais/Intermunicipais de Pontos e Pontões de Cultura.para realização de projeto cultural.</label>
                    <label class="label-radio"><input type="radio"
                                                     name="tipoFomento"
                                                     value="rouanet"
                                                     ng-change="save_field('tipoFomento')"
                                                     ng-model="agent.tipoFomento" > Lei Rouanet - Projeto Aprovado e Captação de Recursos realizada por meio do mecanismo de Incentivo Fiscal previsto na Lei n 8.313, de 23 de dezembro de 1991 (Lei Rouanet).</label>
                    <label class="label-radio"><input type="radio"
                                                     name="tipoFomento"
                                                     value="outros"
                                                     ng-change="save_field('tipoFomento')"
                                                     ng-model="agent.tipoFomento" > Outros</label>
                    <input type="text"
                           ng-show="agent.tipoFomento==='outros'"
                           ng-blur="save_field('tipoFomentoOutros')"
                           ng-model="agent.tipoFomentoOutros">
                </label>
            </div>
            <div class="clear"></div>
            <div class="row">
                <div class="colunm-full">
                    <span class="destaque">Tipo de Reconhecimento* <i>?</i></span>
                    <label class="label-radio"><input type="radio"
                                                     name="fomento_tipoReconhecimento"
                                                     value="minc"
                                                     ng-change="save_field('fomento_tipoReconhecimento')"
                                                     ng-model="agent.fomento_tipoReconhecimento" > Direto com o MinC</label>
                    <label class="label-radio"><input type="radio"
                                                     name="fomento_tipoReconhecimento"
                                                     value="estadual"
                                                     ng-change="save_field('fomento_tipoReconhecimento')"
                                                     ng-model="agent.fomento_tipoReconhecimento" > Estadual</label>
                    <label class="label-radio"><input type="radio"
                                                     name="fomento_tipoReconhecimento"
                                                     value="municipal"
                                                     ng-change="save_field('fomento_tipoReconhecimento')"
                                                     ng-model="agent.fomento_tipoReconhecimento" > Municipal</label>
                    <label class="label-radio"><input type="radio"
                                                     name="fomento_tipoReconhecimento"
                                                     value="intermunicipal"
                                                     ng-change="save_field('fomento_tipoReconhecimento')"
                                                     ng-model="agent.fomento_tipoReconhecimento" > Intermunicipal</label>
                </div>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label ng-if="agent.Ds_Edital" class="colunm-50">
                    <span>{{agent.DS_Edital}}</span>
                </label>
                <label class="colunm-50">
                    <span class="destaque">Número do Edital de Seleção*</span>
                    <input type="text" ng-blur="save_field('edital_num')" ng-model="agent.edital_num" >
                </label>
                <label class="colunm-50">
                    <span class="destaque">Ano do Edital de Seleção*</span>
                    <input type="text" ng-blur="save_field('edital_ano')" ng-model="agent.edital_ano" >
                </label>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label class="colunm-50">
                    <span class="destaque">Título do Projeto*</span>
                    <input type="text" ng-blur="save_field('edital_projeto_nome')" ng-model="agent.edital_projeto_nome" >
                </label>

                <label class="colunm-50">
                    <span class="destaque">Local de Realização* <i>?</i></span>
                    <input type="text" ng-blur="save_field('edital_localRealizacao')" ng-model="agent.edital_localRealizacao" >
    <!--                <select ng-blur="save_field('')" ng-model="agent.locationrealization">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                    </select>-->
                </label>
            </div>
            <div class="clear"></div>
            <div class="row">
                <div class="colunm-50">
                    <span class="destaque">Etapa do Projeto* <i>?</i></span>
                    <label class="label-radio"><input type="radio"
                                                     name="etapaprojeto"
                                                     value="emexecucao"
                                                     ng-change="save_field('edital_projeto_etapa')"
                                                     ng-model="agent.edital_projeto_etapa"> Em Execução</label>
                    <label class="label-radio"><input type="radio"
                                                     name="etapaprojeto"
                                                     value="executado"
                                                     ng-change="save_field('edital_projeto_etapa')"
                                                     ng-model="agent.edital_projeto_etapa"> Já executado</label>
                </div>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label class="colunm-50">
                    <span class="destaque">Proponente* </span>
                    <input type="text" ng-blur="save_field('edital_proponente')" ng-model="agent.edital_proponente" >
                </label>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label class="colunm-full">
                    <span class="destaque">Resumo do projeto (objeto)* <i>?</i></span>
                    <textarea ng-blur="save_field('edital_projeto_resumo')" ng-model="agent.edital_projeto_resumo"> </textarea>
                </label>
            </div>
            <div class="clear"></div>
    <!--        <div class="row">
                <label class="colunm-full recursos-projeto">
                    <span class="destaque">Recursos do Projeto selecionado* <i>?</i></span>
                    <table>
                        <tr>
                            <td width="200"></td>
                            <td width="150" class="cinza">Custeio*</td>
                            <td width="150" class="cinza">Capital*</td>
                            <td width="150" class="cinza">Total*</td>
                        </tr>
                        <tr>
                            <td class="cinza">Valor Total(R$)*</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="cinza">
                            <td >Ação*</td>
                            <td colspan="3">Valor das Parcelas(R$)*</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="cinza">Total das Parcelas (R$)*</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </label>
            </div>
            <div class="clear"></div>-->
            <div ng-show="agent.edital_projeto_etapa==='executado'">
                <div class="row">
            <label class="colunm-full">
                <span>Email institucional*</span>
                <input type="email" ng-blur="save_field('emailPrivado')" ng-model="agent.emailPrivado" />
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm05">
                <span>Telefone institucional(com DDD)*</span>
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
                <span>Outro Telefone(com DDD)*</span>
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
                <span class="destaque">Nome do Responsável* <i>?</i></span>
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
                <span class="destaque">Endereço* <i>?</i></span>
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
        <div class="row">
            <h4>Cartas de Reconhecimento</h4>

            <p>Anexar 02 cartas de apoio à entidade ou coletivo cultural requerente, emitidas por instituições públicas, privadas, ou coletivos culturais relacionadas com arte, cultura, educação ou desenvolvimento comunitário. As cartas devem ser assinadas e digitalizadas. Serão aceitas somente assinaturas manuscritas em papel ou impressões digitais em caso de pessoas não alfabetizadas. Não serão aceitas assinaturas digitais.</p>

            <p>O ato de assinar uma Carta de Reconhecimento implica na responsabilidade da instituições públicas, privadas, ou coletivos culturais para com a credibilidade do Ponto/Pontão de Cultura, firmando a legitimidade do mesmo.</p>
        </div>
        <div class="clear"></div>
    </div>
</form>
