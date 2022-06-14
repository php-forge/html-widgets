<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class IconTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testIcon(): void
    {
        $assert = new Assert();

        // default
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown', 'data-bs-auto-close' => 'true'],
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" id="defaultDropdown" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="true">Dropdown with icon unicode</button>
            <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
            <li>
            <a class="dropdown-item" href="#"><span class="me-2"><i>&#9742;</i></span>Unicode icon</a>
            </li>
            <li>
            <a class="dropdown-item" href="#"><span class="me-2"><i>&#9851;</i></span>Unicode icon</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('defaultDropdown')
                ->items(
                    [
                        [
                            'label' => 'Dropdown with icon unicode',
                            'link' => '#',
                            'items' => [
                                [
                                    'label' => 'Unicode icon',
                                    'link' => '#',
                                    'icon' => '&#9742;',
                                    'iconContainerAttributes' => ['class' => 'me-2'],
                                ],
                                [
                                    'label' => 'Unicode icon',
                                    'link' => '#',
                                    'icon' => '&#9851;',
                                    'iconContainerAttributes' => ['class' => 'me-2'],
                                ],
                            ],
                        ],
                    ]
                )
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testIconClass(): void
    {
        $assert = new Assert();

        // default
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown', 'data-bs-auto-close' => 'true'],
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" id="defaultDropdown" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="true">Dropdown with icon</button>
            <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
            <li>
            <a class="dropdown-item" href="#"><span class="me-2"><i class="bi bi-house"></i></span>Home</a>
            </li>
            <li>
            <a class="dropdown-item" href="#"><span class="me-2"><i class="bi bi-speedometer2"></i></span>Dashboard</a>
            </li>
            <li>
            <a class="dropdown-item" href="#"><span class="me-2"><i class="bi bi-table"></i></span>Orders</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('defaultDropdown')
                ->items(
                    [
                        [
                            'label' => 'Dropdown with icon',
                            'link' => '#',
                            'items' => [
                                [
                                    'label' => 'Home',
                                    'link' => '#',
                                    'iconClass' => 'bi bi-house',
                                    'iconContainerAttributes' => ['class' => 'me-2'],
                                ],
                                [
                                    'label' => 'Dashboard',
                                    'link' => '#',
                                    'iconClass' => 'bi bi-speedometer2',
                                    'iconContainerAttributes' => ['class' => 'me-2'],
                                ],
                                [
                                    'label' => 'Orders',
                                    'link' => '#',
                                    'iconClass' => 'bi bi-table',
                                    'iconContainerAttributes' => ['class' => 'me-2'],
                                ],
                            ],
                        ],
                    ]
                )
                ->render()
        );
    }
}
