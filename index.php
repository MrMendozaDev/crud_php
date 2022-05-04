<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD VUEJS 2.0</title>
</head>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vee-validate/2.0.0-beta.25/vee-validate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="/app/app.js?v=0.01"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="/css/login.css">

<body>
    <div id="app_login">
        <?php include('modals/modal_login.php') ?>
        <nav class="navbar navar_login navbar-light">
            <h3 class="title_login">Login</h3>
        </nav>
        <div class="class">
            <div class="row">
                <div class="center">
                    <div class="card col-md-12">
                        <div style="text-align: center;">
                            <img src="../media/img/avatarUser.png" alt="avatar" style="width: 100px;">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="float-left">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" id="email_login" class="form-control" v-model="login_user.email_address" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress" class="float-left">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input :type="passwordType" id="password_login" class="form-control" v-model="login_user.email_password"  v-on:change="loginUser()" placeholder="Password">
                                <button @click="switchVisibility" class="btn btn-light"><i class="fas fa-eye"></i></button>
                            </div>             
                        </div>
                        <div class="row" style="text-align: end;">
                            <div class="col-md-12">
                                <button class="btn btn-link float-right border-0" @click="openModelCreateUser">  <b > Create account</b></button>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-link float-right border-0" @click="openModelDeleteAccount">  <b > Delete account</b></button>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-link float-right border-0" data-toggle="modal" @click="openModelUpdatePassword">  <b > Forgot your password?</b></button>
                            </div>
                            <div class="col-md-12">
                                <button @click="loginUser" class="btn btn-sm btn-primary mb-1" title="Sign in" ><i class="fas fa-sign-in-alt"></i> Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


