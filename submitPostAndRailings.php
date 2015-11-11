<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 11/11/15
 * Time: 09:30
 */
$posts = (int)$_POST['posts'];
$railings = (int)$_POST['railings'];

var_dump($posts);
var_dump($railings);
if (is_int($posts) && is_int($railings)) {

    include 'fence.php';
    $fence = new Fence();
    $length = $fence->calculateLength($posts, $railings);

    include 'result.php';
} else {
    echo 'Invalid input!! Number of posts and railings MUST be a whole positive number.';
    ?>
    <a href="buildAFence.php"></a>
    <?php
}


