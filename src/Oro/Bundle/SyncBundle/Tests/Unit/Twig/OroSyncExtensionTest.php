<?php

namespace Oro\Bundle\SyncBundle\Tests\Unit\Twig;

use Oro\Bundle\SyncBundle\Twig\OroSyncExtension;

class OroSyncExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $extension;

    protected function setUp()
    {
        $topicPublisher = $this->createMock('Oro\Bundle\SyncBundle\Wamp\TopicPublisher');
        $this->extension = new OroSyncExtension($topicPublisher);
    }

    protected function tearDown()
    {
        unset($this->extension);
    }
    public function testGetName()
    {
        $this->assertEquals('sync_extension', $this->extension->getName());
    }

    public function testGetFunctions()
    {
        $functions = $this->extension->getFunctions();
        $this->assertCount(1, $functions);
        $function = reset($functions);
        $this->assertEquals('check_ws', $function->getName());
    }
}
