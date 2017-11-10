<?php
	include '../database/databaseConnection.php';	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require 'classes/PHPMailer/Exception.php';
	require 'classes/PHPMailer/PHPMailer.php';
	require 'classes/PHPMailer/SMTP.php';
	
        $delay=0.5;
		mailClienti($_POST['title'], designMail($_POST['title'],$_POST['message']),$conn);
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
                
                
                function designMail($titlu,$mesaj){
                    return '<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
     
        <style>
            *{
             margin:0px;   
            }
           
            .logo{
                width:200px;
                
            }
            .header{
                background-color:#111921;
                width:100%;
                height:160px;
                padding-top:10px;
                padding-bottom:10px;
            }
            .continut{
                
                background-color: #74c374;
                width:100%;
                margin:auto;
            }
            .continutMail{
              
                width:100%;
                padding-top:10px;
                padding-bottom:10px;
                
                
            }
            .hlogo{
                color:white;
            }
            .centrareLogo{
               text-align: center;
               
            }
            .continutText{
            
                width:600px;
                margin:10px auto;
                padding:40px;
                margin:10px auto;
                background-color:#f9fce6;
              
                
            }
            .textHeader{
                margin-top:40px;
                margin-bottom: 40px;
            }
            #h1P{
                font-size: 30px;
            }
            .continutProduse{
                margin-top:40px;
               margin-bottom:40px;
                
                 
            }
            .footer{
                 padding-top:20px;
                padding-bottom:20px;
                background-color:#111921;
                text-align: center;
                color:#e4e9c6;
                font-size: 18px;
                width: 100%;
            }
            table{
                width: 100%;
                   border-collapse: collapse;
            }
            .tabelContinut{
                text-align: left;
            }
            td{
                padding:10px;
                border-bottom: solid 1px #c2c7a1;
               
   
    
            }
            
                  
           tr:nth-child(even){
              
             
          
           }
          
            .pozaTabel{
                width:50px;
                 border-radius: 50%;
              
            }
        </style>
    </head>
    <body>
        <div class="continut">
            <div class="header">
                <div class="centrareLogo">
                <img class="logo" src="http://debbies.ro/DebbiesAndroid/logo_debbie2.png">
                <h3 class="hlogo">Delicii naturale</h3>
                </div>
            </div>
            <div class="continutMail">
                <div class="continutText">
                    <div class="textHeader">
                        '.$titlu.'
                    </div>
                    '.$mesaj.'
                </div>
                
               
              
            </div>
            <div class="footer">© &nbsp;2017&nbsp; - &nbsp;Debbie\'s Yogurt&nbsp; </div>
        </div>
    </body>
</html>
';
                }
                
        
        
	
?>