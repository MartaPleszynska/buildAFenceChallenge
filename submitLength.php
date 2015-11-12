<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 11/11/15
 * Time: 09:31
 */
$length = (float)$_POST['length'];
number_format((float)$length, 2, '.', '');



include 'fence.php';
if (is_float($length)) {

    $fence = new Fence();
    $postsAndRailings = [];
    $postsAndRailings = $fence->calculateNumberOfPostsAndRailings($length);
    $posts = $postsAndRailings [1];
    $railings = $postsAndRailings [0];

    include 'result.php';

//    $length = $fence->calculateLength($posts, $railings);
//    $railingsUsed = $fence->numberOfRailings;
//    $postsUsed = $fence->numberOfPosts;
//    $railingsLeft = $railings - ($railingsUsed);
//    $postsLeft = $posts - ($postsUsed );
//    include 'result.php';

} else {
    echo 'Invalid input!! A length MUST be a number with maximum two deciamal places';
    ?>
    <a href="buildAFence.php"></a>
    <?php
}