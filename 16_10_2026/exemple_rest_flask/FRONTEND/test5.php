<?php
require_once 'config/config.php';
require_once 'services/StudentServices.php';
$url = API_BASE_URL . '/students';
$response = file_get_contents($url);

// deserialisation (transformer le json en php)
$students = StudentService::getAllStudents();

// affichage de la liste 
echo "<h1>Liste des étudiants</h1>";
foreach ($students as $student) {
  echo $student['name'] . " - " . $student['age'] . " ans<br>";
}
