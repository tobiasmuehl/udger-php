<?php

namespace functional;

use Codeception\TestCase\Test;
use Codeception\Util\Stub;
use Udger\Parser;
use Psr\Log\LoggerInterface;
use Udger\Helper\IP;

class ParserAccountTest extends Test
{
    public function testAccount()
    {
        $parser = new Parser(
            Stub::makeEmpty(LoggerInterface::class),
            Stub::makeEmpty(IP::class));
        $parser->setAccessKey("nosuchkey");

        $this->setExpectedException("Exception");
        $parser->account();
    }

    public function testAccountMissingKey()
    {
        $parser = new Parser(
            Stub::makeEmpty(LoggerInterface::class),
            Stub::makeEmpty(IP::class));

        $this->setExpectedException("Exception", "access key not set");
        $parser->account();
    }
}
