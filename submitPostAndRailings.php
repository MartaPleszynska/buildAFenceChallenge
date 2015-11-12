<?php
/**
 * Created by PhpStorm.
 * User: marta pleszynska
 * Date: 11/11/15
 * Time: 09:30
 */
$posts = (int)$_POST['posts'];
$railings = (int)$_POST['railings'];

$postsValidationMessage = 'Incorrect posts number. Please enter a whole number greater or equal to 2.' . "\n\r";
$railingsValidationMessage = 'Incorrect railings number. Please enter a whole number greater or equal to 1.' . "\n\r";
include 'fence.php';
$fence = new Fence();

if (($fence->validatePostsNumber($posts)) || ($fence->validateRailingNumber($railings))) {
    $length = $fence->calculateLength($posts, $railings);
    $railingsUsed = $fence->numberOfRailings;
    $postsUsed = $fence->numberOfPosts;
    $railingsLeft = $railings - ($railingsUsed);
    $postsLeft = $posts - ($postsUsed);
    include 'resultOfPostsAndRailingsInput.php';
} else {
    echo nl2br($postsValidationMessage . $railingsValidationMessage);
    ?>
    <a href="buildAFence.php">Go back</a>
    <?php
}


