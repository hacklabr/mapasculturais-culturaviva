<section id="page-rede" >
    <article class="slide-home">
            <img src="<?php $this->asset('img/logo-rede-cultural-viva.png'); ?>" />
            <p>Como faço para me autodeclarar um Ponto de Cultura? Insira sus dados no cadastro e apartir de uma análise simplificada a ser feita pelo Ministério da Cultura, a entidade ou coletivo passará fazer parte da Rede Cultura Viva, um ambiente de trocas de experiências, serviços, conhecimentos e informações. E se você já é ponto de Cultura entre na refe e faça parte do Circuito Cultura vida</p>
            <form method="POST" action="<?php echo $app->createUrl('cadastro', 'registra') ?>">
                <button type="submit" class="btn btn__active">Entrar na Rede</button>
            </form>
            <a class="what" href="#">Quais são os critérios para me autodeclarar um Ponto de Cultura?</a>
    </article>

    <article class="points_culture">
        <div class="row">
            <h1>Somos todos<br />Pontos de Cultura</h1>
            <p>Desde 23 de julho de 2014, com a sanção da Lei Cultura Vida (Lei 13.018/2014), o Programa Cultura Viva e os Pontos de Cultura tornaram-se Política de Estado. Além de garantir a continuidade do Programa, a Lei simplifica e desburocratiza os processos de prestação de contas e o repasse de recursos para as organizações da sociedade civil. Uma grande vitória para o moviemnto cultural brasileiro!</p>
            <a href="<?php echo $app->createUrl('rede', 'faq'); ?>" class="btn btn__active">Leia Mais</a>
        </div>
        <div class="row">
            <div class="colunm">
                <img src="<?php $this->asset('img/o-que-e-ponto-cultura.png') ?>" />
                <h4>O que é ponto de cultura?</h4>
                <p>Pontos de cultura são grupos, coletivos e entidades de natureza ou finalidade cultural, que desenvolvem e articulam atividades culturais em suas comunidades e redes.</p>
            </div>
            <div class="colunm">
             <img src="<?php $this->asset('img/porque-ser-um.png') ?>" />
                <h4>Por que ser um<br />ponto de cultura?</h4>
                <p>O reconhecimento como Ponto de Cultura garante uma chancela institucional, que pode ser importante para obtenção de apoios e parcerias.</p>
            </div>
        </div>
        <div class="row">
            <div class="colunm">
                <img src="<?php $this->asset('img/o-que-ganho.png') ?>" />
                <h4>O que ganho<br/>com isso?</h4>
                <p>A partir deste mapeamento dos conhecimentos e capacidades da rede será possível organizar circuitos de formação e intercâmbio virtuais e presenciais.</p>
            </div>
            <div class="colunm">
               <img src="<?php $this->asset('img/o-que-e-cultura-viva.png') ?>" />
                <h4>O que é o<br/>cultura viva?</h4>
                <p>Iniciativas ligadas à cultura de base comunitária, Indígenas, Quilombolas, de Matriz Africana, economia, solidária, produção cultural, urbana, e periférica, cultural digital, entre outras.</p>
            </div>
        </div>
    </article>
</section>
