<?php
class register extends Controller
{


    function SayHi()

    {

        $this->View('/pages/register', []);
    }
    function sign_up()
    {
        if (isset($_POST['submit_register'])) {
            $level = 1;
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $kq = $this->model('user_modal')->Insert_User($first_name, $last_name, $email, $password, $phone, $level);
            $this->View('pages/register', [
                'kq' => $kq,
            ]);
        }
    }
    function ajax_login()
    {

        $number = $_POST['number'];
        $result = $this->model('user_modal')->Check_phone($number);
        echo $result;
    }
}
