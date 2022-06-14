<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class MenuAlignmentTest extends TestCase
{
    /**
     * Taking most of the options shown above, here’s a small kitchen sink demo of various dropdown alignment options in
     * one place.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#alignment-options
     *
     * @throws ReflectionException
     */
    public function testAlignmentOptions(): void
    {
        $assert = new Assert();

        // Default alignment
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                ->id('dropdownMenuButton')
                ->items(
                    [
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );

        // Right aligned menu
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu dropdown-menu-end'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Right-aligned menu</button>
            <ul class="dropdown-menu dropdown-menu-end">
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
                ->items(
                    [
                        [
                            'label' => 'Right-aligned menu',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );

        // Left aligned, right aligned lg
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu dropdown-menu-lg-end'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-display' => 'static', 'data-bs-toggle' => 'dropdown']
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-display="static" data-bs-toggle="dropdown">Left-aligned, right-aligned lg</button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
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
                ->items(
                    [
                        [
                            'label' => 'Left-aligned, right-aligned lg',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );

        // Right aligned, leftaligned lg
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu dropdown-menu-end dropdown-menu-lg-start'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-display' => 'static', 'data-bs-toggle' => 'dropdown']
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-display="static" data-bs-toggle="dropdown">Right-aligned, left-aligned lg</button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
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
                ->items(
                    [
                        [
                            'label' => 'Right-aligned, left-aligned lg',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );

        // Dropstart
        $definitions = [
            'containerClass()' => ['btn-group dropstart'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropstart">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropstart</button>
            <ul class="dropdown-menu">
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
                ->items(
                    [
                        [
                            'label' => 'Dropstart',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );

        // Dropend
        $definitions = [
            'containerClass()' => ['btn-group dropend'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropend">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropend</button>
            <ul class="dropdown-menu">
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
                ->items(
                    [
                        [
                            'label' => 'Dropend',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );

        // Dropup
        $definitions = [
            'containerClass()' => ['btn-group dropup'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [
                ['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']
            ],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropup">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropup</button>
            <ul class="dropdown-menu">
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
                ->items(
                    [
                        [
                            'label' => 'Dropup',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                                ['label' => 'Menu item', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );
    }

    /**
     * By default, a dropdown menu is automatically positioned 100% from the top and along the left side of its parent.
     * You can change this with the directional `.drop*` classes, but you can also control them with additional modifier
     * classes.
     *
     * Add `.dropdown-menu-end` to a `.dropdown-menu` to right align the dropdown menu.
     * Directions are mirrored when using Bootstrap in RTL, meaning `.dropdown-menu-end` will appear on the left side.
     *
     * Heads up! Dropdowns are positioned thanks to Popper except when they are contained in a navbar.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#menu-alignment
     *
     * @throws ReflectionException
     */
    public function testMenuAlignment(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu dropdown-menu-end'],
            'itemTag()' => ['button'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Right-aligned menu example</button>
            <ul class="dropdown-menu dropdown-menu-end">
            <li>
            <button class="dropdown-item" href="#">Action</button>
            </li>
            <li>
            <button class="dropdown-item" href="#">Another action</button>
            </li>
            <li>
            <button class="dropdown-item" href="#">Something else here</button>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->items(
                    [
                        [
                            'label' => 'Right-aligned menu example',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );
    }

    /**
     * If you want to use responsive alignment, disable dynamic positioning by adding the `data-bs-display="static"`
     * attribute and use the responsive variation classes.
     *
     * To align right the dropdown menu with the given breakpoint or larger, add
     * `.dropdown-menu{-sm|-md|-lg|-xl|-xxl}-end`.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#responsive-alignment
     *
     * @throws ReflectionException
     */
    public function testResponsiveAlignment(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu dropdown-menu-end dropdown-menu-lg-start'],
            'itemTag()' => ['button'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Right-aligned but left aligned when large screen</button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
            <li>
            <button class="dropdown-item" href="#">Action</button>
            </li>
            <li>
            <button class="dropdown-item" href="#">Another action</button>
            </li>
            <li>
            <button class="dropdown-item" href="#">Something else here</button>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->items(
                    [
                        [
                            'label' => 'Right-aligned but left aligned when large screen',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );
    }
}
