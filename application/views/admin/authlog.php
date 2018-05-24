<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
         <title>Pro-Bussiness</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <!-- Font Awesome -->
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
	
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
	
<form action="<?php echo base_url(); ?>admin/act_login" method="post">
        <div class="form-box" id="login-box">
		<img src="<?php echo base_url(); ?>assets/css/img/logo-POS.png">
            <form action="admin" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" autofocus />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>   
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-orange btn-block">Sign me in</button>  
                    
                </div>
            </form>

           
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>   

    </body>
</html>