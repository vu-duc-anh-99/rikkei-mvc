<?php 
class RoleModel extends BaseModel
{
    public function getListRoles()
    {
        $data = parent::getList("role");
        return $data;
    }
    public function getRoleById($id)
    {
        $data = parent::getDataById($id, "role");
        return $data;
    }
    public function getRoleByName($name)
    {
        $data = parent::getDataByName($name, "role");
        return $data;
    }
    // public function insertRole($data)
    // {
    //     $data['name'] = $_POST['name'];
    //     $sql = "INSERT INTO role (name) VALUES
    //     (:name)";
    //     $stmt = parent::connect()->prepare($sql);
    //     $stmt->bindParam(':name', $data['name']);
    //     return $stmt->execute();
    // }
    // public function updateRole($data, $id)
    // {
    //     $sql = "UPDATE role SET name=:name WHERE $id = :id";
    //     $stmt = parent::connect()->prepare($sql);
    //     $stmt->bindParam(':name', $data['name']);
    //     $stmt->bindParam(':id', $id);
    //     return $stmt->execute();
    // }
}
