<?php
$this->part('header');

$link = $this->cadastroLinkContinuar;
$link_continuar = $app->createUrl('cadastro', $link );

?>

<div class="page-<?php echo $this->cadastroPageClass ?>">

    <header>

        <div class="icon <?php echo $this->cadastroIcon ?>"></div>
        <h3><?php echo $this->cadastroTitle ?></h3>

<!--        <div class="circle-status c100 p56 small">
            <span>56%</span>
            <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
            </div>
       </div>-->
    </header>

    <p><?php echo $this->cadastroText ?></p>

    <?php echo $TEMPLATE_CONTENT; ?>
    <a href="<?php echo $link_continuar;  ?>" class="btn btn_continuar">Continuar</a>
    <div class="btn_voltar">
       <a href="<?php echo $app->createUrl('cadastro', 'index'); ?>">voltar ao início <i class="icon icon-home"></i></a>
    </div>
    <div class="clear"></div>
</div>

<?php echo $this->part('footer'); ?>