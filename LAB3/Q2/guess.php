<?php session_start();  //starting session
if (! isset($_SESSION['randomNum'])){
  $_SESSION['randomNum'] = rand(1,30); //random number
}
?>
<html>
<head>
  <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="style.css">
</head>

  <body>
    <title> Guessing Game by Julia 208256 </title>
<div class="jumbotron" id="head">
    <h1> Welcome to my guessing game! </h1>
</div>

<div id="form" class="container">
<form method="get">
  <p><strong>Try your luck!</strong></p>
  <p>Guess any number between 1-30</p>
  <hr>
    <input type="text" id="guess" name="guess" placeholder="1-30"></input>
    <br>
    <input type="submit" ></input>
</form>
</div>


    <?php
    $message = false;
      if (! isset($_GET['guess']) ) {
        $_SESSION['attempt'] = 0;
      } else if ( strlen($_GET['guess']) < 1 ) {
        $_SESSION['attempt']++;
        $message = "<p align=center>[Attempt ". $_SESSION['attempt'] . "] - Enter your guess</p>";
      } else if ( ! is_numeric($_GET['guess']) ) {
        $_SESSION['attempt']++;
        $message = "<p align=center>[Attempt ". $_SESSION['attempt'] ."] - ".$_GET['guess']." is not a number</p>";
      } else if ( $_GET['guess'] < $_SESSION['randomNum'] ) {
        $_SESSION['attempt']++;
        $message = "<p align=center>[Attempt ". $_SESSION['attempt'] ."] - ".$_GET['guess']." is too low</p>";
      } else if ( $_GET['guess'] > $_SESSION['randomNum']) {
        $_SESSION['attempt']++;
        $message = "<p align=center>[Attempt ". $_SESSION['attempt'] ."] - ".$_GET['guess']." is too high</p>";
      } else {
        $_SESSION['attempt']++;
        $message = "<p align=center>CONGRATULATION!<br>You are right with ". $_SESSION['attempt'] ." Attempts<br> The correct number is ". $_SESSION['randomNum']."</p>";
        if (isset($_GET['restart'])){
          $_SESSION['startNum'] = rand(1,30);
        }
      }

      if (isset($_GET['restart'])){
        $_SESSION['startNum'] = rand(1,30);
      }
    ?>


    <form method="get">
      <button name="restart" id="restart" value="1">Restart</button>
    </form>

    <?php
          if ($message !== false){
            echo ("<p>$message</p>\n");
          }
    ?>

  </body>
  </html>
