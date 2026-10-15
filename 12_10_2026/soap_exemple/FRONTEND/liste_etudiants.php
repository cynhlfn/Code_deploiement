<?php

$wsdl = "http://localhost:8000/?wsdl";

try {
  $client = new SoapClient($wsdl, [
    'trace' => 1,
    'exceptions' => true
  ]);

  // Appel de l'opération get_all_students du serveur Python
  $response = $client->get_all_students();

  // La liste des étudiants se trouve dans get_all_studentsResult->Student
  $students = $response->get_all_studentsResult->Student ?? [];

  // PHP renvoie un objet seul (et non un tableau) s'il n'y a qu'un étudiant
  if (!is_array($students)) {
    $students = [$students];
  }

  echo "<h1>Liste des étudiants</h1>";
  echo "<ul>";
  foreach ($students as $student) {
    echo "<li>" . $student->id . " - " . $student->name . " (" . $student->age . " ans)</li>";
  }
  echo "</ul>";
} catch (Exception $e) {
  echo "Erreur : " . $e->getMessage();
}
