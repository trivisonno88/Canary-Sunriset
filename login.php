<html>
<head>
	<title>Login Allevatore</title>
</head>
<body>
	<h3>Login Allevatore</h3>
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
		$query = "SELECT nome, username, password FROM allevatori WHERE (username = '$username' AND password = '$password')"; 
		$result	= mysql_query($query) or die ("Query fallita..."); 
	
		while($row = mysql_fetch_assoc($result)) 
			{
				$nome= $row['nome'];
				$username_db = $row['username'];
				$password_db = $row['password'];
			}
			
			if (($username == $username_db) AND ($password == $password_db)){
				echo "<br><br>Utente presente nel database<br><br>";
				echo "Benvenuto <strong>$nome</strong> ora puoi visualizzare lo stato dell'impianto<br><br>";
	?>	
	
	<input type="button" id="12" class="led" onclick="location.href='stato_impianto.php'" value="Stato Impianto"/>

	
	<!--
	<input type="button" onclick="location.href='stato_impianto.php'" value="Stato Impianto"/>
	-->
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
	
	<input type="button" onclick="location.href='index.php'" value="Home"/>
</body>
</html>
