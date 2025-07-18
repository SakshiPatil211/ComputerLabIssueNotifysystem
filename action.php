<?php
include('db.php');
?>
<div id="flash" class="flash"></div>
<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Adminvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "action.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
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
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Adminvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "action.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
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
url: "action.php",
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
url: "action.php",
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
url: "action.php",
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
$delete = "DELETE FROM Exam_admin WHERE Aid='$id'";
$conn->query($delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from admin where Aid=".$id;
$fetch=  $conn->query($select_table);
while($row = $fetch->fetch_assoc())
{
?>
<div id="cp_contact_form">
<div id="cp_contact_form">
<form  method="post" name="form" id="form" action="">

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label"> ID</label>
                    <input type="text" name="ucontent" size="0" maxlength="0" value="<?php echo $row['Aid']; ?>" class="form-control" id="firstName" Placeholder="Name">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label"> Name</label>
                    <input type="text" name="ucontent1"  value="<?php echo $row['Aname']; ?>" class="form-control" id="lastName" Placeholder="Email">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label"> Email</label>
                    <input type="text" name="ucontent2" value="<?php echo $row['Aemail']; ?>" class="form-control" id="firstName" Placeholder="Email">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label"> Password</label>
                    <input type="text" name="ucontent3"  value="<?php echo $row['Apwd']; ?>" class="form-control" id="lastName" Placeholder="Password">        
                  </div>
                </div>
				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Mobile No</label>
                    <input type="text" name="ucontent4" value="<?php echo $row['Amob']; ?>" class="form-control" id="firstName" Placeholder="Mobile No">           
                  </div>

				<div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Admin Type</label>
                    <select name="ucontent5" class="form-control" id="firstName">
					<option value="Admin">Admin</option>
					<option value="Teacher">Teacher</option>
					<option value="LabAssistant">LabAssistant</option>
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
</div>
<?php
}
}
else
{
?>
<div id="cp_contact_form">
<form name="form" id="form">

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label"> Name</label>
                    <input type="text" name="content" class="form-control" id="firstName" Placeholder="Name">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label"> Email</label>
                    <input type="text" name="content1"  class="form-control" id="lastName" Placeholder="Email">        
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label"> Password</label>
                    <input type="Password" name="content2" class="form-control" id="firstName" Placeholder="Password">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label"> Mobile No</label>
                    <input type="text" name="content3"  class="form-control" id="lastName" Placeholder="Mobile No">  
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Admin Type</label>
                    <select name="content4" class="form-control" id="firstName">
					<option value="Admin">Admin</option>
					<option value="Teacher">Teacher</option>
					<option value="LabAssistant">LabAssistant</option>
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
$content2=$conn->real_escape_string($_POST['content2']);
$content3=$conn->real_escape_string($_POST['content3']);
$content4=$conn->real_escape_string($_POST['content4']);
$RD=date('Y-m-d');

$conn->query("insert into admin(Aname,Aemail,Apwd,Amob,Admintyp) values ('$content','$content1','$content2','$content3','$content4')");
echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}
if(isset($_POST['ucontent']))
{

$ucontent=$conn->real_escape_string($_POST['ucontent']);
$ucontent1=$conn->real_escape_string($_POST['ucontent1']);
$ucontent2=$conn->real_escape_string($_POST['ucontent2']);
$ucontent3=$conn->real_escape_string($_POST['ucontent3']);
$ucontent4=$conn->real_escape_string($_POST['ucontent4']);
$ucontent5=$conn->real_escape_string($_POST['ucontent5']);

$conn->query("update  admin set Aname='$ucontent1', Aemail='$ucontent2', Apwd='$ucontent3', Amob='$ucontent4',Admintyp='$ucontent5' where Aid=$ucontent");
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">All Users Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b> ID</b></td>
<td><b> Name</b></td>
<td><b> Email</b></td>
<td><b> Mobile No</b></td>
<td><b> Type</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
					$per_page = 10; 
					$select_table = "select * from admin ";
					$fetch= $conn->query($select_table);
					$count =  $fetch->num_rows;
					$pages = ceil($count/$per_page);


if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by Aid limit $start,$per_page";
$fetch= $conn->query($select_table);
}
//echo $select_table."sdfdfds".$page;
while($row = $fetch->fetch_assoc())
{
?>
<TR>
<TD><?php echo $row['Aid']; ?></TD>
<TD><?php echo $row['Aname']; ?></TD>
<TD><?php echo $row['Aemail']; ?></TD>
<TD><?php echo $row['Amob']; ?></TD>
<TD><?php echo $row['Admintyp']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['Aid']; ?>">[ x ]</a>
<a href="#" class="Edit" id="<?php echo $row['Aid']; ?>">[ Edit ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 				
</div>