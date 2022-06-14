<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Button dropdowns work with buttons of all sizes, including default and split dropdown buttons.
 *
 * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#sizing
 */
final class SizingTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testSizingWithLargeButton(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary btn-lg dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary btn-lg dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Large button</button>
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
                            'label' => 'Large button',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                                '-',
                                ['label' => 'Separated link', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSizingWithSmallButton(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary btn-sm dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary btn-sm dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Large button</button>
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
                            'label' => 'Large button',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                                '-',
                                ['label' => 'Separated link', 'link' => '#'],
                            ],
                        ]
                    ]
                )
                ->render()
        );
    }
}
