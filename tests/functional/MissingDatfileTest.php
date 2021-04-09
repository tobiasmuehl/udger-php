<?php

namespace functional;

use Codeception\TestCase\Test;
use Codeception\Util\Stub;
use Udger\Parser;
use Psr\Log\LoggerInterface;
use Udger\Helper\IP;

class MissingDatfileTest extends Test
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
    }

    public function testParseWithMissingDatfile()
    {
        $this->setExpectedException("Exception", "Unable to find database source");
        $this->parser->parse();
    }
}