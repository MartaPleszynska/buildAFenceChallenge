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
    With <?php echo $posts ?> posts and <?php echo $railings ?> railing(s) you can build a fence <?php echo $length ?>m long.
    <br>
    Posts used: <?php echo $postsUsed; ?><br>
    Posts left: <?php echo $postsLeft; ?><br>
    Railings used: <?php echo $railingsUsed; ?><br>
    Railings left: <?php echo $railingsLeft; ?><br>
</div>
<br>

<div>
    <!--    Remaining posts: <br>-->
    <!--    Remaining railings: <br>-->
    <!--    Actual fence length:-->
</div>
</body>
</html>
