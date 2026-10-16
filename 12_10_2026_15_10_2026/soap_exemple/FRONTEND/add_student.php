<?php

$wsdl = "http://localhost:8000/?wsdl";

try {
  $client = new SoapClient($wsdl, [
    'trace' => 1,
    'exceptions' => true
  ]);

  // Les valeurs viennent de l'adresse : add_student.php?name=Alice&age=22
  $name = $_GET['name'] ?? '';
  $age = (int) ($_GET['age'] ?? 0);

  if ($name === '') {
    echo "Paramètre manquant. Exemple : add_student.php?name=Alice&age=22";
    exit;
  }

  // Appel avec deux paramètres
  $response = $client->add_student(['name' => $name, 'age' => $age]);

  // Le serveur renvoie l'étudiant créé (avec son id généré)
  $student = $response->add_studentResult;

  echo "Étudiant ajouté : n°" . $student->id . " - "
    . htmlspecialchars($student->name) . " (" . $student->age . " ans)";
} catch (Exception $e) {
  echo "Erreur : " . $e->getMessage();
}
