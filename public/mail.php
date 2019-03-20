<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
  print json_encode(array('message' => 'Le nom ne dois pas être vide', 'code' => 0));
  exit();
}
if ($email === ''){
  print json_encode(array('message' => "l'email ne dois pas être vide", 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  print json_encode(array('message' => "Le format de L'email est invalide.", 'code' => 0));
  exit();
  }
}
if ($subject === ''){
  print json_encode(array('message' => 'Le subject ne dois pas être vide', 'code' => 0));
  exit();
}
if ($message === ''){
  print json_encode(array('message' => 'Le message ne dois pas être vide', 'code' => 0));
  exit();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "nextlan@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => "l'email a bien été envoyer!", 'code' => 1));
exit();
?>