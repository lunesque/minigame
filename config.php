<?php
    function loadClass($class) {
        require 'class/'.$class.'.php';
    }
    spl_autoload_register('loadClass');

    session_start();
 
    $db = new PDO('mysql:host=mysql-thuyhangnguyen.alwaysdata.net;dbname=thuyhangnguyen_minigame', '401406_user', 'basicuser');

    $manager = new CharacterManager($db);
?>