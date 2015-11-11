<?php
/**
 * Created by PhpStorm.
 * User: marta pleszynska
 * Date: 11/11/15
 * Time: 07:28
 */
$posts = $_POST['posts'];
$railings = $_POST['railings'];
$length = $_POST['length'];

include 'fence.php';

?>
<html>
<head>
    <title>Build a Fence</title>

</head>
<body>
<h1>Build A Fence</h1>
Post width = 0.10m <br>
Railing length = 1.5m <br>
<form action="" method="post">
    <div>
        <label>Number of posts: </label>
        <input type="number" name="posts" min="2" placeholder="minimum 2">
    </div>
    <div>
        <label>Number of railings: </label>
        <input type="number" name="railings" min="1" placeholder="minimum 1">
    </div>
    <div>
        <label>Fence length (in meters): </label>
        <input type="number" name="length" min="1.70" placeholder="minimum 1.70">
    </div>
    <div>
        <label></label>
        <input type="submit" name="submit" value="Calculate">
    </div>
</form>
<div>
    You need (number) of post and (number) of railings to build (length) fence.
</div>
<div>
    Remaining posts: <br>
    Remaining railings: <br>
    Actual fence length:
</div>
</body>
</html>
