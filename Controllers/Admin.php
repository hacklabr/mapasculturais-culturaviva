<?php
namespace CulturaViva\Controllers;

use MapasCulturais\App;

class Admin extends \MapasCulturais\Controller{
    protected $_user = null;
    protected $buscaAnterior = null;

    function getUser(){
        return $this->_user;
    }

    function GET_cadastro(){
      $uriExplode = explode('/',$_SERVER['REQUEST_URI']);
      if(isset($uriExplode[3])){
        $buscaAnterior = $uriExplode[3];
      }
        $this->requireAuthentication();
        $this->render('cadastro');
        $this->render($buscaAnterior);
    }

    function GET_user(){
        $_user = App::i()->repo('User')->find($this->getGetData()['id']);
        if($_user){
            $this->json($_user);
        }else {
            $this->json(['erro' => "usuario nao encontrado"], 400);
        }
    }
}
?>
