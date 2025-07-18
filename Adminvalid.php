<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content=($_POST['content']);
$content1=($_POST['content1']);
$content2=($_POST['content2']);
$content3=($_POST['content3']);

$mess.=Namespacevalid($content,"Enter Valid Name",3);
$mess.=EmailValid($content1,"Enter Valid Email,");
$mess.=DatbaseValid("exam_admin","Aemail",$content1,"Email Allready Register,");
$mess.=nullvalid($content2,"Enter Password,");
$mess.=phonevalid($content3,"Enter Valid Mob. No,",10);


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
$ucontent2=($_POST['ucontent2']);
$ucontent3=($_POST['ucontent3']);
$ucontent4=($_POST['ucontent4']);

$mess.=OnlyNumbervalid($ucontent,"Enter valid Admin ID,");
$mess.=nullvalid($ucontent,"Enter Admin ID,");
$mess.=Namespacevalid($ucontent1,"Enter Valid Name",3);
$mess.=EmailValid($ucontent2,"Enter Valid Email,");
$mess.=nullvalid($ucontent3,"Enter Password,");
$mess.=phonevalid($ucontent4,"Enter Valid Mob. No,",10);

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