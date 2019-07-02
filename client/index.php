<?php
require 'phpMQTT.php';
require 'config.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Lights Controller</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $client_id = uniqid('mqlight-');
            $mqtt = new Bluerhinos\phpMQTT($mqtt_server, $mqtt_port, $client_id);

            if ($mqtt->connect(true, NULL, $mqtt_username, $mqtt_password)) {
                if (isset($_POST['btn1'])) {
                    $message = 'btn1';
                } else if (isset($_POST['btn2'])) {
                    $message = 'btn2';
                } else if (isset($_POST['btn3'])) {
                    $message = 'btn3';
                } else if (isset($_POST['btn4'])) {
                    $message = 'btn4';
                } else if (isset($_POST['btn5'])) {
                    $message = 'btn5';
                } else if (isset($_POST['btn6'])) {
                    $message = 'btn6';
                } else if (isset($_POST['btn7'])) {
                    $message = 'btn7';
                } else if (isset($_POST['btn8'])) {
                    $message = 'btn8';
                } else if (isset($_POST['btn9'])) {
                    $message = 'btn9';
                }

                if (isset($message)) {
                    $mqtt->publish($mqtt_topic, $message, 0);
                    $mqtt->close();
                }
            }
            ?>
            <script>window.location = "index.php";</script>
            <?php
        } else {
        ?>
        <form method="post" action="index.php">
            <div class="button-container">
                <input class="control-button" type="submit" name="btn1" value="Fire" />
                <input class="control-button" type="submit" name="btn2" value="Sparks" />
                <input class="control-button" type="submit" name="btn3" value="Ice" />
                <input class="control-button" type="submit" name="btn4" value="TNet" />
                <input class="control-button" type="submit" name="btn5" value="Off" />
                <input class="control-button" type="submit" name="btn6" value="Xmas" />
                <input class="control-button" type="submit" name="btn7" value="RndOne" />
                <input class="control-button" type="submit" name="btn8" value="RndSolid" />
                <input class="control-button" type="submit" name="btn9" value="RndAll" />
            </div>
        </form>
        <?php
        }
        ?>
    </body>
</html>