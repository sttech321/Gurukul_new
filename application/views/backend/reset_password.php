<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet">
</head>

<body>

<section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
        <br><br><br>
        <div class="white-box align-center-div">
            <div>
            <h4 class="box-title m-b-20" align="center">
                <img src="<?php echo base_url() ?>uploads/gurukul_logo.svg" class="" width="150" height="100" />
            </h4>
            <h5 align="center"><a href=""
                    style="color:black !important; font-size:16px;!important"><?php //echo $system_name;?></a></h5>

            <br><br>
            <?php echo form_open(base_url().'auth/update_password', array('class' => 'form-horizontal form-material', 'id' => 'loginform', 'enctype'=>'multipart/form-data'));?>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <input class="form-control" type="password" name="new_password" required=""
                            placeholder="Password" style="width:100%">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="confirm_password" required=""
                            placeholder="Confirm Password'" style="width:100%">
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <a href="<?php echo base_url(); ?>" class="mb-5" >
                            <button class="btn btn-info btn-rounded btn-sm text-uppercase" type="button"
                                style="color:white; margin-bottom:8px;">
                                <i class="fa fa-mail-reply-all"></i>&nbsp;Back to Login
                            </button>
                        </a>
                        <button
                            class="btn btn-info btn-rounded btn-sm btn-block text-uppercase waves-effect waves-light"
                            type="submit" style="width:100%; color:white">
                            <?php echo 'update password';?>
                        </button>
                        <div align="center"><img id="install_progress"
                                src="<?php echo base_url() ?>assets/images/preloader.gif"
                                style="margin-left: 20px; display: none" /></div>

                    </div>
                </div>
             </div>
                <?php echo form_close();?>
        </div>
    </div>

</section>
</body>

</html>


