<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');

if(isset($_POST["signin"]))
{

$result=$conn->query("select * From admin where Aemail='".$_POST["username"]."' and Apwd='".$_POST["password"]."'");

while($row = $result->fetch_assoc())
{	
$_SESSION['useridAdmin']= $row['Aid'];
$_SESSION['usernameAdmin']= $row['Aname'];
$_SESSION['UtypeAdmin']= $row['Admintyp'];
	}
}

if(!isset($_SESSION['useridAdmin']) and !isset($_SESSION['usernameAdmin']))
{
		header("Location:index.php?error=fail");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
 
 
    </style>
	
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style type="text/css">
    .bs-example {
      margin: 0px;

    }
    .bg-dark {
    background-color: #212529!important;
}
    .navbar-brand {
      font-size: 20px;
      font-family: sans-serif;

    }
  </style>
  
    <style media="screen">
    a:link {
      text-decoration: none;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: "Gill Sans", sans-serif;;
    }

    header {
      position: fixed;
      background: #22242A;
      padding: 20px;
      width: 100%;
      z-index: 1;
    }

    .left_area h3 {
      color: #fff;
      margin: 0px;
      text-transform: uppercase;
      font-size: 22px;
      font-weight: 900;
    }

    .left_area span {
      color: #19B3D3;
    }

    .logout_btn {
      padding: 5px;
      background: #19B3D3;
      text-decoration: none;
      float: right;
      margin-top: -30px;
      margin-right: 40px;
      border-radius: 2px;
      font-size: 15px;
      font-weight: 600;
      color: #fff;
      transition: 0.5s;

    }

    .logout_btn:hover {
      background: #0B87A6;
    }

    .sidebar {
      background: #2f323a;
      margin-top: 50px;
      padding-top: 30px;
      position: fixed;
      left: 0;
      width: 250px;
      height: 100%;
      transition: 0.5s;
      transition-property: left;
    }

    .sidebar .profile_image {
      width: 100px;
      height: 100px;
      border-radius: 100px;
      margin-bottom: 10px;
    }

    .sidebar h4 {
      color: #ccc;
      margin-top: 0;
      
    }

    .sidebar a {
      color: #fff;
      display: block;
      width: 100%;
      line-height: 60px;
      text-decoration: none;
      padding-left: 40px;
      box-sizing: border-box;
      transition: 0.5s;

    }

    .sidebar a:hover {
      background: #19B3D3;
    }

    .sidebar i {
      padding-right: 10px;
    }

    label #sidebar_btn {
      z-index: 1;
      color: #fff;
      position: fixed;
      cursor: pointer;
      left: 300px;
      font-size: 20px;
      margin: 5px 0;
      transition: 0.5s;
      transition-property: color;
    }

    label #sidebar_btn:hover {
      color: #19B3D3;
    }

    #check:checked~.sidebar {
      left: -190px;
    }

    #check:checked~.sidebar a span {
      display: none;
    }

    #check:checked~.sidebar a {
      font-size: 20px;
      margin-left: 170px;
      width: 80px;
    }

    .content {
      margin-left: 270px;
      background: url(background.png) no-repeat;
      background-position: center;
      background-size: cover;
      height: 100vh;
      transition: 0.5s;
    }

    #check:checked~.content {
      margin-left: 60px;
    }

    #check {
      display: none;
    }
  </style>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">


  </head>
<body>
<?php
include("Header.php");
?>
    <div class="template-page-wrapper">

<?php
include("Menubar.php");
?>

<div class="templatemo-content-wrapper">

<div class="content">
<br><br><br><br>  
<?php

if(!isset($_GET['page']) or $_GET['page']=='1' or $_GET['page']=='0')
{
include('home.php');
}
elseif($_GET['page']=='2')
{
include('Problem_Details.php');
}
elseif($_GET['page']=='3')
{
include('ProblemList_Details.php');
}
elseif($_GET['page']=='4')
{
include('ProblemSolution_Details.php');
}
elseif($_GET['page']=='5')
{
include('ProblemSolutionno_Details.php');
}
elseif($_GET['page']=='6')
{
include('Lab_Details.php');
}
elseif($_GET['page']=='7')
{
include('Admin_Details.php');
}
else
{
	include('home.php');
}
?>
		
</div>
       

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
</body>
</html>