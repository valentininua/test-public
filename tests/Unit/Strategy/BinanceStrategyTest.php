<?php

namespace Bot\Tests\Unit\Strategy;

use Bot\Tests\Strategy\NoReturn;
use PHPUnit\Framework\TestCase;

class BinanceStrategyTest extends TestCase
{
    #[NoReturn]
    public function testHandle()
    {
        $this->assertTrue(true);
    }
}
