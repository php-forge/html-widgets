<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Menu;

use Forge\Html\Widgets\Components\Menu;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutableTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutable(): void
    {
        $menu = Menu::create();
        $this->assertNotSame($menu, $menu->afterAttributes([]));
        $this->assertNotSame($menu, $menu->afterClass(''));
        $this->assertNotSame($menu, $menu->afterContent(''));
        $this->assertNotSame($menu, $menu->afterTag(''));
        $this->assertNotSame($menu, $menu->activeClass(''));
        $this->assertNotSame($menu, $menu->beforeAttributes([]));
        $this->assertNotSame($menu, $menu->beforeClass(''));
        $this->assertNotSame($menu, $menu->beforeContent(''));
        $this->assertNotSame($menu, $menu->beforeTag(''));
        $this->assertNotSame($menu, $menu->class(''));
        $this->assertNotSame($menu, $menu->container(false));
        $this->assertNotSame($menu, $menu->currentPath(''));
        $this->assertNotSame($menu, $menu->disabledClass(''));
        $this->assertNotSame($menu, $menu->dropdownArguments([]));
        $this->assertNotSame($menu, $menu->dropdownConfigFile(''));
        $this->assertNotSame($menu, $menu->dropdownContainerClass(''));
        $this->assertNotSame($menu, $menu->dropdownDefinitions([]));
        $this->assertNotSame($menu, $menu->firstItemClass(''));
        $this->assertNotSame($menu, $menu->items([]));
        $this->assertNotSame($menu, $menu->itemsContainerAttributes([]));
        $this->assertNotSame($menu, $menu->itemsContainerClass(''));
        $this->assertNotSame($menu, $menu->itemsTag(''));
        $this->assertNotSame($menu, $menu->labelTemplate(''));
        $this->assertNotSame($menu, $menu->lastItemClass(''));
        $this->assertNotSame($menu, $menu->linkClass(''));
        $this->assertNotSame($menu, $menu->linkTemplate(''));
        $this->assertNotSame($menu, $menu->tagName(''));
        $this->assertNotSame($menu, $menu->template(''));
    }
}
