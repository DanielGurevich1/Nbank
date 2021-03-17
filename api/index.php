<?php
$dist = 0;
define('API', 'https://www.distance24.org/route.json?stops=');

$city1 = 'Kaunas';
$city2 = 'Vilnius';
// serverio vidus
// php curl - serverio narsykle 

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, API . $city1 . '|' . $city2); // go there 

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // bring return

$answer = curl_exec($curl); // request sent, whait..., for the answer, write the answer to $answer
curl_close($curl); // close curl
$answer = json_decode($answer);
// echo $answer;
$dist = $answer;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h2, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        City 1 <input type="text" name="c1">
        City 2 <input type="text" name="c2">
        <button type="submit">Distance</button>

    </form>
    <h2>Distance: <?= $dist ?> km</h2>
</body>

</html>