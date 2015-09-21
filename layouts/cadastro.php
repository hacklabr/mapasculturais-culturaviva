<?php
$this->part('header');
?>
<header>
    <h3><?php echo $this->cadastroTitle ?></h3>
</header>
<?php echo $TEMPLATE_CONTENT; ?>

<div> 
        <a href="<?php echo $app->createUrl('cadastro', 'index'); ?>">voltar ao início</a>
</div>

<?php echo $this->part('footer-teste'); ?>