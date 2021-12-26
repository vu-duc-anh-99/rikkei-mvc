<?php

class DepartmentModel extends BaseModel
{
    public function getListDepartment()
    {
        $data = parent::getList("department");
        return $data;
    }
    public function getDepartmentById($id)
    {
        $data = parent::getDataById($id, "department");
        return $data;
    }
    public function getDepartmentByName($name)
    {
        $data = parent::getDataByName($name, "department");
        return $data;
    }
    public function insertDepartment($data)
    {
        $data['name'] = $_POST['name'];
        $sql = "INSERT INTO department (name) VALUES
        (:name)";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        return $stmt->execute();
    }
    public function updateDepartment($data, $id)
    {
        $sql = "UPDATE department SET name=:name WHERE $id = :id";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
