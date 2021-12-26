<?php
session_start();
ob_start();
require "DBConnect/DBConnect.php";
require 'Model/BaseModel.php';
require 'Controller/LoginController.php';
require 'Controller/UserController.php';
require 'Controller/DepartmentController.php';
require 'Controller/RoleController.php';

$loginController = new LoginController();
$departmentController = new DepartmentController();
$userController = new UserController();
$roleController = new RoleController();

$page = isset($_GET['page']) ? $_GET['page'] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="View/css/reset.css">
    <link rel="stylesheet" href="View/css/style.css">
</head>

<body>
    <?php
    switch ($page) {
            //User
        case 'list-user':
            $userController->listUser();
            break;
        case 'add-user':
            $userController->addUser();
            break;
        case 'edit-user':
            $user_id = $_GET['id'];
            $userController->editUser($user_id);
            break;
        case 'delete-user':
            $user_id = $_GET['id'];
            $userController->deleteUser($user_id);
            break;
            //Role
        case 'list-role':
            $roleController->listRoles();
            break;

            //Deparment
        case 'list-department':
            $departmentController->listDepartment();
            break;

            //Login - logout
        case 'login':
            $loginController->showLoginForm();
            break;
        case 'logout':
            $loginController->logout();
            break;
        default:
            $loginController->showLoginForm();
            break;
    }
    ?>
</body>

</html>