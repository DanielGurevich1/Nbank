<?php require DIR . 'views/top.php' ?>
<?php
require DIR . 'views/menu.php';
// require DIR . 'app/Json.php';
$newID = new Json();
echo $newID->createID();
// echo $newID->data[0];

$individualAccountNum = rand(1234, 9876);
// $rand = Json::getDb()->createID();

// echo Json::getDb()->createID();
// $idnum = $this->createID();
// $idnum = 23456789;
// // $iban = $this->bankIban();

// $iban = 4567890;

$lastfigures = rand(116688, 999688);
$first = 'LT';
$x = 7044060000;
$accountNum =  "$first" . $x . $lastfigures;

$idn = rand(6688, 7688);
$firstNum = rand(3, 6);
$d = (date("ymd"));
$ak = $firstNum . $d . $idn;
?>
<div class="container">

    <h4>Hello, <?= $_SESSION['user']['name'] ?></h4>
    <a href="<?= URL ?>login.php?logout">Logout</a>

    <h5><?= $pageTitle ?></h5>

    <form action="<?= URL ?>store" class="row row-cols-lg-auto align-items-center" method="post">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="" name="name">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="" name="surname">
            </div>

            <div class="col">
                <input type="number" class="form-control" placeholder="ID number" aria-label="ID Number" value="<?= $ak ?>" name="idn">
            </div>

            <div class="col">
                <input type="text" class="form-control" placeholder="Account number" aria-label="Account_number" value="<?php echo $accountNum ?>" name="AC">
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