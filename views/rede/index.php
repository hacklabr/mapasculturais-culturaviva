<section id="page-rede" >
    <article class="slide-home">
           <h3>Declare seu Ponto de Cultura!</h3>
            <p>Um ambiente de trocas, experiências, serviços, conhecimentos e informações. E se você já é Ponto de Cultura entre na rede e conheça um mundo de novas possibilidades </p>
            <form method="POST" action="<?php echo $app->createUrl('cadastro', 'registra') ?>">
                <button type="submit" class="btn btn__active">Entrar para a Rede >>></button>
            </form>
            <a class="what" href="#">Vamos conhecer a plataforma Cultura Viva?</a>
    </article>

    <article class="points_culture">
        <div class="row">
            <h1>Somos todos<br />Pontos de Cultura</h1>
            <p>A potência da cultura Brasileira extrapola os limites da capacidade de fomento do Ministério da Cultura. É preciso lutar por mais investimentos na cultura, reconhecer e valorizar os processos culturais desenvolvidos de forma autônoma pela sociedade civil.</p>
            <p>O reconhecimento e a autodeclaração de entidades e coletivos culturais como Pontos e Pontões de Cultura são uma revindicação histórica dos fazedores de cultura do Brasil e agora é possível a partir da Rede Cultura Viva.</p>
        </div>
        <div class="row box-faq">
            <div class="colunm box oquee">
                <a href="<?php echo $app->createUrl('rede', 'faq'); ?>#ponto_e_pontao" >
                    <img src="<?php $this->asset('img/o-que-e-ponto-cultura.png') ?>" />
                    <h4>O que é ponto de cultura?</h4>
                </a>
            </div>
            <div class="colunm box porqueser">
                <a href="<?php echo $app->createUrl('rede', 'faq'); ?>#por_que_ser_ponto_ou_pontao" >
                    <img src="<?php $this->asset('img/porque-ser-um.png') ?>" />
                    <h4>Por que ser um<br />ponto de cultura?</h4>
                </a>
            </div>
        </div>
        <div class="row box-faq">
            <div class="colunm box oqueganho">
                <a href="<?php echo $app->createUrl('rede', 'faq'); ?>#o_que_ganho" >
                    <img src="<?php $this->asset('img/o-que-ganho.png') ?>" />
                    <h4>O que ganho<br/>com isso?</h4>
                </a>
            </div>
            <div class="colunm box criterios">
                <a href="<?php echo $app->createUrl('rede', 'faq'); ?>#criterios" >
                    <img src="<?php $this->asset('img/o-que-e-cultura-viva.png') ?>" />
                    <h4>Critérios de<br/>certificação</h4>
                </a>
            </div>
        </div>
    </article>
    <article class="row redes">
        <a href="#" class="facebook">
            <i class="icon icon-facebook-squared"></i>
        </a>
        <a href="#" class="twitter">
            <i class="icon icon-twitter"></i>
        </a>
        <a href="#" class="youtube">
            <i class="icon icon-twitter"></i>
        </a>
        <a href="#" class="instagram">
            <i class="icon icon-twitter"></i>
        </a>

    </article>
</section>
