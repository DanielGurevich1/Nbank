<?php require DIR . 'views/top.php' ?>
<?php
require DIR . 'views/menu.php';

$iban = $this->bankIban();

?>
<div class="container">
    <a href="<?= URL ?>login.php?logout">Logout</a>

    <h5><?= $pageTitle ?></h5>
    <table class="table table-bordered border-secondary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">ID</th>
                <th scope="col">ACC NUM</th>
                <th scope="col">Balance</th>
                <th scope="col">Sum</th>
                <th scope="col">Add</th>


            </tr>
        </thead>
        <tbody>

            <form action="" method="post">
                <th scope="row"><?= $client->id ?></th>
                <td><?= $client->name ?></td>
                <td><?= $client->surname ?></td>
                <td><?= $client->idn ?></td>
                <td><?= $client->AC ?> </td>
                <td><?= $client->balance ?> EUR</td>
                <td>
                    <input type="number" name="topup" placeholder="sum">
                </td>
                <td>
                    <form style="diplay:inline-block" action="<?= URL ?>add/<?= $client->id ?>" method="POST">

                        <button type="submit" name="btn-add" class="btn btn-sm btn-outline-secondary">Add</button>
                    </form>
                </td>

            </form>