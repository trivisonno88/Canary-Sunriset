<?php
	$connessione = @mysql_connect("localhost", "root", "");
 
	if ($connessione == 0)
		die ("Connessione non riuscita");
	echo "Connessione al server riuscita!"; 
	
	mysql_select_db("allevatore_db");
	echo "<br>";
	echo "Accesso al database";

	$grado_inserito = $_POST['grado_inserito'];
	$query = "SELECT * FROM lum WHERE grado = '$grado_inserito'"; 
	$id_cercato = mysql_query($query) or die ("Query fallita..."); 
	$array_id_cercato = mysql_fetch_array($id_cercato);

	echo "<br>Luminosità inserite con grado ";
	echo $array_id_cercato['grado'];
	echo " hanno id: ";
	echo $array_id_cercato['id_lum'];
?>
