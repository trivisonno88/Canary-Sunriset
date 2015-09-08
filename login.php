<html>
<head>
	<title>Login</title>
</head>
<body>
	<h3>Login</h3>
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
	
	if($username AND $password != NULL)
		{
		$query = "SELECT nome FROM allevatori WHERE (username = '$username' AND password = '$password')"; 
		$result	= mysql_query($query) or die ("Query fallita..."); 
	
		while($row = mysql_fetch_assoc($result)) {
			$nome= $row['nome'];
				echo "<br><br>Utente presente nel database<br><br>";
				echo "Benvenuto <strong>$nome</strong> ora puoi visualizzare lo stato dell'impianto<br><br>";
			}
	?>
		<input type="button" onclick="location.href='stato_impianto.php'" value="Stato Impianto"/>
	<?php
		}
	else
		echo "<br><br><strong>Errore</strong>: campi non inseriti correttamente<br><br>";
	?>
	
	<input type="button" onclick="location.href='index.php'" value="Home"/>
</body>
</html>
