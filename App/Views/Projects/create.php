<h1>Projekt létrehozása</h1>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
    <input type="text" name="title" placeholder="Cím">
    <textarea name="description" placeholder="Leírás"></textarea>
    <input type="date" name="deadline">
    <input type="submit" name="create" value="Létrehozás">
</form>