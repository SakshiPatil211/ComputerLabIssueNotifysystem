<!--sidebar start-->
  <div class="sidebar">
    <center>


      <img src="student.png" class="profile_image" alt="">


      <h4><?php echo $_SESSION['usernameStudent']; ?></h4>
      <h6 style="color: rgb(255, 255, 255);">( Student )</h6>

    </center>

    <a href="Main.php?page=1">
	<i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
	</a>
	
	<a href="MainStudent.php?page=2">
	<i class="fas fa-book"></i><span>Student Marks</span>
	</a>

  </div>
  <!--sidebar end-->
