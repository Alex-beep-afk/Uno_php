<?php
//A faire : trouver les bordures de pokemon et les mettres dans les div

?>

<header class="flex-none justify-between bg-red-700 p-5 relative position-sticky shadow-xl">
    <div class="flex justify-between items-center mx-auto">
        <div class="flex items-center gap-5">
           <a href="/"><img class="h-50 shadow-lg" src="/assets/images/Logo.png" alt="logo"></a>
           <h2 class="text-2xl font-bold text-yellow-100 western">Les singes codeurs</h2>
        </div>
        
        <?php if (!empty($_SESSION['user']) && $_SESSION['user']['isAdmin'] === 1): ?>
            <h1 class="western text-3xl ml-20">Uno-Game admin</h1>
        <?php else: ?>
            <div>
                <h1 class="western text-3xl mr-40">Uno-Game visiteur</h1>
            </div>
        <?php endif; ?>
        <div>
            <?php if (!empty($_SESSION['user']) && $_SESSION['user']['isAdmin'] === 1): ?>
                <a class="p-2 western hover:scale-110 hover:text-yellow-100" href="/logout.php">Se
                        deconnecter</a>
                <a class="p-2 western hover:scale-110 hover:text-yellow-100" href="/admin/index.php">Admin des
                        joueurs</a>
            <?php elseif (!empty($_SESSION['user'])): ?>
                <a class="p-2 westernText hover:scale-110 hover:text-yellow-100" href="/logout.php">Se deconnecter</a>

            <?php else: ?>
                <a class="p-2 western hover:scale-110 hover:text-yellow-100" href="/login.php"> Se connecter</a>
            <?php endif; ?>
        </div>
    </div>

</header>