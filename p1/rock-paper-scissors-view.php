<!doctype html>
<html lang='en'>

<head>
    <title>Project 1: Rock Paper Scissors</title>
    <meta charset='utf-8'>
    <link rel='stylesheet' href='css/rps-styles.css'>
</head>

<body>
    <h1>Let's Play Rock Paper Scissors!</h1>

    <h2>How it works:</h2>
    <ul>
        <li>Two players randomly throw either Rock, Paper or Scissors.</li>
        <li>Rock beats Scissors, Scissors beats Paper, and Paper beats Rock. </li>
        <li>If both players throw the same thing, it's a tie.</li>
    </ul>
    <h2>Outcome:</h2>
    <p>Player One throws <?php echo $playerOne; ?>.
    </p>
    <p>Player Two throws <?php echo $playerTwo; ?>.
    </p>
    <p>And the outcome is... <?php echo $outcome; ?>
    </p>
    <img src='img/rps.gif'>
</body>

</html>