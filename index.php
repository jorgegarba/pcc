<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="navbar-toggler hidden-sm-up pull-sm-right" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        &#9776;
                    </button>
                    <a class="navbar-brand" href="index.html">Tecsup</a>
                </div>

                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-toggleable-sm navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav list-group">
                        <li class="list-group-item">
                            <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>

                <div id="page-wrapper">

                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-xl-6 text-xs-center">
                                

                            </div>
                        </div>
                        <!-- /.row -->
                <div class="row">
                    <div class="col-xl-3 text-xs-center">
                        <!-- LADO IZQUIERDO -->
                    </div>
                    <div class="col-xl-6 text-xs-center">
                        <div class="card card-default">
                        <h1>Iniciar Sesión</h1>
                            <div class="card-block">
                                <form role="form" method="POST" action="validar.php">

                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Login:</span>
                                        <input type="text" class="form-control" placeholder="Login" name="log_per">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Password:</span>
                                        <input type="password" class="form-control" placeholder="Password" name="pass_per">
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Inciar Sesión</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 text-xs-center">
                        <!-- LADO DERECHO -->
                    </div>
                </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

        </body>

        </html>
