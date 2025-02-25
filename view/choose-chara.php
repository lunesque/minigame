<?php include 'header.php' ?>
    <main>
    <h1>Choose your fighters</h1>
    <a href='index.php?action=new-chara'>Create a new character</a>

    <form action='index.php?action=fight' method='post' class='chara-selection'>

    <div class='attacker'>
    <h2>Fighter 1</h2>
    <div class='chara-list'>
    <?php 
        foreach ($allCharacters as $chara) {
            echo "<div class='chara'>
                <label for='attacker-{$chara->getId()}'>
                <input type='radio' name='attacker' class='card-radio' value='{$chara->getId()}' id='attacker-{$chara->getId()}'>
                    <div class='card'>
                    <img src='static/images/{$chara->getAvatar()}' alt=''>
                    <h3>{$chara->getName()}</h3>
                    <p>HP : {$chara->getMaxHP()}</p>
                    <p>ATK : {$chara->getAtk()}</p>
                    <p>DEF : {$chara->getDef()}</p>
                    </div>
                </label>
                </div>
            ";
        }
    ?>

    </div>
    </div>


    <div class='defender'>
    <h2>Fighter 2</h2>
    <div class='chara-list'>
    <?php 
        foreach ($allCharacters as $chara) {
            echo "<div class='chara'>
                <label for='defender-{$chara->getId()}'>
                <input type='radio' name='defender' class='card-radio' value='{$chara->getId()}' id='defender-{$chara->getId()}'>
                
                    <div class='card'>
                    <img src='static/images/{$chara->getAvatar()}' alt=''>
                        <h3>{$chara->getName()}</h3>
                        <p>HP : {$chara->getMaxHP()}</p>
                        <p>ATK : {$chara->getAtk()}</p>
                        <p>DEF : {$chara->getDef()}</p>
                    </div>
                </label>
            </div>
        ";}
    ?>
    </div>
    </div>

    <input type='submit' class='fight-button' value='Start fight'>
    </main>