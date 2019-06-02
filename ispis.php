<?php

$niz = [];
$myfile = fopen("pitanja.txt", "r") or die("Unable to open file!");
while (!feof($myfile)) {
    $pitanje = fgets($myfile);
    $odgovor = fgets($myfile);
    $niz[$pitanje] = $odgovor;
}
fclose($myfile);
foreach ($niz as $key => $value) {
    echo($key . "->" . $value);
}
