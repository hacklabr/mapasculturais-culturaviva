<?php
$this->bodyProperties['ng-app'] = "culturaviva";
?>
<style>
.formulario-CNPJ{
  background: transparent none repeat scroll 0 0;
  border: 0 none;
  margin: 0;
  padding: 0;
  vertical-align: baseline;
  margin-left: 36%;
  }

  #label_cnpj{
    color: #fbed1d;
    font-size:
  }

  #btn_nao{
    margin-left: 38%;
  }
</style>
<section id="page-entrada" ng-controller="EntradaCtrl">
    <?php $this->part('messages'); ?>
    <article>
        <div class="row title">
            <h3>
                <strong>Declare seu ponto de Cultura</strong>
                <br />Você já possui um CNPJ?
            </h3>
            <div class="formulario-CNPJ">
                <form>
                    <label><strong id="label_cnpj"><big>CNPJ*</big></strong></label>
                    <input type="text" name="CNPJ" ui-mask="99.999.999/9999-99" ng-model="data.cnpj" ng-change="data.naoEncontrouCNPJ = false" />
                    <input ng-hide="data.naoEncontrouCNPJ" type="submit" class="btn" value="OK" ng-click="consultaCNPJ()"/>
                </form>
            </div>
            <p>Responda e verificaremos se já temos informações sobre seu Ponto ou Pontão de Cultura na base de dados do MinC.</p>
            <a href="#" id="btn_nao" class="btn-cnpj js-btn-sem-cnpj btn_active" ng-click="data.comCNPJ = false">Não tenho CNPJ</a>
        </div>
        <div class="row">
            <div class="colunm-full js-sem-cnpj esconde">
                <p>
                    Você não precisa ter um CNPJ para autodeclarar seu Ponto de Cultura.
                    <br />
                    Continue com a validação em nome do seu Coletivo Cultural.
                </p>
                <a href="#" class="btn btn_active btn_continuar" ng-click="registrar()">Continuar</a>
            </div>
            <div class="colunm-full js-com-cnpj esconde">
                    <input type="hidden" name="comCNPJ" value="true"/>
                    <div class="clear"></div>
                    <div ng-show="data.naoEncontrouCNPJ" class="resposta-cnpj">
                        <p>Não encontramos seu CNPJ em nossa base de dados. Isso quer dizer que você ainda não é um Ponto ou Pontão de Cultura certificado, mas basta continuar para fazer sua autodeclaração e entrar na Rede Cultura Viva.</p>
                        <a href="#" class="btn btn_active btn_continuar" ng-click="registrar()">Continuar</a>
                        <a href="#" class="ja-sou js-modal">Já sou um Ponto ou Pontão de Cultura. Por que isto aconteceu? <span>?</spa></a>
                    </div>
            </div>
        </div>

    </article>
    <hr />
    <article>

        <div class="row">
            <div class="colunm1 criterios">
                <h4>Critérios para a Autodeclaração</h4>
                <p>Aqui estão algumas coisas que você precisa saber antes de autodeclarar seu Ponto de Cultura: </p>
                <div class="js-icons">
                     <span class="icon-user ic1 active"></span>
                     <span class="icon-home ic2"></span>
                     <span class="icon-location ic3"></span>
                     <span class="icon-picture ic4"></span>
                     <span class="icon-chat ic5"></span>
                     <span class="icon-vcard ic6"></span>
                     <span class="icon-book-open ic7"></span>
                 </div>
             </div>
             <div class="colunm1">
                 <div class="slide js-user sl1">
                     <span class="icon-user"></span>
                     <h4>Dados do Responsável</h4>
                     <p>Dados Básicos do Responsável pelo Cadastro: Nome completo do responsável pelo cadastro, contatos, redes sociais, entre outras informações</p>
                 </div>
                 <div class="slide js-home sl2">
                     <span class="icon-home"></span>
                     <h4>Dados da Entidade ou Coletivo Cultural</h4>
                     <p>Inclua os dados da Entidade ou Coletivo Cultural responsável pelo Ponto de Cultura</p>
                 </div>
                 <div class="slide js-location sl3">
                     <span class="icon-location"></span>
                     <h4>Seu ponto no mapa</h4>
                     <p>Vamos colocar seu Ponto no mapa! Com estes dados podemos cartografar a rede de Pontos de Cultura por todo Brasil</p>
                   </div>
                 <div class="slide js-picture sl4">
                     <span class="icon-picture"></span>
                     <h4>Portfólio e anexos</h4>
                     <p>Inclua suas fotos, links e redes sociais! Isto nos ajuda a entender que tipo de atividades culturais você realiza como Ponto de Cultura!</p>
                 </div>
                 <div class="slide js-chat sl5">
                     <span class="icon-chat"></span>
                     <h4>Atuação e Articulação</h4>
                     <p>Queremos entender melhor quais são as atividades realizadas pelo seu Ponto e quem é o público que as frequenta</p>
                 </div>
                 <div class="slide js-vcard sl6">
                     <span class="icon-vcard"></span>
                     <h4>Economia Viva </h4>
                     <p>Fale mais sobre os recursos que o seu ponto tem para trocar com outros pontos de cultura</p>
                 </div>
                 <div class="slide js-book-open sl7">
                     <span class="icon-book-open"></span>
                     <h4>Formação </h4>
                     <p>Vamos compartilhar conhecimentos e experiências para fazer multiplicar os saberes da nossa cultura</p>
                 </div>
             </div>
        </div>
    </article>
    <section class="modal">
        <div class="modal-content">
            <a class="js-close-modal">x</a>
            <h6><span>?</span> Já sou um Ponto ou Pontão de Cultura. Por que isso aconteceu?</h6>
            <p>Se você colocou o CNPJ da instituição e o mesmo não foi localizado, isso significa que não possuímos as informações de sua entidade em nossa base de dados e necessitamos que você preencha as informações para a complementação do cadastro. Isso acontece porque apesar de a Secretaria da Cidadania e da Diversidade Cultural reconhecer todas as formas de Ponto de Cultura, o banco de dados de Pontos e Pontões conveniados diretamente com o Minc e/ou coneniados com as Redes não está completo. Agora, com a nova Política Nacional de Cultura Viva, todos os Pontos de Cultura serão contemplados no Cadastro.</p>
            <p>Se ainda tem dúvidas, entre em contato conosco em <a href="#">email@email.com</a></p>
        </div>
    </section>
</section>
