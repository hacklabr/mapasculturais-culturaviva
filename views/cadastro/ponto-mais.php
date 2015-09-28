<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
    $this->layout = 'cadastro';
    $this->cadastroTitle = 'Fale mais sobre seu ponto';
    $this->cadastroText = 'Queremos entender melhor quais são as atividades realizadas pelo seu Ponto e quem é o público que as frequenta';
    $this->cadastroIcon = 'icon-vcard';
    $this->cadastroPageClass = 'ponto-mais page-base-form';
    
?>

<form ng-controller="ResponsibleCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Em qual edital do Ministério da Cultura a entidade/coletivo já foi contemplado? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </label>
            <taxonomy-checkboxes taxonomy="contemplado_edital" entity="agent" terms="termos.contemplado_edital"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Quais são as ações estruturantes do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </label>
            <taxonomy-checkboxes taxonomy="acao_estruturante" entity="agent" terms="termos.acao_estruturante"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Quais são as áreas do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </label>
            <taxonomy-checkboxes taxonomy="area" entity="agent" terms="termos.area" restricted-terms="true"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <label class="colunm-full">
                <span class="destaque">Quais os públicos que participam das ações do Ponto/Pontão de Cultura? <i>?</i><br>(Pode escolher mais de uma opção)</span>
            </label>
            <taxonomy-checkboxes taxonomy="publico_participante" entity="agent" terms="termos.publico_participante"></taxonomy-checkboxes>
        </div>
    </div>
</form>
