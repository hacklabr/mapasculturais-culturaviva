<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Atuação e Articulação';
    $this->cadastroText = 'Queremos entender melhor quais são as atividades realizadas pelo seu Ponto e quem é o público que as frequenta';
    $this->cadastroIcon = 'icon-vcard';
    $this->cadastroPageClass = 'ponto-mais page-base-form';
    $this->cadastroLinkContinuar = 'responsavel';

?>

<form ng-controller="PointCtrl">
    <?php $this->part('messages'); ?>
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Em qual edital do Ministério da Cultura a entidade/coletivo já foi contemplado? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </div>
            <taxonomy-checkboxes taxonomy="contemplado_edital" entity="agent" terms="termos.contemplado_edital"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais são as ações estruturantes do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </div>
            <taxonomy-checkboxes taxonomy="acao_estruturante" entity="agent" terms="termos.acao_estruturante"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais são as áreas do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </div>
            <taxonomy-checkboxes taxonomy="area" entity="agent" terms="termos.area" restricted-terms="true"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais os públicos que participam das ações do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </div>
            <taxonomy-checkboxes taxonomy="publico_participante" entity="agent" terms="termos.publico_participante"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full" >
                <span class="destaque title">Áreas de atuação</span>
            </div>
            <div class="row">
                <span class="destaque">Especifique a área de experiência e temas que você pode compartilhar conhecimento:*</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" > Produção Cultural
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Artes Cênicas
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Artes Visuais
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Artesanato
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Audiovisual
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Capacitação
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Capoeira
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Contador de Histórias
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Cultura Afro
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Cultura Alimentar
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Cultura Digital
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Culturas Indígenas
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Culturas Populares
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Comunicação
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Direitos Humanos
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Esporte
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Fotografia
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Gastronomia
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Gênero
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Hip Hop
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Juventude
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Literatura
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Meio Ambiente
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Moda
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Música
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Software Livre
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Tradição Oral
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" > Turismo
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" > Internacional
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" > Outros. Quais?
            </label>
        </div>
        <div class="row">
            <h4>Articulação</h4>
            <div class="colunm-full">
                <span class="destaque">Participa de algum movimento político-cultural? *</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="politicocultural" >   Não
            </label>
            <label class="colunm2">
                <input type="radio" name="politicocultural" >  Sim*
                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full">
                <span class="destaque">Participa de algum Fórum de Cultura? *</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="forumcultural" >  Não
            </label>
            <label class="colunm2">
                <input type="radio" name="forumcultural" > Sim*
                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full">
                <span class="destaque">Participa de instância de representação junto ao Ministério da Cultura? *</span>
            </div>
            <label class="colunm1">
                <input type="checkbox" name="" >  Colegiados*
                <!-- textarea></textarea -->
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" >  Fóruns*
                <!-- textarea></textarea -->
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" >  Comissões
                <!-- textarea></textarea -->
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" >  Conferência Nacional de Cultura
                <!-- textarea></textarea -->
            </label>
            <label class="colunm2">
                <input type="checkbox" name="" >  Grupo de Trabalho*
                <!-- textarea></textarea -->
            </label>
            <label class="colunm3">
                <input type="checkbox" name="" >  Conselhos*
                <!-- textarea></textarea -->
            </label>
            <label class="colunm1">
                <input type="checkbox" name="" >  Outros*
                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full">
                <span class="destaque">Possui parceria com o Poder Público? *</span>
            </div>
            <label class="colunm1">
                <input type="radio" name="poderpublico" > Não
            </label>
            <label class="colunm2">
                <input type="radio" name="poderpublico" >  Sim*
                <!-- textarea></textarea -->
            </label>

        </div>
    </div>
</form>
