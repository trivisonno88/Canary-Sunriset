<html>
<head>
	<meta name="viewport" content="width=device-width">
	<title>Cerca Temperatura</title>
</head>

<body>
		<h3>Cerca temperatura per data</h3>
<?php
	$connessione = @mysql_connect("localhost", "root", "");
 
	if ($connessione == 0)
		die ("Connessione non riuscita");
	echo "Connessione al server riuscita!"; 
	
	mysql_select_db("allevatore_db");
	echo "<br>Accesso al database<br><br>";

	$data_temperatura = $_POST['data_temperatura'];
	
	//Lunghezza della stringa data che utilizzo per il controllo data
	$string = strlen($data_temperatura);
	
	//Controllo sulla data
	if ((preg_match('/^\d{4}-\d{2}-\d{2}/', $data_temperatura)) AND $string==10)  {	
		
		$query = "SELECT * FROM temperatura WHERE data_time >= '$data_temperatura' AND data_time < '$data_temperatura' + INTERVAL 24 HOUR;"; 
		$data_cercata = mysql_query($query) or die ("Query fallita..."); 
	
	// conto il numero di occorrenze trovate nel db
	$numrows = mysql_num_rows($data_cercata);
	// se il database è vuoto lo stampo a video
	if ($numrows == 0){
		echo "<b>Errore:</b> Data non presente nel database!<br>";
	}
	
	else
	{
	//Ciclo for per il numero di occorrenze trovate
	for ($x = 0; $x < $numrows; $x++){
    
    //Recupero il contenuto di ogni record rovato
    $resrow = mysql_fetch_row($data_cercata);
    $data_time = $resrow[0];
    $temperatura = $resrow[1];
    
    //Stampo il risultato
    echo "<b>Data e Ora:</b> $data_time  ";
    echo "<b>Temperatura:</b>  " .$temperatura ."<br/>";
	}
}
	}
	else
		{
			echo "<b>Errore:</b> Data non inserita correttamente!<br><br>Controlla che la data sia stata inserita correttamente.<br>";
			echo "Formato ricerca: <b>YYYY-MM-DD</b><br>";
		}
?>
	
	<br>
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
