<?php

$wsdl = "http://localhost:8000/?wsdl";

try {
  $client = new SoapClient($wsdl, [
    'trace' => 1,
    'exceptions' => true
  ]);

  // Exemple : update_student.php?id=2&name=Samir Ali&age=42
  $id = (int) ($_GET['id'] ?? 0);
  $name = $_GET['name'] ?? '';
  $age = (int) ($_GET['age'] ?? 0);

  $response = $client->update_student([
    'student_id' => $id,
    'name' => $name,
    'age' => $age
  ]);

  $student = $response->update_studentResult ?? null;

  if ($student === null) {
    echo "Aucun étudiant avec l'id " . $id;
  } else {
    echo "Étudiant modifié : n°" . $student->id . " - "
      . htmlspecialchars($student->name) . " (" . $student->age . " ans)";
  }
} catch (Exception $e) {
  echo "Erreur : " . $e->getMessage();
}
