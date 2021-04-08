<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use R\RSList;

final class RSListTest extends TestCase
{
    public function testCreate()
    {
        $set = new RSList();
        $this->assertInstanceOf(RSList::class, $set);
    }
}
