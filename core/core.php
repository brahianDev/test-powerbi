<?php

session_start();
define("APP_URL","http://localhost/university/Proyect/test-powerbi/");
require_once ('model/database.php');
require_once ('model/login.php');
require_once ('model/index.php');
require_once ('model/security.php');
require_once ('model/sql/preparedLogin.php');
require_once ('model/sql/preparedIndex.php');