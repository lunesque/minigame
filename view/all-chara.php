<?php
include 'header.php';
echo "<main><h1>Character archive</h1>
    <div class='archive'>";

foreach ($allCharacters as $chara) {
    echo "<div class='archive-card'>";
        if (isset($_GET["id"]) && $_GET["id"]==$chara->getId()) {
            echo "<a href='index.php?action=all-chara' alt='Cancel changes' class='cancel'><img width=24px src='static/images/x-lg.svg'></a>
            <form class='modify-form' action='index.php?action=modify-chara&id={$chara->getId()}' method='post'>
                <div class='avatar-selection'>
                    <label for='fauna'>
                        <input type='radio' name='avatar' class='card-radio' value='fauna.webp' id='fauna'>
                            <div class='card'>
                                <img src='static/images/fauna.webp' alt=''>
                            </div>
                    </label>
                    <label for='isabelle'>
                        <input type='radio' name='avatar' class='card-radio' value='isabelle.webp' id='isabelle'>
                            <div class='card'>
                                <img src='static/images/isabelle.webp' alt=''>
                            </div>
                    </label>
                    <label for='raymond'>
                        <input type='radio' name='avatar' class='card-radio' value='raymond.webp' id='raymond'>
                            <div class='card'>
                                <img src='static/images/raymond.webp' alt=''>
                            </div>
                    </label>
                </div>
                <label for='name'>Name</label>
                <input name='name' type='text' value='{$chara->getName()}'>
                <label for='maxHP'>HP : </label>
                <input name='maxHP' type='text' value='{$chara->getMaxHP()}'>
                <label for='atk'>ATK : </label>
                <input name='atk' type='text' value='{$chara->getAtk()}'>
                <label for='def'>DEF : </label>
                <input name='def' type='text' value='{$chara->getDef()}'>
                <input type='submit' value='Save changes'>
            </form></div>
            ";
        } else echo "
        <img src='static/images/{$chara->getAvatar()}' alt=''>
        <h3>{$chara->getName()}</h3>
        <p>HP : {$chara->getMaxHP()}</p>
        <p>ATK : {$chara->getAtk()}</p>
        <p>DEF : {$chara->getDef()}</p>
        <a href='index.php?action=all-chara&id={$chara->getId()}' alt='Modify character' class='pencil'><img width=20px src='static/images/pencil.svg'></a>
        <a href='index.php?action=delete-chara&id={$chara->getId()}' alt='Delete character' class='trashcan'><img width=20px src='static/images/trash3.svg'></a>
    </div>";
}



echo "</div></main>";

?>