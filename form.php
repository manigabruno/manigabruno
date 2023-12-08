<?php
if (!isset($_POST['Field1']) | !isset($_POST['Field3']) | !isset($_POST['Field4']))
{
	header("refresh:0;url=contact.html");
	exit();
}
else
{
	if (filter_var($_POST['Field3'], FILTER_VALIDATE_EMAIL))
	{
		$admin='syrk200@gmail.com';
		$sujet='[Formulaire de contact site web]';

		$nom=htmlspecialchars($_POST['Field1']);
		$nom='[nom] : '.$nom;
		$email=htmlspecialchars($_POST['Field3']);
		$email='[email] : '.$email;
		$message=htmlspecialchars($_POST['Field4']);
		$message='[message] : '.$message;
		$contenu=$nom."<br>".$email."<br>"."----------"."<br>".$message;

		$Headers="MIME-version: 1.0\r\n".'Date: '.date('r')."\r\n";
		$headers.="From: contact@syrkgraff.com \r\n";
		$headers.="Reply-To: contact@syrkgraff.com \r\n";
		$headers.="Content-type: text/html; charset=UTF-8 \r\n";

		if(@ mail($admin, $sujet, $contenu, $headers))
		{
			header("refresh:0;url=contact.html");
			exit();
		}
		else
		{
			header("refresh:0;url=contact.html");
			exit();
		}
	}
	else
	{
		header("refresh:0;url=contact.html");
		exit();
	}
}
?>