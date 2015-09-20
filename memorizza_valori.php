<html>
<head>
	<title>Salva Valori</title>
</head>
<body>
	<h3>Salva Valori</h3>
	
	<?php

	session_start();

	//Recupero i valori letti da Arduino dalla pagina precedente e li salvo nel db
	$temperatura = $_SESSION['temperatura'];
	$livello_luminosita = $_SESSION['livello_luminosita'];
	$livello_umidita = $_SESSION['livello_umidita'];
	
	if(($temperatura AND $livello_umidita) != 0)
	
	{
	$connessione = @mysql_connect("localhost", "root", "");
	
	if ($connessione == 0) 
    		die("Connessione non riuscita");
		else
			echo "Connessione al server riuscita! <br>";

	$connessione_db = mysql_select_db("allevatore_db");
	
	if($connessione_db)
		echo "Accesso al database<br>";
			
			$sql = "INSERT INTO luminosita (data_time, livello_luminosita) VALUES (CURRENT_TIMESTAMP, '$livello_luminosita')";
			$query_result = mysql_query($sql) or die("Inserimento fallito!");
			
			$sql = "INSERT INTO umidita (data_time, livello_umidita) VALUES (CURRENT_TIMESTAMP, '$livello_umidita')";
			$query_result = mysql_query($sql) or die("Inserimento fallito!");
			
			$sql = "INSERT INTO temperatura (data_time, temperatura) VALUES (CURRENT_TIMESTAMP, '$temperatura')";
			$query_result = mysql_query($sql) or die("Inserimento fallito!");
	
	echo "<br><b>Dati salvati correttamente</b><br><br>";
	echo "Torna a ";
	//echo '<a href="stato_impianto.php">Stato Impianto</a>';
	?>
		<!--
		<input type="button" onclick="location.href='stato_impianto.php'" value="Stato Impianto"/>
		-->
		
		<input type="button" id="12" class="led" onclick="location.href='stato_impianto.php'" value="Stato Impianto"/>
	
	<?php 
	}
	else 
		{
	?>	
	
		<input type="button" id="12" class="led" onclick="location.href='stato_impianto.php'" value="Stato Impianto"/>
		
		<br><br>

	<?php		
		die ("<b>Errore: </b>Nessun valore da salvare torna a Stato Impianto.");
		}
	?>
	
	<!-- Controllare se invia il comando quando passo dalla pagina login a quella stato impianto -->
        <script src="jquery.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function(){
                        $(".led").click(function(){
                                var p = $(this).attr('id'); // get id value (i.e. pin13, pin12, or pin11)
                                // send HTTP GET request to the IP address with the parameter "pin" and value "p", then execute the function
                                $.get("http://192.168.0.3:80/", {pin:p}); // execute get request
                        });
                });
        </script>

</body>
</html>
