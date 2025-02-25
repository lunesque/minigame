<?php include 'header.php' ?>
<main>
<h1><?= $attacker->getName() ?> VS. <?= $defender->getName() ?> </h1>

<div class='arena'>
    <div class='chara-fight'>
        <h2><?= $attacker->getName() ?></h2>
        <img src='static/images/<?= $attacker->getAvatar() ?>' alt=''>
        <p>HP : <?= $attacker->getCurrentHP() ?></p>

        <form method='post' action='index.php?action=fight&regen=attacker'>
            <input type='hidden' name='attacker' value='<?= $attacker->getId() ?>'>
            <input type='hidden' name='defender' value='<?= $defender->getId() ?>'>
            <input type='submit' value='Regenerate'>
            <input type='text' name='regen-attacker' class='regen'>
        </form>
    </div>

    <div>
    <form method='post' action='index.php?action=fight'>
        <input type='hidden' name='attacker' value='<?= $attacker->getId() ?>'>
        <input type='hidden' name='defender' value='<?= $defender->getId() ?>'>
        <input type='submit' name='attack-defender' value='<?= $attacker->getName() ?> attacks >>'>
    </form>
    <form method='post' action='index.php?action=fight'>
        <input type='hidden' name='attacker' value='<?= $attacker->getId() ?>'>
        <input type='hidden' name='defender' value='<?= $defender->getId() ?>'>
        <input type='submit' name='attack-attacker' value='<< <?= $defender->getName() ?> attacks'>
    </form>

    </div>
        
    <div class='chara-fight'>
        <h2><?= $defender->getName() ?></h2>
        <img src='static/images/<?= $defender->getAvatar() ?>' alt=''>
        <p>HP : <?= $defender->getCurrentHP() ?></p>

        <form method='post' action='index.php?action=fight&regen=defender'>
            <input type='hidden' name='attacker' value='<?= $attacker->getId() ?>'>
            <input type='hidden' name='defender' value='<?= $defender->getId() ?>'>
            <input type='submit' value='Regenerate'>
            <input type='text' name='regen-defender' class='regen'>
        </form>
    </div>

</div>

<div class='battle-log'>
    <?= $log ?>
</div>
</main>
