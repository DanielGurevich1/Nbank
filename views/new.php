<?php require DIR . 'views/top.php' ?>
<?php
require DIR . 'views/menu.php';

$iban = $this->bankIban();

// $x = $this->addMoney();
// echo $x;
_d($id);
?>
<div class="container">

    <!-- <h4>Hello, <?= $_SESSION['user']['name'] ?></h4> -->
    <a href="<?= URL ?>login.php?logout">Logout</a>

    <h5><?= $pageTitle ?></h5>

    <form action="<?= URL ?>store" class="row row-cols-lg-auto align-items-center" method="post">
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
                <input type="number" class="form-control" placeholder="ID number" aria-label="ID Number" value=""
                    name="idn">
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Account number" aria-label="Account_number"
                    value="<?php echo $iban ?>" name="AC">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-outline-primary">Create </button>
            </div>
        </div>

    </form>

</div>
<?php require DIR . 'views/bottom.php'; ?>

</form>
</div>
<?php require DIR . 'views/bottom.php'; ?>

<!-- // require DIR . 'app/Json.php';
// $newID = new Json();
// echo $newID->createID();
// echo $newID->data[0];


// $rand = Json::getDb()->createID();

// echo Json::getDb()->createID();
// $idnum = $this->createID();
// $idnum = 23456789; -->