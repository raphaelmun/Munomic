<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>Munomic - Digital Makeover for Businesses</title>
		<meta name="author" content="Munomic">
		<meta name="norobots" content="noindex,nofollow">
		<meta name="keywords" content="munomic, web, design, branding, business, landing, mobile app, business, corporate, project, responsive">
		<meta name="description" content="Munomic is your new best friend to help your business get updated to the 21st century with online and mobile presence">		
		   
		<!-- Libs CSS -->
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		
		<!-- Google Fonts -->	
		<link href='http://fonts.googleapis.com/css?family=Lato:400,900italic,900,700italic,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
		   
	</head>

	<body>
	
		<div id="contentForm">

			<?php

			if(isset($_POST['email'])) {
				 
                if (isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $validation[] = array('message'=>'Please enter valid email', 'id'=>'form-email');
                }
					 
				// EDIT THE 2 LINES BELOW AS REQUIRED
				 
				$email_to = "raphael.mun@outlook.com,sainthappy@hotmail.com,dmun6@hotmail.com,raphael@munomic.com,geoffschutta@gmail.com";
				 
				$email_subject = "Munomic Website Consultation Request";
				 
				   
				$first_name = $_POST['first_name']; // required 
				$email_from = $_POST['email']; // required
				$subject = $_POST['subject']; // required
				$comments = $_POST['message']; // required
                $numberVerify = $_POST['number']; // required
                if( $numberVerify != 13 )
                {
                    die();
                }
				 
				$email_message = "Form details below.\r\n\r\n<br><br>";
				 
					
				function clean_string($string) {
					$bad = array("content-type","bcc:","to:","cc:","href");
					return str_replace($bad,"",$string);
				}
				 
				 
				$email_message .= "Name: ".clean_string($first_name)."\r\n<br>";
				$email_message .= "Email Address: ".clean_string($email_from)."\r\n<br>";
				$email_message .= "Subject: ".clean_string($subject)."\r\n<br>";
				$email_message .= "Message: ".clean_string($comments)."\r\n<br>";
				 
					 
				// create email headers
                $headers  = "From: ".$email_from.PHP_EOL;
                $headers .= "Reply-to: ".$email_from.PHP_EOL;
                $headers .= "Return-Path: ".$email_from.PHP_EOL;
                $headers .= "X-Mailer: PHP/". phpversion().PHP_EOL;
                $headers .= "MIME-Version: 1.0".PHP_EOL;
                $headers .= "Date: ".gmdate('D, d M Y H:i:s', time()).PHP_EOL;
                $headers .= "Content-type: text/html; charset=iso-8859-1".PHP_EOL;
				
                if (empty($validation))
                {
                    if (mail($email_to, $email_subject, $email_message, $headers))
                    {
                        // echo json_encode(array('success'=>(bool)true, 'message'=>''));
                    }
                    else
                    {
                        echo json_encode(array('success'=>(bool)false, 'type'=>'system', 'data'=>array('message'=>'Sending error, please try again later')));
                        die();
                    }
                }
                else
                {
                    echo json_encode(array('success'=>(bool)false, 'type'=>'validation', 'data'=>$validation));
                    die();
                }
				 
				?>
				 
				<!-- Message sent! (change the text below as you wish)-->
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<div id="form_response" class="text-center">
								<img class="img-responsive" src="img/thumbs/mail_sent.png" alt="image" />
								<h1>Congratulations!!!</h1>
								<p>Thank you <b><?=$first_name;?></b>, your message is sent!</p>
								<a class="btn btn-primary btn-lg" href="index.html">Back To Munomic</a>
							</div>
						</div>	
					</div>					
				</div>
				 <!--End Message Sent-->

				<?php
				 
				}

				?>

		</div>
		
	</body>

</html>