<?php

require_once("../database/Remainder.class.php");

session_start();

// Which expense to delete
$rid = $_GET["rid"];

$remainder = new Remainder($_SESSION['uid']);
$remainder->delete($rid);
