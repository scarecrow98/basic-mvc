<h1>Összes projekt</h1>
<ul>
    <?php foreach ($args['projects'] as $project) : ?>
        <li>Cím: <?= $project->title ?></li>
    <?php endforeach; ?>
</ul>