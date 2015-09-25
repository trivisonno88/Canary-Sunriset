<!--	Pagina riservata al login come amministratore;
		controllo sugli ingressi.
-->

<html>
<head>
	<meta name="viewport" content="width=device-width">
	<title>Login Amministratore</title>
</head>
<body>
	<h3>Login Amministratore</h3>
	
	<?php	
	$connessione = @mysql_connect("localhost", "root", "");

	if ($connessione == 0) 
    		die("Connessione non riuscita");
		else
			echo "Connessione al server riuscita! <br>";

	$connessione_db = mysql_select_db("allevatore_db");
	
	if($connessione_db)
		echo "Accesso al database";

	//Prelevo i dati inviati dalla pagina precedente
	$username = $_POST['username'];
	$password = $_POST['password'];
	$username_db = "";
	$password_db = "";
	
	if($username AND $password != NULL)
		{
		$query = "SELECT username, password FROM amministratori WHERE (username = '$username' AND password = '$password')"; 
		$result	= mysql_query($query) or die ("Query fallita..."); 
		
		while($row = mysql_fetch_assoc($result)) 
			{
				$username_db = $row['username'];
				$password_db = $row['password'];		
			}
				if (($username == $username_db) AND ($password == $password_db)){
						echo "<b><br><br>Login amministratore effettuato</b><br><br>";
						//Posso visualizzare il pulsante che crea un nuovo allevatore:
	?>
	
						<input type="button" onclick="location.href='registrazione_allevatore.php'" value="Nuovo Allevatore"/>
	
	<?php
				}
				else 
					{
						//Se il login non è corretto visualizzo il pulsante home e termino l'accesso:
	?>							
						<br><br>
						<input type="button" onclick="location.href='index.php'" value="Home"/>
	<?php
						die ("<br><br><strong>Errore</strong>: username o password <b> errati</b><br><br>");
					}
		}
	else
		echo "<br><br><strong>Errore</strong>: campi non inseriti correttamente<br><br>";
	?>
	<input type="button" onclick="location.href='index.php'" value="Home"/>
</body>
</html>
