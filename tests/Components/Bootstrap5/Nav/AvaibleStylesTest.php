<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Nav;

use Forge\Html\Widgets\Components\Nav;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Change the style of `.navs` component with modifiers and utilities. Mix and match as needed, or build your own.
 *
 * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#available-styles
 */
final class AvaibleStylesTest extends TestCase
{
    /**
     * Force your `.nav’s` contents to extend the full available width one of two modifier classes. To proportionately
     * fill all available space with your `.nav-items`, use `.nav-fill`. Notice that all horizontal space is occupied,
     * but not every nav item has the same width.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#fill-and-justify
     *
     * @throws ReflectionException
     */
    public function testFillAndJustify(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
            <a class="nav-link active" href="/active" aria-current="page">Active</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Much longer nav link</a>
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
                        ['label' => 'Much longer nav link', 'link' => '#'],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ]
                )
                ->menuDefinitions(
                    [
                        'class()' => ['nav nav-pills nav-fill'],
                        'itemsContainerClass()' => ['nav-item'],
                        'linkClass()' => ['nav-link'],
                    ]
                )
            ->render(),
        );
    }

    /**
     * Change the horizontal alignment of your nav with flexbox utilities. By default, `navs` are left-aligned, but you
     * can easily change them to center or right aligned.
     *
     * Centered with `.justify-content-center`:
     *
     * @throws ReflectionException
     */
    public function testHorizontalAlignment(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul class="nav justify-content-center">
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
                        'class()' => ['nav justify-content-center'],
                        'itemsContainerClass()' => ['nav-item'],
                        'linkClass()' => ['nav-link'],
                    ]
                )
            ->render(),
        );
    }

    /**
     * Take that same HTML, but use `.nav-pills` instead:
     *
     * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#pills
     *
     * @throws ReflectionException
     */
    public function testPills(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul class="nav nav-pills">
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
                        'class()' => ['nav nav-pills'],
                        'itemsContainerClass()' => ['nav-item'],
                        'linkClass()' => ['nav-link'],
                    ]
                )
            ->render(),
        );
    }

    /**
     * Takes the basic nav from above and adds the `.nav-tabs` class to generate a tabbed interface. Use them to create
     * tabbable regions with our tab JavaScript plugin.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#tabs
     *
     * @throws ReflectionException
     */
    public function testTabs(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul class="nav nav-tabs">
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
                        'class()' => ['nav nav-tabs'],
                        'itemsContainerClass()' => ['nav-item'],
                        'linkClass()' => ['nav-link'],
                    ]
                )
            ->render(),
        );
    }

    /**
     * Stack your navigation by changing the flex item direction with the `.flex-column` utility. Need to stack them on
     * some viewports but not others? Use the responsive versions (e.g., `.flex-sm-column`).
     *
     * @throws ReflectionException
     */
    public function testVertical(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul class="nav flex-column">
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
                        'class()' => ['nav flex-column'],
                        'itemsContainerClass()' => ['nav-item'],
                        'linkClass()' => ['nav-link'],
                    ]
                )
            ->render(),
        );
    }
}
