<?php foreach($_SESSION['messages'] ?? [] as $type => $message): ?>
    <!-- 1-> Je fais une boucle foreach dans la clefs message de la super globale SESSION si elle existe sinon 
     je lui passe un tableau vide -->

    <?php $colors = [
            'success' => 'bg-green-100 text-green-800 border-green-300',
            'danger' => 'bg-red-100 text-red-800 border-red-300',
            'warning' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
            'infos'=> 'bg-blue-100 text-blue-800 border-blue-300',
    ];
    // Je prepare un tableau asssociatif avec le style que je veux pour mes messages flash
    // Je precise que dans la div le $style correspond à mon tableau associatif colors[$type] exemple = si 
    // $type est egale à danger alors $style = $color[danger] => 'bg-red-100 text-red-800 border-red-300' donc $style
    // vaut 'bg-red-100 text-red-800 border-red-300'  
    $style = $colors[$type] ?? 'bg-gray-100 text-gray-800 border-gray-300';

    // Si $type n'existe pas alors la valeur par defaut de $style = 'bg-gray-100 text-gray-800 border-gray-300'
    ?>

    <div class ="western text-center border-l-4 p-4 my-2 rounded-lg shadow-sm <?= $style; ?>">
        <!-- En dehors de mon style de base , on rajoute $style au css -->
        <p class="font-medium"><?= htmlspecialchars($message); ?></p>
        <!-- Dans le <p> on affiche le message en utilisant le htmlspecialchars qui convertit les caractéres spéciaux HTML en entités HTML pour eviter les attaques XSS -->
    </div>
    <?php unset ($_SESSION['messages'][$type]); ?>
<?php endforeach; ?>