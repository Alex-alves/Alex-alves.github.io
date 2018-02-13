<?php
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

// Check for empty fields
if(empty($_POST['nome'])  		||
   empty($_POST['email']) 		||
   empty($_POST['telefone']) 		||
   empty($_POST['mensagem'])	||
   !$email_address)
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['nome'];
if ($email_address === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$phone = $_POST['telefone'];
$message = $_POST['mensagem'];


// Create the email and send the message
$to = 'alexsandroalves80@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulário de contato do site:  $name";
$email_body = "Você recebeu uma nova mensagem do formulário de contato do seu site.\n\n"."Aqui estão os detalhes:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
