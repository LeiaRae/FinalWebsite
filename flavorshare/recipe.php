<?php

$recipes = [
    1 => [
        'title' => "Creamy Garlic Pasta",
        'image' => "assets/images/pasta.jpeg",
        'time' => "15 minutes",
        'servings' => 4,
        'ingredients' => ["Pasta", "Garlic", "Heavy cream", "Parmesan"],
        'instructions' => "1. Cook pasta... (add real steps later)"
    ],
    2 => [
        'title' => "Decadent Chocolate Cake",
        'image' => "assets/images/cake.jpeg",
        'time' => "1 hour",
        'servings' => 8,
        'ingredients' => ["Flour", "Cocoa powder", "Eggs", "Sugar"],
        'instructions' => "1. Mix dry ingredients... (add real steps later)"
    ]
];


$id = $_GET['id'] ?? 1;
$recipe = $recipes[$id] ?? $recipes[1];
?>

<?php include 'includes/header.php'; ?>

<section class="recipe-detail">
<img src="<?= $recipe['image'] ?>" alt="<?= $recipe['title'] ?>">

    <h2><?= $recipe['title'] ?></h2>
    
    <div class="meta">
        <span>⏱️ <?= $recipe['time'] ?></span>
        <span>🍽️ Serves <?= $recipe['servings'] ?></span>
    </div>

    <h3>Ingredients</h3>
    <ul>
        <?php foreach ($recipe['ingredients'] as $ingredient): ?>
            <li><?= $ingredient ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Instructions</h3>
    <p><?= nl2br($recipe['instructions']) ?></p>
</section>

<?php include 'includes/footer.php'; ?>