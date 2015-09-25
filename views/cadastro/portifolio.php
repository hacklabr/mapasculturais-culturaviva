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
        <div class="row">
            <label class="colunm-20">
                <span class="destaque">Atividades já* <i>?</i></span>
                <img src="<?php $this->asset('img/incluir_img.png') ?>">
            </label>

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
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Atividades culturais em realização* <i>?</i></span>
                <textarea></textarea>
            </label>          
        </div>
        <div class="clear"></div>
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
                <textarea></textarea>
            </label>          
        </div>
        <div class="clear"></div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Fotos de Divulgação do Ponto de Cultura <i>?</i></span>
                <img src="<?php $this->asset('img/incluir_img.png') ?>" />
                <p>Inclua no máximo x arquivos, no formato JPG ou PNG com até xxKB</p>
            </label>

        </div>  
    </div>
</form>
