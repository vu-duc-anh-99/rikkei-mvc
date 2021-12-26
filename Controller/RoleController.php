<?php
include 'Model/RoleModel.php';
class RoleController
{
    private $model;
    public function __construct()
    {
        $this->model = new RoleModel();
    }
    public function listRoles()
    {
        if (isset($_SESSION['email'])) {
            $data = $this->model->getListRoles();
            require_once("View/ListRole.php");
        } else {
            header('Location:page=login');
        }
    }
}
