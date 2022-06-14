<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class MenuItemsTest extends TestCase
{
    /**
     * Add `.active` to items in the dropdown to style them as active. To convey the active state to assistive
     * technologies, use the `aria-current` attribute — using the page value for the current page, or `true` for the
     * current item in a set.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#active
     *
     * @throws ReflectionException
     */
    public function testActive(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'headerClass()' => ['dropdown-item-text'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</button>
            <ul class="dropdown-menu">
            <li>
            <a class="dropdown-item" href="#">Regular link</a>
            </li>
            <li>
            <a class="dropdown-item active" href="#" aria-current="true">Active link</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Another link</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->items(
                    [
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Regular link', 'link' => '#'],
                                ['label' => 'Active link', 'link' => '#', 'active' => true],
                                ['label' => 'Another link', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );
    }

    /**
     * Add `.disabled` to items in the dropdown to style them as disabled.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#disabled
     *
     * @throws ReflectionException
     */
    public function testDisabled(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'headerClass()' => ['dropdown-item-text'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</button>
            <ul class="dropdown-menu">
            <li>
            <a class="dropdown-item" href="#">Regular link</a>
            </li>
            <li>
            <a class="dropdown-item disabled" href="#">Disabled link</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Another link</a>
            </li>
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->items(
                    [
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Regular link', 'link' => '#'],
                                ['label' => 'Disabled link', 'link' => '#', 'disabled' => true],
                                ['label' => 'Another link', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );
    }

    /**
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#menu-items
     *
     * @throws ReflectionException
     */
    public function testMenuItems(): void
    {
        $assert = new Assert();

        $definitions = [
            'containerClass()' => ['btn-group'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'itemTag()' => ['button'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        /**
         * You can use `<a>` or `<button>` elements as dropdown items.
         */
        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</button>
            <ul class="dropdown-menu">
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
                            'label' => 'Dropdown',
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

        $definitions = [
            'containerClass()' => ['btn-group'],
            'headerClass()' => ['dropdown-item-text'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        /**
         * You can also create non-interactive dropdown items with `.dropdown-item-text.` Feel free to style further
         * with custom CSS or text utilities.
         */
        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</button>
            <ul class="dropdown-menu">
            <li>
            <span class="dropdown-item-text">Dropdown item text</span>
            </li>
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
            HTML,
            Dropdown::create(config: $definitions)
                ->items(
                    [
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Dropdown item text', 'link' => ''],
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
