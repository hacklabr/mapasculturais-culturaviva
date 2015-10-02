<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Dados da Entidade ou Coletivo Cultural';
    $this->cadastroText = 'Inclua os dados da Entidade ou Coletivo Cultural responsável pelo Ponto de Cultura';
    $this->cadastroIcon = 'icon-vcard';
    $this->cadastroPageClass = 'dados-entidade page-base-form';
?>


<form ng-controller="EntityCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Tipo de organização* <i>?</i></span>
                <select name="tipoOrganizacao"
                        ng-change="save_field('tipoOrganizacao')"
                        ng-model="entity.tipoOrganizacao">
                    <option value="coletivo">Coletivo Cultural</option>
                    <option value="entidades">Entidade Cultural</option>
                </select>
            </label>
            <label class="colunm-50" ng-show="entity.tipoOrganizacao==='coletivo'">
                <span class="destaque">Quero ser* <i>?</i></span>
                <select name="tipoPontoCulturaDesejado"
                        ng-change="save_field('tipoPontoCulturaDesejado')"
                        ng-model="entity.tipoPontoCulturaDesejado">
                    <option value="ponto">Ponto</option>
                    <option value="pontao">Pontão</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">CNPJ da Entidade*</span>
                <input type="text"
                       ng-blur="save_field('cnpj')"
                       ng-model="entity.cnpj"
                       ng-disabled="entity.semCNPJ"
                       ui-mask="99.999.999/9999-99">
                <p ng-show="true"></p>
                <div class="naoseaplica">
                    <input type="checkbox"
                           ng-checked="entity.semCNPJ"
                           ng-change="save_field('semCNPJ')"
                           ng-model="entity.semCNPJ" >não tenho CNPJ<span class="destaque"><i>?</i></span>
                </div>
            </label>

            <label class="colunm-50" ng-hide="entity.semCNPJ">
                <span class="destaque">Nome da Razão Social da Entidade* <i>?</i></span>
                <input type="text" ng-blur="save_field('nomeCompleto')" ng-model="entity.nomeCompleto" >
            </label>
        </div>
        <!--<div ng-show="entity.semCNPJ">-->
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50" ng-hide="entity.semCNPJ">
                <span class="destaque">Nome do Representante Legal* <i>?</i></span>
                <input type="text" ng-blur="save_field('representanteLegal')" ng-model="entity.representanteLegal" >
            </label>

            <label class="colunm-50">
                <span class="destaque" ng-hide="entity.semCNPJ">Nome Fantasia* <i>?</i></span>
                <span class="destaque" ng-show="entity.semCNPJ">Nome do Coletivo Cultura* <i>?</i></span>
                <input type="text" ng-blur="save_field('name')" ng-model="entity.name" >
            </label>
        </div>
        <div class="clear"></div>
        <?php /*
        <div class="row" ng-hide="entity.semCNPJ">
            <label class="colunm-50">
                <span class="destaque">Tipo de Certificação* <i>?</i></span>
                <select name="tipoCertificacao"
                        ng-change="save_field('tipoCertificacao')"
                        ng-model="entity.tipoCertificacao">
                    <option value="ponto_coletivo">Ponto de Cultura - Grupo ou Coletivo</option>
                    <option value="ponto_entidade">Ponto de Cultura - Entidade</option>
                    <option value="pontao_entidade">Pontão de Cultura - Entidade</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>
        */ ?>
        <div class="row">
            <div class="colunm-50">
                <span class="destaque" ng-hide="entity.semCNPJ">A Entidade já foi fomentado pelo MinC* <i>?</i></span>
                <span class="destaque" ng-show="entity.semCNPJ">O Coletivo já foi fomentado pelo MinC* <i>?</i></span>
                <label class="label-radio">
                    <input type="radio"
                           name="formentominc"
                           ng-value="1"
                           ng-change="save_field('foiFomentado')"
                           ng-model="entity.foiFomentado"> Sim
                </label>
                <label class="label-radio">
                    <input type="radio"
                           name="formentominc"
                           ng-value="0"
                           ng-change="save_field('foiFomentado')"
                           ng-model="entity.foiFomentado"> Não
                </label>
            </div>
        </div>
        <div class="clear"></div>
        <div ng-show="entity.foiFomentado">
            <div class="row">
                <label class="colunm-50">
                    <span class="destaque" ng-hide="entity.semCNPJ">Qual o primcipal financiamento que a Entidade recebe ou recebeu?</span>
                    <span class="destaque" ng-show="entity.semCNPJ">Qual o primcipal financiamento que o Coletivo recebe ou recebeu?</span>
                    <select name="tipoCertificacao"
                            ng-change="save_field('tipoFomento')"
                            ng-model="entity.tipoFomento">
                        <option value="convenio">Convênio</option>
                        <option value="tcc">TCC</option>
                        <option value="bolsa">Bolsa</option>
                        <option value="premio">Prêmio</option>
                        <option value="rouanet">Lei Rouanet</option>
                        <option value="outros">Outros</option>
                    </select>
                    <input type="text"
                           ng-show="entity.tipoFomento==='outros'"
                           ng-blur="save_field('tipoFomentoOutros')"
                           ng-model="entity.tipoFomentoOutros">
                </label>
            </div>
            <div class="clear"></div>
            <div class="row">
                <div class="colunm-full">
                    <span class="destaque">Tipo de Reconhecimento* <i>?</i></span>
                    <label class="label-radio"><input type="radio"
                                                     name="tiporeconhecimento"
                                                     value="minc"
                                                     ng-change="save_field('tipoReconhecimento')"
                                                     ng-model="entity.tipoReconhecimento" > Direto com o MinC</label>
                    <label class="label-radio"><input type="radio"
                                                     name="tiporeconhecimento"
                                                     value="estadual"
                                                     ng-change="save_field('tipoReconhecimento')"
                                                     ng-model="entity.tipoReconhecimento" > Estadual</label>
                    <label class="label-radio"><input type="radio"
                                                     name="tiporeconhecimento"
                                                     value="municipal"
                                                     ng-change="save_field('tipoReconhecimento')"
                                                     ng-model="entity.tipoReconhecimento" > Municipal</label>
                    <label class="label-radio"><input type="radio"
                                                     name="tiporeconhecimento"
                                                     value="intermunicipal"
                                                     ng-change="save_field('tipoReconhecimento')"
                                                     ng-model="entity.tipoReconhecimento" > Intermunicipal</label>
                </div>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label class="colunm-50">
                    <span class="destaque">Número do Edital de Seleção*</span>
                    <input type="text" ng-blur="save_field('numEdital')" ng-model="entity.numEdital" >
                </label>
                <label class="colunm-50">
                    <span class="destaque">Ano do Edital de Seleção*</span>
                    <input type="text" ng-blur="save_field('anoEdital')" ng-model="entity.anoEdital" >
                </label>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label class="colunm-50">
                    <span class="destaque">Título do Projeto*</span>
                    <input type="text" ng-blur="save_field('nomeProjeto')" ng-model="entity.nomeProjeto" >
                </label>

                <label class="colunm-50">
                    <span class="destaque">Local de Realização* <i>?</i></span>
                    <input type="text" ng-blur="save_field('localRealizacao')" ng-model="entity.localRealizacao" >
    <!--                <select ng-blur="save_field('')" ng-model="entity.locationrealization">
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
                                                     ng-change="save_field('etapaProjeto')"
                                                     ng-model="entity.etapaProjeto"> Em Execução</label>
                    <label class="label-radio"><input type="radio"
                                                     name="etapaprojeto"
                                                     value="executado"
                                                     ng-change="save_field('etapaProjeto')"
                                                     ng-model="entity.etapaProjeto"> Já executado</label>
                </div>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label class="colunm-50">
                    <span class="destaque">Proponente* </span>
                    <input type="text" ng-blur="save_field('proponente')" ng-model="entity.proponente" >
                </label>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label class="colunm-full">
                    <span class="destaque">Resumo do projeto(objeto)* <i>?</i></span>
                    <textarea ng-blur="save_field('resumoProjeto')" ng-model="entity.resumoProjeto"> </textarea>
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
            </div>-->
            <div class="clear"></div>
            <div ng-show="entity.etapaProjeto==='executado'">
                <div class="row">
                    <div class="colunm-50">
                        <span class="destaque">Prestação de Contas* <i>?</i></span>
                        <label class="label-radio"><input type="radio"
                                                         name="prestacaoContasEnvio"
                                                         value="enviada"
                                                         ng-blur="save_field('prestacaoContasEnvio')"
                                                         ng-model="entity.prestacaoContasEnvio" > Enviada</label>
                        <label class="label-radio"><input type="radio"
                                                         name="prestacaoContasEnvio"
                                                         value="naoEnviada"
                                                         ng-blur="save_field('prestacaoContasEnvio')"
                                                         ng-model="entity.prestacaoContasEnvio"  > Não Enviada</label>
                        <label class="label-radio"><input type="radio"
                                                         name="prestacaoContasEnvio"
                                                         value="premiado"
                                                         ng-blur="save_field('prestacaoContasEnvio')"
                                                         ng-model="entity.prestacaoContasEnvio" > Ponto de Cultura Premiado</label>
                    </div>
                </div>
                <div class="row" ng-show="entity.prestacaoContasEnvio==='enviada'">
                    <div class="colunm-50">
                        <label class="label-radio"><input type="radio"
                                                         name="prestacaoContasStatus"
                                                         value="aprovada"
                                                         ng-blur="save_field('prestacaoContasStatus')"
                                                         ng-model="entity.prestacaoContasStatus"  > Aprovada</label>
                        <label class="label-radio"><input type="radio"
                                                         name="prestacaoContasStatus"
                                                         value="naoaprovada"
                                                         ng-blur="save_field('prestacaoContasStatus')"
                                                         ng-model="entity.prestacaoContasStatus" > Não Aprovada</label>
                        <label class="label-radio"><input type="radio"
                                                         name="prestacaoContasStatus"
                                                         value="analise"
                                                         ng-blur="save_field('prestacaoContasStatus')"
                                                         ng-model="entity.prestacaoContasStatus"  > Em Análise</label>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="row">
                <label class="colunm-full vigencia">
                    <span class="destaque">Vigência*:    </span>
                    <span class="vigencia-box vigiencia-de ">
                        de <input ui-date ui-date-format="yy-mm-dd" ng-change="save_field('inicioVigenciaProjeto')" ng-model="entity.inicioVigenciaProjeto">
                    </span>
                    <span class="vigencia-box vigiencia-ate">
                        até  <input ui-date ui-date-format="yy-mm-dd" ng-change="save_field('fimVigenciaProjeto')" ng-model="entity.fimVigenciaProjeto">
                    </span>

                </label>
            </div>
            <div class="clear"></div>
        </div>
        <div class="row">
            <div class="colunm-full">
               <span class="destaque">Recebe ou recebeu outros financiamentos? (apoios, patrocínios, prêmios, bolsas, convênios, etc)* <i>?</i></span>
                <label class="label-radio">
                    <input type="radio"
                           name="financiamentos"
                           ng-value="1"
                           ng-change="save_field('recebeOutrosFinanciamentos')"
                           ng-model="entity.recebeOutrosFinanciamentos"> Sim</label>
                <label class="label-radio">
                    <input type="radio"
                           name="financiamentos"
                           ng-value="0"
                           ng-change="save_field('recebeOutrosFinanciamentos')"
                           ng-model="entity.recebeOutrosFinanciamentos"> Não</label>
            </div>
        </div>
        <div class="clear"></div>
        <?php /*
        <div class="row" ng-show="entity.recebeOutrosFinanciamentos">
            <label class="colunm-50">
                <span class="destaque">Quais ?</span>
                <input type="text" ng-blur="save_field('descOutrosFinanciamentos')" ng-model="entity.descOutrosFinanciamentos" >
            </label>
        </div>
        <div class="clear"></div>
        */ ?>
    </div>
</form>