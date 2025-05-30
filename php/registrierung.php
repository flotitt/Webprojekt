<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require __DIR__ . '/../vendor/autoload.php';
	$Mailer = new PHPMailer(true);

	//Daten aus Registrierungs-Formular in DB speichern
	session_start();

	$gefunden = false;
		
	//Inhalt aus Formular holen
	$vorname = $_POST["vorname"];
	$nachname = $_POST["nachname"];
	$mail = $_POST["mail"];
	$adresse = $_POST["adresse"];
	$plz = $_POST["plz"];
	$ort = $_POST["ort"];
	$passwort = hash('sha256', $_POST["password"]); //Passwort mit sha256 verschlüsselt

	//Verbindung zur DB aufbauen
	$pdo = new PDO("mysql:host=localhost;dbname=dbpferdeshop","root","");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Prüfen auf doppelte Registrierung --> keine gleiche Email Adresse!
	$check = "SELECT mail FROM user";
	foreach($pdo->query($check) as $row)
	{
       $NeuerEintrag = true;
       
   	   if($mail == $row['mail']) 
   		{
   			$NeuerEintrag = false; //neuer Eintrag nicht möglich da Mail-Adresse bereits verwendet
   			break;
   		}
   	}	

   	if ($NeuerEintrag) { 	//NeuerEintrag erlaubt
   		//Formulardaten in DB einfügen 
		$sql = "INSERT INTO user (vorname, nachname, mail, adresse, plz, ort, passwort)
		VALUES ('$vorname','$nachname','$mail','$adresse','$plz', '$ort', '$passwort')";
		
				$_SESSION["username"]= $vorname;
	   			$_SESSION["nachname"] = $nachname;
                $_SESSION["adresse"] = $adresse;
                $_SESSION["plz"] = $plz;
                $_SESSION["ort"] = $ort;
                $_SESSION["mail"] = $mail;
                

			if ($pdo->query($sql))
			{
				$_SESSION["login"]=1;

				$sql2 = "SELECT * FROM user WHERE mail='$mail'";
				foreach ($pdo->query($sql2) as $row) {
					$_SESSION["id"] = $row['id'];
					$id = $_SESSION["id"];
				}
				
				$insert_query="INSERT INTO online(userID, timeonline) VALUES('$id', NOW())";
		          if ($pdo->query($insert_query)) {
		            echo "";
		          }

				
				 
			}
				$Mailer = new PHPMailer(true);
					    //Server settings
					    //$Mailer->SMTPDebug = 1;                             
					    //$Mailer->CharSet="UTF-8";
					    $Mailer->isSMTP();                                    
					    $Mailer->Host = 'smtp.web.de';  					 
					    $Mailer->SMTPAuth = true;                             
					    $Mailer->Username = 'derpferdeshop@web.de';        
					    $Mailer->Password = 'pferdeshop123';                  
					    $Mailer->SMTPSecure = 'tls';                         
					    $Mailer->Port = 587;                                  

					    $Mailer->setFrom('derpferdeshop@web.de', 'Pferdeshop Service');
					    $Mailer->addAddress($mail);    	   
					    $Mailer->addReplyTo('derpferdeshop@web.de');
					 	
					 	//Standard Nachricht -- mit HTML
					 	//evtl. kann noch ein Bild (als Banner oder so) eingefügt werden
					    $body = "<p>Herzlich Willkommen $vorname $nachname! 
					    	<br><br>
					    	Sie haben sich erfolgreich bei <i>'Der-Pferdeshop' </i>registriert.
					    	<br><br><br> 
					    	Ihre <strong>Anmeldedaten</strong> lauten wie folgt: <br>
					    		Vorname: $vorname <br>
					    		Nachname: $nachname <br>
					    		E-Mail Adresse: $mail <br><br>
					    	Als <strong>Lieferadresse </strong> haben sie folgende Adresse angeben: <br> $adresse <br> $plz $ort
					    	<br><br>
					    	Sie k&ouml;nnen diese Adresse auf unserer Webseite unter der Katergorie Kundenkonto ab&auml;ndern! 
					    	<br>Viel Spa&szlig; beim Shoppen!<br><br>Mit pferdigen Gr&uuml;&szlig;en<br>Ihr Pferdeshop-Team</p>";
						
					    //Content
					    $Mailer->isHTML(true);                   
					    $Mailer->Subject = 'Erfolgreiche Registrierung';
					    $Mailer->Body    = $body;
					    $Mailer->AltBody = strip_tags($body);

					    if(!$Mailer->send())
					    {
					    	echo 'Message could not be sent. Mailer Error!';
						} 
						else
						{
							echo 'Message has been sent!';
						}

			//neuer Eintrag erfolgreich (Registrierung erfolgreich) --> Wechsel auf Basisseite
			header("Location: basis.php");
			exit;
	}
	
   	else //kein neuer Eintrag erlaubt --> zurück zur Registrierungsseite
   	{
   		header("Location: ../regMail.html");
		exit;
   		//echo "E-Mail Adresse bereits vergeben!";
   	}

?>
