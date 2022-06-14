<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Nav;

use Forge\Html\Widgets\Components\Nav;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutableTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutable(): void
    {
        $nav = Nav::create();
        $this->assertNotSame($nav, $nav->class(''));
        $this->assertNotSame($nav, $nav->container(false));
        $this->assertNotSame($nav, $nav->currentPath(''));
        $this->assertNotSame($nav, $nav->dropdownArguments([]));
        $this->assertNotSame($nav, $nav->dropdownConfigFile(''));
        $this->assertNotSame($nav, $nav->dropdownDefinitions([]));
        $this->assertNotSame($nav, $nav->items([]));
        $this->assertNotSame($nav, $nav->menuArguments([]));
        $this->assertNotSame($nav, $nav->menuConfigFile(''));
        $this->assertNotSame($nav, $nav->menuDefinitions([]));
        $this->assertNotSame($nav, $nav->offCanvas([]));
        $this->assertNotSame($nav, $nav->offCanvasAttributes([]));
        $this->assertNotSame($nav, $nav->offCanvasClass(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderAttributes([]));
        $this->assertNotSame($nav, $nav->offCanvasHeaderButtonClass(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderButtonContent(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderButtonTag(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderClass(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderTag(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderTitleAttributes([]));
        $this->assertNotSame($nav, $nav->offCanvasHeaderTitleClass(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderTitleContent(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderTitleId(''));
        $this->assertNotSame($nav, $nav->offCanvasHeaderTitleTag(''));
        $this->assertNotSame($nav, $nav->offCanvasId(''));
        $this->assertNotSame($nav, $nav->offCanvasTag(''));
    }
}
