<?php
/**
 * Created by PhpStorm.
 * User: marta pleszynska
 * Date: 11/11/15
 * Time: 11:26
 */


?>
<html>
<head>
    <title>Result</title>
</head>
<body>
<div>
    <?php
    printf("To build a fence %.2f m long you will need %d posts and %d railing(s).", $length, $posts, $railings);
    ?>
    <br>
    <?php
    printf("Actual fence length will be: %.2f m long.", $actualLength);
    ?>
    <br>
    <?php
    printf("Overshoot: %.2f m long.", $overshoot);
    ?>
<br>
</div>
<br>

<div>
    <a href="buildAFence.php"><strong>BUILD ANOTHER FENCE</strong></a>
</div>
</body>
</html>
