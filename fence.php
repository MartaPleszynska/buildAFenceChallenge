<?php

/**
 * Class Post
 */
class Post
{
    public static $width = 0.10; //in meters
}

/**
 * Class Railing
 */
class Railing
{
    public static $length = 1.50; //in meters
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
        $this->setFenceLength($lengthProvided);
        $postWidth = Post::$width;
        $railLength = Railing::$length;
        $numberOfRailings = 0;
        $numberOfPosts = 0;
        if ($lengthProvided > 0) {
            $numberOfRailings = ($lengthProvided - $postWidth) / ($railLength + $postWidth);
            $numberOfRailings = ceil($numberOfRailings);
            $numberOfPosts = $numberOfRailings + 1;
            $this->setNumberOfPosts($numberOfPosts);
            $this->setNumberOfRailings($numberOfRailings);

            return array($numberOfRailings, $numberOfPosts);
        }
        $this->setNumberOfPosts($numberOfPosts);
        $this->setNumberOfRailings($numberOfRailings);

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
        $postWidth = Post::$width;
        $railLength = Railing::$length;
        $this->setNumberOfPosts($numberOfPosts);
        $this->setNumberOfRailings($numberOfRailings);
        if (($numberOfPosts >= 2) && ($numberOfRailings >= 1)) {
            if ($numberOfPosts > $numberOfRailings + 1) {
                $numberOfPosts = $numberOfRailings + 1;
            }
            if ($numberOfPosts < $numberOfRailings) {
                $numberOfRailings = $numberOfPosts - 1;
            }
            $length = $numberOfRailings * ($railLength + $postWidth) + $postWidth;
        }
        $this->setFenceLength($length);

        return $length;
    }

    /**
     * @param $posts
     *
     * @return string  message depending on a correctness of a input
     */
    public function validatePostsNumber($posts)
    {
        if (!is_int($posts) || $posts < 0) {
            $result = 'Incorrect input! Please enter a whole number greater or equals to 2.';
        } elseif ($posts == 0 || $posts == 1) {
            $result = 'You need at least 2 posts to build a fence!';
        } else {
            $result = 'You have used ' . $posts . ' posts.';
        }

        return $result;
    }

    public function validateRailingNumber($railings)
    {
        if (!is_int($railings) || $railings < 0) {
            $result = 'Incorrect input! Please enter a whole number greater or equals to 1.';
        } elseif ($railings == 0) {
            $result = 'You need at least 1 railing to build a fence!';
        } else {
            $result = 'You have used ' . $railings . ' railing(s).';
        }

        return $result;
    }

}