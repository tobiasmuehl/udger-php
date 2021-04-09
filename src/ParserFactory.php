<?php

namespace Udger;

use Exception;
use Monolog\Logger;
use Monolog\Handler\NullHandler;
use Psr\Log\LoggerInterface;

/**
 * Description of ParserFactory
 *
 * @author tiborb
 */
class ParserFactory
{
    const LOGGER_NAME = 'udger';

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var string $dataFile path to the data file
     */
    private $dataFile;

    /**
     * @param string $dataFile path to the data file
     * @param LoggerInterface $logger
     */
    public function __construct($dataFile, $logger = null)
    {
        $this->dataFile = $dataFile;
        $this->logger = self::buildLogger($logger);
    }

    /**
     * @param LoggerInterface|null $logger
     * @return LoggerInterface
     */
    private static function buildLogger($logger)
    {
        if (is_null($logger)) {
            $logger = new Logger(self::LOGGER_NAME);
            $logger->pushHandler(new NullHandler());
        }

        return $logger;
    }

    /**
     * @return Parser
     * @throws Exception
     */
    public function getParser()
    {
        $parser = new Parser($this->logger, new Helper\IP());
        $parser->setDataFile($this->dataFile);
        return $parser;
    }

    /**
     * @param string $dataFile
     * @param LoggerInterface|null $logger
     * @return Parser
     * @throws Exception
     */
    public static function buildParserFromDataFile($dataFile, $logger = null)
    {
        $parser = new Parser(self::buildLogger($logger), new Helper\IP());
        $parser->setDataFile($dataFile);
        return $parser;
    }

    /**
     * @param string $dsn
     * @param string $user
     * @param string $password
     * @param LoggerInterface|null $logger
     * @return Parser
     */
    public static function buildParserFromMySQL($dsn, $user, $password, $logger = null)
    {
        $parser = new Parser(self::buildLogger($logger), new Helper\IP());
        $parser->setMySQLConnection($dsn, $user, $password);
        return $parser;
    }
}
