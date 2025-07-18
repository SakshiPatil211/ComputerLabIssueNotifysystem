<!--sidebar start-->
  <div class="sidebar">
    <center>

<?php 
if($_SESSION['UtypeAdmin']=="Admin")
{
?>
      <img src="admin.png" class="profile_image" alt="">

<?php 	
}
else
{
?>
      <img src="teacher.png" class="profile_image" alt="">

<?php 	
}
?>

      <h4><?php echo $_SESSION['usernameAdmin']; ?></h4>
      <h6 style="color: rgb(255, 255, 255);">( <?php echo $_SESSION['UtypeAdmin']; ?> )</h6>

    </center>

    <a href="Main.php?page=1">
	<i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
	</a>
	
<?php 
if($_SESSION['UtypeAdmin']=="Admin" or $_SESSION['UtypeAdmin']=="Teacher")
{
?>
    <a href="Main.php?page=2">
	<i class="fas fa-question-circle"></i><span>Post Problems</span>
	</a>
<?php 
}
?>

<?php 
if($_SESSION['UtypeAdmin']=="LabAssistant")
{
?>
	<a href="Main.php?page=3">
	<i class="fas fa-book"></i><span>Lab Problems</span>
	</a>
<?php 
}
?>

<?php 
if($_SESSION['UtypeAdmin']=="Admin" or $_SESSION['UtypeAdmin']=="LabAssistant")
{
?>
	<a href="Main.php?page=4">
	<i class="fas fa-book"></i><span>Problems Solution</span>
	</a>
	
	<a href="Main.php?page=5">
	<i class="fas fa-book"></i><span>Lab Pending</span>
	</a>
<?php 
}
?>


<?php 	
if($_SESSION['UtypeAdmin']=="Admin")
{
?>
	<a href="Main.php?page=6">
	<i class="fas fa-book"></i><span>Lab</span>
	</a>	
	
	<a href="Main.php?page=7">
	<i class="fas fa-book"></i><span>Users</span>
	</a>

<?php 	
}
?>

  </div>
  <!--sidebar end-->
