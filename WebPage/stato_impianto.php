<html>
<head>
	<title>Stato Impianto</title>
</head>
<body>
	<h3>Stato Impianto</h3>
	
	<?php
		//Ricevo i dati da Arduino leggendoli dal suo indirizzo 
		$content = file_get_contents('http://192.168.0.3/');
		
		//Utilizzato per testare le pagine, dalla pagina login_prova.php leggo dei valori inserito da me
		//$content = file_get_contents('E:\EasyPHP-DevServer-14.1VC11\data\localweb\login_prova.php');
		
		//La , separa i valori che vengono inviati da Arduino come una stringa
		$valori_letti = explode(",", $content);
		
		if ($valori_letti != null)
		{
			
		//Dobbiamo aggiungere alla stringa una , perchè altrimenti non 
		//effettua la conversione da stringa ad int forse per via dello spazio
		$spazio = $valori_letti[0];		
		$temperatura = $valori_letti[1];
		$livello_umidita = $valori_letti[2];
		$livello_luminosita = $valori_letti[3];
		
		//Converto le variabili da stringhe in interi	
		$temperatura = intval($temperatura);
		$livello_umidita = intval($livello_umidita);
		$livello_luminosita = intval($livello_luminosita);	
	
		echo Date("d F Y h:i");
		echo "</br></br>";
		echo "<strong>Luminosità Impianto</strong><br>";
		echo "Livello intensità: <strong>$livello_luminosita</strong><br>";
		}
		else 
			{
	?>
				<input type="button" id="12" class="led" onclick="window.location.reload()'" value="Aggiorna"/>
	<?php		
			die("<b>Errore:</b> Dati non ricevuti correttamente!");
			}
	?>
	
	<form action="luminosita.php" method="POST"> 
	Ricerca per data
	<input type="text" name="data_luminosita"> 
	<input type="submit" name="submit" value="cerca"> 
	</form>	
	
	<?php	
		echo "<strong>Temperatura Impianto</strong><br>";
		echo "Temperatura: <strong>$temperatura</strong><br>";
	?>
	
	<form action="temperatura.php" method="POST"> 
	Ricerca per data
	<input type="text" name="data_temperatura"> 
	<input type="submit" name="submit" value="cerca"> 
	</form>	
	
	<?php
		echo "<strong>Umidità Impianto</strong><br>";
		echo "Umidità: <strong>$livello_umidita</strong><br>";
	?>
	
	<form action="umidita.php" method="POST"> 
	Ricerca per data
	<input type="text" name="data_umidita"> 
	<input type="submit" name="submit" value="cerca"> 
	</form>	

	<button id="11" class="led"> <b>start/stop</b> simulation</button>
	
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

	<input type="button" id="12" class="led" onclick="window.location.reload()'" value="Aggiorna"/>
	
	<?php
		//Memorizzo i valori letti nel db inviandoli in una nuova pagina
		session_start();
		$_SESSION['temperatura'] = $temperatura;
		$_SESSION['livello_luminosita'] = $livello_luminosita;
		$_SESSION['livello_umidita'] = $livello_umidita;
	?>	
	
	<input type="button" onclick="location.href='memorizza_valori.php'" value="Salva Valori"/>
	<br><br>
	<input type="button" onclick="location.href='calcola_valori_medi.php'" value="Valori Medi Giornalieri"/>
	<input type="button" onclick="location.href='index.php'" value="Home"/>

</body>
</html>
</body>
</html>
