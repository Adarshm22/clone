<head>
    <style>
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login {
            background-color:rgb(255, 208, 215);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .login::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }
        .login .col-sm-12.col-md-4 {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .login img {
            width: 50px;
            height: 50px;
        }
        .login h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1.5rem;
        }
        .form-floating {
            position: relative;
            margin-bottom: 1rem;
        }
        .form-floating label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            transition: all 0.3s;
            color: #999;
            font-size: 0.9rem;
        }
        .form-floating input {
            border-radius: 20px;
            padding: 1rem;
        }
        .form-floating input:focus ~ label,
        .form-floating input:not(:placeholder-shown) ~ label {
            top: 0;
            left: 10px;
            font-size: 0.75rem;
            color: #555;
        }
        .btn-primary {
            background: linear-gradient(135deg, #ff69b4, #ff1493);
            border-color: #e47399;
            border-radius: 20px;
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #ff1493, #c71585);
            border-color: #d26287;
        }
        .login a {
            color: #e47399;
        }
        .login a:hover {
            color: #d26287;
        }
    </style>
</head>
<body>
    <div class="login">
        <div class="col-sm-12 col-md-4">
            <form method="post" action="assets/php/actions.php?login">
                <div class="d-flex justify-content-center">
                    <img class="mb-4" src="assets/images/clone.png" alt="clone logo">
                </div>
                <h1 class="h5 mb-3 fw-normal">Please Sign In</h1>
                <div class="form-floating">
                    <input type="text" name="username_email" value="<?=showFormData('username_email')?>" class="form-control" placeholder="username/email" required>
                    <label for="username_email">username/email</label>
                </div>
                <?=showError('username_email')?>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">password</label>
                </div>
                <?=showError('password')?>
                <?=showError('checkuser')?>
                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Sign in</button>
                    <a href="?signup" class="text-decoration-none">Create New Account</a>
                </div>
                <!-- <a href="?forgotpassword&newfp" class="text-decoration-none">Forgot password?</a> -->
            </form>
        </div>
    </div>
