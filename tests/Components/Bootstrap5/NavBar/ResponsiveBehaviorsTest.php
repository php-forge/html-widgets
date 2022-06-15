<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\NavBar;

use Forge\Html\Widgets\Components\Nav;
use Forge\Html\Widgets\Components\NavBar;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Navbar can use `.navbar-toggler`, `.navbar-collapse`, and `.navbar-expand{-sm|-md|-lg|-xl|-xxl}` classes to
 * determine when their content collapses behind a button. In combination with other utilities, you can easily
 * choose when to show or hide particular elements.
 *
 * For navbar that never collapse, add the `.navbar-expand` class on the navbar. For navbar that always collapse,
 * don’t add any `.navbar-expand` class.
 *
 * @link https://getbootstrap.com/docs/5.2/components/navbar/#responsive-behaviors
 */
final class ResponsiveBehaviorsTest extends TestCase
{
    /**
     * Sometimes you want to use the collapse plugin to trigger a container element for content that structurally sits
     * outside the `.navbar`. Because our plugin works on the id and `data-bs-target` matching, that’s easily done!.
     *
     * @throws ReflectionException
     */
    public function testExternalContent(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
            <h5 class="text-white h4">Collapsed content</h5>
            <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
            </div>
            <nav class="navbar">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
            </nav>
            HTML,
            <<<HTML
            <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
            <h5 class="text-white h4">Collapsed content</h5>
            <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
            </div>
            HTML . PHP_EOL .
            NavBar::create()
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarToggleExternalContent')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * Transform your expanding and collapsing navbar into an offcanvas drawer with the offcanvas plugin. We extend both
     * the offcanvas default styles and use our `.navbar-expand-*` classes to create a dynamic and flexible navigation
     * sidebar.
     *
     * In the example below, to create an offcanvas navbar that is always collapsed across all breakpoints, omit the
     * `.navbar-expand-*` class entirely.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navbar/#offcanvas
     *
     * @throws ReflectionException
     */
    public function testOffCanvas(): void
    {
        $assert = new Assert();

        $definitions = [
            'dropdownDefinitions()' => [
                [
                    'container()' => [false],
                    'dividerClass()' => ['dropdown-divider'],
                    'headerClass()' => ['dropdown-header'],
                    'id()' => ['offcanvasNavbarDropdown'],
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
                    'class()' => ['navbar-nav justify-content-end flex-grow-1 pe-3'],
                    'dropdownContainerClass()' => ['nav-item dropdown'],
                    'itemsContainerClass()' => ['nav-item'],
                    'linkClass()' => ['nav-link'],
                ],
            ],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Offcanvas navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"><span class="navbar-toggler-icon"></span></button>
            <div class="offcanvas offcanvas-end" id="offcanvasNavbar" tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
            Offcanvas
            </h5>
            <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="offcanvasNavbarDropdown" href="#" role="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
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
            </ul>
            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
            </div>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Offcanvas navbar')
                ->brandClass('navbar-brand')
                ->buttonToggle(true)
                ->buttonToggleAttributes(
                    ['aria-expanded' => null, 'aria-label' => null, 'data-bs-toggle' => 'offcanvas']
                )
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('offcanvasNavbar')
                ->class('navbar bg-light fixed-top')
                ->begin() .
                Nav::create(config: $definitions)
                    ->class('offcanvas-body')
                    ->currentPath('/home')
                    ->items([
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Link', 'link' => '#'],
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                '-',
                                ['label' => 'Something else here', 'link' => '#'],
                            ],
                        ],
                    ])
                    ->offCanvas()
                    ->offCanvasId('offcanvasNavbar')
                    ->offCanvasHeaderTitleContent('Offcanvas')
                    ->offCanvasHeaderTitleId('offcanvasNavbarLabel')
                    ->render() .
            NavBar::end()
        );
    }

    /**
     * Navbar togglers are left-aligned by default, but should they follow a sibling element like a `.navbar-brand`,
     * they’ll automatically be aligned to the far right. Reversing your markup will reverse the placement of the
     * toggler. Below are examples of different toggle styles.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navbar/#toggler
     *
     * @throws ReflectionException
     */
    public function testToggler(): void
    {
        $assert = new Assert();

        //With no .navbar-brand shown at the smallest breakpoint:

        $definitions = [
            'menuDefinitions()' => [
                [
                    'beforeAttributes()' => [['href' => '#']],
                    'beforeClass()' => ['navbar-brand'],
                    'beforeContent()' => ['Hidden brand'],
                    'beforeTag()' => ['a'],
                    'afterAttributes()' => [['role' => 'search']],
                    'afterClass()' => ['d-flex'],
                    'afterContent()' => [
                        <<<HTML
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        HTML,
                    ],
                    'afterTag()' => ['form'],
                    'class()' => ['navbar-nav me-auto mb-2 mb-lg-0'],
                    'itemsContainerClass()' => ['nav-item'],
                    'linkClass()' => ['nav-link'],
                ],
            ],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Hidden brand</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
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
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarTogglerDemo01')
                ->class('navbar navbar-expand-lg bg-light')
                ->template('{containerMenu}{toggle}')
                ->begin() .
                Nav::create(config: $definitions)
                    ->currentPath('/home')
                    ->id('navbarTogglerDemo01')
                    ->items([
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ])
                    ->render() .
            NavBar::end()
        );

        // With a brand name shown on the left and toggler on the right:

        $definitions = [
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
                    'class()' => ['navbar-nav me-auto mb-2 mb-lg-0'],
                    'itemsContainerClass()' => ['nav-item'],
                    'linkClass()' => ['nav-link'],
                ],
            ],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
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
                ->brand('Navbar')
                ->brandClass('navbar-brand')
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarTogglerDemo02')
                ->class('navbar navbar-expand-lg bg-light')
                ->begin() .
                Nav::create(config: $definitions)
                    ->currentPath('/home')
                    ->id('navbarTogglerDemo02')
                    ->items([
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ])
                    ->render() .
            NavBar::end()
        );

        // With a toggler on the left and brand name on the right:

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
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
                ->brand('Navbar')
                ->brandClass('navbar-brand')
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarTogglerDemo03')
                ->class('navbar navbar-expand-lg bg-light')
                ->template('{containerMenu}{toggle}{brand}')
                ->begin() .
                Nav::create(config: $definitions)
                    ->currentPath('/home')
                    ->id('navbarTogglerDemo03')
                    ->items([
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ])
                    ->render() .
            NavBar::end()
        );
    }
}
