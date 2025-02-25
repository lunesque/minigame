<?php include 'header.php' ?>
<main>
<h1>Create a new character</h1>
<form class='chara-form' action="index.php?action=create-chara" method="post">
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
    <div class='name'>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>

    <div class='hp'>
    <label for="maxHP">HP:</label>
    <input type="text" name="maxHP" id="maxHP">
    </div>

    <div class='atk'>
    <label for="atk">Atk:</label>
    <input type="text" name="atk" id="atk">
    </div>

    <div class='def'>
    <label for="def">Def:</label>
    <input type="text" name="def" id="def">
    </div>
    <input type="submit" value="Create">
</form>
</main>