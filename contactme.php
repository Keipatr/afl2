<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  date_default_timezone_set('Asia/Jakarta');
  $jsonData = file_get_contents('./json/listcontact.json');
  $contacts = json_decode($jsonData, true);

  $contacts[] = array(
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'date' => date('Y-m-d H:i:s')
  );

  $jsonData = json_encode($contacts, JSON_PRETTY_PRINT);
  file_put_contents('./json/listcontact.json', $jsonData);
}
 header('Location: contact.html');
  exit;
?>
