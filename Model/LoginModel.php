<?php

class LoginModel extends BaseModel
{

    public function checkLogin($data)
    {
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":password", $data['password']);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
}
