<?php
chdir(__DIR__);
$baseUrl = getenv('BASE_URL') ?? '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Trivia answers! ~ FinalBastion ~</title>
        <link href="<?= $baseUrl ?>/khrysaliswi.ico" rel="shortcut icon">

        <!-- Latest compiled and minified CSS -->
        <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              rel="stylesheet">

        <script>var baseUrl =<?= json_encode($baseUrl) ?></script>
        <script src="<?= $baseUrl ?>/main.js"></script>
        <link href="<?= $baseUrl ?>/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <img id="nav-img" src="" alt="Picture trivia">
        </div>
        <div id="background">
            <img src="<?= $baseUrl ?>/pozadina.gif" class="stretch" alt="" />
        </div>
        <div class="container-fluid">
            <div class="row top-buffer">
                <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 podloga">
                    <div class="row">
                        <form class="col-sm-8 col-sm-offset-2">
                            <div class="row top-buffer">
                                <div class="col-xs-12">
                                    <img alt="Trivia" height="100" src="<?= $baseUrl ?>/trivia.png">
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-xs-12">
                                    <img alt="Answers" height="150" src="<?= $baseUrl ?>/answers.png">
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-xs-12">
                                    <a href="https://finalbastion.com/" target="_blank"><img alt="Final Bastion" height="40" src="<?= $baseUrl ?>/HouseofWilliam.png"></a>
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-xs-12">
                                    <label for="selectBox">Picture Trivia: </label>
                                    <select id="selectBox" onchange="openTriviaImage(value)">
                                        <option value="" selected>--Please choose a Trivia--</option>
                                        <option value="dog-breeds">Dog Breeds</option>
                                        <option value="famous-landmarks">Famous Landmarks</option>
                                        <option value="state-flags">State Flags</option>
                                        <option value="famous-art">Famous Art</option>
                                        <option value="geometric-shapes">Geometric Shapes</option>
                                        <option value="bird-types">Bird Types</option>
                                        <option value="advanced-spelling">Advanced spelling</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="row">
                                        <input class="col-xs-8 vcenter question-input" onkeyup="showResult(this.value)" placeholder="Find your trivia question here..." type="text">
                                        <img class="col-xs-2 vcenter input-image" onclick="poruka1()" src="<?= $baseUrl ?>/wizbangquestiongold.gif">
                                    </div>
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="row question-list"></div>
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <div class="row">
                                        <img class="col-sm-2 vcenter input-image" src="<?= $baseUrl ?>/QuestSpiralexclamation.gif" onclick="poruka2()">
                                        <div class="col-sm-8 vcenter answer-box" data-placeholder="...to show the answer here!"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row top-buffer">
                                <div class="col-xs-12">
                                    <div class="row top-buffer">
                                        <img src="<?= $baseUrl ?>/dodle.png" onclick="poruka3()" alt="Mascot doodle">
                                    </div>
                                    <div class="row top-buffer">
                                        <p>~ Copyright &copy; <?= date("Y") ?> of FinalBastion.com & WilliamTheHouseOwner ~</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
