<?php

class framwork
{
    public function view($view, $data = []) {
        if (file_exists("../application/views/" . $view . ".php")) {
            require_once "../application/views/$view.php";
        } else {
            echo "Sorry, $view.php page not found";
        }
    }

    public function model($model) {
        if (file_exists("../application/models/" . $model . ".php")) {
            require_once "../application/models/$model.php";
            return new $model;
        } else {
            echo "Sorry, $model.php page not found";
        }
    }

    public function input($input) {
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        if ($method == 'POST' || $method == 'GET') {
            return trim(strip_tags($_REQUEST[$input] ?? ''));
        }
    }

    public function helper($helper) {
        if (file_exists("../system/helpers/" . $helper . ".php")) {
            require_once "../system/helpers/" . $helper . ".php";
        } else {
            echo "Sorry, $helper.php page not found";
        }
    }

    public function setSession($sessionName, $sessionValue) {
        if (!empty($sessionName) && !empty($sessionValue)) {
            $_SESSION[$sessionName] = $sessionValue;
        }
    }

    public function getSession($sessionName) {
        return $_SESSION[$sessionName] ?? null;
    }

    public function unsetSession($sessionName) {
        if (!empty($sessionName)) {
            unset($_SESSION[$sessionName]);
        }
    }

    public function destroySessions() {
        session_destroy();
    }

    public function setFlash($sessionName, $msg) {
        if (!empty($sessionName) && !empty($msg)) {
            $_SESSION[$sessionName] = $msg;
        }
    }

    public function getFlash($sessionName, $className) {
        if (!empty($sessionName) && !empty($className) && isset($_SESSION[$sessionName])) {
            $msg = $_SESSION[$sessionName];
            echo "<div class='$className'>$msg</div>";
            unset($_SESSION[$sessionName]);
        }
    }

    public function redirect($path) {
        header("Location:  . BASEPATH . "/" . $path");
        exit();
    }
}
?>
