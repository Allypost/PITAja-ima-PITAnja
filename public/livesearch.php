<?php
$q = $_GET["q"];

$results = [];

$file = fopen("../pitanja.txt", "r") or die(json_encode(['success' => false]));
while (!feof($file)) {
    $question = trim(fgets($file));
    $answer = trim(fgets($file));

    if (mb_stristr($question, $q)) {
        $results[] = compact('question', 'answer');
    }
}
fclose($file);

header('Content-Type: application/json');
echo(json_encode([
    'success' => true,
    'data' => $results,
]));
