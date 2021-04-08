<?php

namespace unit\Helper;

use Codeception\TestCase\Test;
use Udger\Helper\IP;
use Udger\Helper\IPInterface;

/**
 *
 * @author tiborb
 */
class IPTest extends Test
{
    /**
     * @var IP
     */
    protected $object;

    protected function _before()
    {
        $this->object = new IP();
    }

    public function testInterface()
    {
        self::assertInstanceOf(IPInterface::class, $this->object);
    }

    public function testGetInvalidIpVerison()
    {
        self::assertFalse($this->object->getIpVersion("banana"));
    }

    public function testGetEmptyIpVerison()
    {
        self::assertFalse($this->object->getIpVersion(""));
    }

    public function testGetValidIpVerison()
    {
        self::assertEquals(4, $this->object->getIpVersion("0.0.0.0"));
        self::assertEquals(4, $this->object->getIpVersion("127.0.0.1"));
    }

    public function testGetValidIp6LoopbackVerison()
    {
        self::assertEquals(6, $this->object->getIpVersion("::1"));
    }

    public function testGetValidIp6Verison()
    {
        self::assertEquals(6, $this->object->getIpVersion("FE80:CD00:0000:0CDE:1257:0000:211E:729C"));
        self::assertEquals(6, $this->object->getIpVersion("FE80:CD00:0:CDE:1257:0:211E:729C"));
    }

    public function testGetIpLong()
    {
        self::assertEquals(0, $this->object->getIpLong("0.0.0.0"));
    }
}
