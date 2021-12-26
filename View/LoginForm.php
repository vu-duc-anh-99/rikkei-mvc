<div class="sign__up-form">
    <h1 class="title">Đăng nhập</h1>
    <form action="" method="post">
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <input type="password" name="password" placeholder="Mật khẩu" autocomplete="off">
        <button type="submit">Đăng nhập</button>
        <p class="message">
            <?php
            if (isset($_SESSION['login_error'])) {
                echo $_SESSION['login_error'];
                unset($_SESSION['login_error']);
            }
            ?>
        </p>

    </form>
</div>