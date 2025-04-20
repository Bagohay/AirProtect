<?php

namespace App\Controllers;

use Config\Database;

class BaseController{

    protected $db;

    public function __construct(){
        $this ->db = Database:: getInstance()->getConnection();
    }


    public function getDb() {
        return $this->db;
    }

    //for rendering pages using routing
    protected function render($view, $data = []) {
        $viewPath = __DIR__ . "/../Views/$view.php";

        if (file_exists($viewPath)) {
            ob_start();
            extract($data);
            include($viewPath);
            $content = ob_get_clean();
            echo $content;
        } else {
            echo "cannot access the web";
        }
    }
    //
    protected function loadModel($model) {
        $modelClass = "App\\Models\\$model";

        if (class_exists($modelClass)) {
            return new $modelClass();
        } else {
          echo " cannot access the model";
        }
    }


    
    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
    
    //for JS RETRIEVING FUNCTION

    
    // ✅ Check if request is from Axios
    protected function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    

    // ✅ Respond with JSON (generic)
    protected function json($data = [], $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    // ✅ Respond with JSON success (standardized)
    protected function jsonSuccess($data = [], $message = 'Success', $statusCode = 200) {
        $this->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    // ✅ Respond with JSON error (standardized)
    protected function jsonError($message = 'An error occurred', $statusCode = 400, $data = []) {
        $this->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    // ✅ Parse JSON from request body
    protected function getJsonInput(): array {
        return json_decode(file_get_contents('php://input'), true) ?? [];
    }

    protected function requireFields(array $fields, array $input): void {
        foreach ($fields as $field) {
            if (!isset($input[$field])) {
                $this->jsonError("Missing required field: $field", 422);
            }
        }
    }
    

    // ✅ Input helpers
    protected function request($key = null, $default = null) {
        $request = array_merge($_GET, $_POST);
        if ($key) {
            return $request[$key] ?? $default;
        }
        return $request;
    }


    //
    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function isGet(){
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }






    
    
        
    
}




?>