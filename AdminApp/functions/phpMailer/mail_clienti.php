<?php
	include '../database/databaseConnection.php';	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require 'classes/PHPMailer/Exception.php';
	require 'classes/PHPMailer/PHPMailer.php';
	require 'classes/PHPMailer/SMTP.php';
	$delay=0.5;
		mailClienti($_POST['title'],$_POST['message'],$conn);
     $varMail="";
function mailClienti($subject, $message,$mysqli){
		
		//$message = date("Y-m-d h:i:s").": S-a trimis mail cătrespecializarea ".$cod_specializare." de către utilizatorul cu id-ul ". $_SESSION['id']." de la următoarea adresă: ".$_SERVER['REMOTE_ADDR']."\r\n";
		$myfile = file_put_contents('logs/good_log.txt', $message.PHP_EOL , FILE_APPEND | LOCK_EX);
		
			//$quantity = 2;
		//	$delay = 2.5;
		
	
//			$sql = $mysqli->query("SELECT email FROM absolventi WHERE email!='' AND cod_specializare = $cod_specializare".";");	
//			if(mysqli_num_rows($sql)>0) {
//				$row = mysqli_fetch_array($sql);
//				$subject = $row['titlu'];
//				$message = $row['continut'];
//			}
			
			//$sql = $mysqli->query('SELECT email FROM absolventi WHERE email!="" and cod_specializare='.$cod_specializare.';');
			$sql = $mysqli->query('SELECT email from user WHERE email!=""');
			if(mysqli_num_rows($sql)>0) {
			
				$stack = array();
				$group = 0;
				
				while($row = mysqli_fetch_array($sql)) {
                                   
                                   
					if(filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
						  $varMail=$row['email'];
					
							$mail = new PHPMailer();
							$mail->SMTPDebug = 3; 
							$mail->Debugoutput = 'angajatori_log';
							$mail->IsSMTP();
							$mail->Host = 'mail.debbies.ro'; 
							$mail->SMTPAuth = true;
							$mail->Username = 'newsletter@debbies.ro'; 
							$mail->Password = 'ndhe12022208'; 
							$mail->SMTPSecure = 'ssl'; 
							$mail->Port = 465; 
					    		$mail->setFrom('newsletter@debbies.ro','Noutati Debbie\'s Yogurt');
					    		$mail->addAddress($varMail);
					    		foreach ($stack as &$current_mail) {
					    			$mail->AddBCC($current_mail);
					    			echo $current_mail."-----------------------<br>";
					    		}
					    		$mail->isHTML(true);
					    		$mail->Subject = $subject;
			    				$mail->Body    = $message;
					    		$mail->AltBody = 'EROARE: Incercati vizualizarea acestui mail folosind un alt dispozitiv.';
					  
						    	if(!$mail->send()) 
						    	{
						    		echo 'Mailul nu a putut fi trimis.</a>';
						    		echo '<br>Mailer Error: ' . $mail->ErrorInfo;
						    	}  else {
						    		echo 'Succes<br>';
						    		$spacer = "\r\n\r\n";
	                					file_put_contents('logs/angajatori_email_log.txt', $spacer.PHP_EOL , FILE_APPEND | LOCK_EX);
						    	}
	
						    	sleep($delay);
						    
						
					}
					
				}
				
			}
		}
	
?>