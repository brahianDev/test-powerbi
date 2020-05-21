<?php

class security
{
    public static function datesAdmin($name, $apellido, $mail, $rol){
        $_SESSION['_NAME_'] = $name;
        $_SESSION['_LASTNAME_'] = $apellido;
        $_SESSION['_MAIL_'] = $mail;
        $_SESSION['_ROL_'] = $rol;
    }

    public static function validateSession() {
        if (!$_SESSION['_NAME_']) {
            header('location: '.APP_URL.'usuario/access');
        }
    }
}