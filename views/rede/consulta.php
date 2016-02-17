<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
?>
<div ng-controller="ConsultaCtrl">
    <div id="topo">
      <!-- <div id="topo1">
        <div id="btn_voltar">
          <a target="_self" href="#">
            <i class="icon icon-home"></i>Voltar ao início
          </a>
        </div></br>
      </div> -->
      <div id="topo2">
        <span id="registros" style="color: #075579;">Quantidade de registros: {{quantidade}}</span>
        <!-- <label id="Exportar"><p style="color: #075579;">Exportar planilha<a class="download teste" ng-click="exportXls()" hltitle="Exportar xls"></a></p></label> -->
    </div>
  </div>
</br></br></br>
  <table style="position:fixed;" id="table">
      <thead>
        <tr>
          <td id="Cabecalho">Busca</td>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td>
              <form ng-model="formulario">
              <div id="cartaoBusca">
                CPF<input class="inputFiltro" type="text" ui-mask="999.999.999-99" ng-model="inputCPF"/>
                CNPJ<input class="inputFiltro" type="text" ui-mask="99.999.999/9999-99" ng-model="inputCNPJ"/></br>
                Nome do Responsável<input class="inputFiltro" type="text" ng-model="inputNameResponsavel"/>
                Nome do Ponto<input class="inputFiltro" type="text" ng-model="inputNamePonto"/></br>
                Email<input class="inputFiltro" type="text" ng-model="inputEmail"/>
                 <input type="submit" value="Mostrar resultados" ng-click="filtro(inputCPF,inputCNPJ,inputNameResponsavel,inputNamePonto,inputEmail);"/>

                 <input type="submit" value="Limpar Consulta" ng-click="limpaFiltro();">
                 <input style="margin-top:0px;" type="submit" ng-click="filtroTopos()" value="Mostrar Tudo"/>
              </div>
              </form>
            </td>
          </tr>
      </tbody>
    </table>
  <div id="EstiloIEContainer" ng-show="show">
    <div id="container_table">
      <table id="table">
          <thead>
            <tr>
              <td id="Cabecalho">Agentes</td>
            </tr>
          </thead>
          <tbody>
              <tr ng-repeat="i in data">
                <td><a href="../admin/cadastro?id={{i.user.id}}" target="_blank">
                  <div id="cartao">
                    <h3 id="name">Nome do Ponto: {{i.name}}</h3>
		    </br>
                    <label id="nomeCompleto">Responsavel: {{i.nomeCompleto}}</label>
                    </br><label id="emailPrivado">Email: {{i.emailPrivado}}</label>
                  </div>
                </a></td>
              </tr>
          </tbody>
        </table>
    </div>
  </div>
