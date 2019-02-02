<?php $products = $args['products']; ?>

<h1>Összes termék</h1>

<?php if (empty($products)) : ?>
    <strong>Nem található a termék!</strong>
<?php else: ?>
    <ul>
        <?php foreach ($products as $product) : ?>
            <li>Név: <?= $product->name ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>