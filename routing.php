<?php
    $controllers = array('usuario' =>['ficha', 'editar','error','eliminar'],
    'administrador'=>['ficha', 'editar','error','eliminar','lista'],
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
                require_once('model/Usuario.php');
                $controller = new UsuarioController();
                break;
            case 'administrador':
                require_once('model/Administrador.php');
                 $controller = new AdministradorController();
                 break;
            case 'inicio':
                require_once('model/Inicio.php');
                $controller = new InicioController();
                 break;
                 default:
                 break;                           
        }
        $controller -> {$action}();
    }
