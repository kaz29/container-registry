<?php
declare(strict_types=1);

namespace kaz29\Container\Test;

use kaz29\Container\ContainerRegistry;
use League\Container\Container;
use PHPUnit\Framework\TestCase;

class TestClass {
}

class ContainerRegistryTest extends TestCase
{
    public function setUp(): void
    {
        ContainerRegistry::destroy();
    }

    public function testInitialize()
    {
        $result = ContainerRegistry::initialize();
        $this->assertInstanceOf(Container::class, $result);
    }

    public function testGetContainer()
    {
        $result = ContainerRegistry::getRegistry();
        $this->assertInstanceOf(Container::class, $result);
    }

    public function testGet()
    {
        ContainerRegistry::getRegistry()->add('TestClass', new TestClass());
        $this->assertInstanceOf(TestClass::class, ContainerRegistry::getRegistry()->get('TestClass'));
    }
}
