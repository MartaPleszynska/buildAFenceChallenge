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
     * @param $actualLength      expected length
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


    //    public function test_length_is_not_string ()
    //    {
    //        $fence = new Fence();
    //        $fence->setFenceLength('six');
    //        $this->assertInternalType('float', $fence->length);
    //    }
}
