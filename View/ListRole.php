<div>
    <h3>Danh sách quyền</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['created_at'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>