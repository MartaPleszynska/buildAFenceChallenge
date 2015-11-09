<?php

/**
 * Class Post
 */
class Post
{
    public $length = 1.50; //in meters
}

class Railing
{
    public $width = 0.10; //in meters
}

class Fence
{
    public $length; //must be in meters with 2 decimal places
    public $numberOfPosts; //whole number, must contain at least 2
    public $numberOfRailings; //whole number, must contain at list 1

    public function setNumberOfPosts($number)
    {
        $this->numberOfPosts = $number;
    }

    public function setNumberOfRailings($number)
    {
        $this->numberOfRailings = $number;
    }

    public function setFenceLength($length)
    {
        if (is_float($length)) {
            $this->length = $length;
        } else {
            echo 'Incorrect format!';
        }
    }

    public function getNumberOfPosts()
    {

    }

    public function getNumberOfRailings()
    {

    }

    public function getFenceLength()
    {

    }

//    public function calculateNumberOfPostsAndRailings($length)
//    {
//        $block = 1.7;
//        $numberOfRailings = $length / $block;
//        $numberOfPosts = $numberOfRailings + 1;
//        if ($length % $block) {
//            $numberOfRailings = (int)$numberOfRailings + 1;
//            $numberOfPosts = (int)$numberOfPosts + 1;
//        }
//        $length = $numberOfPosts * 0.10 + $numberOfRailings * 1.5;
//        $length = (int)$length;
//        return array($numberOfPosts, $numberOfRailings, $length);
//    }

    public function calculateLength($numberOfPosts, $numberOfRailings)
    {
        $length = 0;
        if(($numberOfPosts >= 2) && ($numberOfRailings >= 1)) {
            if ($numberOfPosts > $numberOfRailings + 1) {
                $numberOfPosts = $numberOfRailings + 1;
            }
            if ($numberOfPosts < $numberOfRailings) {
                $numberOfRailings = $numberOfPosts - 1;
            }
            $length =  $numberOfPosts * 0.10 + $numberOfRailings * 1.5;
        }
        return $length;
    }

}