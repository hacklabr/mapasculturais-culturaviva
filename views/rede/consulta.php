<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
?>
<style>
table, th , td  {
  border-collapse: collapse;
  padding: 5px;
}

table tr:nth-child(odd)	td{
  background-color: #D1D2D4;
}
table tr:nth-child(even) td{
  background-color: #FFFFFF;
}

td{
  max-width: auto;
  padding: 10px;
  border: 6px solid rgba(153, 153, 153, 0.3);
  background-clip: padding-box;
  height: auto;
}

i{
  margin-right: 8px;
  font-size: 25px;
}

#topo{
  position: fixed;
  margin-left: -277px;
  margin-top: -133px;
  height: 100px;
  width: 100%;
  font-family: "Open Sans",Helvetica,Arial,sans-serif;
}

#topo1{
  height: 40%;
  background: #075579;

}

#Buscar{
  float: right;
  margin-top: 20px;
  margin-right: -10px;
  width: 400px
}

#P_buscar{
  font-size: 35px
  font-weight: bold;
}

#topo2{
  height: 50%;
  background: #D1D2D4;;
  /*opacity: 0.3;*/
}

#btn_voltar, a{
  margin-left: 8px;
  margin-top: 4px;
  color: #D1D2D4;
  float: left;
}

#btn_voltars, a:hover{
  color: #fff;
}

#registros{
  position: absolute;
  margin-top: 10px;
  margin-left: 15px;
  font-size: 15px;
  font-weight: normal;

}

#Exportar{
  float: right;
  margin-top: 12px;
  margin-right: 20px;
  width: 180px;
  color: #075579;
  font-weight: normal;
}

#container_table{
  height: auto;
  width: -moz-fit-content;
  border: 60px solid rgba(153, 153, 153, 0.3);
  border-radius: 10px;
  margin: 100px 0 0 70px;
}

#EstiloIEContainer{
  display: -ms-grid;
  -ms-grid-columns: min-content;
}

#table{
  margin: 0px;
  color: #414042;
}

#Cabecalho{
  font-size: 14px;
  font-weight: bold;
  background: #a7a9ac;
  background-clip: padding-box;
}

#cartao{
  width: 650px;
  height: 150px;
}

#cartao{
  color: red;
}

input{
  width: 300px;
}

.download{
  width: 1.600em;
  height: 0.500em;
  border: 0.250em solid #A7A9AC;
  border-top: none;
  position: absolute;
  bottom: 0.188em;
  position: relative;
  margin-top:1em;
}

.download:hover{
  width: 1.500em;
  height: 0.500em;
  border: 0.250em solid	#FFFFFF;
  border-top: none;
  position: absolute;
  bottom: 0.188em;
  position: relative;
  margin-top:1em;
}


.download:before{
  content: '';
  position: absolute;
  width: 0.438em;
  height: 0.625em;
  background: #A7A9AC;
  top: -0.875em;
  left: 0.563em;
}

.download:hover:before{
  content: '';
  position: absolute;
  width: 0.438em;
  height: 0.625em;
  background: #FFFFFF;
  top: -0.875em;
  left: 0.463em;
}

.download:after{
  width: 0em;
  height: 0em;
  content: '';
  position: absolute;
  border-style: solid;
  border-color: #A7A9AC transparent transparent transparent;
  border-width: 0.500em;
  left: 0.250em;
  top: -0.250em;
}

.download:hover:after{
  width: 0em;
  height: 0em;
  content: '';
  position: absolute;
  border-style: solid;
  border-color: 	#FFFFFF transparent transparent transparent;
  border-width: 0.500em;
  left: 0.250em;
  top: -0.250em;
}
a{
  float: right;
}
</style>

<div ng-controller="ConsultaCtrl">
    <div id="topo">
      <div id="topo1">
        <div id="btn_voltar">
          <a target="_self" href="#">
            <i class="icon icon-home"></i>Voltar ao início
          </a>
        </div>
      </div>
      <div id="topo2">
        <span id="registros" style="color: #075579;">Quantidade de registros: {{quantidade}}</span>
        <label id="Exportar"><p style="color: #075579;">Exportar planilha<a class="download" ng-click="exportXls()" hltitle="Exportar xls"></a></p></label>
    </div>
  </div>
  <div>
    Nome do responsavel:<input type="text" ng-model="inputNameResponsavel"/>
    Nome do ponto:<input type="text" ng-model="inputNamePonto"/>
    Email:<input type="text" ng-model="inputEmail"/>
    <input type="submit" value="enviar" ng-click="filtro(inputNameResponsavel,inputNamePonto,inputEmail)"/>
  </div>
  <div id="EstiloIEContainer">
    <div id="container_table">
      <table id="table">
          <thead>
            <tr>
              <!-- <td id="Cabecalho" ng-repeat="key in chaveDado">{{key}}</td> -->
              <td id="Cabecalho">Pontos</td>
            </tr>
          </thead>
          <tbody>
              <tr ng-repeat="i in data | filter : input : strict">
                <td><a href="http://culturaviva.gov.br/admin/cadastro?id={{i.id}}">
                  <div id="cartao">
                    <h3 id="name">Nome do Ponto: {{i.name}}</h3>
                    <h5 id="nomeCOmpleto">Responsavel: {{i.nomeCompleto}}</h5>
                    <h5 id="emailPrivado">Email: {{i.emailPrivado}}</h5>
                  </div>
                </a></td>
              </tr>
          </tbody>
        </table>
    </div>
  </div>
