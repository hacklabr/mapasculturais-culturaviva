<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
?>
<style>
    body{
        width: 1280px;
        height: 906px;
        /*background-image: url(../../assets/img/fundoPDF.jpg);*/
        background-repeat: no-repeat;
    }
    canvas{
        width: 130px;
        height: 130px;
    }
    #canvas{

    }
</style>

<div id="layout" ng-controller="layoutPDFCtrl">
    <<script type="text/javascript">
        var img = new Image();
        var dataURL;
        img.onload = function(){
            var canvas = document.createElement('CANVAS');
            var ctx = canvas.getContext('2d');
            canvas.height = 1241;
            canvas.width = 1754;
            ctx.drawImage(this, 0, 0);
            dataURL = canvas.toDataURL('image/png');
            //callback(dataURL);
            canvas = null;
        };
        img.src = '/assets/img/certificado.png';
        var imgData = dataURL;
        var doc = new jsPDF();
        //doc.text({{name}}, 130, 67);
        //doc.text({{id}}, 98, 207);
        doc.addImage(imgData, 'png', 0, 0, 1754, 1241);
        doc.save('Certificado.pdf');
    </script>>
</div>
