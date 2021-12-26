<?php

class BaseModel extends DBConnect
{
    public function getList($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function getDataById($id, $table)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function getDataByName($name, $table)
    {
        $sql = "SELECT * FROM $table WHERE name LIKE :name";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bindParam(':name', "%" . $name . "%");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    public function deleteById($id, $table)
    {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = parent::connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
    public function uploadImage()
    {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['photo']["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['photo']["tmp_name"]);
        if ($check == false) {
            $uploadOk = 0;
        } else if (file_exists($target_file)) {
            $_SESSION['message'] = "File đã tồn tại";
            $uploadOk = 0;
        } else if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif"
        ) {
            $uploadOk = 0;
            $_SESSION['message'] = "Sai định dạng ảnh";
        }
        if ($uploadOk == 1) {
            return move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
        } 
    }
}
