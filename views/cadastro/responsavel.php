<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Informações do Responsável';
    $this->cadastroText = 'Precisamos saber quem é você e pegar seus contatos! Afinal, comunicação é um requisito vital para que nossa rede se mantenha viva!';
    $this->cadastroIcon = 'icon-user';
    $this->cadastroPageClass = 'responsavel page-base-form';
?>


<form ng-controller="ResponsibleCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <label class="colunm1">
                <span>Nome completo*</span>
                <input type="text" ng-blur="save_field('nomeCompleto')" ng-model="agent.nomeCompleto" />
            </label>

            <label class="colunm2">
                <span>CPF*</span>
                <input type="text"
                       ng-blur="save_field('cpf')"
                       ng-model="agent.cpf"
                       ui-mask="999.999.999-99">
            </label>

            <?php /*
            <label class="colunm2">
                <span>RG*</span>
                <input type="text"
                       ng-blur="save_field('rg')"
                       ng-model="agent.rg">
            </label>
            <label class="colunm3">
                <span>Órgão expeditor*</span>
                <input type="text"
                       ng-blur="save_field('rg_orgao')"
                       ng-model="agent.rg_orgao">
            </label>

            */ ?>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm1">
                <span>E-mail Pessoal*</span>
                <input type="email" ng-blur="save_field('emailPrivado')" ng-model="agent.emailPrivado" />
            </label>

            <label class="colunm2">
                <span>Telefone Pessoal (com DDD)*</span>
                <input type="text" ng-blur="save_field('telefone1')" ng-model="agent.telefone1"/>
            </label>

            <label class="colunm3">
                <span>Operadora*</span>
                <select ng-blur="save_field('telefone1_operadora')" ng-model="agent.telefone1_operadora">
                    <option>51 Brasil</option>                <option>Intelig</option>
                    <option>Aerotech</option>                 <option>ITACEU</option>
                    <option>Alpamayo</option>                 <option>Konecta</option>
                    <option>Alpha Nobilis*</option>           <option>LigueMAX</option>
                    <option>America Net</option>              <option>LinkNET</option>
                    <option>Amigo</option>                    <option>Locaweb</option>
                    <option>BBT Brasil</option>               <option>Nebracam</option>
                    <option>Cabo Telecom</option>             <option>Neotelecom</option>
                    <option>Cambridge</option>                <option>Nextel</option>
                    <option>Convergia</option>                <option>Nexus</option>
                    <option>CTBC</option>                     <option>Oi</option>
                    <option>DIALDATA TELECOM</option>         <option>Ostara</option>
                    <option>Dollarphone</option>              <option>OTS</option>
                    <option>Easytone</option>                 <option>Redevox</option>
                    <option>DSLI</option>                     <option>Plenna</option>
                    <option>Embratel / NET / Claro</option>   <option>Sercomtel</option>
                    <option>Engevox</option>                  <option>Sermatel</option>
                    <option>Epsilon</option>                  <option>SmartTelecom|76Telecom</option>
                    <option>Espas</option>                    <option>Spin</option>
                    <option>Fale 65</option>                  <option>Telebit</option>
                    <option>Falkland/IPCorp</option>          <option>Teledados</option>
                    <option>Fonar</option>                    <option>TIM</option>
                    <option>Global Crossing(Impsat)</option>  <option>Transit Telecom</option>
                    <option>Golden Line</option>              <option>Viacom</option>
                    <option>GT Group</option>                 <option>Viper</option>
                    <option>GVT</option>                      <option>Vipway</option>
                    <option>Hello Brazil</option>             <option>Vivo</option>
                    <option>Hit Telecomunicações</option>     <option>Voitel</option>
                    <option>Hoje</option>
                    <option>IDT (Minas Gerais)</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm1">
                <span class="destaque">Qual sua relação com o Ponto/Pontão de Cultura?* <i>?</i></span>
                <select ng-blur="save_field('relacaoPonto')" ng-model="agent.relacaoPonto">
                    <option value="responsavel">Sou o responsável pelo Ponto/Pontão de Cultura</option>
                    <option value="funcionario">Trabalho no Ponto/Pontão de Cultura</option>
                    <option value="parceiro">Sou parceiro do Ponto/Pontão e estou ajudando a cadastrar</option>
                </select>
            </label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="form form-opcional">
        <h4>Informações Opcionais</h4>
        <div class="row">
            <div class="img_updade" ng-controller="ImageUploadCtrl">
                <div type="file" ngf-select="uploadFile($file, 'avatar')" accept="config.image.validation" ngf-max-size="config.image.maxUploadSize" title="{{agent['@files:avatar.avatarBig'] ? 'Clique para alterar a foto' : 'Clique para incluir uma foto'}}">
                    <a href="#" class="exclui">x</a>
                    <img ng-if="!agent['@files:avatar.avatarBig']" src="<?php $this->asset('img/incluir_img.png') ?>" width="160" height="138">
                    <img ng-if="agent['@files:avatar.avatarBig']" src="{{agent['@files:avatar.avatarBig'].url}}" width="160" height="138">
                </div>
                <div class="progress row" ng-show="f.progress >= 0">
                    <span style="width:{{f.progress}}%;" ng-bind="f.progress + '%'"></span>
                </div>
            </div>

            <label class="nome_chamado">
                <span class="destaque">Qual nome você gostaria de ser chamado <i>?</i></span>
                <input type="text" ng-blur="save_field('name')" ng-model="agent.name"/>
            </label>

            <label class="cidade">
                <span>Cidade</span>
                <input type="text" ng-blur="save_field('geoMunicipio')" ng-model="agent.geoMunicipio"/>
            </label>
            <label class="colunm3">
                <span>Naturalidade - Estado*</span>
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
            <div class="clear"></div>
        </div>
        <div class="row">
            <span class="destaque redessociais">Seu perfil nas redes sociais: <i>?</i></span>
            <label class="colunm-redes facebook">
                <span><i class="icon icon-facebook-squared"></i> Seu perfil no Facebook</span>
                <input type="text" ng-blur="save_field('facebook')" ng-model="agent.facebook" placeholder="http://"/>
            </label>

            <label class="colunm-redes twitter">
                <span><i class="icon icon-twitter"></i> Seu perfil no Twitter</span>
                <input type="text" ng-blur="save_field('twitter')" ng-model="agent.twitter" placeholder="http://"/>
            </label>

            <label class="colunm-redes googleplus">
                <span><i class="icon icon-gplus"></i> Seu perfil no Google+</span>
                <input type="text" ng-blur="save_field('googleplus')" ng-model="agent.googleplus" placeholder="http://"/>
            </label>
        </div>
    </div>
</form>