<?php
require 'config.php'; 

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'choose-chara':
            $allCharacters = $manager->getAllCharacters();
            require 'view/choose-chara.php';
            break;

        case 'new-chara':
            require 'view/new-chara.php';
            break;
    
        case 'create-chara':
            $chara = new Character($_POST);
            if ($manager->addCharacter($chara)) {
                $message = "<p class='success'>Character added</p>";
            } else {
                $message = "<p class='error'>Error</p>";
            };
            echo $message;
            $allCharacters = $manager->getAllCharacters();
            require 'view/choose-chara.php';
            break;
    
        case 'delete-chara':
            if ($manager->deleteCharacter($_GET['id'])) {
                $message = "<p class='success'>Character deleted</p>";
            } else {
                $message = "<p class='error'>Error</p>";
            };
            echo $message;
            $allCharacters = $manager->getAllCharacters();
            require 'view/all-chara.php';
            break;
    
        case 'all-chara':
            $allCharacters = $manager->getAllCharacters();
            require 'view/all-chara.php';
            break;

        case 'modify-chara':
            if ($manager->modifyCharacter($_GET['id'],$_POST)) {
                $message = "<p class='success'>Character modified</p>";
            } else {
                $message = "<p class='error'>Error</p>";
            };
            echo $message;
            $allCharacters = $manager->getAllCharacters();
            require 'view/all-chara.php';
            break;
    
        case 'fight':
            if (isset($_POST['attacker']) && isset($_POST['defender'])) {
                $attacker = clone $manager->getOneCharacterById($_POST['attacker']);
                $defender = clone $manager->getOneCharacterById($_POST['defender']);

                $log = "<p>Battle start!<p>";

                if (count($_POST)==2) {
                    $attacker->setCurrentHP($attacker->getMaxHP());
                    $defender->setCurrentHP($defender->getMaxHP());
                    $_SESSION['attacker-hp'] = $attacker->getMaxHP();
                    $_SESSION['defender-hp'] = $defender->getMaxHP();
                } 
                else {
                    $attacker->setCurrentHP($_SESSION['attacker-hp']);
                    $defender->setCurrentHP($_SESSION['defender-hp']);
                }

                //regeneration HP
                if (isset($_GET['regen'])) {
                    switch ($_GET['regen']) {
                        case 'attacker': 
                            if ($_POST['regen-attacker'] != '') {
                                $attacker->regenerate($_POST['regen-attacker']);
                            } else $attacker->regenerate();
                            $_SESSION['attacker-hp'] = $attacker->getCurrentHP();
                            $log = "<p><strong>{$attacker->getName()}</strong> regenerated {$_POST['regen-attacker']} HP </p>";
                            break;
                        case 'defender':
                            if ($_POST['regen-defender'] != '') {
                                $defender->regenerate($_POST['regen-defender']);
                            } else $defender->regenerate();
                            $_SESSION['defender-hp'] = $defender->getCurrentHP();
                            $log = "<p><strong>{$defender->getName()}</strong> regenerated {$_POST['regen-defender']} HP </p>";
                            break;
                    }

                }

                //attack
                if (isset($_POST['attack-defender'])) {
                    $dmg = $attacker->attack($defender);
                    $log = "<p><strong>{$attacker->getName()}</strong> attacked <strong>{$defender->getName()}</strong> and dealt {$dmg} damage.</p>";
                    $_SESSION['defender-hp'] = $defender->getCurrentHP();

                    if ($defender->is_dead()) {
                        $log = "<p><strong>{$attacker->getName()}</strong> defeated <strong>{$defender->getName()}</strong>!</p><a href=''>Start a new game ?</a>";
                    }
                }
                if (isset($_POST['attack-attacker'])) {
                    $dmg = $defender->attack($attacker);
                    $log = "<p><strong>{$defender->getName()}</strong> attacked <strong>{$attacker->getName()}</strong> and dealt {$dmg} damage.</p>";
                    $_SESSION['attacker-hp'] = $attacker->getCurrentHP();

                    if ($attacker->is_dead()) {
                        $_SESSION['game'] = 'over';
                        $log = "<p><strong>{$defender->getName()}</strong> defeated <strong>{$attacker->getName()}</strong> !</p><a href=''>Start a new game ?</a>";
                    }
                }
                require 'view/fight.php';
            } else header('Location: index.php?action=choose-chara');
            
            break;
    
        case 'about':
            require 'view/about.php';
            break;

        default:
            require 'view/home.php';
            break;
    }
} else {
    require 'view/home.php';
}


?>