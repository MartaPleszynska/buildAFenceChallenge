<?php

/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 09/11/15
 * Time: 13:52
 */
require 'fence.php';

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
            [2, 'You have used 2 posts.'],
            [3, 'You have used 3 posts.'],
            [0, 'You need at least 2 posts to build a fence!'],
            [1, 'You need at least 2 posts to build a fence!'],
            [-1, 'Incorrect input! Please enter a whole number greater or equals to 2.'],
            ['two', 'Incorrect input! Please enter a whole number greater or equals to 2.'],
            [2.23, 'Incorrect input! Please enter a whole number greater or equals to 2.'],
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
            [2, 'You have used 2 railing(s).'],
            [3, 'You have used 3 railing(s).'],
            [0, 'You need at least 1 railing to build a fence!'],
            [-1, 'Incorrect input! Please enter a whole number greater or equals to 1.'],
            ['two', 'Incorrect input! Please enter a whole number greater or equals to 1.'],
            [2.23, 'Incorrect input! Please enter a whole number greater or equals to 1.'],
        ];

        return $tests;
    }


}
