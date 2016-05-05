<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
?>
<style>
    body{
        width: 1280px;
        height: 906px;
        background-image: url(../../assets/img/fundoPDF.jpg);
        background-repeat: no-repeat;
    }
    canvas{
        width: 130px;
        height: 130px;
    }
</style>

<div id="layout" ng-controller="layoutPDFCtrl">
    <div style="font-family : comic sans ms; font-size: 27px; font-weight: bold; margin-left: 400px; margin-top: 232px;">
        {{name}}
    </div>
    <div style="margin-top: 451px; margin-left: 327px;">
        <!-- <qr text="agent.user.id"></qr></br> -->
        <span style="font-family : comic sans ms; font-size: 27px; font-weight: bold;">{{id}}<span>
    </div>
</div>
