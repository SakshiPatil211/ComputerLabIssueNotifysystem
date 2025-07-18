<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content=($_POST['content']);
$content1=($_POST['content1']);
$content2=($_POST['content2']);
 

$mess.=nullvalid($content,"Enter Subject,");
$mess.=nullvalid($content1,"Enter Problem,");
$mess.=nullvalid($content2,"Select Lab,");
 

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