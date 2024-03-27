<?php
session_name("alunos");
session_start();


if(!( isset($_SESSION["login"])))
{
        
 echo "<script type='text/javascript'>
 			window.onload = function alerta()
			{
				history.back();
				alert('Area Restrita! Favor Efetuar o logon.');
			}
       </script>";


		header("Location:index.html");
        exit;
}


?>
