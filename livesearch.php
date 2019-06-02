<?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("links.xml");

$x = $xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q = $_GET["q"];

$niz = [];
$myfile = fopen("pitanja.txt", "r") or die("Unable to open file!");
while (!feof($myfile)) {
    $pitanje = fgets($myfile);
    $odgovor = fgets($myfile);
    $niz[$pitanje] = $odgovor;
}
fclose($myfile);


$ans = "";

//lookup all links from the xml file if length of q>0
if (strlen($q) > 0) {
    $hint = "";
    for ($i = 0; $i < ($x->length); $i++) {
        $ans = "";
        $y = $x->item($i)->getElementsByTagName('title');
        if ($y->item(0)->nodeType == 1) {
            //find a link matching the search text
            if (stristr($y->item(0)->childNodes->item(0)->nodeValue, $q)) {
                $t = $y->item(0)->childNodes->item(0)->nodeValue;
                $t = (string)$t;
                foreach ($niz as $key => $value) {
//$string = trim(preg_replace('/\s\s+/', ' ', $string)); ovo nam treba da skinemo new line character
//preg_replace('~[\r\n]+~', '', $string);
                    $tmp = rtrim($key, '~[\r\n]+~') . "$";
                    $tmp = (string)substr($tmp, 0, -2);
                    if (strcmp($tmp, $t) == 0) {
                        //$ans = preg_replace('~[\r\n]+~', '', $key).$key;
                        $ans = $value;
                    }
                }
                $ans = (string)substr($ans, 0, -1);
                $dugmic = "<input type=\"button\" value=\"Answer\" onclick=\"insertText('rjesenje', '" . $ans . "');\">";
                if ($hint == "") {
                    $hint = $y->item(0)->childNodes->item(0)->nodeValue . $dugmic . "<br>";
                } else {
                    $hint = $hint . $y->item(0)->childNodes->item(0)->nodeValue . $dugmic . "<br>";
                }
                //$hint=$hint.$ans."<br>";
            }
        }
    }
}
// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint == "") {
    $response = "no suggestion";
} else {
    $response = $hint;
}

//output the response
echo "<font size=\"3\" color=\"black\" style = \"font-family:&#39;Buxton Sketch&#39;\">" . $response . " </font>";
