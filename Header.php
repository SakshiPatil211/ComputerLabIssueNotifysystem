  <div class="bs-example">
    <nav class="navbar navbar-expand-md  navbar-dark fixed-top" style="background-color: #000000;">
    <a style="color: #ffffff;text-decoration: none; " href="index.php"><font face = "Comic sans MS" size =" 5">Lab Issue Management</font><br /></a>  
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">

<?php
if(!isset($_SESSION['useridAdmin']) and !isset($_SESSION['usernameAdmin']) and !isset($_SESSION['useridStudent']) and !isset($_SESSION['usernameStudent']))
{
?>

        <div class="navbar-nav">
          <a style="padding-left: 30px;" href="index.php" class="nav-item nav-link active">Home</a>
          <a href="index.php?page=2" class="nav-item nav-link">Teacher</a>
          <a href="index.php?page=3" class="nav-item nav-link">Lab</a>
          <a href="index.php?page=4" class="nav-item nav-link">Admin</a>
        </div>

        <div class="navbar-nav">
          <a href="index.php?page=7" class="nav-item nav-link">About Us</a>
          <a href="index.php?page=8" class="nav-item nav-link">Contact Us</a>
        </div>

<?php
}
else
{
?>
<div class="navbar-nav">
</div>
<div class="navbar-nav">
<a href="index.php?Logout=Logout" class="logout_btn">Logout</a>
</div>
<?php
}
?>
      </div>
    </nav>
  </div>