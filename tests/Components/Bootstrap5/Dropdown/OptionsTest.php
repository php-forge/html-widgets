<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class OptionsTest extends TestCase
{
    /**
     * By default, the dropdown menu is closed when clicking inside or outside the dropdown menu.
     * You can use the autoClose option to change this behavior of the dropdown.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#auto-close-behavior
     *
     * @throws ReflectionException
     */
    public function testAutoCloseBehavior(): void
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
            <button class="btn btn-secondary dropdown-toggle" id="defaultDropdown" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="true">Default dropdown</button>
            <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('defaultDropdown')
                ->items(
                    [
                        [
                            'label' => 'Default dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->render()
        );

        // Clickable outside
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown', 'data-bs-auto-close' => 'inside'],
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuClickableOutside" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="inside">Clickable outside</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableOutside">
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdownMenuClickableOutside')
                ->items(
                    [
                        [
                            'label' => 'Clickable outside',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->render()
        );

        // Clickable inside
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown', 'data-bs-auto-close' => 'outside'],
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuClickableInside" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">Clickable inside</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside">
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdownMenuClickableInside')
                ->items(
                    [
                        [
                            'label' => 'Clickable inside',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->render()
        );

        // Manual close
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown', 'data-bs-auto-close' => 'false'],
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuClickable" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="false">Manual close</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickable">
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Menu item</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdownMenuClickable')
                ->items(
                    [
                        [
                            'label' => 'Manual close',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->render()
        );
    }

    /**
     * Use `data-bs-offset` or `data-bs-reference` to change the location of the dropdown.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dropdown-options
     *
     * @throws ReflectionException
     */
    public function testOptions(): void
    {
        $assert = new Assert();
        $tag = new Tag();

        $definitionsDropdown1 = [
            'containerClass()' => ['dropdown me-1'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown', 'data-bs-offset' => '10,20'],
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $dropdown1 = Dropdown::create(config: $definitionsDropdown1)
            ->id('dropdownMenuOffset')
            ->items(
                [
                    [
                        'label' => 'Offset',
                        'link' => '#',
                        'items' => [
                            ['label' => 'Action', 'link' => '#'],
                            ['label' => 'Another action', 'link' => '#'],
                            ['label' => 'Something else here', 'link' => '#'],
                        ],
                    ],
                ]
            )
            ->render() . PHP_EOL;

        $definitionsDropdown2 = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'splitButtonClass()' => ['btn btn-secondary'],
            'splitButtonSpanClass()' => ['visually-hidden'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown', 'data-bs-reference' => 'parent'],
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle dropdown-toggle-split'],
        ];

        $dropdown2 = Dropdown::create(config: $definitionsDropdown2)
            ->id('dropdownMenuReference')
            ->items(
                [
                    [
                        'label' => 'Reference',
                        'link' => '#',
                        'items' => [
                            ['label' => 'Action', 'link' => '#'],
                            ['label' => 'Another action', 'link' => '#'],
                            ['label' => 'Something else here', 'link' => '#'],
                            '-',
                            ['label' => 'Separated link', 'link' => '#'],
                        ],
                    ],
                ]
            )
            ->toggleType('split')
            ->render();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="d-flex">
            <div class="dropdown me-1">
            <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-offset="10,20">Offset</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
            <li>
            <a class="dropdown-item" href="#">Action</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Another action</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Something else here</a>
            </li>
            </ul>
            </div>
            <div class="btn-group">
            <button class="btn btn-secondary" type="button">Reference</button>
            <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-reference="parent"><span class="visually-hidden">Reference</span></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
            <li>
            <a class="dropdown-item" href="#">Action</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Another action</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Something else here</a>
            </li>
            <li>
            <hr class="dropdown-divider">
            </li>
            <li>
            <a class="dropdown-item" href="#">Separated link</a>
            </li>
            </ul>
            </div>
            </div>
            HTML,
            $tag->create('div', $dropdown1 . $dropdown2, ['class' => 'd-flex']),
        );
    }
}
