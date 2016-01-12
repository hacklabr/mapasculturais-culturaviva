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
  min-width: 100px;
  max-width: 300px;
  padding: 10px;
  border: 6px solid rgba(153, 153, 153, 0.3);
  background-clip: padding-box;
}

section{
  margin-left: 0px;
  max-width: 100%;
}

i{
  margin-right: 8px;
  font-size: 25px;
}

#topo{
  position: fixed;
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

#btn_voltar, a:hover{
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
  margin: 100px 0 0 80px;
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
  <div id="EstiloIEContainer">
    <div id="container_table">
      <table id="table">
          <thead>
            <tr>
              <td id="Cabecalho" ng-repeat="key in chaveDado">{{key}}</td>
            </tr>
          </thead>
          <tbody>
              <tr ng-repeat="i in data">
                <td>{{i.nomeCompleto}}</td>
                <td>{{i.cpf}}</td>
                <td>{{i.emailPrivado}}</td>
                <td>{{i.telefone1}}</td>
                <td>{{i.telefone1_operadora}}</td>
                <td>{{i.relacaoPonto}}</td>
                <td>{{i.tipoOrganizacao}}</td>
                <td>{{i.tipoPontoCulturaDesejado}}</td>
                <td>{{i.cnpj}}</td>
                <td>{{i.representanteLegal}}</td>
                <td>{{i.responsavel_nome}}</td>
                <td>{{i.responsavel_cargo}}</td>
                <td>{{i.responsavel_email}}</td>
                <td>{{i.responsavel_telefone}}</td>
                <td>{{i.responsavel_operadora}}</td>
                <td>{{i.name}}</td>
                <td>{{i.shortDescription}}</td>
                <td>{{i.pais}}</td>
                <td>{{i.geoEstado}}</td>
                <td>{{i.geoMunicipio}}</td>
                <td>{{i.En_Bairro}}</td>
                <td>{{i.En_Nome_Logradouro}}</td>
                <td>{{i.En_Num}}</td>
                <td>{{i.cep}}</td>
                <td>{{i.tem_sede}}</td>
                <td>{{i.location}}</td>
                <td>{{i.atividadesEmRealizacaoLink}}</td>
              </tr>
          </tbody>
        </table>
    </div>
  </div>
