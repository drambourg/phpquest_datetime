<?php
require_once ('TimeTravel.php');

$dateMarty = new DateTime('1985-12-31');
$dateToday = new DateTime();

$timeTravel = new Time\TimeTravel($dateMarty,$dateToday);
echo "-- Marty est par rapport à aujourd'hui à : <br>";
echo $timeTravel->getTravelInfo() ."<br>";

echo "-- Recherchons Doc.... il se trouve : <br>";
$intervalDoc = new DateInterval(' PT1000000000S') ;
echo $timeTravel->findDate($intervalDoc)->format(DateTime::COOKIE) . "<br>";

echo "-- Revenez!!! Allez on fait des pauses tous les mois et 1 semaine et 1 jour.. : <br>";
$intervalFuelBreak = new DateInterval(' P1M8D') ;
$dateStepToBacks = $timeTravel->backToFutureStepByStep($intervalFuelBreak);

foreach ($dateStepToBacks as $dateBreak) {
    echo $dateBreak . "<br>";
}
echo "-- Salut! Ca va? vous etes de retour? T as pensé à prendre du pain..";