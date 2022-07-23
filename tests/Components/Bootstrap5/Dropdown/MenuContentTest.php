<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class MenuContentTest extends TestCase
{
    /**
     * Add a header to label sections of actions in any dropdown menu.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#headers
     *
     * @throws ReflectionException
     */
    public function testHeaders(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'headerClass()' => ['dropdown-header'],
            'headerTag()' => ['h6'],
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
            <h6 class="dropdown-header">
            Dropdown header
            </h6>
            </li>
            <li>
            <a class="dropdown-item" href="#">Action</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Another action</a>
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
                                ['label' => 'Dropdown header', 'link' => ''],
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->render()
        );
    }

    /**
     * Separate groups of related menu items with a divider.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dividers
     *
     * @throws ReflectionException
     */
    public function testDividers(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'headerClass()' => ['dropdown-header'],
            'headerTag()' => ['h6'],
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
                ->items(
                    [
                        [
                            'label' => 'Dropdown',
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
     * Place any freeform text within a dropdown menu with text and use spacing utilities.
     * Note that you’ll likely need additional sizing styles to constrain the menu width.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#text
     *
     * @throws ReflectionException
     */
    public function testText(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'headerTag()' => ['p'],
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
            <p class="pe-4 ps-4 text-muted">
            Some example text thats free-flowing within the dropdown menu.
            </p>
            </li>
            <li>
            <p class="mb-0 pe-4 ps-4 text-muted">
            And this is more example text.
            </p>
            </li>
            <li>
            <hr class="dropdown-divider">
            </li>
            <li>
            <a class="dropdown-item" href="#">Action</a>
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
                                [
                                    'label' => 'Some example text thats free-flowing within the dropdown menu.',
                                    'link' => '',
                                    'headerAttributes' => ['class' => 'pe-4 ps-4 text-muted'],
                                ],
                                [
                                    'label' => 'And this is more example text.',
                                    'link' => '',
                                    'headerAttributes' => ['class' => 'mb-0 pe-4 ps-4 text-muted'],
                                ],
                                '-',
                                ['label' => 'Action', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->render()
        );
    }
}
