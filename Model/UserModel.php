<?php

class UserModel extends BaseModel
{
    public function getListUser($role_id, $department_id)
    {
        if ($role_id == 1) {
            $sql = "SELECT user.*, r.name as role_name, d.name as department_name FROM user JOIN roles as r on user.role_id = r.id JOIN
                department as d ON user.department_id = d.id";
        } else {
            $sql = "SELECT user.*, r.name as role_name, d.name as department_name FROM user JOIN roles as r on user.role_id = r.id JOIN
                department as d ON user.department_id = d.id WHERE user.department_id = $department_id";
        }
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    public function getUserById($id)
    {
        $data = parent::getDataById($id, "user");
        return $data;
    }
    public function getUserByName($name)
    {
        $data = parent::getDataByName($name, "user");
        return $data;
    }
    public function insertUser($data)
    {
        $sql = "INSERT INTO user (name,phone,photo,email,password,address,department_id,role_id) VALUES
        (:name, :phone, :photo, :email, :password, :address, :department_id, :role_id)";
        $stmt = parent::connect()->prepare($sql);
        if (parent::uploadImage()) {
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':phone', $data['phone']);
            $stmt->bindParam(':photo', $data['photo']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':password', $data['password']);
            $stmt->bindParam(':address', $data['address']);
            $stmt->bindParam(':department_id', $data['department_id']);
            $stmt->bindParam(':role_id', $data['role_id']);
        }
        return $stmt->execute();
    }
    public function updateUser($data, $id)
    {
        $sql = "UPDATE user SET name=:name, phone=:phone, photo=:photo, email=:email, address=:address,
        department_id=:department_id, role_id=:role_id WHERE id=:id";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':photo', $data['photo']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':department_id', $data['department_id']);
        $stmt->bindParam(':role_id', $data['role_id']);
        $stmt->bindParam(':id', $id);
        if (!empty($_FILES['photo']["name"])) {
            if (parent::uploadImage()) {
                return $stmt->execute();
            }
        } else {
            return $stmt->execute();
        }
    }
    public function deleteUser($id)
    {
        parent::deleteById($id, 'user');
    }
}
