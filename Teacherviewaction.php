<?php
include('db.php');
?>
<div id="flash" class="flash"></div>

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
url: "Teacherviewaction.php",
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
url: "Teacherviewaction.php",
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
}
else
{
	
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Teacherviewaction.php",
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
$delete = "DELETE FROM exam_admin WHERE Aid='$id'";
$conn->query($delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "update exam_admin set Approve='Y' where Aid=".$id;
$conn->query( $select_table);
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">All Teachers Table</h4>
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
					$select_table = "select * from Exam_admin where Admintyp='Teacher'";
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
<TD><a href="#" class="ABCD" id="<?php echo $row['Aid']; ?>">[ X ]</a>
<?php
if($row['Approve']!='Y')
{
?>
<a href="#" class="Edit" id="<?php echo $row['Aid']; ?>">[ Approve ]</a>
<?php
}
?></TD>
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