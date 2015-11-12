<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 11/11/15
 * Time: 09:31
 */
$length = (float)$_POST['length'];
$lengthValidationMessage = 'Incorrect length input. Please enter a number with two decimal places greater or equal to 1.70.' . "\n\r";

include 'fence.php';
$fence = new Fence();
if ($fence->validateLengthInput($length)) {

    $fence->calculateNumberOfPostsAndRailings($length);
    $posts = (int)$fence->numberOfPosts;
    $railings = (int)$fence->numberOfRailings;
    $actualLength = $fence->calculateLength($posts, $railings);

    $overshoot = $actualLength - $length;
    include 'resultOfLengthInput.php';

} else {
    echo nl2br($lengthValidationMessage);
    ?>
    <a href="buildAFence.php">Go back</a>
    <?php
}