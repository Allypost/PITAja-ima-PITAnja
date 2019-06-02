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
        <div id="myNav" class="overlay"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><img id="nav-img" src="" alt="Picture trivia"></div>
        <div id="background">
            <img src="<?= $baseUrl ?>/pozadina.gif" class="stretch" alt="" />
        </div>
        <div class="container-fluid">

            <div class="row top-buffer">
                <div align="center" class="col-md-8 col-md-offset-2">
                    <form width="40%" class="podloga">
                        <div class="row top-buffer">
                            <div class="col-md-12">
                                <img alt="Trivia" height="100" src="<?= $baseUrl ?>/trivia.png">
                            </div>
                        </div>
                        <div class="row top-buffer">
                            <div class="col-md-12">
                                <img alt="Answers" height="150" src="<?= $baseUrl ?>/answers.png">
                                <div>
                                    <div>
                                        <div class="row top-buffer">
                                            <div class="col-md-12">
                                                <a href="https://finalbastion.com/" target="_blank"><img alt="Final Bastion" src="<?= $baseUrl ?>/HouseofWilliam.png" target="_blank" height="40"
                                                                                                         style="margin-bottom: 20px;"></a>
                                            </div>
                                            <label for="selectBox">Picture Trivia: </label>
                                            <select id="selectBox" onchange="changeFunc(value)">
                                                <option selected>--Please choose a Trivia--</option>
                                                <option value="dog-breeds">Dog Breeds</option>
                                                <option value="famous-landmarks">Famous Landmarks</option>
                                                <option value="state-flags">State Flags</option>
                                                <option value="famous-art">Famous Art</option>
                                                <option value="geometric-shapes">Geometric Shapes</option>
                                                <option value="bird-types">Bird Types</option>
                                                <option value="advanced-spelling">Advanced spelling</option>
                                            </select>
                                        </div>
                                        <div class="row top-buffer">
                                            <div class="col-md-12">
                                                <!-- <input type="search" name="q" placeholder="wizbangquestiongold.gif" autocomplete="off" onkeyup="showResult(this.value)"> -->
                                                <input type="text" placeholder='Find your trivia question here, click the button "Answer"...' size="40" onkeyup="showResult(this.value)"
                                                       style="font-size:23px;width: 700px; font-family:'Buxton Sketch'">
                                                <img src="<?= $baseUrl ?>/wizbangquestiongold.gif" onclick="poruka1()" style="margin-bottom: 10px;">
                                                <div>
                                                    <div>
                                                        <div class="row top-buffer">
                                                            <div class="col-md-12">
                                                                <div id="livesearch" style="background-color:white;max-width: 800px"></div>
                                                                <div>
                                                                    <div>
                                                                        <div class="row top-buffer" align="center">
                                                                            <div class="col-md-1 vcenter">
                                                                                <img src="<?= $baseUrl ?>/QuestSpiralexclamation.gif" onclick="poruka2()">
                                                                            </div>
                                                                            <div class="col-md-5 vcenter">
                                                                                <textarea id="rjesenje" readonly placeholder="...and the answer will appear here!"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row top-buffer">
                                                                            <div class="col-md-12">

                                                                                <div>
                                                                                    <p></p>
                                                                                    <p></p>
                                                                                    <p></p>
                                                                                    <img src="<?= $baseUrl ?>/dodle.png" onclick="poruka3()">
                                                                                    <p></p>
                                                                                    <p> ~ Copyright &copy; <?= date("Y") ?> of FinalBastion.com & WilliamTheHouseOwner ~ </p>
                                                                                    <div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </body>
</html>
