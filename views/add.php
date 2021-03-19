<?php require DIR . 'views/top.php' ?>
<?php
require DIR . 'views/menu.php';

$iban = $this->bankIban();

// $x = $this->addMoney();
// echo $x;
// _d($id);
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
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ([] as $client) : ?>

            <tr>
                <th scope="row"><?= $client->id ?></th>
                <td><?= $client->name ?></td>
                <td><?= $client->surname ?></td>
                <td><?= $client->idn ?></td>
                <td><?= $client->AC ?> </td>
                <td><?= $client->balance ?> EUR</td>



                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $client->id ?>">

                        <button href="http://localhost:8898/Nbank/addMoney" name="btn-add"
                            class="btn btn-sm btn-outline-primary">Add</button>
                        <button href="http://localhost:8898/Nbank/send" name="btn-send"
                            class="btn btn-sm btn-outline-secondary">Send</button>
                        <button type="submit" name="btn-delete" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>

        </tbody>
        <?php endforeach ?>




        <?php foreach ([] as $client) : ?>
        <form action="<?= URL ?>add" class="row row-cols-lg-auto align-items-center" method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" value=""
                        name="name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value=""
                        name="surname">
                </div>



                <div class="col">
                    <input type="number" class="form-control" placeholder="Top up sum" aria-label="Account_number"
                        value="" name="top_up">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-outline-primary">add </button>
                </div>
            </div>

        </form>
        <?php endforeach; ?>


</div>
<?php require DIR . 'views/bottom.php'; ?>