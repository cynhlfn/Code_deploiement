<?php
$url = "http://127.0.0.1:5001/students";
$response = file_get_contents($url);

// deserialisation (transformer le json en php)
$students = json_decode($response, true);

// affichage de la liste 
echo "<h1>Liste des étudiants</h1>";
foreach ($students as $student) {
  echo $student['name'] . " - " . $student['age'] . " ans<br>";
}
