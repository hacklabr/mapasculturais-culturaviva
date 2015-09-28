<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Contato da Entidade';
    $this->cadastroText = 'Como o Minc pode contatar seu Ponto? Nos Ajude a garantir que você receberá informações importantes. :)';
    $this->cadastroIcon = 'icon-phone';
    $this->cadastroPageClass = 'contato-entidade page-base-form';
?>


<form ng-controller="ResponsibleCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <label class="colunm-full">
                <span>Email institucional*</span>
                <input type="text" ng-blur="save_field('')" ng-model="email" />
            </label>
        </div>  
        <div class="clear"></div>
        <div class="row">
            <label class="colunm05">
                <span>Telefone institucional(com DD)*</span>
                <input type="text" ng-blur="save_field('')" ng-model="phone"/>
            </label>

            <label class="colunm02">
                <span>Operadora*</span>
                <select ng-blur="save_field('')" ng-model="">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm05">
                <span>Outro Telefone(com DD)*</span>
                <input type="text" ng-blur="save_field('')" ng-model="phone"/>
            </label>

            <label class="colunm02">
                <span>Operadora*</span>
                <select ng-blur="save_field('')" ng-model="">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm1">
                <span class="destaque">Nome do Responsável* <i>?</i></span>
                <input type="text" ng-blur="save_field('name')" ng-model="name" />
            </label>

            <label class="colunm2">
                <span>Cargo do Responsável*</span>
                <input type="text" ng-blur="save_field('')" ng-model=""/>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm1">
                <span>Email do Responsável* </span>
                <input type="email" ng-blur="save_field('')" ng-model="email" />
            </label>

            <label class="colunm2">
                <span>Telefone do Responsável*</span>
                <input type="text" ng-blur="save_field('')" ng-model=""/>
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
                <select ng-blur="save_field('')" ng-model="">
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
                <input type="text" ng-blur="save_field('')" ng-model=""/>
            </label>
            <label class="colunm3">
                <span>Bairro*</span>
                <input type="text" ng-blur="save_field('')" ng-model=""/>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm05">
                <span>Número* </span>
                <input type="text" ng-blur="save_field('')" ng-model=""/>
            </label>

            <label class="colunm2">
                <span>Rua*</span>
                <input type="text" ng-blur="save_field('')" ng-model=""/>
            </label>
            <label class="colunm3">
                <span>Complemento*</span>
                <input type="text" ng-blur="save_field('')" ng-model=""/>
            </label>
        </div>
        <div class="clear"></div>
    </div>
</form>