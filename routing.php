<?php
    $controllers = array('usuario' =>['ficha', 'editar','error','eliminar','cerrarsesion'],
    'administrador'=>['ficha', 'editar','error','eliminar','lista','cerrarsesion'],
    'inicio'=>['inicio','registro','error']);



    if(array_key_exists($controller, $controllers)){
        if(in_array($action, $controllers[$controller])){
            call($controller, $action);
        }else{
            call($controller,'error');
        }
    }else{
        call($controller,'error');
    }
    
    function call($controller,$action){
        require_once('Controllers/'.$controller.'Controller.php');
        switch ($controller){
            case 'usuario':
                require_once('Model/Usuario.php');
                $controller = new UsuarioController();
                break;
            case 'administrador':
                require_once('Model/Administrador.php');
                 $controller = new AdministradorController();
                 break;
            case 'inicio':
                require_once('Model/Inicio.php');
                $controller = new InicioController();
                 break;
                 default:
                 break;                           
        }
        $controller -> {$action}();
    }
