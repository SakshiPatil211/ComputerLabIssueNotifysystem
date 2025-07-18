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
$mess.=PasswordStrengthValid($content2,"Enter Password,");
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

?>