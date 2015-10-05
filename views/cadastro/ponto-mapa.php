<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = '4. Seu Ponto no Mapa';
    $this->cadastroText = 'Vamos colocar seu Ponto no mapa! Com estes dados podemos cartografar a rede de Pontos de Cultura por todo Brasil';
    $this->cadastroIcon = 'icon-location';
    $this->cadastroPageClass = 'ponto-mapa page-base-form';
    $this->cadastroLinkContinuar = 'portifolio';
?>


<form ng-controller="PointCtrl">
    <?php $this->part('messages'); ?>
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
          <label class="colunm-full">
            <span class="destaque-img">Incluir o logo vai fazer com que seu Ponto seja facilmente reconhecido no mapa da Rede Cultura Viva. Utilize arquivos .JPG ou .PNG de até {{config.maxUploadSize}}</span>

            <div class="img_updade" ng-controller="ImageUploadCtrl">
                <div class="file-item">
                    <a ng-if="agent.files.logoponto" class="exclui" ng-click="deleteFile(agent.files.logoponto)" title="Excluir arquivo">x</a>
                    <div type="file" ngf-select="uploadFile($file, 'logoponto')" accept="config.image.validation" ngf-max-size="config.image.maxUploadSize" title="{{agent.files.logoponto ? 'Clique para alterar a logo' : 'Clique para incluir uma logo'}}">
                      <img ng-if="!agent.files.logoponto" src="<?php $this->asset('img/incluir_img.png') ?>" width="160" height="138">
                      <img ng-if="agent.files.logoponto" src="{{agent.files.logoponto.url}}" width="160" height="138">
                    </div>
                </div>
                <div class="progress row" ng-show="f.progress >= 0">
                  <span style="width:{{f.progress}}%;" ng-bind="f.progress + '%'"></span>
                </div>
            </div>
          </label>
            <label class="colunm-full">
                <span class="destaque">Nome do Ponto/Pontão de Cultura*</span>
                <input type="text" ng-blur="save_field('name')" ng-model="agent.name" />
                <span class="error" ng-repeat="error in errors.name">{{ error }}</span>
            </label>
        </div>

        <div class="clear"></div>

        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Breve descrição (400 caracteres) do ponto de cultura* <i class='hltip' title='Esta descrição será publicada no mapa da Rede Cultura Viva, aproveite para contar um pouco mais do seu ponto e atrarir o interesse do público.'>?</i></span>
                <textarea max-length="400" ng-blur="save_field('shortDescription')" ng-model="agent.shortDescription"></textarea>
                <span class="error" ng-repeat="error in errors.shortDescription">{{ error }}</span>
            </label>
        </div>
        <div class="row">

            <label class="colunm1" ng-class="{'busy': cepcoder.busy}">
                <span class="destaque">CEP do Ponto de Cultura* (70308-200)<i class='hltip' title='Caso não saiba seu CEP acesse o site dos correios'>?</i></span>
                <input type="text"
                       ng-blur="save_field('cep'); cepcoder.code(agent.cep)"
                       ng-model="agent.cep"
                       ui-mask="99999-999">
                <span class="error" ng-repeat="error in errors.cep">{{ error }}</span>
            </label>

            <label class="colunm1">
                <span class="destaque">O pontão tem sede própria*</span>
                <select ng-blur="save_field('tem_sede')" ng-model="agent.tem_sede">
                    <option></option>
                    <option value="1" ng-value="1">Sim</option>
                    <option value="0" ng-value="0">Não</option>
                </select>
                <label class="check">
                    <input type="checkbox" ng-change="save_field('sede_realizaAtividades', true)" ng-model="agent.sede_realizaAtividades" ng-checked="agent.sede_realizaAtividades"/>
                    realiza atividades culturais na sede
                </label>
                <?php /*
                <input type="checkbox" ng-change="save_field('mesmoEndereco', true)" ng-model="agent.mesmoEndereco" ng-checked="agent.mesmoEndereco == 'true'"/>
                <span class="check">mesmo endereço cadastrado no CNPJ da entidade</span>
                */ ?>

                <span class="error" ng-repeat="error in errors.tem_sede">{{ error }}</span>
            </label>
        </div>

        <div class="clear"></div>

        <div class="row">
            <span class="colunm1">
                <span class="destaque">Endereço* <i class='hltip' title='Caso não tenham uma sede, coloque o endereço de referêrncia do Ponto de Cultura'>?</i></span>
            </span>
        </div>

        <div class="clear"></div>

        <div class="row">
            <label class="colunm1">
                <span>Estado*</span>
                <select ng-blur="save_field('geoEstado')" ng-model="agent.geoEstado">
                    <option value="AC">Acre</option>              <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>             <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>             <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>  <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>             <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>       <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>      <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>           <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>        <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option> <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>           <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>         <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
                <span class="error" ng-repeat="error in errors.estado">{{ error }}</span>
            </label>

            <label class="colunm2">
                <span>Cidade*</span>
                <input type="text" ng-blur="save_field('geoMunicipio')" ng-model="agent.geoMunicipio"/>
                <span class="error" ng-repeat="error in errors.cidade">{{ error }}</span>
            </label>

            <label class="colunm3">
                <span>Bairro</span>
                <input type="text" ng-blur="save_field('En_Bairro')" ng-model="agent.En_Bairro"/>
                <span class="error" ng-repeat="error in errors.bairro">{{ error }}</span>
            </label>
        </div>

        <div class="clear"></div>

        <div class="row">

            <label class="colunm1">
                <span>Rua*</span>
                <input type="text" ng-blur="save_field('En_Nome_Logradouro')" ng-model="agent.En_Nome_Logradouro"/>
                <span class="error" ng-repeat="error in errors.rua">{{ error }}</span>
            </label>

            <label class="colunm2">
                <span>Número*</span>
                <input type="text" ng-blur="save_field('En_Num')" ng-model="agent.En_Num"/>
                <span class="error" ng-repeat="error in errors.numero">{{ error }}</span>
            </label>

            <label class="colunm3">
                <span>Complemento</span>
                <input type="text" ng-blur="save_field('En_Complemento')" ng-model="agent.En_Complemento"/>
                <span class="error" ng-repeat="error in errors.complemento">{{ error }}</span>
            </label>
        </div>
    </div>
    <div class="clear"></div>
    <div class="form form-mapa">
        <?php /*
        <div class="mapa js-map-container">
            <div class="clearfix js-leaflet-control" data-leaflet-target=".leaflet-top.leaflet-left">
                <a id ="button-locate-me" class="control-infobox-open hltip botoes-do-mapa" title="Encontrar minha localização"></a>
            </div>
            <div id="single-map-container" class="js-map" data-lat="-46.633328" data-lng="-23.548991"></div>
            <input type="hidden" id="map-target" data-name="location" class="js-editable" data-edit="location" data-value="">
        </div>
        */ ?>
        <style type="text/css">.leaflet-canvas { min-height: 400px; }</style>
        <leaflet markers="markers"></leaflet>
    </div>

<?php /*
    <div class="form form-opcional">
        <h4>Informações Opcionais</h4>

        <label>
            <span class="destaque-opcional">Selecione o local em que são realizadas as ações culturais do Ponto/Pontão de Cultura (marque quantas opções quiser)</span>
        </label>

        <div class="row">
            <label class="colunm1">
                <span>Estado*</span>
                <select ng-blur="save_field('localRealizacao_estado')" ng-model="agent.localRealizacao_estado">
                    <option value="AC">Acre</option>              <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>             <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>             <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>  <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>             <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>       <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>      <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>           <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>        <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option> <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>           <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>         <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
                <span class="error" ng-repeat="error in errors.localRealizacao_estado">{{ error }}</span>
            </label>

            <label class="colunm2">
                <span>Cidade*</span>
                <input type="text" ng-blur="save_field('localRealizacao_cidade')" ng-model="agent.localRealizacao_cidade"/>
                <span class="error" ng-repeat="error in errors.localRealizacao_cidade">{{ error }}</span>
            </label>
        </div>


        <div class="row">
            <div class="row">
                <taxonomy-checkboxes taxonomy="local_realizacao" entity="agent" terms="termos.local_realizacao"></taxonomy-checkboxes>
            </div>

            <div class="clear"></div>
        </div>
*/?>
  <!--</div>
  <div class="clear"></div>-->
</form>
