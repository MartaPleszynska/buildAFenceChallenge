<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 11/11/15
 * Time: 09:30
 */
$posts = $_POST['posts'];
$railings = $_POST['railings'];

/*
 * if post and railings provided - calculate length
 * if only posts provided - set railing to posts no -1 and calculate a length
 * if only railings provided - set post to railings no +1 and calculate a length
 * if all provided - give message?
 * if only length provided - calculate post and railings
 */

include 'fence.php';
