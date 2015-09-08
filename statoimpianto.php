<html>
<head>
	<title>Stato Impianto</title>
</head>
<body>
	<h3>Stato Impianto</h3>
	
	<?php
		echo Date("d F Y h:i");
		echo "</br></br>";
		echo "<strong>Luminosità Impianto</strong><br>";
		echo "Rileva e memorizza data e ora";
	?>
	
	<input type="button" value="Rileva"/> <br>
	
	<?php	
	//controllare bene perchè si verifica questa notifica
	//$data_time = mktime(date("H, i, s, m, d, Y"));
	$livello_luminosita = 10; //Inserire collegamente con codice Arduino
	
	//echo "Data caricata: " .date("d F Y h:i",$data_time); 
	echo "Livello intensità: <strong>$livello_luminosita</strong><br>";
	echo "Ricerca per data:";
	
	echo "</br>";
	$connessione = @mysql_connect("localhost", "root", "");
 
	if ($connessione == 0)
		die ("Connessione non riuscita");
	//echo "Connessione al server riuscita!"; 
	
	mysql_select_db("allevatore_db");
	//echo "<br>Accesso al database";
	echo "<br>";
	
	//Controllare la query
	//$sql = "INSERT INTO luminosita (data_time, livello_luminosita) VALUES ('$data_time', '$livello_luminosita)";
	//$query_result = mysql_query($sql) or die("Inserimento fallito!");
	
	echo "<strong>Temperatura Impianto</strong><br>";
	echo "Rileva e memorizza data e ora";
	?>
	
	<input type="button" value="Rileva"/> <br>

	<?php
		$temperatura = 27;
		echo "Temperatura: <strong>$temperatura</strong><br>";
		echo "Ricerca per data:";
		echo "<br><br>";
	
		echo "<strong>Umidità Impianto</strong><br>";
		echo "Rileva e memorizza data e ora";
	?>
	
		<input type="button" value="Rileva"/> <br>
	
	<?php
		$umidita = 20;
		echo "Umidità: <strong>$umidita</strong><br>";
		echo "Ricerca per data:";
		echo "<br>";
	?>

	<!--
	<form action="luminosita.php" method="POST"> 
	<input type="text" name="grado_inserito">
	<input type="submit" name="submit" value="invia"> 
	</form>	
	-->	
</body>
</html>
