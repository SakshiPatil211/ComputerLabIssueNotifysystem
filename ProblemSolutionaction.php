<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');
?>
<div id="flash" class="flash"></div>

<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>


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
url: "ProblemSolutionaction.php",
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
url: "ProblemSolutionaction.php",
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


<div class="table-responsive">
<h4 class="margin-bottom-15">All Problem Resolve List</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>PID</b></td>
<td><b>Subject</b></td>
<td><b>Problem</b></td>
<td><b>Date</b></td>
<td><b>Lab</b></td>
<td><b>User</b></td>
<td><b>Resolve</b></td>
<td><b>Resolve Details</b></td>
<td><b>Resolvedate</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$UID=$_SESSION['useridAdmin'];
$select_table = "select * from problem,lab_assistant where lab_assistant.Lid=problem.Lab and Assistant='$UID' and ResolveDetails!='' and Resolve='Completely'";

if($_SESSION['UtypeAdmin']=="Admin")
{
$select_table = "select * from problem,lab_assistant where lab_assistant.Lid=problem.Lab and ResolveDetails!='' and Resolve='Completely'";
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
<TD><?php echo $row['Resolve']; ?></TD>
<TD><?php echo $row['ResolveDetails']; ?></TD>
<TD><?php echo $row['Resolvedate']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['Pid']; ?>">[ X ]</a></TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              	
</div>