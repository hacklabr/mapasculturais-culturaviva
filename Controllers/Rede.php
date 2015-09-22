<?php
namespace CulturaViva\Controllers;

class Rede extends \MapasCulturais\Controller{
    function GET_index(){
        $this->render('index');
    }
    
    function GET_entrada(){
        $this->render('entrada');
    }

    function GET_faq(){
        $this->render('faq');
    }
}