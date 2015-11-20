<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
?>
<style>
table, th, td {
  border: 1px solid black;
}
h4{
  color: #fff;
  font-size:16px;
  font-weight: 100;
  padding: 10px 20px;
}
</style>

<div ng-controller="ConsultaCtrl">
  <h4>Ponto</h4>
  <table>
      <tbody>
        <tr>
          <td ng-repeat="(chave, valor) in agent_id_ponto">{{chave}}</td>
        </tr>
        <tr>
          <td ng-repeat="valor in agent_id_ponto">{{valor}}</td>
        </tr>
      </tbody>
  </table>
    <h4>Responsavel</h4>
    <table>
        <tbody>
          <tr>
            <td ng-repeat="(chave, valor) in agent_id_individual">{{chave}}</td>
          </tr>
          <tr>
            <td ng-repeat="valor in agent_id_individual">{{valor}}</td>
          </tr>
        </tbody>
    </table>
    <h4>Entidade</h4>
    <table>
        <tbody>
          <tr>
            <td ng-repeat="(chave, valor) in agent_id_entidade">{{chave}}</td>
          </tr>
          <tr>
            <td ng-repeat="valor in agent_id_entidade">{{valor}}</td>
          </tr>
        </tbody>
    </table>
    <h4>Obrigatorios</h4>
    <table>
        <tbody>
          <tr>
            <td>Responsavel</td>
          </tr>
          <tr>
            <td ng-repeat="(chave, valor) in data[0]">{{chave}}</td>
          </tr>
          <tr>
            <td ng-repeat="valor in data[0]">{{valor}}</td>
          </tr>
          <tr>
            <td>Ponto</td>
          </tr>
          <tr>
            <td ng-repeat="(chave, valor) in data[1]">{{chave}}</td>
          </tr>
          <tr>
            <td ng-repeat="valor in data[1]">{{valor}}</td>
          </tr>
          <tr>
            <td>Entidade</td>
          </tr>
          <tr>
            <td ng-repeat="(chave, valor) in data[2]">{{chave}}</td>
          </tr>
          <tr>
            <td ng-repeat="valor in data[2] | filter:NULL ">{{valor}}</td>
          </tr>
        </tbody>
    </table>
</div>
