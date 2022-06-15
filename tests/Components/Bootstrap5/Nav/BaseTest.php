<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Nav;

use Forge\Html\Widgets\Components\Nav;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Navigation available in Bootstrap share general markup and styles, from the base `.nav` class to the active and
 * disabled states. Swap modifier classes to switch between each style.
 *
 * The base `.nav` component is built with flexbox and provide a strong foundation for building all types of navigation
 * components. It includes some style overrides (for working with lists), some link padding for larger hit areas,
 * and basic disabled styling.
 *
 * The base `.nav` component does not include any `.active` state. The following examples include the class, mainly to
 * demonstrate that this particular class does not trigger any special styling.
 *
 * To convey the active state to assistive technologies, use the `aria-current` attribute — using the page value for
 * current page, or true for the current item in a set.
 *
 * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#base-nav
 */
final class BaseTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testBase(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul class="nav">
            <li class="nav-item">
            <a class="nav-link active" href="/active" aria-current="page">Active</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            </ul>
            HTML,
            Nav::create()
                ->container(false)
                ->currentPath('/active')
                ->items(
                    [
                        ['label' => 'Active', 'link' => '/active'],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ]
                )
                ->menuDefinitions(
                    [
                        'class()' => ['nav'],
                        'itemsContainerClass()' => ['nav-item'],
                        'linkClass()' => ['nav-link'],
                    ]
                )
            ->render(),
        );
    }
}
