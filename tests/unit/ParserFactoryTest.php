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
        $this->factory = new ParserFactory('/dev/null');
    }

    public function testGetParser()
    {
        self::assertInstanceOf(Parser::class, $this->factory->getParser());
    }

    public function testNewFactoryWithoutPathShouldFail()
    {
        $this->setExpectedException('ArgumentCountError');
        new ParserFactory();
    }

    public function testGetParserFromDataFile()
    {
        self::assertInstanceOf(Parser::class, ParserFactory::buildParserFromDataFile('/dev/null'));
    }

    public function testGetParserFromMySQL()
    {
        self::assertInstanceOf(
            Parser::class,
            ParserFactory::buildParserFromMySQL('dsn', 'user', 'password')
        );
    }
}
