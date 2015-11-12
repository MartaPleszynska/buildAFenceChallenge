<?php

/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 09/11/15
 * Time: 13:52
 */
require 'fence.php';

/**
 * Class FenceTest (desc)
 *
 *
 */
class FenceTest extends PHPUnit_Framework_TestCase
{


    /**
     * @param $posts     number of posts provided
     * @param $railings  number of railings provided
     * @param $length    expected length
     *
     * @dataProvider dataProvider
     */
    public function test_calculating_fence_length($posts, $railings, $length)
    {
        $fence = new Fence();
        $this->assertEquals($length, $fence->calculateLength($posts, $railings));
    }

    public static function dataProvider()
    {
        $tests = [
            [2, 1, 1.7],
            [3, 2, 3.3],
            [3, 1, 1.7],
            [3, 5, 3.3],
            [0, 5, 0],
            [4, 0, 0],
            [1, 1, 0],
            [-1, -1, 0],
            ['h', 'c', 0],
        ];

        return $tests;
    }

    /**
     * @param $lengthProvided
     * @param $posts             number of posts provided
     * @param $railings          number of railings provided
     *
     * @dataProvider             lengthProvider
     */
    public function test_calculating_no_of_railings_and_posts
    (
        $posts,
        $railings,
        $lengthProvided
    ) {
        $fence = new Fence();
        $this->assertEquals(
            array($railings, $posts),
            $fence->calculateNumberOfPostsAndRailings($lengthProvided)
        );
    }

    public static function lengthProvider()
    {
        $tests = [
            [2, 1, 1.7],
            [3, 2, 3.3],
            [3, 2, 1.8],
            [0, 0, 0],
            [0, 0, -3],
            [6, 5, 6.8734566],
            [0, 0, 'string'],
        ];

        return $tests;
    }

    /**
     * @param $posts             number of posts provided
     * @param $output            expected output
     *
     * @dataProvider             postsNumberProvider
     */
    public function test_validate_no_posts($posts, $output)
    {
        $fence = new Fence();
        $this->assertEquals(
            $output,
            $fence->validatePostsNumber($posts)
        );
    }

    public static function postsNumberProvider()
    {
        $tests = [
            [2, true],
            [3.0, false],
            [0, false],
            [1, false],
            [-1, false],
            ['two', false],
            [2.23, false],
        ];

        return $tests;
    }

    /**
     * @param $railings             number of posts provided
     * @param $output               expected output
     *
     * @dataProvider             railingsNumberProvider
     */
    public function test_validate_no_railings($railings, $output)
{
    $fence = new Fence();
    $this->assertEquals(
        $output,
        $fence->validateRailingNumber($railings)
    );
}

    public static function railingsNumberProvider()
    {
        $tests = [
            [2, true],
            [3.0, false],
            [0, false],
            [-1, false],
            ['two', false],
            [2.23, false],
        ];

        return $tests;
    }

    /**
     * @param $length
     * @param $output
     *
     * @dataProvider    lengthInputProvider
     */
    public function test_validate_length_input($length, $output)
    {
        $fence = new Fence();
        $this->assertEquals(
            $output,
            $fence->validateLengthInput($length)
        );
    }

    public static function lengthInputProvider()
    {
        $tests = [
            [22, true],
            [3.2, true],
            [1.7, true],
            [-1, false],
            ['two', false],
        ];

        return $tests;
    }

    /**
     * @param $posts
     *
     * @dataProvider postsInputProvider
     */
    public function test_set_num_of_posts($posts)
    {
        $fence = new Fence();
        $fence->setNumberOfPosts($posts);
        $output = $fence->numberOfPosts;
        $this->assertEquals(
            $output,
            $posts
        );
    }

    public static function postsInputProvider()
    {
        $tests = [
            [2],

        ];

        return $tests;
    }
}
