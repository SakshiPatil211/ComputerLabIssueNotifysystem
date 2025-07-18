<?php
include('db.php');
?>
<div id="flash" class="flash"></div>
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Labvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
//document.getElementById("show").innerHTML="";

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
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();;

$.ajax({
type: "POST",
url: "Labvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
//document.getElementById("show").innerHTML="";
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
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Labaction.php",
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
url: "Labaction.php",
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
url: "Labaction.php",
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
$delete = "DELETE FROM lab_assistant WHERE Lid='$id'";
$conn->query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from lab_assistant where Lid=".$id;
$fetch= $conn->query($select_table);
while($row = $fetch->fetch_assoc())
{
?>
<div id="cp_contact_form">
<form action="Labaction.php" method="post" name="form" id="form" enctype="multipart/form-data">
<input type="hidden" name="ucontent"  value="<?php echo $row['Lid']; ?>"  >


				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Lab Name</label>
                   <input type="text" name="ucontent1"  value="<?php echo $row['LabName']; ?>" class="form-control" id="lastName" Placeholder="Lab Name"> 
                  </div>
                </div>


				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Lab assistant</label>
 <select name="ucontent2" class="form-control" id="firstName">
 

<?php
$select_table1="Select * from admin where Admintyp='LabAssistant'";
$fetch1= $conn->query($select_table1);
while($row1 = $fetch1->fetch_assoc())
{
echo '<option value="'.$row1['Aid'].'">'.$row1['Aname'].'</option>';
}
?>

 
					</select>
                  </div>
                </div>


              <div class="row">
                <div class="col-md-6 margin-bottom-15">
				<label for="firstName" class="control-label"><BR><BR></label>
                  <button type="button" name="submit" class="Updatesubmit_button">Update</button>   <BR><BR>
                </div>
              </div>
</form>
</div>
<?php
}
}
else
{
?>
<div id="cp_contact_form">
<form  action="Labaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

					<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Subject</label>
                   <input type="text" name="content" class="form-control" id="lastName" Placeholder="Subject Name"> 
                  </div>
                </div>


				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Lab assistant</label>
                    <select name="content1" class="form-control" id="firstName">

<?php
$select_table1="Select * from admin where Admintyp='LabAssistant'";
$fetch1= $conn->query($select_table1);
while($row1 = $fetch1->fetch_assoc())
{
echo '<option value="'.$row1['Aid'].'">'.$row1['Aname'].'</option>';
}
?>

					</select>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-6 margin-bottom-15">
				  <label for="firstName" class="control-label"><BR><BR></label>
                  <button type="button" name="submit" class="submit_button">Save</button>   <BR><BR>
                </div>
			  </div>

</form>
</div>
<?php
}
?>


<?php
if(isset($_POST['content']))
{
$content=$conn->real_escape_string($_POST['content']);
$content1=$conn->real_escape_string($_POST['content1']);	

$conn->query("INSERT INTO lab_assistant(LabName,Assistant) VALUES('$content','$content1')");
echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}
if(isset($_POST['ucontent']))
{

$ucontent=$conn->real_escape_string($_POST['ucontent']);
$ucontent1=$conn->real_escape_string($_POST['ucontent1']);
$ucontent2=$conn->real_escape_string($_POST['ucontent2']);

$conn->query("update lab_assistant set LabName='$ucontent1',Assistant='$ucontent2' where Lid=$ucontent");
echo "<font style='color:#0000FF;'>Record Update</font><br><br><br>";
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b> ID</b></td>
<td><b> Lab</b></td>
<td><b> Assistant</b></td>
<td><b> Mobile</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$select_table = "select * from lab_assistant,Admin where lab_assistant.Assistant=Admin.Aid";
$fetch= $conn->query($select_table);

while($row = $fetch->fetch_assoc())
{
?>
<TR>
<TD><?php echo $row['Lid']; ?></TD>
<TD><?php echo $row['LabName']; ?></TD>
<TD><?php echo $row['Aname']; ?></TD>
<TD><?php echo $row['Amob']; ?></TD>	
<TD><a href="#" class="ABCD" id="<?php echo $row['Lid']; ?>">[ X ]</a>
<a href="#" class="Edit" id="<?php echo $row['Lid']; ?>">[ Edit ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
</div>