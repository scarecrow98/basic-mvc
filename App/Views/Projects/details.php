<?php $project = $args['project'] ?>

<h1>Részletek</h1>
<ul>
    <li>ID: <?= $project->ID ?></li>
    <li>Cím: <?= $project->title ?></li>
    <li>Leírás: <?= $project->description ?></li>
    <li>Határidő: <?= $project->deadline ?></li>
</ul>