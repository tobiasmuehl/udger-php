<?php

namespace unit;

use Codeception\TestCase\Test;
use Udger\ParserFactory;
use Udger\Parser;

class ParserFactoryTest extends Test
{
    /**
     * @var ParserFactory
     */
    protected $factory;

    protected function _before()
    {
        $this->factory = new ParserFactory("/dev/null");
    }

    public function testGetParser()
    {
        self::assertInstanceOf(Parser::class, $this->factory->getParser());
    }

    public function testNewFactoryWithoutPathShouldFail()
    {
        $this->setExpectedException('PHPUnit_Framework_Exception');
        new ParserFactory();
    }
}
