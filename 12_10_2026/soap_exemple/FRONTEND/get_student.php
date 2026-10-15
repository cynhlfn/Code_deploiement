<?php

$wsdl = "http://localhost:8000/?wsdl";

try {
  $client = new SoapClient($wsdl, [
    'trace' => 1,
    'exceptions' => true
  ]);

  // L'id vient de l'adresse : get_student.php?id=2
  $id = (int) ($_GET['id'] ?? 0);

  // Appel avec un paramètre : on passe un tableau nom => valeur
  $response = $client->get_student_by_id(['student_id' => $id]);

  // Si l'id n'existe pas, le serveur renvoie une réponse vide
  $student = $response->get_student_by_idResult ?? null;

  if ($student === null) {
    echo "Aucun étudiant avec l'id " . $id;
  } else {
    echo "<h1>Étudiant n°" . $student->id . "</h1>";
    echo "Nom : " . htmlspecialchars($student->name) . "<br>";
    echo "Âge : " . $student->age . " ans";
  }
} catch (Exception $e) {
  echo "Erreur : " . $e->getMessage();
}
