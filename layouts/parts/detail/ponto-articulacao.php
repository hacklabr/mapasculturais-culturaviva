<div ng-controller="DetailCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Em qual edital do Ministério da Cultura a entidade/coletivo já foi contemplado?</span>
            </div>
            <taxonomy-checkboxes taxonomy="contemplado_edital" terms="termos.contemplado_edital" view="true"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais são as ações estruturantes do Ponto/Pontão de Cultura?</span>
            </div>
            <taxonomy-checkboxes taxonomy="acao_estruturante" terms="termos.acao_estruturante" view="true"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais são as áreas do Ponto/Pontão de Cultura?</span>
            </div>
            <taxonomy-checkboxes taxonomy="area" terms="termos.area" restricted-terms="true" view="true"></taxonomy-checkboxes>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais os públicos que participam das ações do Ponto/Pontão de Cultura?</span>
            </div>
            <taxonomy-checkboxes taxonomy="publico_participante" terms="termos.publico_participante" view="true"></taxonomy-checkboxes>
        </div>
        <div class="row">

            <div class="row">
                <span class="destaque">Especifique a área de experiência e temas que você pode compartilhar conhecimento:</span>
            </div>
             <taxonomy-checkboxes taxonomy="area_atuacao" terms="termos.area_atuacao" view="true"></taxonomy-checkboxes>
        </div>
        <div class="row">
          <h4> Articulação </h4>
            <div class="colunm-full">
                <span class="destaque">Participa de algum movimento político-cultural? </span>
            </div>
            <label class="colunm1">
                <input type="radio"
                       name="politicocultural"
                       disabled="true"
                       ng-value="0"
                       ng-model="ponto.participacaoMovPolitico">   Não
            </label>
            <label class="colunm2">
                <input type="radio"
                       name="politicocultural"
                       disabled="true"
                       ng-value="1"
                       ng-model="ponto.participacaoMovPolitico">  Sim
                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full" ng-show="agent.participacaoMovPolitico">
                <span>Quais?*
                <input name="simMovimentoPoliticoCultural" class="colunm1" type="text" ng-model="ponto.simMovimentoPoliticoCultural" editable="false" /></span>
            </div>

            <div class="colunm-full">
                <span class="destaque">Participa de algum Fórum de Cultura? </span>
            </div>
            <label class="colunm1">
                <input type="radio"
                       name="forumcultural"
                       disabled="true"
                       ng-value="0"
                       ng-model="ponto.participacaoForumCultura">  Não
            </label>
            <label class="colunm2">
                <input type="radio"
                       name="forumcultural"
                       disabled="true"
                       ng-value="1"
                       ng-model="ponto.participacaoForumCultura"> Sim

                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full" ng-show="agent.participacaoForumCultura">
                <span>Quais?*
                <input name="simForumCultural" class="colunm1" type="text" ng-model="ponto.simForumCultural" disabled="true"/></span>
            </div>
            <div class="colunm-full">
                <span class="destaque">Participa de instância de representação junto ao Ministério da Cultura? </span>
            </div>
            <taxonomy-checkboxes taxonomy="instancia_representacao_minc" entity="ponto" terms="termos.instancia_representacao_minc"></taxonomy-checkboxes>
            <div class="colunm-full">
                <span class="destaque">Possui parceria com o Poder Público? </span>
            </div>
            <label class="colunm1">
                <input type="radio"
                       name="poderpublico"
                       disabled="true"
                       ng-value="0"
                       ng-model="ponto.parceriaPoderPublico"> Não
            </label>
            <label class="colunm2">
                <input type="radio"
                       name="poderpublico"
                       disabled="true"
                       ng-value="1"
                       ng-model="ponto.parceriaPoderPublico">  Sim
                <!-- textarea></textarea -->
            </label>
            <div class="colunm-full" ng-show="agent.parceriaPoderPublico">
                <span>Quais?*
                <input name="simPoderPublico" class="colunm1" type="text" ng-model="ponto.simPoderPublico" disabled="true" /></span>
            </div>
        </div>
    </div>
</div>
