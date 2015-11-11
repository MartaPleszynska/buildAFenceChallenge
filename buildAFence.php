<?php
/**
 * Created by PhpStorm.
 * User: marta pleszynska
 * Date: 11/11/15
 * Time: 07:28
 */
include 'fence.php';
$railingLength = Railing::$length;
$postWidth = Post::$width;

?>
<html>
<head>
    <title>Build a Fence</title>

</head>
<body>
<div>
    <h1>Build A Fence</h1>
    Post width = <?php echo $postWidth?>m<br>
    Railing length = git<?php echo $railingLength?>m
</div>
<br>
<form action="submitPostAndRailings.php" method="post">
    <div>
        <label>Number of posts: </label>
        <input type="number" name="posts" min="2" placeholder="minimum 2">
    </div>
    <div>
        <label>Number of railings: </label>
        <input type="number" name="railings" min="1" placeholder="minimum 1">
    </div>
    <div>
        <label></label>
        <input type="submit" name="submit" value="Calculate">
    </div>
</form>
<form action="submitLength.php" method="post">
    <div>
        <label>Fence length (in meters): </label>
        <input type="number" name="length" min="1.70" placeholder="minimum 1.70">
    </div>
    <div>
        <label></label>
        <input type="submit" name="submit" value="Calculate">
    </div>
</form>

</body>
</html>
