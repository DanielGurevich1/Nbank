<?php require DIR . 'views/top.php' ?>
<h3><?= $pageTitle ?></h3>
<h3>Add Money</h3>
<?php require DIR . 'views/menu.php' ?>
<div class="container">
    <!-- <h4>Hello, <?= $_SESSION['user']['name'] ?></h4> -->
    <a href="<?= URL ?>login.php?logout">LogOut</a>
    <h5>Fill the balance field to add money</h5>
    <div class="card">
        <div class="card-body">
            <?php foreach ($clients as $client) : ?>

            <!-- <h4>
                        Update user <b><?php echo $client['id'] ?></b>
                    </h4> -->
            <form action="<?= URL ?>add.php" method="post">
                <input type="hidden" name="id" value="<?= $client['id'] ?>">
                <div class="row">
                    <div class="col">
                        Nr.: <?= $client['id'] ?>

                    </div>
                    <div class="col">
                        <?= $client['name'] ?>

                    </div>
                    <div class="col">
                        <?= $client['surname'] ?>

                    </div>
                    <div class="col">
                        Balance: <?= $client['balance'] ?>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Balance" aria-label="Balance"
                            name="balance">
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-outline-primary" name="btn-add">Add</button>
                    </div>
                </div>

            </form>
            <?php endforeach; ?>

            <!-- <form action="<?= URL ?>addMoney/<?= $client->id ?>" method="post">
    Bannanas in box: <input type="text" name="count" value="<?= $client->id ?>">
    <button type="submit">Edit</button>
</form> -->

            <?php require DIR . 'views/bottom.php' ?>