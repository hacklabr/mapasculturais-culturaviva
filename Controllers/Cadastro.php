<?php
namespace CulturaViva\Controllers;

class Cadastro extends \MapasCulturais\Controller{
    function GET_index(){
        $this->render('index');
    }
    
    function GET_responsavel(){
        $this->render('responsavel');
    }
    
    function GET_entidadeDados(){
        $this->render('entidade-dados');
    }
    
    
    function GET_entidadeContatos(){
        $this->render('entidade-contatos');
    }
    
    function GET_pontoMapa(){
        $this->render('ponto-mapa');
    }
    
    function GET_portifolio(){
        $this->render('portifolio');
    }
    
    function GET_pontoMais(){
        $this->render('ponto-mais');
    }
}