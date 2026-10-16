<?php
require_once 'config/config.php';
$url = API_BASE_URL . '/students';
$response = file_get_contents($url);

// deserialisation (transformer le json en php)
$students = json_decode($response, true);

// affichage de la liste 
echo "<h1>Liste des étudiants</h1>";
foreach ($students as $student) {
  echo $student['name'] . " - " . $student['age'] . " ans<br>";
}
