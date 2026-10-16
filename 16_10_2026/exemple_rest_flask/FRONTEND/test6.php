<?php
require_once 'config/config.php';
require_once 'services/StudentServices.php';
// Récupération des données
$students = StudentService::getAllStudents();
// Affichage
require_once 'views/students.php';
