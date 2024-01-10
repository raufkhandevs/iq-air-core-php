<?php

include('airvisual_class.php');

$country = "";
$state = "";
if (!empty($_GET['country']) && !empty($_GET['state'])) {
    $country = $_GET['country'];
    $state = $_GET['state'];
} else {
    header('location: home.php');
}


$air = new AirVisual;
$cities = $air->getAllCities($country, $state);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body>
    <?php include('layouts/navbar.php'); ?>

    <div class="container">
        <h1 class="my-4">Country / States / Cities</h1>

        <div>
            <ul class="list-group">
                <a href="#" class="list-group-item list-group-item-action active bg-dark border-dark" aria-current="true">
                    <span class="text-success fw-bold">GET</span> List supported cities in a state
                </a>
                <?php
                $count = 1;
                foreach ($cities['data'] as $city) {
                    echo '
                        <li class="list-group-item d-flex justidy-content-between">
                            <div class="fw-bold" style="flex: 1;">' . $count . '</div>
                            <div style="flex: 4;">' . $city['city'] . '</div>
                            <div style="flex: 1;">
                                <a 
                                    href="city_details.php?country=' . $country . '&state=' . $state . '&city=' . $city['city'] . '">
                                    Check Details &rarr;
                                </a>
                            </div>
                        </li>        
                    ';
                    $count += 1;
                }
                ?>

            </ul>
        </div>
    </div>


    <?php include('layouts/foot.php'); ?>
</body>

</html>