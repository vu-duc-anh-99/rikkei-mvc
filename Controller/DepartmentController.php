<?php
include 'Model/DepartmentModel.php';
class DepartmentController
{
    private $model;
    public function __construct()
    {
        $this->model = new DepartmentModel();
    }
    public function listDepartment()
    {
        if (isset($_SESSION['email'])) {
            $data = $this->model->getListDepartment();
            require_once("View/ListDepartment.php");
        } else {
            header('Location:page=login');
        }
    }
}
