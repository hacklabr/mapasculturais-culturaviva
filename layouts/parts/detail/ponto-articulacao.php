<div ng-controller="DetailCtrl">
    <div class="form">
        <h4>Informações Obrigatórias</h4>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Em qual edital do Ministério da Cultura a entidade/coletivo já foi contemplado?</span>
                <span ng-repeat="termo in ponto.terms.contemplado_edital"><b>{{termo}}</b></span>
                <span ng-if="!ponto.terms.contemplado_edital.length"><b>Não informado</b></span>
            </div>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais são as ações estruturantes do Ponto/Pontão de Cultura?</span>
                <span ng-repeat="termo in ponto.terms.acao_estruturante"><b>{{termo}}</b></span>
                <span ng-if="!ponto.terms.acao_estruturante.length"><b>Não informado</b></span>
            </div>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais são as áreas do Ponto/Pontão de Cultura?</span>
                <span ng-repeat="termo in ponto.terms.area"><b>{{termo}}</b></span>
                <span ng-if="!ponto.terms.area.length"><b>Não informado</b></span>
            </div>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Quais os públicos que participam das ações do Ponto/Pontão de Cultura?</span>
                <span ng-repeat="termo in ponto.terms.publico_participante"><b>{{termo}}</b></span>
                <span ng-if="!ponto.terms.publico_participante.length"><b>Não informado</b></span>
            </div>
        </div>
        <div class="row">
            <div class="colunm-full">
                <span class="destaque">Especifique a área de experiência e temas que você pode compartilhar conhecimento:</span>
                <span ng-repeat="termo in ponto.terms.area_atuacao"><b>{{termo}}</b></span>
                <span ng-if="!ponto.terms.area_atuacao.length"><b>Não informado</b></span>
            </div>
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
            <div class="colunm-full" ng-show="ponto.participacaoMovPolitico">
                <span>Quais?
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
            <div class="colunm-full" ng-show="ponto.participacaoForumCultura">
                <span>Quais?
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
            <div class="colunm-full" ng-show="ponto.parceriaPoderPublico">
                <span>Quais?
                <input name="simPoderPublico" class="colunm1" type="text" ng-model="ponto.simPoderPublico" disabled="true" /></span>
            </div>
        </div>
    </div>
</div>
