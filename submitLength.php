<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 11/11/15
 * Time: 09:31
 */
$length = (float)$_POST['length'];
number_format((float)$length, 2, '.', '');
/*
 * if post and railings provided - calculate length
 * if only posts provided - set railing to posts no -1 and calculate a length
 * if only railings provided - set post to railings no +1 and calculate a length
 * if all provided - give message?
 * if only length provided - calculate post and railings
 */

include 'fence.php';
if (is_float($length)) {

    $fence = new Fence();
    $postsAndRailings = [];
    $postsAndRailings = $fence->calculateNumberOfPostsAndRailings($length);
    $posts = $postsAndRailings [1];
    $railings = $postsAndRailings [0];

    include 'result.php';
} else {
    echo 'Invalid input!! A length MUST be a number with maximum two deciamal places';
    ?>
    <a href="buildAFence.php"></a>
    <?php
}