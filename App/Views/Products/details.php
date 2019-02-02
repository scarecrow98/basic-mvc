<?php $product = $args['product'] ?>

<h1>Részletek</h1>
<?php if (empty($product)) : ?>
    <strong>Nem található a termék!</strong>
<?php else: ?>
    <ul>
        <li>ID: <?= $product->ID ?></li>
        <li>Név: <?= $product->name ?></li>
        <li>Leírás: <?= $product->description ?></li>
        <li>Ár: <?= $product->price ?> Ft</li>
    </ul>
<?php endif; ?>