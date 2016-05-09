<?php
    $this->bodyProperties['ng-app'] = "culturaviva";
?>

<div id="layout" ng-controller="layoutPDFCtrl">
    <input type="button" id="download" value="Ver Certificado" href="#"/>
    <script type="text/javascript">
    var elemento_pai = document.getElementById("layout");
    var qr = document.createElement('qr');
    qr.setAttribute('text', 'teste');
    elemento_pai.appendChild(qr);
    var canvas = document.canvas;

    function convertImgToBase64RQ(callback, canvas){
        var img = new Image();
        img.onload = function(){
            var ctx = canvas.getContext('2d');
            canvas.height = 130;
            canvas.width = 130;
            ctx.drawImage(this, 0, 0);
            var dataURL = canvas.toDataURL('image/png');
            callback(dataURL);
            canvas = null;
        };
    }

        function convertImgToBase64(callback){
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

        button.onclick = function(){
            convertImgToBase64(function(dataUrl){
                var doc = new jsPDF('landscape','pt',[1754,1241]);
                if(window.name.length < 40){
                    doc.setFontSize(40);
                }
                if(window.name.length < 70){
                    doc.setFontSize(20);
                }
                if(window.name.length < 105){
                    doc.setFontSize(15);
                }
                doc.addImage(dataUrl,'png',0,0,1754,1241);
                doc.setFontType("bold");
                doc.text(window.name, 770, 395);
                doc.text(window.url,570,1225);
                doc.save('Certificado.pdf');
            });
        };
    </script>
</div>
