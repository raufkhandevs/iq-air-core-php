<?php

include('airvisual_class.php');

$city = "";
$state = "";
$country = "";

if (!empty($_GET['city']) && !empty($_GET['state']) && !empty($_GET['country'])) {
    $city = $_GET['city'];
    $state = $_GET['state'];
    $country = $_GET['country'];
} else {
    header("location: home.php");
}

$air = new AirVisual;
$data = $air->getspecifiedCityData($country, $state, $city);

$level = $data['data']['current']['pollution']['aqius'];

$level_status = $air->measureAirQuality($level);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body>
    <?php include("layouts/navbar.php"); ?>

    <div class="container">
        <a class="btn btn-outline-dark float-end" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>
        <h1 class="my-4">Air quality in
            <?php echo $city; ?>&nbsp;
            <img src="images/<?php echo $data['data']['current']['weather']['ic']; ?>.png" width="50px" alt="">
        </h1>

        <div class="<?php echo $level_status['bg']; ?> card-detail">
            <div class="d-flex align-items-center h-100 w-100">

                <div style="flex: 1;" class="text-center value-box">
                    <div class="value <?php echo $level_status['bg']; ?>-box text-light d-flex flex-column justify-content-between">
                        <div class="text-start">
                            <?php echo $data['data']['city']; ?> AQI
                        </div>
                        <div class="fs-1 text-start">
                            <?php echo $data['data']['current']['pollution']['aqius']; ?>
                        </div>
                    </div>
                </div>

                <div style="flex: 2;">
                    <div>
                        <div class="text-start">LIVE AQI INDEX</div>
                        <div class="fs-1 text-start"><?php echo $level_status['status'] ?></div>
                    </div>
                </div>

                <div style="flex: 1;">
                    <div class="p-5">
                        <img src="images/<?php echo $level_status['img'] ?>" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include("layouts/foot.php"); ?>
</body>

</html>