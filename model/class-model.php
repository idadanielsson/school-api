<?php
    include_once 'partials/connect.php';

    class ClassModel {
        private $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function getClasses() {
            $statement = $this->pdo->prepare('SELECT * FROM class;');
            $statement->execute();

            return $statement->fetchAll();
        }

        public function getClassById($classId) {
            $statement = $this->pdo->prepare('SELECT * FROM class WHERE id = :class_id;');
            $statement->execute(['class_id' => $classId]);
    
            return $statement->fetch();
        }
    }

?>