<?php
//A faire : trouver les bordures de pokemon et les mettres dans les div

?>

<header class="flex-none justify-between bg-slate-200 p-5 relative position-sticky">
    <div class="flex justify-between items-center">
        <a href="/"><img class="h-10" src="/assets/images/BlasonDWWM2024.png" alt="logo"></a>
        <?php if (!empty($_SESSION['user']) && $_SESSION['user']['isAdmin'] === 1): ?>
            <h1>Espace admin</h1>
        <?php else: ?>
            <h1>Espace visiteur</h1>
        <?php endif; ?>
        <div>
            <?php if (!empty($_SESSION['user']) && $_SESSION['user']['isAdmin'] === 1): ?>
                <a href="/logout.php"><button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600">Se
                        deconnecter</button></a>
                <a href="/admin/index.php"><button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600">Admin des
                        joueurs</button></a>
            <?php elseif (!empty($_SESSION['user'])): ?>
                <a class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600" href="/logout.php">Se deconnecter</a>

            <?php else: ?>
                <a href="/login.php"><button class="p-2 bg-blue-400 rounded-lg hover:bg-blue-600">Se connecter</button></a>
            <?php endif; ?>
        </div>
    </div>

</header>