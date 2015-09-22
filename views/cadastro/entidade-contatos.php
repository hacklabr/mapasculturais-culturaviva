<?php 
$this->bodyProperties['ng-app'] = "culturaviva";

$this->layout = 'cadastro';

$this->cadastroTitle = $this->dict('cadastro: titulo - entidade contatos', false);
?>
<script type="text/javascript" src="/protected/application/themes/mapasculturais-culturaviva/assets/js/cadastro-app.js"></script>
<script type="text/javascript" src="/protected/application/themes/mapasculturais-culturaviva/assets/js/cadastro-controller.js"></script>
<script type="text/javascript" src="/protected/application/themes/mapasculturais-culturaviva/assets/js/cadastro-service.js"></script>

<div class="container" ng-controller="CadastroController">
    <form>
        <fieldset class="required">
            <legend>Informações obrigatórias</legend>

            <div>
                <label>
                    <span>Nome completo</span>
                    <input type="text" ng-model="agent.name" />
                </label>
                
                <label>
                    <span>RG</span>
                    <input type="text" ng-model="agent.rg"/>
                </label>
                
                <label>
                    <span>Órgão expeditor</span>
                    <select ng-model="agent.emitter">
                        <option value="SSP">Secretaria de Segurança Pública</option>
                    </select>
                </label>
            </div>

            <div>
                <label>
                    <span>Qual sua relação com o Ponto/Pontão de Cultura?</span>
                    <input type="text" ng-model="agent.relation"/>
                </label>
                
                <label>
                    <span>CPF</span>
                    <input type="text" ng-model="agent.cpf" />
                </label>
                
                <label>
                    <span>Estado</span>
                    <select ng-model="agent.state">
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
            </div>

            <div>
                <label>
                    <span>E-mail Pessoal</span>
                    <input type="email" ng-model="agent.email" />
                </label>
                
                <label>
                    <span>Telefone Pessoal (com DDD)</span>
                    <input type="text" ng-model="agent.phone"/>
                </label>

                <label>
                    <span>Operadora</span>
                    <select ng-model="agent.phone_operator">
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
                        <option>DSLI</option>                     <option>Plenna</option>
                        <option>Easytone</option>                 <option>Redevox</option>
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
        </fieldset>


        <fieldset>
            <legend>Informações Opcionais</legend>

            <div>
                <label>
                    <span>Incluir foto</span>
                    <input type="file" ng-model="agent.photo"/>
                </label>
                
                <label>
                    <span>Qual nome você gostaria de ser chamado</span>
                    <input type="text" ng-model="agent.nickname"/>
                </label>
                
                <label>
                    <span>Cidade</span>
                    <input type="text" ng-model="agent.city"/>
                </label>
            </div>

            <div>
                <label>
                    <span>Seu perfil no Facebook</span>
                    <input type="text" ng-model="agent.facebook"/>
                </label>
                
                <label>
                    <span>Seu perfil no Twitter</span>
                    <input type="text" ng-model="agent.twitter"/>
                </label>
                
                <label>
                    <span>Seu perfil no Google+</span>
                    <input type="text" ng-model="agent.google"/>
                </label>
            </div>
        </fieldset>

    </form>
</div>