<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = '6. Atuação e Articulação';
    $this->cadastroText = 'Queremos entender melhor quais são as atividades realizadas pelo seu Ponto e quem é o público que as frequenta';
    $this->cadastroIcon = 'icon-chat';
    $this->cadastroPageClass = 'ponto-mais page-base-form';
    $this->cadastroLinkContinuar = 'economiaViva';

?>

<form ng-controller="PontoArticulacaoCtrl">
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
             <taxonomy-checkboxes taxonomy="area_atuacao" entity="agent" terms="termos.area_atuacao"></taxonomy-checkboxes>
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
