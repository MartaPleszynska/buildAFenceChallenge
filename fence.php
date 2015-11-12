<?php

/**
 * Class Post
 */
class Post
{
    /**
     * @var float
     */
    public static $width = 0.10; //in meters
}

/**
 * Class Railing
 *
 */
class Railing
{
    /**
     * @var float
     */
    public static $length = 1.50; //in meters
}

/**
 * Class Fence
 */
class Fence
{
    /**
     * @var
     */
    public $length; //must be in meters with 2 decimal places
    /**
     * @var
     */
    public $numberOfPosts; //whole number, must contain at least 2
    /**
     * @var
     */
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
     * desc...
     * @param $numberOfPosts
     * @param $numberOfRailings
     *
     * @return int length of fence
     */
    public function calculateLength($numberOfPosts, $numberOfRailings)
    {
        $length = 0;
        $postWidth = Post::$width;
        $railLength = Railing::$length;
        $postsValidationResult = $this->validatePostsNumber($numberOfPosts);
        $railingValidationResult = $this->validateRailingNumber($numberOfRailings);
        if ($postsValidationResult && $railingValidationResult) {

            if ($numberOfPosts > $numberOfRailings + 1) {
                $numberOfPosts = $numberOfRailings + 1;
            }
            if ($numberOfPosts < $numberOfRailings) {
                $numberOfRailings = $numberOfPosts - 1;
            }
            $this->setNumberOfPosts($numberOfPosts);
            $this->setNumberOfRailings($numberOfRailings);
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
        if (!is_int($posts) || $posts < 2) {
            return false;
        }

        return true;
    }

    /**
     * @param $railings
     *
     * @return string message depending on a correctness of a input
     */
    public function validateRailingNumber($railings)
    {
        if (!is_int($railings) || $railings < 1) {
            return false;
        }

        return true;
    }

    public function validateLengthInput($length)
    {
        if (is_int($length)) {
            $length = (float)$length;
        }
        if (!is_float($length) || $length < 1) {
            return false;
        }

        return true;
    }

}