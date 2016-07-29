<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>6th form app</title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>


    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/simple-sidebar.css" rel="stylesheet">


    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="index.php">
                        Dashboard
                    </a>
                </li>
                <li >
                    <a href="teachers.php">Teachers</a>
                </li>
                <li class="sidebar-brand">
                    <a href="#">Students</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Students</h1>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <p>Current students that are out</p>
                        <div id="students"></div>


                      <h3>Sign student out</h3>
                      <form action="commands/students.php?command=out" method="post">
                      <p>Student name: <br><input name="student" id="studentsName"/></p>
                      <p>Reason: <input type="text" name="reason"/></p>
                      <input type="submit" value="Sign out"/>
                      </form>

                      <h3>Sign student in</h3>
                      <form action="commands/students.php?command=in" method="post">
                      <p>Student name ID: <input type="text" name="clientId"/></p>

                      <input type="submit" value="Sign in"/>
                      </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
<!--    <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

    <script>





    var users = "";


    $.ajax({
            'dataType': 'html',
            'url': "commands/listNames.php",
            'success': function (data) {
                users = data.split(",");
                $( "#studentsName" ).autocomplete({
                      source: users
                    });
            }
          });



    $("#students").load("commands/getStudentsOut.php");
    </script>

</body>

</html>
