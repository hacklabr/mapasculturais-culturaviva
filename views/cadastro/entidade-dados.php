<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Dados da Entidade';
    $this->cadastroText = 'Inclua os dados da Entidade responsável pelo Ponto de Cultura';
    $this->cadastroIcon = 'icon-vcard';
    $this->cadastroPageClass = 'dados-entidade page-base-form';
?>


<form ng-controller="ResponsibleCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Quero ser* <i>?</i></span>
                <select ng-blur="save_field('')" ng-model="queroser">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                </select>
            </label>

            <label class="colunm-50">
                <span class="destaque">Tipo de organização* <i>?</i></span>
                <select ng-blur="save_field('')" ng-model="organization">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                </select>
            </label>
        </div> 
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span>CNPJ da Entidade*</span>
                <input type="text" ng-blur="save_field('')" ng-model="entity"  >
                <div class="naoseaplica">
                    <input type="checkbox" ng-blur="save_field('')" ng-model="naocnpj" >não se aplica <span class="destaque"><i>?</i></span>
                </div>
            </label>

            <label class="colunm-50">
                <span class="destaque">Nome da Razão Social da Entidade* <i>?</i></span>
                <input type="text" ng-blur="save_field('')" ng-model="rg" >
            </label>
        </div> 
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Nome do Representante Legal* <i>?</i></span>
                <input type="text" ng-blur="save_field('')" ng-model="represent" >
            </label>

            <label class="colunm-50">
                <span class="destaque">Nome Fantasia* <i>?</i></span>
                <input type="text" ng-blur="save_field('')" ng-model="nameFantastic" >
            </label>
        </div>   
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Tipo de Certificação* <i>?</i></span>
                <select ng-blur="save_field('')" ng-model="cerfification">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Você já foi fomentado pelo MinC* <i>?</i></span>
                <span class="label-radio">
                    <input type="radio" name="formentominc" value="sim" ng-blur="save_field('')" ng-model="yes" > sim
                </span>
                <span class="label-radio">
                <input type="radio" name="formentominc" value="nao" ng-blur="save_field('')" ng-model="no"  > Não
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Tipo de Reconhecimento* <i>?</i></span>
                <span class="label-radio"><input type="radio" name="tiporeconhecimento" value="minc" ng-blur="save_field('')" ng-model="yes" > Direto com o MinC</span>
                <span class="label-radio"><input type="radio" name="tiporeconhecimento" value="estadual" ng-blur="save_field('')" ng-model="yes" > Estadual</span>
                <span class="label-radio"><input type="radio" name="tiporeconhecimento" value="municipal" ng-blur="save_field('')" ng-model="yes" > Municipal</span>
                <span class="label-radio"><input type="radio" name="tiporeconhecimento" value="intermunicipal" ng-blur="save_field('')" ng-model="yes" > Intermunicipal</span>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span>Número do Edital de Seleção*</span>
                <input type="text" ng-blur="save_field('')" ng-model="numeroeditalselection" >
            </label>

            <label class="colunm-50">
                <span>Ano do Edital de Seleção*</span>
                <input type="text" ng-blur="save_field('')" ng-model="year" >
            </label>
        </div>   
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span>Nome do Projeto*</span>
                <input type="text" ng-blur="save_field('')" ng-model="nameproject" >
            </label>

            <label class="colunm-50">
                <span class="destaque">Local de Realização* <i>?</i></span>
                <select ng-blur="save_field('')" ng-model="locationrealization">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                </select>
            </label>
        </div>   
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Etapa do Projeto* <i>?</i></span>
                <span class="label-radio"><input type="radio" name="etapaprojeto" value="sim" ng-blur="save_field('')" ng-model="yes" > Em Execução</span>
                <span class="label-radio"><input type="radio" name="etapaprojeto" value="nao" ng-blur="save_field('')" ng-model="no"  > Já executado</span>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span>Proponente* </span>
                <input type="text" ng-blur="save_field('')" ng-model="proponente" >
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Resumo do projeto(objeto)* <i>?</i></span>
                <textarea ng-blur="save_field('')" ng-model="resume"> </textarea>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
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
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span class="destaque">Prestação de Contas* <i>?</i></span>
                <span class="label-radio"><input type="radio" name="prestacaocontas" value="enviada" ng-blur="save_field('')" ng-model="yes" > Enviada</span>
                <span class="label-radio"><input type="radio" name="prestacaocontas" value="naoenviada" ng-blur="save_field('')" ng-model="no"  > Não Enviada</span>
                <span class="label-radio"><input type="radio" name="prestacaocontas" value="premiado" ng-blur="save_field('')" ng-model="yes" > Ponto de Cultura Premiado</span>
                <span class="label-radio"><input type="radio" name="prestacaocontas" value="Aprovada" ng-blur="save_field('')" ng-model="no"  > Aprovada</span>
                <span class="label-radio"><input type="radio" name="prestacaocontas" value="naoaprovado" ng-blur="save_field('')" ng-model="yes" > Não Aprovada</span>
                <span class="label-radio"><input type="radio" name="prestacaocontas" value="analise" ng-blur="save_field('')" ng-model="no"  > Em Análise</span>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-full vigencia">
                <span >Vigência*: </span>
                <select  placeholder="de 00/00/0000"  ng-blur="save_field('')" ng-model="vigentede">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                </select>
                <select  placeholder="a 00/00/0000"  ng-blur="save_field('')" ng-model="locationrealization">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-full">
               <span class="destaque">Recebe ou recebeu outros financiamentos? (apoios, patrocínios, prêmios, bolsas, convênios, etc)* <i>?</i></span>
                <span class="label-radio"><input type="radio" name="financiamentos" value="sim" ng-blur="save_field('')" ng-model="yes" > Sim</span>
                <span class="label-radio"><input type="radio" name="financiamentos" value="nao" ng-blur="save_field('')" ng-model="no"  > Não</span>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-50">
                <span>Quais ?</span>
                <input type="text" ng-blur="save_field('')" ng-model="quais" >
            </label>
        </div>
        <div class="clear"></div>
    </div>
</form>