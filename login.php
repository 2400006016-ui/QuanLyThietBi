<?php
include 'xuly_dangnhap.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - Quản Lý Thiết Bị</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #eef0f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-card {
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .login-header {
            background: #1a3c6e;
            color: white;
            padding: 24px 30px;
            text-align: center;
        }

        .login-header h2 {
            font-size: 18px;
            font-weight: 600;
        }

        .login-header p {
            font-size: 13px;
            opacity: 0.7;
            margin-top: 5px;
        }

        .login-body {
            padding: 30px;
        }

        .error-msg {
            background: #fff2f2;
            border-left: 3px solid #e53e3e;
            color: #c53030;
            padding: 10px 14px;
            font-size: 13px;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            border-color: #1a3c6e;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background: #1a3c6e;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 4px;
        }

        .btn-login:hover {
            background: #15305a;
        }

        .password-wrap {
            position: relative;
        }

        .password-wrap input {
            padding-right: 40px;
        }

        .toggle-pass {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #888;
            font-size: 16px;
            padding: 0;
            line-height: 1;
        }

        .toggle-pass:hover {
            color: #444;
        }

        .login-footer {
            text-align: center;
            padding: 12px 30px 18px;
            font-size: 12px;
            color: #bbb;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-header">
            <h2>Quản Lý Mượn Trả Thiết Bị</h2>
            <p>Đăng nhập để tiếp tục</p>
        </div>

        <div class="login-body">
            <?php if ($thongbao != "") { ?>
                <div class="error-msg"><?php echo $thongbao; ?></div>
            <?php } ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Tài khoản</label>
                    <input type="text" id="username" name="username" placeholder="Nhập tài khoản" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <div class="password-wrap">
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                        <button type="button" class="toggle-pass" onclick="togglePassword()">👁</button>
                    </div>
                </div>
                <button type="submit" class="btn-login">Đăng Nhập</button>
            </form>
        </div>

        <div class="login-footer">Hệ thống quản lý nội bộ</div>

    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
</body>
</html>