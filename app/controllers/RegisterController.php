<?php
namespace App\Controllers;
use App\Models\User;

class RegisterController{
    public function viewRegister(){
        include_once "./app/views/auth/register/register.php";
    }

    public function postRegister(){
        $email = isset($_POST['email']) == true ? trim($_POST['email']) : '';
        $name = isset($_POST['name']) == true ? $_POST['name'] : '';
        $password = isset($_POST['pass']) == true ? trim($_POST['pass']) : '';
        $re_password = isset($_POST['pass']) == true ? trim($_POST['pass']) : '';

        if($password !== $re_password){

        }
        $userRegister = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];

        $user = new  User();
        $user->insert($userRegister);

        header('location: ' .BASE_URL.'login');
    }
}
?>