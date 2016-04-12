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
        $this->requireAuthentication();
        $this->render('cadastro');
    }

    function GET_user(){
        $_user = App::i()->repo('User')->find($this->getUrlData()['id']);
        if($_user){
            $this->json($_user);
        }else {
            $this->json(['erro' => "usuario nao encontrado"], 400);
        }
    }
}
?>
