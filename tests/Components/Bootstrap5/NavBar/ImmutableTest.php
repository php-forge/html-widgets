<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\NavBar;

use Forge\Html\Widgets\Components\NavBar;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutableTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutable(): void
    {
        $navbar = NavBar::create();
        $this->assertNotSame($navbar, $navbar->brand(''));
        $this->assertNotSame($navbar, $navbar->brandAttributes([]));
        $this->assertNotSame($navbar, $navbar->brandClass(''));
        $this->assertNotSame($navbar, $navbar->brandImage(''));
        $this->assertNotSame($navbar, $navbar->brandImageAttributes([]));
        $this->assertNotSame($navbar, $navbar->brandImageClass(''));
        $this->assertNotSame($navbar, $navbar->brandLink(''));
        $this->assertNotSame($navbar, $navbar->brandTag(''));
        $this->assertNotSame($navbar, $navbar->buttonToggle(false));
        $this->assertNotSame($navbar, $navbar->buttonToggleAttributes([]));
        $this->assertNotSame($navbar, $navbar->buttonToggleClass(''));
        $this->assertNotSame($navbar, $navbar->buttonToggleContent(''));
        $this->assertNotSame($navbar, $navbar->buttonToggleId(''));
        $this->assertNotSame($navbar, $navbar->class(''));
        $this->assertNotSame($navbar, $navbar->container(false));
        $this->assertNotSame($navbar, $navbar->containerAttributes([]));
        $this->assertNotSame($navbar, $navbar->containerClass(''));
        $this->assertNotSame($navbar, $navbar->containerTag(''));
        $this->assertNotSame($navbar, $navbar->menuContainer(false));
        $this->assertNotSame($navbar, $navbar->menuContainerAttributes([]));
        $this->assertNotSame($navbar, $navbar->menuContainerClass(''));
        $this->assertNotSame($navbar, $navbar->menuContainerTag(''));
        $this->assertNotSame($navbar, $navbar->template(''));
    }
}
