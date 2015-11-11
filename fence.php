<?php

/**
 * Class Post
 */
class Post
{
    public $length = 1.50; //in meters
}

/**
 * Class Railing
 */
class Railing
{
    public $width = 0.10; //in meters
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

    public function getNumberOfPosts()
    {

    }

    public function getNumberOfRailings()
    {

    }

    public function getFenceLength()
    {

    }

    /**
     * @param $lengthProvided
     *
     * @return array
     */
    public function calculateNumberOfPostsAndRailings($lengthProvided)
    {
        $numberOfRailings = 0;
        $numberOfPosts = 0;
        if ($lengthProvided > 0) {
            $numberOfRailings = ($lengthProvided - 0.10) / (1.5 + 0.10);
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