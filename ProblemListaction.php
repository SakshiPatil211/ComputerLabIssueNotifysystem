<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');
?>
<div id="flash" class="flash"></div>

<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

 

<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "ProblemListvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{

				$("#form").ajaxForm({
						target: '#show'
					}).submit();
}
else
	{
	alert(html);
	}
}  
});

return false;
});
});
</script>

 


<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;

if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "ProblemListaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>


<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "ProblemListaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM problem WHERE Pid='$id'";
$conn->query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from problem where Pid=".$id;
$fetch= $conn->query($select_table);
while($row = $fetch->fetch_assoc())
{
?>
<div id="cp_contact_form">
<form action="ProblemListaction.php" method="post" name="form" id="form" enctype="multipart/form-data">
<input type="hidden" name="ucontent"  value="<?php echo $row['Pid']; ?>">  
					
				<div class="row">       

                  <div class="col-md-12 margin-bottom-15">
                    <label for="lastName" class="control-label">Subject</label>
                     <?php echo $row['ProblemSubject']; ?>
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Problem</label>
                     <?php echo $row['ProblemDetails']; ?>   
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Lab</label>
                     <?php echo $row['Lab']; ?>   
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">User</label>
                     <?php echo $row['UID']; ?>   
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Post Date</label>
                     <?php echo $row['Posteddate']; ?>   
                  </div>
                </div>				
				
				
				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Resolve Type</label>
                    <select name="ucontent1" class="form-control" id="firstName">
					<option value="Completely">Completely</option>
					<option value="partially">partially</option>
					<option value="No">No</option>
					</select>					
                  </div> 
                </div>

                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Resolve Info/Reason/Remark</label>
                    <textarea name="ucontent2" class="form-control" id="firstName" Placeholder="Problem"> </textarea>     
                  </div> 
                </div>


              <div class="row">
                <div class="col-md-6 margin-bottom-15">
				<label for="firstName" class="control-label"><BR><BR></label>
                  <button type="button" name="submit" class="Updatesubmit_button">Save</button>   <BR><BR>
                </div>
              </div>
</form>
</div>
<?php
}
}
 
?>


<?php
 
if(isset($_POST['ucontent']))
{

$ucontent=$conn->real_escape_string($_POST['ucontent']);
$ucontent1=$conn->real_escape_string($_POST['ucontent1']);
$ucontent2=$conn->real_escape_string($_POST['ucontent2']);
 		
$conn->query("update problem set Resolve='$ucontent1', ResolveDetails='$ucontent2', Resolvedate='$Rdateus' where Pid=$ucontent");

$select_tab = "select * from problem,admin where problem.UID=admin.Aid and Pid=$ucontent";
$fetchdata= $conn->query($select_tab);
$emailval="";	
while($rowdata = $fetchdata->fetch_assoc())
{
$emailval=$rowdata['Aemail'];	
}

$emailmess="hi,Your Problem solve ".$ucontent1.", ".$ucontent2;
$Subject="Problem Solve";
$nameval=$_SESSION['usernameAdmin'];
myCode1($emailmess,$emailval,$nameval,$Subject);


echo "<font style='color:#0000FF;'>Resolve Details Posted</font><br><br><br>";
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">All Problem List Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>PID</b></td>
<td><b>Subject</b></td>
<td><b>Problem</b></td>
<td><b>Date</b></td>
<td><b>Lab</b></td>
<td><b>User</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$UID=$_SESSION['useridAdmin'];

$select_table = "select * from problem,lab_assistant where lab_assistant.Lid=problem.Lab and Assistant='$UID' and ResolveDetails=''";

if($_SESSION['UtypeAdmin']=="Admin")
{
	$select_table = "select * from problem,lab_assistant where lab_assistant.Lid=problem.Lab and ResolveDetails=''";
}

$fetch= $conn->query($select_table);
				
while($row = $fetch->fetch_assoc())
{
?>
				 	
<TR>
<TD><?php echo $row['Pid']; ?></TD>
<TD><?php echo $row['ProblemSubject']; ?></TD>
<TD><?php echo $row['ProblemDetails']; ?></TD>
<TD><?php echo $row['Posteddate']; ?></TD>
<TD><?php echo $row['Lab']; ?></TD>
<TD><?php echo $row['UID']; ?></TD>

<TD><a href="#" class="ABCD" id="<?php echo $row['Pid']; ?>">[ X ]</a>
<a href="#" class="Edit" id="<?php echo $row['Pid']; ?>">[ Edit ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              	
</div>