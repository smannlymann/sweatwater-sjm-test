<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$sweatwaterTestLogic = new \logic\SweatwaterTestLogicObject();
$numberFixed = $sweatwaterTestLogic->fixExpectedShipDates();

print '<p>Number of Ship Dates Fixed: ' . $numberFixed . ' records.';