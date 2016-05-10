<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
?>
<style>
    canvas{
        width: 10px;
        height: 10px;
    }
</style>

<div id="layout" ng-controller="layoutPDFCtrl">
    <input type="button" id="download" value="Ver Certificado" href="#"/>
    <script type="text/javascript">
        function criaTag(){ // funcao que inicializa tag
            var qr = document.createElement('qr'); // criação teg <qr>
            qr.setAttribute('text', 'teste'); // parametros para tag
        }

        function convertImgToBase64(callback){ //converte imagem em base64
            var img = new Image();
            img.onload = function(){
                var canvas = document.createElement('CANVAS');
                var ctx = canvas.getContext('2d');
                canvas.height = 1241;
                canvas.width = 1754;
                ctx.drawImage(this, 0, 0);
                var dataURL = canvas.toDataURL('image/png');
                callback(dataURL);
                canvas = null;
            };
            img.src = '/assets/img/certificado.png';
        }

        var button = document.getElementById("download");

        button.onclick = function(){ // funcao que gere pdf
            convertImgToBase64(function(dataUrl){
                criaTag();
                var doc = new jsPDF('landscape','pt',[1754,1241]);
                doc.addImage(dataUrl,'png',0,0,1754,1241);
                doc.setFontType("bold");
                doc.setFontSize(20);
                doc.text(window.name, 770, 395);
                doc.setFontSize(30);
                doc.text(window.url,570,1225);
                console.log(qr.children);

                // tentando passar tag para ser convertida
                //var dataURLQR = qr.children[0].toDataURL('image/png');
                //doc.addImage(dataURLQR,'png',667,1014,177,177);
                doc.save('Certificado.pdf');
            });
        };
    </script>
</div>
