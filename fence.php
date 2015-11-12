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
     * @var $length must be in meters with 2 decimal places
     */
    public $length;
    /**
     * @var $numberOfPosts must be a whole number, must contain at least 2
     */
    public $numberOfPosts;
    /**
     * @var $numberOfRailings must be a whole number, must contain at least 1
     */
    public $numberOfRailings;

    /**
     * sets number of posts property to a given value
     *
     * @param int $number
     */
    public function setNumberOfPosts($number)
    {
        $this->numberOfPosts = $number;
    }

    /**
     * sets number of railings property to a given value
     *
     * @param int $number
     */
    public function setNumberOfRailings($number)
    {
        $this->numberOfRailings = $number;
    }

    /**
     * sets a length property to a given value
     *
     * @param float $length
     */
    public function setFenceLength($length)
    {
        $this->length = $length;
    }

    /**
     * calculates number of posts and railings needed to build a fence of a given length value
     *
     * @param float $lengthProvided
     *
     * @return array number of railing and number of posts
     */
    public function calculateNumberOfPostsAndRailings($lengthProvided)
    {
        $numberOfRailings = 0;
        $numberOfPosts = 0;
        $lengthValidationResult = $this->validateLengthInput($lengthProvided);
        if ($lengthValidationResult) {
            $this->setFenceLength($lengthProvided);
            $postWidth = Post::$width;
            $railLength = Railing::$length;

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
     * calculates a length of a fence that can be build using given number of posts and railings
     *
     * @param int $numberOfPosts
     * @param int $numberOfRailings
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
     * validate posts input: must be int and equals 2 or more
     *
     * @param mixed $posts
     *
     * @return bool true if valid
     */
    public function validatePostsNumber($posts)
    {
        if (!is_int($posts) || $posts < 2) {
            return false;
        }

        return true;
    }

    /**
     * validates railings input: must be int and equals 1 or more
     *
     * @param mixed $railings
     *
     * @return bool true if valid
     */
    public function validateRailingNumber($railings)
    {
        if (!is_int($railings) || $railings < 1) {
            return false;
        }

        return true;
    }

    /**
     * validates length input: must be float, equals to 1.7 or more
     *
     * @param mixed $length
     *
     * @return bool true if valid
     */
    public function validateLengthInput($length)
    {
        if (is_int($length)) {
            $length = (float)$length;
        }
        if (!is_float($length) || $length < 1.7) {
            return false;
        }

        return true;
    }

}