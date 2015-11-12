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
    printf("With %d posts and %d railing(s) you can build a fence %.2f m long.", $posts, $railings, $length );
    ?>
    <br>
    Posts used: <?php echo $postsUsed; ?><br>
    Posts left: <?php echo $postsLeft; ?><br>
    Railings used: <?php echo $railingsUsed; ?><br>
    Railings left: <?php echo $railingsLeft; ?><br>
</div>
<br>

<div>
    <a href="buildAFence.php"><strong>BUILD ANOTHER FENCE</strong></a>
</div>
</body>
</html>
