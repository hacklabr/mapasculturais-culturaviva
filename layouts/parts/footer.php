</section>
<footer id="main-footer">
    <section class="footer-primary">
        <div class="colunm">
            <h4>Informações úteis</h4>
            <ul>
                <li><a href="#" class="" >Sobre a Lei Cultura Viva</a></li>
                <li><a href="#" class="" >Critérios da Autodeclaração</a></li>
                <li><a href="#" class="" >Sobre a Rede Cultura Viva</a></li>
                <li><a href="#" class="" >Privacidade e termos de Uso</a></li>
                <li><a href="#" class="" >Repositório no Github</a></li>
                <li><a href="#" class="" >Contato</a></li>
            </ul>
        </div>
        <div class="colunm">
            <ul>
                <li><a href="#"><img src="<?php $this->asset('img/secretaria_da_cidadania.png'); ?>" title="Secretaria da Cidadania e da Diversidade Cultural"/></a></li>
                <li><a href="#"><img src="<?php $this->asset('img/ministerio-da-cultura.png'); ?>" title="Ministerio da Cultura"/></a></li>
                <li><a href="#"><img src="<?php $this->asset('img/logo__governo-federal__primary.png'); ?>" title="Governo Federal"/></a></li>
            </ul>
        </div>
    </section>
    <section class="footer-secondary">
        <div class="imgs-federal">
            <a href="#"><img src="<?php $this->asset('img/logo__governo-federal__secondary.png'); ?>" title="Governo Federal"/></a>
            <a href="#"><img src="<?php $this->asset('img/secretaria-geral-presidencia.png'); ?>" title="Secretaria-Geral da Presidênia da República"/></a>
            <a href="#"><img src="<?php $this->asset('img/acesso-a-informacao.png'); ?>" title="Acesso à informação"/></a>
        </div>
    </section>
</footer>
<?php $this->part('templates'); ?>
<?php //$this->bodyEnd(); ?>
<iframe id="require-authentication" src="" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; z-index:100000"></iframe>
</body>
</html>
