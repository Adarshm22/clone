    <style>
        body {
            background-color: rgb(255, 208, 215);
        }
        .login {
            background-color: rgb(255, 208, 215);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            font-weight: 700;
        }
        .form-floating label {
            color: #6c757d;
        }
        .form-control {
            border-radius: 20px;
        }
        .form-check-input {
            margin-top: 0.3rem;
        }
        .form-check-label {
            margin-top: 0.3rem;
            margin-left: 0.3rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, #ff69b4, #ff1493);
            border: none;
            border-color: #e47399;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #ff1493, #c71585);
            border-color: #d26287;
        }
        .text-decoration-none {
            color: #ff69b4; /* Set the color of the link */
        }
        .text-decoration-none:hover {
            text-decoration: underline;
            color: #c71585; /* Change the color of the link on hover */
        }
    </style>

<div class="login">
    <div class="form-container col-lg-4 col-md-8 col-sm-12">
        <form method="post" action="assets/php/actions.php?signup">
            <div class="d-flex justify-content-center">
                <img class="mb-4" src="assets/images/clone.png" alt="" height="45">
            </div>
            <h1 class="h5 mb-3 fw-normal text-center">Create new account</h1>
            <div class="d-flex gap-3">
                <div class="form-floating mt-1 col-6">
                    <input type="text" name="first_name" value="<?=showFormData('first_name')?>" class="form-control" placeholder="First Name">
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mt-1 col-6">
                    <input type="text" name="last_name" value="<?=showFormData('last_name')?>" class="form-control" placeholder="Last Name">
                    <label for="floatingInput">Last Name</label>
                </div>
            </div>
            <?=showError('first_name')?>
            <?=showError('last_name')?>

            <div class="d-flex gap-3 my-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1" <?=isset($_SESSION['formdata'])?'':'checked'?><?=showFormData('gender')==1?'checked':''?>>
                    <label class="form-check-label" for="exampleRadios1">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="2" <?=showFormData('gender')==2?'checked':''?>>
                    <label class="form-check-label" for="exampleRadios3">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="0" <?=showFormData('gender')==0?'checked':''?>>
                    <label class="form-check-label" for="exampleRadios2">Other</label>
                </div>
            </div>

            <div class="form-floating mt-1">
                <input type="email" name="email" value="<?=showFormData('email')?>" class="form-control" placeholder="Email">
                <label for="floatingInput">Email</label>
            </div>
            <?=showError('email')?>

            <div class="form-floating mt-1">
                <input type="text" name="username" value="<?=showFormData('username')?>" class="form-control" placeholder="Username">
                <label for="floatingInput">Username</label>
            </div>
            <?=showError('username')?>

            <div class="form-floating mt-1">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <?=showError('password')?>

            <div class="mt-3 d-flex justify-content-between align-items-center">
                <button class="btn btn-primary" type="submit">Sign Up</button>
                <a href="?login" class="text-decoration-none">Already have an account?</a>
            </div>
        </form>
    </div>
</div>
