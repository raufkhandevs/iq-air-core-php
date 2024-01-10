<?php

include('airvisual_class.php');

$country = "";
if (!empty($_GET['country'])) {
    $country = $_GET['country'];
} else {
    header('location: home.php');
}

$air = new AirVisual;
$states = $air->getAllStates($country);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body>
    <?php include('layouts/navbar.php'); ?>

    <div class="container">
        <h1 class="my-4">Country / States</h1>

        <div>
            <ul class="list-group">
                <a href="#" class="list-group-item list-group-item-action active bg-dark border-dark" aria-current="true">
                    <span class="text-success fw-bold">GET</span> List supported states in a country
                </a>
                <?php
                $count = 1;
                foreach ($states['data'] as $state) {
                    echo '
                    <li class="list-group-item d-flex justidy-content-between">
                        <div class="fw-bold" style="flex: 1;">' . $count . '</div>
                        <div style="flex: 4;">' . $state['state'] . '</div>
                        <div style="flex: 1;">
                            <a href="states_cities.php?country=' . $country . '&state=' . $state['state'] . '">Go &rarr;</a>
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