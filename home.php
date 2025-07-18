        <div class="templatemo-content">

          <h1>Lab Issue Management</h1>
		<hr>
<div class="col-sm-12">
</br>
          <p>

<?php 
if($_SESSION['UtypeAdmin']=="Admin" or $_SESSION['UtypeAdmin']=="Teacher")
{
?>
            <a href="Main.php?page=2" class="btn btn-sq btn-primary" style="width:250px;background-color: #377D22;"><br>
                Lab Problems<br>Post & Manage Problems<br><br>
            </a> 

<?php 
}
?>

<?php 
if($_SESSION['UtypeAdmin']=="LabAssistant")
{
?>
            <a href="Main.php?page=3" class="btn btn-sq btn-primary" style="width:250px;background-color: #377D22;"><br>
                Lab Problems<br>Post & Manage Problems<br><br>
            </a> 
<?php 
}
?>

<?php 
if($_SESSION['UtypeAdmin']=="Admin" or $_SESSION['UtypeAdmin']=="LabAssistant")
{
?>

			<a href="Main.php?page=4" class="btn btn-sq btn-primary" style="width:250px;background-color: #8E403A;"><br>
           Problems Solution <br>View Problems Solutions<br><br>
            </a>
			
			<a href="Main.php?page=5" class="btn btn-sq btn-primary" style="width:250px;background-color: #EB3324;"><br>
			Problems Pending<br>View Problems and Pendings<br><br>
            </a>  
			
<?php 
}
?>

<?php 	
if($_SESSION['UtypeAdmin']=="Admin")
{
?>

            <a href="Main.php?page=6" class="btn btn-sq btn-primary" style="width:250px;background-color: #EA3680;"><br>
              Lab <br>Add,Edit and Manage Lab<br><br>
            </a>
			<br><br>
            <a href="Main.php?page=7" class="btn btn-sq btn-primary" style="width:250px;background-color: #732BF5;"><br>
              Users <br> Add,Edit and Manage Users<br><br>
            </a>	
<?php 	
}
?>
			
          </p>
        </div>
      </div>