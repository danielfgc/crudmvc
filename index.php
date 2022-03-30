
    <?php
       // require_once('connection.php');
    require_once('Connection.php');

        if(isset($_GET['controller']) && isset($_GET['action'])){
            $controller=$_GET['controller'];
            $action=$_GET['action'];
        }else{
            if (isset($_COOKIE['rol'])){
                if($_COOKIE['rol']==1){
                    $controller='administrador';
                    $action = 'lista';
                    }else{
                        $controller ='usuario';
                        $action = 'ficha';
                    }
                }else{
                  $controller = 'inicio';
                  $action = 'inicio';
                }
        }
        require_once('Views/Layouts/layout.php');
    ?>

