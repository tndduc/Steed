<?php 
    class login extends Controller {
        function SayHi(){
            $this->View('/pages/login', []);

        }
        function login_user(){
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $result = $this->model('user_modal')->check_user($phone,$password);
            if($result==true){
                $_SESSION['phone'] = $phone;
                header("location:/steed/");
            }else{
                header("location:/steed/login");
            }

        }
        function logout(){
            unset ($_SESSION['phone']);
            header("location:/steed/login");
        }

    }

?>