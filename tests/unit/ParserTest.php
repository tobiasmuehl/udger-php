<?php

namespace unit;

use Codeception\TestCase\Test;
use Codeception\Util\Stub;
use Udger\Parser;
use Psr\Log\LoggerInterface;
use Udger\Helper\IP;

class ParserTest extends Test
{
    /**
     * @var Parser
     */
    protected $parser;

    protected function _before()
    {
        $this->parser = new Parser(
            Stub::makeEmpty(LoggerInterface::class),
            Stub::makeEmpty(IP::class));
        $this->parser->setDataFile("/dev/null");
    }

    public function testSetDataFile()
    {
        $this->setExpectedException("Exception");
        self::assertTrue($this->parser->setDataFile("/this/is/a/missing/path"));
    }

    public function testSetAccessKey()
    {
        self::assertTrue($this->parser->setAccessKey("123456"));
    }

    public function testSetUA()
    {
        self::assertTrue($this->parser->setUA("agent"));
    }

    public function testSetIP()
    {
        self::assertTrue($this->parser->setIP("0.0.0.0"));
    }

    public function testAccount()
    {
        $this->setExpectedException("Exception");
        $this->parser->account();
    }
}
