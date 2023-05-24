<?php

require_once "classes/db.php";
require_once 'partials/connect.php';

class StudentModel extends DB{
   
    public function getStudents() {
        
        $statement = $this->pdo->prepare('SELECT students.*, class.name AS class_name FROM students JOIN class ON students.class_id=class.id');
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getStudentById($studentId) {
        $statement = $this->pdo->prepare('SELECT * FROM students WHERE id = :students_id;');
        $statement->execute(['students_id' => $studentId]);

        return $statement->fetch();
    }
    
}

?>

