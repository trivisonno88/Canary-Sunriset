<html>
<head>
	<title>Valori Medi Giornalieri</title>
</head>

<body>
		<h3>Valori Medi Giornalieri</h3>
<?php

	echo Date("d F Y");
	
	echo "<br><br>";
	
	$connessione = @mysql_connect("localhost", "root", "");
 
	if ($connessione == 0)
		die ("Connessione non riuscita");
	
	mysql_select_db("allevatore_db");
	
	$queryumidita = "SELECT livello_umidita FROM umidita WHERE DATE(`data_time`) = CURDATE();"; 
	$querytemperatura = "SELECT temperatura FROM temperatura WHERE DATE(`data_time`) = CURDATE();";
	$queryluminosita = "SELECT livello_luminosita FROM luminosita WHERE DATE(`data_time`) = CURDATE();";
	
	$data_cercata_umidita = mysql_query($queryumidita) or die ("Query fallita...");
	$data_cercata_temperatura = mysql_query($querytemperatura) or die ("Query fallita...");	
	$data_cercata_luminosita = mysql_query($queryluminosita) or die ("Query fallita...");
	
	// conto il numero di occorrenze trovate nel db le stesse per i tre valori
	$numrows = mysql_num_rows($data_cercata_umidita);
	// se il database è vuoto lo stampo a video
	if ($numrows == 0){
		echo "<b>Nessun valore salvato oggi!</b><br>";
	}
	
	else
	{	
	$somma_umidita = 0;
	$somma_temperatura = 0;
	$somma_luminosita = 0;
	
	//Ciclo for per umidita
	for ($x = 0; $x < $numrows; $x++){
		//Recupero il contenuto di ogni record rovato
		$resrow = mysql_fetch_row($data_cercata_umidita);
		$livello_umidita = $resrow[0];
		$somma_umidita = $somma_umidita + $livello_umidita;
	}
	
	//Ciclo for per temperatura
	for ($x = 0; $x < $numrows; $x++){
		//Recupero il contenuto di ogni record rovato
		$resrow = mysql_fetch_row($data_cercata_temperatura);
		$temperatura = $resrow[0];
		$somma_temperatura = $somma_temperatura + $temperatura;
	}
	
	//Ciclo for per luminosita
	for ($x = 0; $x < $numrows; $x++){
		//Recupero il contenuto di ogni record rovato
		$resrow = mysql_fetch_row($data_cercata_luminosita);
		$livello_luminosita = $resrow[0];
		$somma_luminosita = $somma_luminosita + $livello_luminosita;
	}
  
  $umidita_media = $somma_umidita/$numrows;
  $temperatura_media = $somma_temperatura/$numrows;
  $luminosita_media = $somma_luminosita/$numrows;
  
  //I valori sono approssimati con alle seconda cifra decimale
  echo "<b>Valori medi giornalieri</b> <br><br>";
  echo "Luminosità: <b>" .round($luminosita_media,2) ."</b>";
  echo "<br>Temperatura: <b>" .round($temperatura_media,2) ."</b>";
  echo "<br>Umidità: <b>" .round($umidita_media,2) ."</b>";
}
?>
	
	<br><br>
	Torna a 
	<input type="button" id="12" class="led" onclick="location.href='stato_impianto.php'" value="Stato Impianto"/>
	
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
