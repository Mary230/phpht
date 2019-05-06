<?php
session_start();
if (!isset($_REQUEST['area1'])) return;

$_SESSION['text'] = $_REQUEST['area1'];

header('Location: http://127.0.0.1:8080/index.php?area1='.$_REQUEST['area1']);