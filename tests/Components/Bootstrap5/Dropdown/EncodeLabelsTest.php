<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class EncodeLabelsTest extends TestCase
{
    /**
     * For default encoding, the label should be encoded.
     *
     * @throws ReflectionException
     */
    public function testEncode(): void
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
            <a class="dropdown-item" href="#">Encode &amp; Labels</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Encode &amp;&amp; Labels</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Encode &amp;&amp;&amp; Labels</a>
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
                                ['label' => 'Encode & Labels', 'link' => '#'],
                                ['label' => 'Encode && Labels', 'link' => '#'],
                                ['label' => 'Encode &&& Labels', 'link' => '#'],
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
    public function testEncodeFalse(): void
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
            <a class="dropdown-item" href="#">Encode & Labels</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Encode &amp;&amp; Labels</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Encode &&& Labels</a>
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
                                ['label' => 'Encode & Labels', 'link' => '#', 'encodeLabel' => false],
                                ['label' => 'Encode && Labels', 'link' => '#'],
                                ['label' => 'Encode &&& Labels', 'link' => '#', 'encodeLabel' => false],
                            ],
                        ],
                    ]
                )
                ->render()
        );
    }
}
