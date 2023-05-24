<?php

class ClassApi {

    public function outputClasses(array $class): void {

        $json = [
            'student-count' => count($class),
            'result' => $class
        ];
        header("Content-Type: application/json");
        echo json_encode($json);
    }

}

?>