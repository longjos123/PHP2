<?php
namespace App\Controllers;
use App\Models\User;

class LoginController{
    public function viewLogin(){
        include_once "./app/views/auth/login/login.php";
    }

    public function checkLogin(){
        $email = isset($_POST['email']) == true ? trim($_POST['email']) : '';
        $password = isset($_POST['pass']) == true ? trim($_POST['pass']) : '';

        if(empty($email) || empty($password)){
            header('location: ' .BASE_URL.'login?msg=Email hoặc mật khẩu không hợp lệ!');
        }

        $userInf = User::where('email', $email)->first();
        if(empty($userInf) || !password_verify($password, $userInf->password)){
            header('location: ' .BASE_URL.'login?msg=Email hoặc mật khẩu không hợp lệ!');
        }else {
            $_SESSION['AUTH'] = [
                'id' => $userInf->id,
                'name' => $userInf->name,
                'email' => $userInf->email,
                'avatar' => $userInf->avatar,
                'role_id' => $userInf->role_id,
            ];
            $_SESSION['b'] = 'b';
//var_dump($_SESSION['AUTH']);die();
            header('location:' .BASE_URL.'mon-hoc');
        }
    }
}
?>