<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content=($_POST['content']);
$content1=($_POST['content1']);

$mess.=nullvalid($content,"Enter Lab Name,");

if($mess=="")
	{
	echo "Yes";
	}
	else
	{
	echo $mess;
	}

}


if(isset($_POST['ucontent']))
{

$mess="";
$ucontent=($_POST['ucontent']);
$ucontent1=($_POST['ucontent1']);

$mess.=nullvalid($ucontent1,"Enter Lab name,");


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