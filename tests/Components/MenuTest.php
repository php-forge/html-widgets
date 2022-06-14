<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components;

use Forge\Html\Widgets\Components\Menu;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class MenuTest extends TestCase
{
    public function testRender(): void
    {
        $assert = new Assert();
        $assert->equalsWithoutLE(
            <<<HTML
            <ul>
            <li>
            <a href="/home">Home</a>
            </li>
            <li>
            <a href="#">Link</a>
            </li>
            <li>
            <div>
            <button type="button">Dropdown</button>
            <ul>
            <li>
            <a href="#">Action</a>
            </li>
            <li>
            <a href="#">Another action</a>
            </li>
            <li>
            <hr>
            </li>
            <li>
            <a href="#">Something else here</a>
            </li>
            </ul>
            </div>
            </li>
            <li>
            <a class="disabled" href="#">Disabled</a>
            </li>
            </ul>
            HTML,
            Menu::create()
                ->items(
                    [
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Link', 'link' => '#'],
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                '-',
                                ['label' => 'Something else here', 'link' => '#'],
                            ],
                        ],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ],
                )
                ->render()
        );
    }
}
