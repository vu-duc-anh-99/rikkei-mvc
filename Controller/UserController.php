<?php
include 'Model/UserModel.php';
class UserController
{
    private $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }
    public function listUser()
    {
        if (isset($_SESSION['email'])) {
            $data = $this->model->getListUser($_SESSION['role_id'], $_SESSION['department_id']);
            require_once("View/ListUser.php");
        } else {
            header('Location:page=login');
        }
    }
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                "name" => $_POST['name'],
                "phone" => $_POST['phone'],
                "photo" => basename($_FILES['photo']["name"]),
                "email" => $_POST["email"],
                "password" => md5($_POST["password"]),
                "address" => $_POST['address'],
                "department_id" => $_POST['department_id'],
                "role_id" => $_POST['role_id']
            ];
            $result = $this->model->insertUser($data);
            if ($result) {
                $_SESSION['message'] = "Thêm nhân viên thành công";
                header('Location:index.php?page=list-user');
            } else {
                $_SESSION['message'] = "Lỗi khi thêm mới nhân viên";
                header('Location:index.php?page=list-user');
            }
        }
        require_once("View/AddUser.php");
    }
    public function editUser($user_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $dataUser = $this->model->getUserById($user_id);
        }
        include "View/EditUser.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_FILES['photo']["name"])) {
                $data["photo"] = basename($_FILES['photo']["name"]);
            } else {
                $data["photo"] = $_POST['old_photo'];
            }
            $data['name'] = $_POST['name'];
            $data['phone'] = $_POST['phone'];
            $data['email'] = $_POST['email'];
            $data['address'] = $_POST['address'];
            $data['department_id'] = $_POST['department_id'];
            $data['role_id'] = $_POST['role_id'];
            $result = $this->model->updateUser($data, $user_id);
            if ($result) {
                $_SESSION['message'] = "Update nhân viên thành công";
                header('Location:index.php?page=list-user');
            } else {
                $_SESSION['message'] = "Lỗi khi update thông tin nhân viên";
            }
        }
    }
    public function deleteUser($user_id)
    {
        $this->model->deleteUser($user_id);
        $_SESSION['message'] = "Xóa nhân viên thành công";
        header('Location: index.php?page=list-user');
    }
}
