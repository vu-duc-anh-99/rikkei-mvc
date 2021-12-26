<?php
include 'Model/LoginModel.php';
class LoginController
{
    private $model;
    public function __construct()
    {
        $this->model = new LoginModel();
    }
    public function showLoginForm()
    {
        $loginModel = new LoginModel();
        include "View/LoginForm.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                "email" => $_POST["email"],
                "password" => md5($_POST["password"])
            ];

            $checkLogin = $this->model->checkLogin($data);
            if ($checkLogin) {
                $_SESSION['email'] = $checkLogin['email'];
                $_SESSION['role_id'] = $checkLogin['role_id'];
                $_SESSION['department_id'] = $checkLogin['department_id'];
                header('Location:index.php?page=list-user');
            } else {
                $_SESSION['login_error'] = "Sai email hoặc mật khẩu";
                header('Location:page=login');
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location:page=login');
    }
}
