<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Portifólio';
    $this->cadastroText = 'Incula fotos, links e redes sociais! Isto nos ajuda a enttender que tipo de atividades culturais você realiza como Ponto de Cultura!';
    $this->cadastroIcon = 'icon-picture';
    $this->cadastroPageClass = 'portfolio page-base-form';
?>


<form ng-controller="ResponsibleCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row" ng-controller="ImageUploadCtrl">
            <span class="destaque espacoleft">Atividades já realizadas* <i>?</i></span>
            <div class="colunm-20">
                <div type="file" ngf-select="uploadFile($file, 'portifolio')" accept="config.pdf.validation" ngf-max-size="config.pdf.maxUploadSize" title="{{agent['@files:portifolio'] ? 'Clique para alterar o documento' : 'Clique para incluir um documento'}}">
                    <img ng-if="!agent['@files:portifolio']" src="<?php $this->asset('img/incluir_img.png') ?>" width="160" height="138">
                    <img ng-if="agent['@files:portifolio']" src="<?php $this->asset('img/pdflogo.png') ?>" width="160" height="138">
                </div>
                <div class="progress row" ng-show="f.progress >= 0">
                    <span style="width:{{f.progress}}%;" ng-bind="f.progress + '%'"></span>
                </div>
            </div>

            <label class="colunm-50">

                <p>Caso não possua portifólio online, você também pode anexar arquivos no formato pdf, com no máximo 20kb.</p>

                <p><span class="destaque"><i>?</i></span>
                    Precisa de ajuda para montar seu portifólio?
                    <br>
                    <a href="#">Clique aqui</a> para baixar um modelo com orientações.
                </p>
            </label>
        </div>
        <div class="clear"></div>
        <?php /*
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Atividades culturais em realização* <i>?</i></span>
                <textarea ng-blur="save_field('atividadesEmRealizacao')" ng-model="agent.atividadesEmRealizacao"></textarea>
            </label>
        </div>
        <div class="clear"></div>
        */ ?>
    </div>
    <div class="form form-opcional">
        <h4>Informações Opcionais</h4>
        <div class="row">
            <span class="destaque destaque-conecte">Conecte seu ponto com as redes sociais: <i>?</i></span>
        </div>
        <div class="row">
            <label class="colunm-redes site-oficial">
                <span><i class="icon icon-location"></i> Site oficial</span>
                <input type="text" ng-blur="save_field('facebook')" ng-model="agent.facebook" placeholder="http://"/>
            </label>
        </div>
        <div class="row">
            <label class="colunm-redes facebook">
                <span><i class="icon icon-facebook-squared"></i> Página Facebook</span>
                <input type="text" ng-blur="save_field('facebook')" ng-model="agent.facebook" placeholder="http://"/>
            </label>

            <label class="colunm-redes twitter">
                <span><i class="icon icon-twitter"></i> Perfil no Twitter</span>
                <input type="text" ng-blur="save_field('twitter')" ng-model="agent.twitter" placeholder="http://"/>
            </label>

            <label class="colunm-redes googleplus">
                <span><i class="icon icon-gplus"></i> Perfil no Google+</span>
                <input type="text" ng-blur="save_field('googleplus')" ng-model="agent.googleplus" placeholder="http://"/>
            </label>
        </div>
        <div class="row">
            <label class="colunm-redes flick">
                <span><img src="<?php $this->asset('img/icon_flicker.png') ?>"> Página no Flickr</span>
                <input type="text" ng-blur="save_field('facebook')" ng-model="agent.facebook" placeholder="http://"/>
            </label>

            <label class="colunm-redes diaspora">
                <span><img src="<?php $this->asset('img/icon_diaspora.png') ?>"> Perfil na Diáspora:</span>
                <input type="text" ng-blur="save_field('twitter')" ng-model="agent.twitter" placeholder="http://"/>
            </label>

            <label class="colunm-redes youtube">
                <span><img src="<?php $this->asset('img/icon_youtube.png') ?>"> Perfil no Youtube:</span>
                <input type="text" ng-blur="save_field('googleplus')" ng-model="agent.googleplus" placeholder="http://"/>
            </label>
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Conte um pouco(800 caractres) sobre a história do ponto de Cultura <i>?</i></span>
                <textarea ng-blur="save_field('longDescription')" ng-model="agent.longDescription"></textarea>
            </label>

        </div>
        <div class="clear"></div>
        <div class="row" ng-controller="ImageUploadCtrl">
            <span class="destaque espacoleft">Fotos de Divulgação do Ponto de Cultura <i>?</i></span>
            <p class="espacoleft">Inclua no máximo x arquivos, no formato JPG ou PNG com até xxKB</p>
            <div class="img_updade" ng-repeat="f in agent['@files:gallery.avatarBig']">
                 <a href="#" class="exclui">x</a>
                <img src="{{f.url}}" width="160" height="138">
            </div>
            <div class="img_updade">
                <div type="file" ngf-select="uploadFile($file, 'gallery')" accept="config.image.validation" ngf-max-size="config.image.maxUploadSize" title="{{agent['@files:avatar.avatarBig'] ? 'Clique para alterar a foto' : 'Clique para incluir uma foto'}}">
                    <img src="<?php $this->asset('img/incluir_img.png') ?>" width="160" height="138">
                </div>
                <div class="progress row" ng-show="f.progress >= 0">
                    <span style="width:{{f.progress}}%;" ng-bind="f.progress + '%'"></span>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</form>
