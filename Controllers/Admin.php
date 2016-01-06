<?php
namespace CulturaViva\Controllers;

use MapasCulturais\App;

class Admin extends \MapasCulturais\Controller{
    protected $_user = null;

    function getUser(){
        return $this->_user;
    }

    function GET_cadastro(){
        $this->requireAuthentication();
        $this->render('cadastro');
    }

    function GET_user(){
        $_user = App::i()->repo('User')->find($this->getGetData()['id']);
        $this->json($this->getUser());
    }
}
?>
