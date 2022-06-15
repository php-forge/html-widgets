<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Nav;

use Forge\Html\Widgets\Components\Nav;
use Forge\Html\Widgets\Components\NavBar;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * If you need responsive nav variations, consider using a series of flexbox utilities. While more verbose, these
 * utilities offer greater customization across responsive breakpoints. In the example below, our nav will be stacked
 * on the lowest breakpoint, then adapt to a horizontal layout that fills the available width starting from the small
 * breakpoint.
 *
 * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#working-with-flex-utilities
 */
final class FlexUtilitiesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testFlexUtilities(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link active" href="/active" aria-current="page">Active</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#">Longer nav link</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#">Link</a>
            <a class="flex-sm-fill text-sm-center nav-link disabled" href="#">Disabled</a>
            </nav>
            HTML,
            NavBar::create()
                ->class('nav nav-pills flex-column flex-sm-row')
                ->menuContainer(false)
                ->begin() .
                Nav::create()
                    ->container(false)
                    ->currentPath('/active')
                    ->items(
                        [
                            ['label' => 'Active', 'link' => '/active'],
                            ['label' => 'Longer nav link', 'link' => '#'],
                            ['label' => 'Link', 'link' => '#'],
                            ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                        ]
                    )
                    ->menuDefinitions(
                        [
                            'class()' => ['nav nav-pills flex-column flex-sm-row'],
                            'container()' => [false],
                            'itemsContainer()' => [false],
                            'linkClass()' => ['flex-sm-fill text-sm-center nav-link'],
                        ]
                    )
                ->render() . PHP_EOL .
            NavBar::end(),
        );
    }
}
