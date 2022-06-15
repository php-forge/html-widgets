<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Menu;

use Forge\Html\Widgets\Components\Menu;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class MenuTest extends TestCase
{
    public function testFirstItemCssClass(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul>
            <li class="first-item-class">
            <a href="/active">Active</a>
            </li>
            <li>
            <a href="#">Much longer nav link</a>
            </li>
            <li>
            <a href="#">Link</a>
            </li>
            <li>
            <a class="disabled" href="#">Disabled</a>
            </li>
            </ul>
            HTML,
            Menu::create()
                ->firstItemClass('first-item-class')
                ->items(
                    [
                        ['label' => 'Active', 'link' => '/active'],
                        ['label' => 'Much longer nav link', 'link' => '#'],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ],
                )
                ->render(),
        );
    }

    public function testLastItemCssClass(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul>
            <li>
            <a href="/active">Active</a>
            </li>
            <li>
            <a href="#">Much longer nav link</a>
            </li>
            <li>
            <a href="#">Link</a>
            </li>
            <li class="last-item-class">
            <a class="disabled" href="#">Disabled</a>
            </li>
            </ul>
            HTML,
            Menu::create()
                ->lastItemClass('last-item-class')
                ->items(
                    [
                        ['label' => 'Active', 'link' => '/active'],
                        ['label' => 'Much longer nav link', 'link' => '#'],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ],
                )
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertEmpty(Menu::create()->render());
    }
}
