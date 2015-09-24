<html>
<head>
	<meta name="viewport" content="width=device-width">
	<title>Pagina di controllo Arduino</title>
</head>
<body>
	<h3>Pagina di controllo Arduino</h3>
	
	<?php	
	echo Date("d F Y");
	?>
	
	<br><br>
	<strong>Accesso</strong> allevatore
	<br><br>
	
	<form action="login.php" method="POST">
	Username <input type="text" name="username"><br><br>
	Password <input type="password" name="password"><br><br>
	<input type="submit" name="submit" value="Accedi">
	</form>	
	
	<b> Amministratore Sistema </b>
	<input type="button" onclick="location.href='amministratore.php'" value="Admin"/>

</body>
</html>
