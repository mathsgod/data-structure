<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use R\DataList;

final class DataListTest extends TestCase
{
    public function test_create()
    {
        $set = new DataList();
        $this->assertInstanceOf(DataList::class, $set);
    }

    public function test_toArray()
    {
        $set = new DataList([1, 2, 3]);
        $this->assertSame([1, 2, 3], $set->toArray());
    }

    public function test_first()
    {
        $list = new DataList([1, 2, 3]);
        $this->assertEquals(1, $list->first());
    }

    public function test_top()
    {
        $list = new DataList([1, 2, 3]);
        $n = $list->top(2);
        $this->assertSame($n->toArray(), [1, 2]);
    }

    public function test_sum()
    {
        $list = new DataList([1, 2, 3]);
        $n = $list->sum(function ($a) {
            return $a;
        });
        $this->assertEquals(6, $n);
    }

    public function test_shuffle()
    {
        $list = new DataList([1, 2, 3]);
        $n = $list->shuffle();
        $this->assertEquals($n->count(), 3);
    }

    public function test_reverse()
    {
        $list = new DataList([1, 2, 3]);
        $n = $list->reverse();
        $this->assertSame($n->toArray(), [3, 2, 1]);
        $this->assertSame([3, 2, 1], $n->toArray());
    }
}
