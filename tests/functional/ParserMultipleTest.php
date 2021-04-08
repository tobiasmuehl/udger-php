<?php

namespace functional;

use Codeception\TestCase\Test;
use Codeception\Util\Stub;
use Udger\Parser;
use Psr\Log\LoggerInterface;
use Udger\Helper\IP;

class ParserMultipleTest extends Test
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
        $this->parser->setDataFile(dirname(__DIR__) . "/fixtures/udgercache/udgerdb_v3.dat");
    }

    //tests
    public function testParseMultpileAgentStrings()
    {
        $handle = fopen(dirname(__DIR__) . "/fixtures/agents.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $result = $this->parser->parse();
            }
            fclose($handle);
        } else {
            // error opening the file.
        }
    }
}

