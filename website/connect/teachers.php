<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>6th form app</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

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
                <li >
                    <a href="index.php">
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-brand">
                    <a href="teachers.php">Teachers</a>
                </li>
                <li>
                    <a href="students.php">Students</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>

                 <li>
                    <a href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Teachers</h1>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
						<p>Last update: <i>unavailable</i></p>
						<div id="teachers"></div>
						<form action="commands/remoteAT.php?type=delAll" method="get">
							<input type="hidden" name="type" value="delAll">
							<input type="submit" value="Remove all"/>
						</form>
						<form action="commands/remoteAT.php?type=del" method="get"><p>Teacher: <input type="text" name="teacher"/>
						<input type="hidden" name="type" value="del">
							<input type="submit" value="Remove"/>
						</form>
						<br><br>
						<form action="commands/addTeacher.php" method="post">
							<p>Teacher:
						<input type="text" name="teacher"/></p><p>
						Subject:
						<input type="text" name="subject"/></p><p>Comment:
						<input type="text" name="comment"/></p>
						<input type="submit" value="Add"/>
						</form>


                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<script>

$("#teachers").load("commands/getTeachersOut.php");

</script>

</body>

</html>
