<?php
include('valid.php');


if(isset($_POST['ucontent']))
{

$mess="";
$ucontent=($_POST['ucontent']);
$ucontent1=($_POST['ucontent1']);
$ucontent2=($_POST['ucontent2']);
 

$mess.=OnlyNumbervalid($ucontent,"Enter valid ID,");
$mess.=nullvalid($ucontent1,"Select Resolve Type,");
$mess.=nullvalid($ucontent2,"Enter Resolve,");
 
if($mess=="")
	{
	echo "Yes";
	}
	else
	{
		echo $mess;
	}

}

?>