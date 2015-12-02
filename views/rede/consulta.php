<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
?>
<style>
table, th , td  {
  border: 6px solid #999999;
  border-collapse: collapse;
  padding: 5px;
}
table tr:nth-child(odd)	{
  background-color: #CCCCCC;
}
table tr:nth-child(even) {
  background-color: #FFFFFF;
}

table{
  border-radius: 20px;
}

td{
  min-width: 100px;
}

section{
  margin-left: 0px;
  max-width: 100%;
}

#topo{
  position: fixed;
  margin-top: -140px;
  height: 80px;
  width: 100%;
  font-family: "Open Sans",Helvetica,Arial,sans-serif;
}

#topo1{
  height: 70%;
  background: #1f1fa8;

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
  height: 30%;
  background: #c6c6e1;
}

#registros{
  position: absolute;
  margin-top: 10px;
  margin-left: 5px;
  font-size: 12px;
  font-weight: normal;

}

#divisao{
  margin-left: 8px;
}

#Exportar{
  float: right;
  margin-top: 12px;
  margin-right: 20px;
  width: 180px;
}

#container_table{
  height: auto;
  width: 3600px;
  border: 60px solid #999999;
  margin: 130px 0 0 80px;
}

#table{
  margin: 0px;
}

input{
  width: 300px;
}

.download{
width: 1.600em;
height: 0.500em;
border: 0.250em solid #FFFFFF;
border-top: none;
position: absolute;
bottom: 0.188em;
position: relative;
margin-top:1em;
}

.download:hover{
width: 1.500em;
height: 0.500em;
border: 0.250em solid	#CCCCCC;
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
background: #FFFFFF;
top: -0.875em;
left: 0.563em;
}

.download:hover:before{
content: '';
position: absolute;
width: 0.438em;
height: 0.625em;
background: #CCCCCC;
top: -0.875em;
left: 0.463em;
}

.download:after{
width: 0em;
height: 0em;
content: '';
position: absolute;
border-style: solid;
border-color: #FFFFFF transparent transparent transparent;
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
border-color: 	#CCCCCC transparent transparent transparent;
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
        <span id="registros" style="color: #FFFFFF;">Quantidade de Registros: {{quantidade}}<font id="divisao" color="#FFFFFF">|</font></span>
        <label id="Exportar"><p style="color: #FFFFFF;">Exportar planilha:<a class="download" ng-click="exportXls()" hltitle="Exportar xls"></a></p></label>
      </div>
      <div id="topo2">
    </div>
  </div>
  <div id="container_table">
    <table id="table">
        <thead>
          <tr>
            <td ng-repeat="key in chaveDado">{{key}}</td>
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
