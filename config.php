<?php
    function loadClass($class) {
        require 'class/'.$class.'.php';
    }
    spl_autoload_register('loadClass');

    session_start();
 
    $db = new PDO('mysql:host=localhost;dbname=minigame', 'root', '');

    $manager = new CharacterManager($db);
?>