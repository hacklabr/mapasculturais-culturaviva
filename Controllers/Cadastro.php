<?php
namespace CulturaViva\Controllers;

class Cadastro extends \MapasCulturais\Controller{
    function GET_index(){
        $this->requireAuthentication();
        
        $this->render('index');
    }
    
    function GET_responsavel(){
        $this->requireAuthentication();
        
        $this->render('responsavel');
    }
    
    function GET_entidadeDados(){
        $this->requireAuthentication();
        
        $this->render('entidade-dados');
    }
    
    function GET_entidadeContatos(){
        $this->requireAuthentication();
        
        $this->render('entidade-contatos');
    }
    
    function GET_pontoMapa(){
        $this->requireAuthentication();
        
        $this->render('ponto-mapa');
    }
    
    function GET_portifolio(){
        $this->requireAuthentication();
        
        $this->render('portifolio');
    }
    
    function GET_pontoMais(){
        $this->requireAuthentication();
        
        $this->render('ponto-mais');
    }
}