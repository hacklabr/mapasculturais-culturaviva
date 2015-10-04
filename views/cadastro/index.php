<?php
$this->bodyProperties['ng-app'] = "culturaviva";
?>
<div id="page-cadastro" ng-controller="DashboardCtrl">
    <section class="texto">
<!--        <div class="messenger">
            <a href="#" class="close">X</a>
            <p>Algumas informações já foram preenchidas de acordo com o cadastro que o MinC possui de seu Ponto. Confira com essas informações antes de validá-las!</p>
        </div>
        1. Informações do Responsável
        2. Entidade ou Coletivo Cultural
        3. Projetos Financiados
        4. Seu Ponto no Mapa
        5. Portifólio e Anexos
        6. Atuação e Articulação
        7. Economia Viva
        8. Formação
-->
        <article>
            <h2>Seja bem vindo(a) <br>à Rede Cultura Viva</h2>
            <p>Esta é a página do seu Ponto de Cultura. Apenas você tem acesso a ela.</p>
            <p>Fique a vontade para ir preenchendo as sessões. Você não precisa fazer tudo agora! Quanto sua página estiver completa clique em "validar dados".</p>
            <p>Depois, seu ponto poderá criar eventos, projetos e usar a plataforma para se manter em contato com o Ministério da Cultura.</p>
        </article>
    </section>
    <section class="boxs-cadastro">
        <article class="box-info-responsavel">
            <header>
                <a href="<?php echo $app->createUrl('cadastro', 'responsavel'); ?>">
                    <span class="icon icon-user"></span>
                    <h4> 1. Informações do Responsável</h4>
                    <span class="btn_mais"> + </span>
                </a>
            </header>
            <div class="infos">
                <div class="texto">
                     <p>Precisamos saber quem é você e pegar seus contatos!</p>
                </div>
<!--                <div class="circle-status c100 p56 small">
                    <span>56%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>-->
            </div>
        </article>
        <article class="box-entidade-dados border-left">
            <header>
                <a href="<?php echo $app->createUrl('cadastro', 'entidadeDados'); ?>">
                    <span class="icon icon-home"></span>
                    <h4> 2. Entidade ou Coletivo Cultural</h4>
                    <span class="btn_mais"> + </span>
                </a>
            </header>
            <div class="infos">
                <div class="texto">
                     <p>Vamos falar um pouco sobre a sua organização, não importa se ela tem um CNPJ ou não!</p>
                </div>
<!--                <div class="circle-status c100 p56">
                    <span>56%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>-->
            </div>
        </article>
        <article class="box-entidade-financiados">
            <header>
                <a href="<?php echo $app->createUrl('cadastro', 'entidadeFinanciamento'); ?>">
                    <span class="icon icon-dollar"></span>
                    <h4> 3. Projetos Financiados</h4>
                    <span class="btn_mais"> + </span>
                </a>
            </header>
            <div class="infos">
               <div class="texto">
                     <p>Vamos ver o que você já fez de bom nessa caminhada. </p>
                </div>
<!--                <div class="circle-status c100 p56">
                    <span>56%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>-->
            </div>
        </article>
        <article class="box-ponto-mapa border-left">
            <header>
                <a href="<?php echo $app->createUrl('cadastro', 'pontoMapa'); ?>">
                    <span class="icon icon-location"></span>
                    <h4> 4. Seu Ponto no Mapa</h4>
                    <span class="btn_mais"> + </span>
                </a>
            </header>
            <div class="infos">
                <div class="texto">
                     <p>Vamos ver a sua localização no mapa, assim fica mais fácil de te encontrar!</p>
                </div>
<!--                <div class="circle-status c100 p56">
                    <span>56%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>-->
            </div>
        </article>
        <article class="box-portfolio">
            <header>
                <a href="<?php echo $app->createUrl('cadastro', 'portifolio'); ?>">
                    <span class="icon icon-picture"></span>
                    <h4> 5. Portifólio e Anexos</h4>
                    <span class="btn_mais"> + </span>
                </a>
            </header>
            <div class="infos">
                <div class="texto">
                     <p>Manda aí tudo o que você tem pra mostrar! Deixe suas referências de trabalhos.</p>
                </div>
<!--                <div class="circle-status c100 p56">
                    <span>56%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>-->
            </div>
        </article>
        <article class="box-atuacao-articulaco border-left">
            <header>
                <a href="<?php echo $app->createUrl('cadastro', 'articulacao'); ?>">
                    <span class="icon icon-chat"></span>
                    <h4> 6. Atuação e Articulação</h4>
                    <span class="btn_mais"> + </span>
                </a>
            </header>
            <div class="infos">
               <div class="texto">
                     <p>Fale um pouco mais sobre as atividades realizadas pelo seu Ponto.</p>
                </div>
<!--                <div class="circle-status c100 p56">
                    <span>56%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>-->
            </div>
        </article>
        <article class="box-economia-viva">
            <header>
                <a href="<?php echo $app->createUrl('cadastro', 'economiaViva'); ?>">
                    <span class="icon icon-vcard"></span>
                    <h4> 7. Economia Viva</h4>
                    <span class="btn_mais"> + </span>
                </a>
            </header>
            <div class="infos">
               <div class="texto">
                     <p>Vamos trocar serviços e recursos, vamos crescer juntos. </p>
                </div>
<!--                <div class="circle-status c100 p56">
                    <span>56%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>-->
            </div>
        </article>
        <article class="box-formacao border-left">
            <header>
                <a href="<?php echo $app->createUrl('cadastro', 'formacao'); ?>">
                    <span class="icon icon-book-open"></span>
                    <h4> 8. Formação</h4>
                    <span class="btn_mais"> + </span>
                </a>
            </header>
            <div class="infos">
               <div class="texto">
                     <p>O que temos de mais rico é o nosso conhecimento, vamos trocar?</p>
                </div>
<!--                <div class="circle-status c100 p56">
                    <span>56%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>-->
            </div>
        </article>
        <div class="clear"></div>
    </section>
    <section class="box-status">
        <article class="validar-ponto">
            <h4><i class="icon-publish"> </i> Validar </h4>
            <p>Para validar seu ponto, você precisa preencher todas as informações obrigatórias:</p>
            <div class="clear"></div>
        </article>
        <article class="content-status">
            <div class="status">
                <?php // /* ?>
                <div class="circle-status c100 p13">
                    <span>13%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
               <?php  // */ ?>
                <span class="icon icon-user"></span>
                <p>Informações do Responsável<br />(45% informações opcionais)</p>
            </div>
            <div class="status">
                <?php // /* ?>
                <div class="circle-status c100 p65">
                    <span>65%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
               <?php  // */ ?>
                <span class="icon icon-home"></span>
                <p>Entidade ou Coletivo Cultural<br />(50% informações opcionais)</p>
            </div>
            <div class="status">
               <?php // /* ?>
                <div class="circle-status c100 p13">
                    <span>13%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
               <?php  // */ ?>
                <span class="icon icon-dollar"></span>
                <p>Projetos Financiados<br />(50% informações opcionais)</p>
            </div>
            <div class="status">
               <?php // /* ?>
                <div class="circle-status c100 p100">
                    <span>100%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
               <?php  // */ ?>
                <span class="icon icon-location"></span>
                <p>Seu Ponto no Mapa<br />(100% informações opcionais)</p>
            </div>
            <div class="status">
                <?php // /* ?>
                <div class="circle-status c100 p50">
                    <span>50%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
               <?php  // */ ?>
                <span class="icon icon-picture"></span>
                <p>Portifólio e Anexos<br />(50% informações opcionais)</p>
            </div>
            <div class="status">
                <?php // /* ?>
                <div class="circle-status c100 p100">
                    <span>100%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
               <?php  // */ ?>
                <span class="icon icon-chat"></span>
                <p>Atuação e Articulação<br />(100% informações opcionais)</p>
            </div>
            <div class="status">
                <?php // /* ?>
                <div class="circle-status c100 p55">
                    <span>55%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
               <?php  // */ ?>
                <span class="icon icon-vcard"></span>
                <p>Economia Viva<br />(50% informações opcionais)</p>
            </div>
            <div class="status">
                <?php // /* ?>
                <div class="circle-status c100 p90">
                    <span>90%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
               <?php  // */ ?>
                <span class="icon icon-book-open"></span>
                <p>Formação<br />(50% informações opcionais)</p>
            </div>
            <div class="clear"></div>
            <?php /*
            <div class="infos-messenge">
                <a href="#" class="close">X</a>
                Algumas informações já foram preenchidas de acordo com o cadastro que o MinC possui de seu Ponto. Configra com atenção essas informações antes de validá-las!
            </div>
            */ ?>

            <button class="btn-validar" ng-click="enviar()">Validar</button>


        </article>
    </section>
</div>
