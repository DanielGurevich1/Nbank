<?php require DIR . 'views/top.php' ?>
<h3><?= $pageTitle ?></h3>
<h3>Add Money</h3>
<?php require DIR . 'views/menu.php' ?>

<form action="<?= URL ?>addMoney/<?= $client->id ?>" method="post">
    Bannanas in box: <input type="text" name="count" value="<?= $client->id ?>">
    <button type="submit">Edit</button>
</form>

<?php require DIR . 'views/bottom.php' ?>