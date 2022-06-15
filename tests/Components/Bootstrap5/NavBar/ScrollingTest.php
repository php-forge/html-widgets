<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\NavBar;

use Forge\Html\Widgets\Components\Nav;
use Forge\Html\Widgets\Components\NavBar;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Add `.navbar-nav-scroll` to a `.navbar-nav` (or other navbar subcomponent) to enable vertical scrolling within the
 * toggleable contents of a collapsed navbar. By default, scrolling kicks in at 75vh (or 75% of the viewport height),
 * but you can override that with the local CSS custom property `--bs-navbar-height` or custom styles. At larger
 * viewports when the navbar is expanded, content will appear as it does in a default navbar.
 *
 * Please note that this behavior comes with a potential drawback of overflow—when setting `overflow-y: auto`
 * (required to scroll the content here), overflow-x is the equivalent of auto, which will crop some horizontal content.
 *
 * Here’s an example navbar using .navbar-nav-scroll with `style="--bs-scroll-height: 100px;"`, with some extra margin
 * utilities for optimum spacing.
 *
 * @link https://getbootstrap.com/docs/5.2/components/navbar/#scrolling
 */
final class ScrollingTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testScrolling(): void
    {
        $assert = new Assert();
        $definitions = [
            'dropdownDefinitions()' => [
                [
                    'container()' => [false],
                    'dividerClass()' => ['dropdown-divider'],
                    'headerClass()' => ['dropdown-header'],
                    'itemClass()' => ['dropdown-item'],
                    'itemsContainerClass()' => ['dropdown-menu'],
                    'toggleAttributes()' => [
                        [
                            'aria-expanded' => 'false',
                            'data-bs-toggle' => 'dropdown',
                            'role' => 'button',
                        ],
                    ],
                    'toggleClass()' => ['nav-link dropdown-toggle'],
                    'toggleType()' => ['link'],
                ],
            ],
            'menuDefinitions()' => [
                [
                    'afterAttributes()' => [['role' => 'search']],
                    'afterClass()' => ['d-flex'],
                    'afterContent()' => [
                        <<<HTML
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        HTML,
                    ],
                    'afterTag()' => ['form'],
                    'class()' => ['navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll'],
                    'dropdownContainerClass()' => ['nav-item dropdown'],
                    'itemsContainerClass()' => ['nav-item'],
                    'linkClass()' => ['nav-link'],
                ],
            ],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar scroll</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" aria-expanded="false" data-bs-toggle="dropdown">Link</a>
            <ul class="dropdown-menu">
            <li>
            <a class="dropdown-item" href="#">Action</a>
            </li>
            <li>
            <a class="dropdown-item" href="#">Another action</a>
            </li>
            <li>
            <hr class="dropdown-divider">
            </li>
            <li>
            <a class="dropdown-item" href="#">Something else here</a>
            </li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Link</a>
            </li>
            </ul>
            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Navbar scroll')
                ->brandClass('navbar-brand')
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarText')
                ->class('navbar navbar-expand-lg bg-light')
                ->begin() .
                Nav::create(config: $definitions)
                    ->class('collapse navbar-collapse')
                    ->currentPath('/home')
                    ->id('navbarText')
                    ->items([
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Link', 'link' => '#'],
                        [
                            'label' => 'Link',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                '-',
                                ['label' => 'Something else here', 'link' => '#'],
                            ],
                        ],
                        ['label' => 'Link', 'link' => '#', 'disabled' => true],
                    ])
                    ->render() .
            NavBar::end()
        );
    }
}
