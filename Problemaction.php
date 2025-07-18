<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
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
url: "Problemvalid.php",
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


 
<div id="cp_contact_form">
<form action="Problemaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Problem Subject</label>
                    <input type="text" name="content" class="form-control" id="firstName" Placeholder="Subject">       
                  </div> 
                </div>

                <div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Problem</label>
                    <textarea name="content1" class="form-control" id="firstName" Placeholder="Problem"> </textarea>     
                  </div> 
                </div>

				<div class="row">
                   <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Lab</label>
                    <select name="content2" class="form-control" id="firstName">

<?php
$select_table1 ="Select * from lab_assistant order by LabName";
$fetch1= $conn->query($select_table1);
while($row1 = $fetch1->fetch_assoc())
{
echo '<option value="'.$row1['Lid'].'">'.$row1['LabName'].'</option>';
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
if(isset($_POST['content']))
{

$content=$conn->real_escape_string($_POST['content']);
$content1=$conn->real_escape_string($_POST['content1']);
$content2=$conn->real_escape_string($_POST['content2']);

$UID=$_SESSION['useridAdmin'];

$conn->query("insert into problem(ProblemSubject,ProblemDetails,Lab,UID,Posteddate,Resolve,ResolveDetails,Resolvedate) values ('$content','$content1','$content2','$UID','$Rdateus','','','')");


$emailmess="hi,".$content1;
$emailval="";
$nameval=$_SESSION['usernameAdmin'];
$Subject=$content;

$select_tab = "select * from lab_assistant,admin where lab_assistant.Assistant=admin.Aid and lab_assistant.Lid='$content2'";
$fetchdata= $conn->query($select_tab);
				
while($rowdata = $fetchdata->fetch_assoc())
{
$emailval=$rowdata['Aemail'];	
}

myCode1($emailmess,$emailval,$nameval,$Subject);


echo "<font style='color:#0000FF;'>Problem Posted</font><br><br><br>";
}
 
?>

<hr>
<div class="table-responsive">
<h4 class="margin-bottom-15">Problem List Posted From You</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>PID</b></td>
<td><b>Subject</b></td>
<td><b>Problem</b></td>
<td><b>Date</b></td>
<td><b>Lab</b></td>
<td><b>Resolve</b></td>
<td><b>Resolve Info</b></td>
<td><b>Resolve Date</b></td>
</tr></thead>
<tbody>
<?PHP
$UID=$_SESSION['useridAdmin'];
$select_table = "select * from problem where UID='$UID' order by Pid desc";
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
<TD><?php echo $row['Resolve']; ?></TD> 
<TD><?php echo $row['ResolveDetails']; ?></TD> 
<TD><?php echo $row['Resolvedate']; ?></TD> 
</TR>
<?php
}
?>
</tbody></TABLE> 
              	
</div>