<!-- <div>
    <form action="" method="get">
        <input type="hidden" name = "controller" value="sinh-vien">
        <input type="hidden" name = "action" value="search">
        <td><input type="text" name="keyword" placeholder = "Nhập tên"></td>
        <td><input type="submit" value = "Tìm kiếm"></td>
    </form>
</div> -->


<div class="container">
    <?php include "header/header.php"; ?>
    <a href="index.php?page=add-user">Thêm nhân viên</a>
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Ảnh</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Chức vụ</th>
                <th>Phòng ban</th>
                <th>Ngày đăng ký</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['phone'] ?></td>
                    <td><img src="upload/<?php echo $value['photo'] ?>" alt="Không có ảnh" width="150px" height="150px" style="object-fit: cover;"></td>
                    <td><?php echo $value['email'] ?></td>
                    <td><?php echo $value['address'] ?></td>
                    <td><?php echo $value['role_name'] ?></td>
                    <td><?php echo $value['department_name'] ?></td>
                    <td><?php echo $value['created_at'] ?></td>
                    <?php
                    if ($_SESSION['role_id'] == 1) {
                    ?>
                        <td>
                            <a href="index.php?page=edit-user&id=<?php echo $value['id']; ?>">Update</a>
                            <a href="index.php?page=delete-user&id=<?php echo $value['id']; ?>" onclick="if (!(confirm('Bạn có chắc muốn xóa nhân viên này?'))) return false">Delete
                            </a>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>