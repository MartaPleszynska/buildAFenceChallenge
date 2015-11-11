<?php

/**
 * Class Post
 */
class Post
{
    public static $width = 1.50; //in meters
}

/**
 * Class Railing
 */
class Railing
{
    public static $length = 0.10; //in meters
}

/**
 * Class Fence
 */
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
            $this->length = $length;
    }

     /**
     * @param $lengthProvided
     *
     * @return array
     */
    public function calculateNumberOfPostsAndRailings($lengthProvided)
    {
        $postWidth = Post::$width;
        $railLength = Railing::$length;
        $numberOfRailings = 0;
        $numberOfPosts = 0;
        if ($lengthProvided > 0) {
            $numberOfRailings = ($lengthProvided -  $postWidth) / ($railLength +  $postWidth);
            $numberOfRailings = ceil($numberOfRailings);
            $numberOfPosts = $numberOfRailings + 1;

            return array($numberOfRailings, $numberOfPosts);
        }
        return array($numberOfRailings, $numberOfPosts);
    }

    /**
     * @param $numberOfPosts
     * @param $numberOfRailings
     *
     * @return int
     */
    public function calculateLength($numberOfPosts, $numberOfRailings)
    {
        $length = 0;
        if (($numberOfPosts >= 2) && ($numberOfRailings >= 1)) {
            if ($numberOfPosts > $numberOfRailings + 1) {
                $numberOfPosts = $numberOfRailings + 1;
            }
            if ($numberOfPosts < $numberOfRailings) {
                $numberOfRailings = $numberOfPosts - 1;
            }
            $length = $numberOfRailings * (1.5 + 0.10) + 0.10;
        }

        return $length;
    }


}