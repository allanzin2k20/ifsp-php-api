<?php
class UserController{
    function signup(){
        
        //pegar as entradas
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = sha1($_POST['pass']);
        $avatar = $_POST['avatar'];

        //validar os campos

        //executar a operacao de banco
        $user = new User(null, $name, $email, $pass, $avatar);
        $id = $user->create();

        //dar a saida
        $result["success"]["message"] = "User created successfully!";

        $result["user"]["id"] = $id;
        $result["user"]["name"] = $name;
        $result["user"]["email"] = $email;
        $result["user"]["pass"] = $pass;
        $result["user"]["avatar"] = $avatar;

        $output = new Output();
        $output->response($result);
    }

    function list(){
        $route = new Router();
        $route->allowedMethod('GET');

        $user = new User(null, null, null, null, null);
        $listUsers = $user->list();

        $result["success"]["message"] = "User list has been successfully listed!";
        $result["data"] = $listUsers;

        $output = new Output();
        $output->response($result, 202);
    }

    function byId(){
        $route = new Router();
        $route->allowedMethod('GET');

        $output = new Output();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
       }else{
        $result['error']['message'] = 'Id parameter is required!';
        $output->response($result, 406);
       }
           
            $user = new User($id, null, null, null, null);
            $userById = $user->getById();
       
            if($userById){
                $result["success"]["message"] = "User has been successfully selectd!";
                $result["data"] = $userById;
                $output->response($result);
            }else{
                $result['error']['message'] = 'User not found!';
                $output->response($result, 404);
            }
        }
    }
?> 