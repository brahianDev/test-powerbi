<?php


class loginController extends login
{
    public function error() {
        require_once('view/all/header.php');
        require_once('view/login/errorLogin.php');
    }

    public function usersLogin() {
        if (isset($_POST['userEmail']) && isset($_POST['userPassword'])) {
            $mailUser = trim($_POST['userEmail']);
            $passUser = trim($_POST['userPassword']);

            foreach (parent::loginUsers($mailUser) as $user) {}
            if (isset($user) && !empty($user)) {
                if ($mailUser == $user->email && $passUser == $user->clave && $user->rol == $this->getRol('admin')) {
                    security::datesAdmin($user->nombre, $user->apellido, $user->email, $user->rol_id);
                    header('location: '.APP_URL.'home');
                } else if($mailUser == $user->email && $passUser == $user->clave && $user->rol == $this->getRol('student')) {
                    echo 'Entra como estudiante';
                } else {
                    header('location: '.APP_URL.'login/error');
                }
            } else {
                header('location: '.APP_URL.'login/error');
            }
        } else {
            echo 'Algo salio mal !';
        }
    }

    public function destroySession() {
        session_destroy();

        header('location: '.APP_URL);
    }

    public function getRol($type) {
        switch ($type) {
            case 'admin':
                return 'administrador';
            break;
            case 'student':
                return 'estudiantes';
            break;
            default:
                return false;
            break;
        }
    }
}