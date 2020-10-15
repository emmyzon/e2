<!doctype html>
<html lang='en'>

<head>
    <title>Project 2: Rock Paper Scissors</title>
    <meta charset='utf-8'>
    <link rel='stylesheet' href='css/rps-styles-p2.css'>
</head>

<body>
    <h1>Let's Play Rock Paper Scissors!</h1>

    <h2>How it works:</h2>
    <ul>
        <li>Choose to throw either Rock, Paper or Scissors.</li>
        <li>I'll throw at the same time.</li>
        <li>Click 'Throw' to see who wins!</li>
        <li>Rock beats Scissors, Scissors beats Paper, and Paper beats Rock. </li>
        <li>If we both throw the same thing, it's a tie.</li>
    </ul>

    <form method='GET' action='process.php'>
        <input type='radio' name='choice' value='rock' id='rock'><label for='rock'>Rock</label>
        <input type='radio' name='choice' value='paper' id='paper'><label for='paper'>Paper</label>
        <input type='radio' name='choice' value='scissors' id='scissors'><label for='scissors'>Scissors</label>
        <br>
        <button id='button' type='submit'>Throw!</button>
    </form>

    <?php if($have_results) { ?>
    <h2>Outcome:</h2>
    <p>You threw: <?php echo $choice; ?>
    </p>
    <p>I threw: <?php echo $throw; ?>
    </p>
    <p>And the outcome is... <?php echo $outcome; ?>
    </p>
    <?php } ?>
    <img src='img/rps.gif'>
</body>

</html>