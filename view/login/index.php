<?php require("header.php");
?>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>Welcome</b> 
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
        <!-- start display error message -->
        <?php
        $error_code = @$_GET['error']; 
        if($error_code==ERROR_CODE_LOGIN){
            display_error('alert-danger',ERROR_MSG_LOGIN);      
        }elseif ($error_code==ERROR_CODE_BLOCKED) {
            display_error('alert-danger',ERROR_MSG_BLOCKED);
        } 
        ?>
        <!-- end display error message -->

        <form action="index.php?act=login" method="post">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="addbtn" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="#">I forgot my password</a><br>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?=APP_URL?>/resources/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=APP_URL?>/resources/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?=APP_URL?>/resources/plugins/iCheck/icheck.min.js"></script>
<script>
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});
</script>
</body>
</html>
