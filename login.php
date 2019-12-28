<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <center><h2 class="panel-title"><b>ZELLO STORE</b></h2></center>
                        <center><h4 class="panel-title"><i>Pusat Accesories Computer & Handphone</i></h4></center>                        <hr>
                        <h3 class="panel-title">Silahkan Login Terlebih Dahulu</h3>
                    </div>
                    <div class="panel-body">
                        <form action="log.php?op=in" method="post">
                            <fieldset>
                                <div class="form-group">
                                   <center> <input class="form-control" placeholder="Username" name="username" type="text" autofocus style="width:70%"></center>
                                </div>
                                <div class="form-group">
                                   <center> <input class="form-control" placeholder="Password" name="password" type="password" style="width:70%"></center>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                              <center>  <input type="submit" class="btn btn-info" value="Login" name="login" style="width:35%"> <input type="reset" class="btn btn-warning" value="Reset" name="reset" style="width:35%"></center>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/js/sb-admin-2.js"></script>

</body>

</html>
