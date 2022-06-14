<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Directions are mirrored when using Bootstrap in RTL, meaning `.dropstart` will appear on the right side.
 *
 * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#directions
 */
final class DirectionsTest extends TestCase
{
    /**
     * Make the dropdown menu centered below the toggle with `.dropdown-center` on the parent element.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#centered
     *
     * @throws ReflectionException
     */
    public function testCentered(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['dropdown-center'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="dropdown-center">
            <button class="btn btn-secondary dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Centered dropdown</button>
            <ul class="dropdown-menu" aria-labelledby="dropdown-example">
            <li>
            <a class="dropdown-item" href="#">Action one</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Action two</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Action three</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdown-example')
                ->items(
                    [
                        [
                            'label' => 'Centered dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action one', 'link' => '#'],
                                ['label' => 'Action two', 'link' => '#'],
                                ['label' => 'Action three', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->render()
        );
    }

    /**
     * Trigger dropdown menus above elements by adding `.dropup` to the parent element.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dropup
     *
     * @throws ReflectionException
     */
    public function testDropup(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group dropup'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropup">
            <button class="btn btn-secondary dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropup</button>
            <ul class="dropdown-menu" aria-labelledby="dropdown-example">
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
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdown-example')
                ->items(
                    [
                        [
                            'label' => 'Dropup',
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
                ->render()
        );
    }

    /**
     * Make the dropup menu centered above the toggle with `.dropup-center` on the parent element.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dropup-centered
     *
     * @throws ReflectionException
     */
    public function testDropupCentered(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['dropup-center dropup'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="dropup-center dropup">
            <button class="btn btn-secondary dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Centered dropup</button>
            <ul class="dropdown-menu" aria-labelledby="dropdown-example">
            <li>
            <a class="dropdown-item" href="#">Action</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Action two</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Action three</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdown-example')
                ->items(
                    [
                        [
                            'label' => 'Centered dropup',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Action two', 'link' => '#'],
                                ['label' => 'Action three', 'link' => '#'],
                            ],
                        ],
                    ],
                )
                ->render()
        );
    }

    /**
     * Trigger dropdown menus at the right of the elements by adding `.dropend` to the parent element.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dropend
     *
     * @throws ReflectionException
     */
    public function testDropend(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group dropend'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropend">
            <button class="btn btn-secondary dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropend</button>
            <ul class="dropdown-menu" aria-labelledby="dropdown-example">
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
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdown-example')
                ->items(
                    [
                        [
                            'label' => 'Dropend',
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
                ->render()
        );
    }

    /**
     * Trigger dropdown menus at the left of the elements by adding `.dropstart` to the parent element.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dropstart
     *
     * @throws ReflectionException
     */
    public function testDropStart(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group dropstart'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropstart">
            <button class="btn btn-secondary dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropstart</button>
            <ul class="dropdown-menu" aria-labelledby="dropdown-example">
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
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdown-example')
                ->items(
                    [
                        [
                            'label' => 'Dropstart',
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
                ->render()
        );
    }
}
