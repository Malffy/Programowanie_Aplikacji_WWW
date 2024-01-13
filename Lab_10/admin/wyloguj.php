<?php

// plik wyloguj.php umożliwiający wylogowanie się z serwisu

session_start();
session_destroy();
header("Location: admin.php");
