<html>
<head>
	<meta name="viewport" content="width=device-width">
	<title>Nuovo Allevatore</title>
</head>
<body>
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
	$nome = $_POST['nome'];
	$cognome = $_POST['cognome'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($nome AND $cognome AND $username AND $password != NULL)
	{
	$sql = "INSERT INTO allevatori (nome, cognome, username, password) VALUES ('$nome', '$cognome', '$username', '$password')";
	$query_result = mysql_query($sql) or die("Inserimento fallito!");
	
		echo "<br><br><strong>Nuovo allevatore creato! </strong><br><br>";
		echo "Riepilogo dati:<br><br>";
		echo "Nome: <strong>$nome</strong><br>Cognome: <strong>$cognome</strong><br>Username: <strong>$username</strong><br><br>";
	}
		else
		echo "<br><br><strong>Errore</strong>: campi non inseriti correttamente<br><br>";
	?>
	
	<input type="button" onclick="location.href='registrazione_allevatore.php'" value="Form registrazione"/>
	<input type="button" onclick="location.href='index.php'" value="Home"/>
</body>
</head>
