<div class="content">
    <a href="index.php?page=list-user">Danh sách nhân viên</a>
    <h3>Thêm mới nhân viên</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Tên</label>
        <input type="text" name="name" value="<?php echo $dataUser['name'] ?>">
        <label for="">Ảnh</label>
        <input type="hidden" name="old_photo" value="<?php echo $dataUser['photo'] ?>">
        <input type="file" name="photo">
        <label for="">Số điện thoại</label>
        <input type="text" name="phone" value="<?php echo $dataUser['phone'] ?>">
        <label for="">Email</label>
        <input type="text" name="email" value="<?php echo $dataUser['email'] ?>">
        <label for="">Địa chỉ</label>
        <input type="address" name="address" value="<?php echo $dataUser['address'] ?>">
        <label for="">Phân quyền</label>
        <select name="role_id">
            <option value="1">Admin</option>
            <option value="2">Member</option>
        </select>
        <label for="">Chọn phòng ban</label>
        <select name="department_id">
            <option value="1">D2</option>
            <option value="2">D6</option>
            <option value="1">D8</option>
            <option value="2">D9</option>
        </select>
        <input type="submit" value="Cập nhật">
    </form>
</div>