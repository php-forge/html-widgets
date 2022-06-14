<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Wrap the dropdown’s toggle (your button or link) and the dropdown menu within `.dropdown`, or another element that
 * declares `position: relative;`. Dropdowns can be triggered from `<a>` or `<button>` elements to better fit your
 * potential needs. The examples shown here use semantic `<ul>` elements where appropriate, but custom markup is
 * supported.
 *
 * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#examples
 */
final class ExamplesTest extends TestCase
{
    /**
     * Any single `.btn` can be turned into a dropdown toggle with some markup changes. Here’s how you can put them to
     * work with either `<button>` elements:
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#single-button
     *
     * @throws ReflectionException
     */
    public function testSingleButton(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['dropdown'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown button</button>
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
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdown-example')
                ->items(
                    [
                        [
                            'label' => 'Dropdown button',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->render()
        );
    }

    /**
     * The best part is you can do this with any button variant, too.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#single-button
     *
     * @throws ReflectionException
     */
    public function testSingleButtonGroup(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-danger dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-danger dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Danger</button>
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
                            'label' => 'Danger',
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
     * And with <a> elements.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#single-button
     *
     * @throws ReflectionException
     */
    public function testSingleButtonLink(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['dropdown'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" id="dropdown-example" href="#" role="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown link</a>
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
            </ul>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdown-example')
                ->items(
                    [
                        [
                            'label' => 'Dropdown link',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                            ],
                        ],
                    ]
                )
                ->toggleType('link')
                ->render()
        );
    }

    /**
     * Similarly, create split button dropdowns with virtually the same markup as single button dropdowns, but with the
     * addition of `.dropdown-toggle-split` for proper spacing around the dropdown caret.
     *
     * We use this extra class to reduce the horizontal padding on either side of the caret by 25% and remove the
     * margin-left that’s added for regular button dropdowns. Those extra changes keep the caret centered in the split
     * button and provide a more appropriately sized hit area next to the main button.
     *
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#split-button
     *
     * @throws ReflectionException
     */
    public function testSplit(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-danger dropdown-toggle dropdown-toggle-split'],
            'splitButtonClass()' => ['btn btn-danger'],
            'splitButtonSpanClass()' => ['visually-hidden'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-danger" type="button">Action</button>
            <button class="btn btn-danger dropdown-toggle dropdown-toggle-split" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown"><span class="visually-hidden">Action</span></button>
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
                            'label' => 'Action',
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
                ->toggleType('link')
                ->toggleType('split')
                ->render()
        );
    }

    /**
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dropend
     *
     * @throws ReflectionException
     */
    public function testSplitDropend(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group dropend'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle dropdown-toggle-split'],
            'splitButtonClass()' => ['btn btn-secondary'],
            'splitButtonSpanClass()' => ['visually-hidden'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropend">
            <button class="btn btn-secondary" type="button">Split dropend</button>
            <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown"><span class="visually-hidden">Split dropend</span></button>
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
                            'label' => 'Split dropend',
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
                ->toggleType('link')
                ->toggleType('split')
                ->render()
        );
    }

    /**
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dropstart
     *
     * @throws ReflectionException
     */
    public function testSplitDropStart(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group dropstart'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle dropdown-toggle-split'],
            'splitButtonClass()' => ['btn btn-secondary'],
            'splitButtonSpanClass()' => ['visually-hidden'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropstart">
            <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown"><span class="visually-hidden">Split dropstart</span></button>
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
            <button class="btn btn-secondary" type="button">Split dropstart</button>
            </div>
            HTML,
            Dropdown::create(config: $definitions)
                ->id('dropdown-example')
                ->items(
                    [
                        [
                            'label' => 'Split dropstart',
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
                ->toggleType('link')
                ->toggleType('split')
                ->render()
        );
    }

    /**
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dropup
     *
     * @throws ReflectionException
     */
    public function testSplitDropup(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group dropup'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle dropdown-toggle-split'],
            'splitButtonClass()' => ['btn btn-secondary'],
            'splitButtonSpanClass()' => ['visually-hidden'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group dropup">
            <button class="btn btn-secondary" type="button">Split dropup</button>
            <button class="btn btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown"><span class="visually-hidden">Split dropup</span></button>
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
                            'label' => 'Split dropup',
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
                ->toggleType('link')
                ->toggleType('split')
                ->render()
        );
    }

    /**
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#sizing
     *
     * @throws ReflectionException
     */
    public function testSplitSizingWithLargeButton(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split'],
            'splitButtonClass()' => ['btn btn-secondary btn-lg'],
            'splitButtonSpanClass()' => ['visually-hidden'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary btn-lg" type="button">Large split button</button>
            <button class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown"><span class="visually-hidden">Large split button</span></button>
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
                            'label' => 'Large split button',
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
                ->render()
        );
    }

    /**
     * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#sizing
     *
     * @throws ReflectionException
     */
    public function testSplitSizingWithSmallButton(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['btn-group'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split'],
            'splitButtonClass()' => ['btn btn-secondary btn-sm'],
            'splitButtonSpanClass()' => ['visually-hidden'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="btn-group">
            <button class="btn btn-secondary btn-sm" type="button">Large split button</button>
            <button class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown"><span class="visually-hidden">Large split button</span></button>
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
                            'label' => 'Large split button',
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
                ->render()
        );
    }
}
