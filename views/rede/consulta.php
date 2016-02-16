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
  margin-left: -19%;
  margin-top: -40px;
  height: 100px;
  width: 100%;
  font-family: "Open Sans",Helvetica,Arial,sans-serif;
}

#topo1{
  height: 60%;
  background: #075579;

}

#campo_busca{
  margin-left: 200px;
  margin-top: 15px;
  color: #D1D2D4;
  font-weight: bold;
}

#Buscar{
  float: right;
  margin-top: 20px;
  margin-right: -10px;
  width: 400px
}

#P_buscar{
  font-size: 35px;
  font-weight: bold;
}

#topo2{
  height: 45%;
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
  /*margin: 100px 0 0 70px;*/
}

#EstiloIEContainer{
  display: -ms-grid;
  -ms-grid-columns: min-content;
  margin-left: 60px;
}

#table{
  margin: 0px;
  color: #414042;
}

#Cabecalho{
  font-size: 30px;
  font-weight: bold;
  background: #075579;
  background-clip: padding-box;
  color: #d1d2d4;
}

#cartao{
  width: 650px;
  height: 150px;
  text-align: left;
}

#cartaoBusca{
  width:215px;
  height: 490px;
]}

#name{
	color:#075579;
	font-size:28px;
}

#nomeCompleto{
	color:#075579;
}

#emailPrivado{
	color:#075579;
}

input{
  width: 200px;
  border-radius: 2px;
  margin-left: 10px;
}

.inputFiltros{
  margin-top:-45px;
  margin-left: 100px;
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
        </div></br>
      </div>
      <div id="topo2">
        <span id="registros" style="color: #075579;">Quantidade de registros: {{quantidade}}</span>
        <label id="Exportar"><p style="color: #075579;">Exportar planilha<a class="download" ng-click="exportXls()" hltitle="Exportar xls"></a></p></label>
    </div>
  </div>
</br></br></br>
  <table style="position:fixed; margin-left:-285px;" id="table">
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
                CPF<input type="text" ui-mask="999.999.999-99" ng-change="" ng-model="inputCPF"/>
                CNPJ<input type="text" ui-mask="99.999.999/9999-99" ng-change="" ng-model="inputCNPJ"/></br>
                Nome do Responsável<input type="text" ng-change="" ng-model="inputNameResponsavel"/>
                Nome do Ponto<input type="text" ng-change="" ng-model="inputNamePonto"/></br>
                Email<input type="text" ng-change="" ng-model="inputEmail"/>
                Estado
              </br>
                <select ng-model="geoEstado">
                       <option value="AC">Acre
                       <option value="AL">Alagoas
                       <option value="AP">Amapá
                       <option value="AM">Amazonas
                       <option value="BA">Bahia
                       <option value="CE">Ceará
                       <option value="DF">Distrito Federal
                       <option value="ES">Espírito Santo
                       <option value="GO">Goiás
                       <option value="MA">Maranhão
                       <option value="MT">Mato Grosso
                       <option value="MS">Mato Grosso do Sul
                       <option value="MG">Minas Gerais
                       <option value="PA">Pará
                       <option value="PB">Paraíba
                       <option value="PR">Paraná
                       <option value="PE">Pernambuco
                       <option value="PI">Piauí
                       <option value="RJ">Rio de Janeiro
                       <option value="RN">Rio Grande do Norte
                       <option value="RS">Rio Grande do Sul
                       <option value="RO">Rondônia
                       <option value="RR">Roraima
                       <option value="SC">Santa Catarina
                       <option value="SP">São Paulo
                       <option value="SE">Sergipe
                       <option value="TO">Tocantins
                 </select>
                 <input type="submit" value="Mostrar resultados" ng-click="filtro(inputCPF,inputCNPJ,inputNameResponsavel,inputNamePonto,inputEmail,geoEstado);"/>
              </div>
              </form>
              <input type="submit" value="Limpar Consulta" ng-click="limpaFiltro();revirginar()">
              <input style="margin-top:0px;" type="submit" ng-click="filtroTopos()" value="Mostrar Tudo"/>
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
                <td><a href="../admin/cadastro?id={{i.id}}" target="_blank">
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
