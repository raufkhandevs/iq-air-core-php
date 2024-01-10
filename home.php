<?php

include('airvisual_class.php');

$air = new AirVisual;
$countries = $air->getAllCountries();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layouts/head.php'); ?>
</head>

<body>
    <?php include('layouts/navbar.php'); ?>

    <div class="container">
        <h1 class="text-center my-4">Explore the air quality</h1>
        <div class="lead mb-4 text-center text-muted">anywhere in the world</div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="py-2">
                    <img src="images/map.jpg" width="100%" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="p-3">
                    <h3>Unsafe air quality smothers greater Los Angeles</h3>
                    <p>
                        Los Angeles, California experienced very poor air quality over several days in October and November,
                        2021. Residents take it for granted that Los Angeles and its suburbs are normally exposed to worse
                        air quality than much of the country. However, air quality monitoring stations across the Los
                        Angeles Basin measured more widespread and worsened air quality than usual on the morning of
                        November 10.
                    </p>
                </div>
            </div>
        </div>
        <!-- end of row -->

        <div class="w-75 mx-auto my-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active bg-dark border-dark" aria-current="true">
                    <span class="text-success fw-bold">GET</span> List supported countries
                </a>
                <?php
                $count = 1;
                foreach ($countries['data'] as $country) {
                    echo '
                    <div class="d-flex list-group-item list-group-item-action ">
                        <div style="flex: 1;" class="fw-bold">' . $count . '</div>
                        <div style="flex: 2;">' . $country['country'] . '</div>
                        <a style="flex: 1;" href="countries_states.php?country=' . $country['country'] . '" class="">GO &rarr; </a>
                    </div>
                    ';
                    $count += 1;
                }
                ?>

            </div>
        </div>


    </div>
    <!-- end of container  -->

    <?php include('layouts/foot.php'); ?>
</body>

</html>