<?php
class AuController extends Controller{
    public function login(){
        Router::AllowMethod('POST');

        $data = input::getData();
        $email = $data['email'];
        $pass = sha1($data['pass']);

        $user = new User(null, null, $email, $pass, null);

        $id_user = $user->login();

        if ($id_user){
            $token = sha1($uniqid(rand(), true)); 
            $client = $_SERVER['HTTP_USER_AGENT'];
            $session = new Session(null, $id_user, null, null);
            $sessionId = $session->create();
            if ($essionid){
                $result["success"]["message"] = "User logged in successfully!";
                $result["data"]["token"] = $token;
                Output::response($result);
            }
            else{
                $result["error"]["message"] = "Error creating session! please try again later!";
                Output::response($result, 401);
            }
        }else{
            $result["error"]["message"] = "Email or password invalid! Please try again!";
            Output::response($result, 401);
        }
    }

        public function logout(){
            Router::allowMethod('POST');

            $data = input::getData();
            $idUser = $data['id_user'];
            $token = $data['token'];

            $session = new Session(null, $idUser, $token, null);
            $wasDeleted = $session->delete();

            if($wasDeleted){
                $result["success"]["message"] = "User logged out successfully!";
                Output::response($result);
        }else {
            $result["error"]["message"] = "Error logging out! Please try again later!";
            Output::response($result, 500);
            output::response($result);
        }
    }
}
?>