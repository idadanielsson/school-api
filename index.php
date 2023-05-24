<?php
require_once 'view/student-api.php';
require_once 'model/student-model.php';
require_once 'model/class-model.php';
require_once 'view/class-api.php';

$pdo = connect($host, $dbname, $password, $charset);
$studentModel = new StudentModel($pdo);
$studentApi = new StudentApi();
$classModel = new ClassModel($pdo);
$classApi = new ClassApi();

if (isset($_GET['action'])) {
    $chosenAction = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

    if ($chosenAction == 'students') {
        $studentApi->outputStudents($studentModel->getStudents());
    }

    if ($chosenAction == 'class') {
        $classApi->outputClasses($classModel->getClasses());
    }

    if ($chosenAction == 'class-id') {
        if (isset($_GET['id'])) {
            $classId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $class = $classModel->getClassById($classId);
            
            if ($class) {
                $classApi->outputClasses($class);
            }}
    }
}