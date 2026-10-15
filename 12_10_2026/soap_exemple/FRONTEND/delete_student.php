<?php

$wsdl = "http://localhost:8000/?wsdl";

try {
  $client = new SoapClient($wsdl, [
    'trace' => 1,
    'exceptions' => true
  ]);

  // L'id vient de l'adresse : delete_student.php?id=1
  $id = (int) ($_GET['id'] ?? 0);

  $response = $client->delete_student(['student_id' => $id]);

  // Le serveur renvoie un simple message texte
  echo $response->delete_studentResult;
} catch (Exception $e) {
  echo "Erreur : " . $e->getMessage();
}
