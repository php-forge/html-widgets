<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\NavBar;

use Forge\Html\Widgets\Components\Nav;
use Forge\Html\Widgets\Components\NavBar;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * The `.navbar-brand` can be applied to most elements, but an anchor works best, as some elements might require
 * utility classes or custom styles.
 *
 * @link https://getbootstrap.com/docs/5.2/components/navbar/#brand
 */
final class SupportedContentTest extends TestCase
{
    /**
     * You can replace the text within the `.navbar-brand` with an `<img>`.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navbar/#image
     *
     * @throws ReflectionException
     */
    public function testBrandImage(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="d-inline-block align-text-top me-1" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Brand" width="30" height="24"></a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brandClass('navbar-brand')
                ->brandImage('https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg')
                ->brandImageAttributes(['alt' => 'Brand', 'width' => '30', 'height' => '24'])
                ->brandImageClass('d-inline-block align-text-top me-1')
                ->class('navbar bg-light')
                ->begin() .
            NavBar::end()
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar bg-light">
            <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" href="#">NavBar</span>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand mb-0 h1')
                ->brandTag('span')
                ->class('navbar bg-light')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * You can also make use of some additional utilities to add an image and text at the same time.
     *
     * Note the addition of `.d-inline-block` and .`align-text-top` on the `<img>`.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navbar/#image
     *
     * @throws ReflectionException
     */
    public function testBrandImageAndText(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="d-inline-block align-text-top me-1" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Brand" width="30" height="24">Bootstrap</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Bootstrap')
                ->brandClass('navbar-brand')
                ->brandImage('https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg')
                ->brandImageAttributes(['alt' => 'Brand', 'width' => '30', 'height' => '24'])
                ->brandImageClass('d-inline-block align-text-top me-1')
                ->class('navbar bg-light')
                ->begin() .
            NavBar::end()
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar bg-light">
            <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" href="#">NavBar</span>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand mb-0 h1')
                ->brandTag('span')
                ->class('navbar bg-light')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * Add your text within an element with the `.navbar-brand` class.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navbar/#text
     *
     * @throws ReflectionException
     */
    public function testBrandText(): void
    {
        $assert = new Assert();

        // As `<a>` link
        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">NavBar</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand')
                ->class('navbar bg-light')
                ->begin() .
            NavBar::end()
        );

        // As `<a>` heading
        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar bg-light">
            <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" href="#">NavBar</span>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand mb-0 h1')
                ->brandTag('span')
                ->class('navbar bg-light')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * Navbar navigation links build on our `.nav` options with their own modifier class and require the use of toggler
     * classes for proper responsive styling. Navigation in navbar will also grow to occupy as much horizontal space
     * as possible to keep your navbar contents securely aligned.
     *
     * Add the `.active` class on `.nav-link` to indicate the current page.
     *
     * Please note that you should also add the `aria-current` attribute on the active `.nav-link`.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navbar/#nav
     *
     * @throws ReflectionException
     */
    public function testNav(): void
    {
        $assert = new Assert();
        $definitions = [
            'menuDefinitions()' => [
                [
                    'class()' => ['navbar-nav'],
                    'itemsContainerClass()' => ['nav-item'],
                    'linkClass()' => ['nav-link'],
                ],
            ],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">NavBar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            </ul>
            </div>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand')
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarNav')
                ->class('navbar navbar-expand-lg bg-light')
                ->begin() .
                Nav::create(config: $definitions)
                    ->currentPath('/home')
                    ->id('navbarNav')
                    ->items([
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Features', 'link' => '#'],
                        ['label' => 'Pricing', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ])
                    ->render() .
            NavBar::end()
        );
    }

    /**
     * Navbar come with built-in support for a handful of subcomponents. Choose from the following as needed:
     * `.navbar-brand` for your company, product, or project name.
     * `.navbar-nav` for a full-height and lightweight navigation (including support for dropdowns).
     * `.navbar-toggler` for use with our collapse plugin and other navigation toggling behaviors.
     *
     * Flex and spacing utilities for any form controls and actions.
     * `.navbar-text` for adding vertically centered strings of text.
     * `.collapse.navbar-collapse` for grouping and hiding navbar contents by a parent breakpoint.
     *
     * Add an optional .navbar-scroll to set a max-height and scroll expanded navbar content.
     *
     * Here’s an example of all the subcomponents included in a responsive light-themed navbar that automatically
     * collapses at the `lg (large)` breakpoint.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navbar/#supported-content
     *
     * @throws ReflectionException
     */
    public function testSupportedContent(): void
    {
        $assert = new Assert();
        $definitions = [
            'dropdownDefinitions()' => [
                [
                    'container()' => [false],
                    'dividerClass()' => ['dropdown-divider'],
                    'headerClass()' => ['dropdown-header'],
                    'itemClass()' => ['dropdown-item'],
                    'itemContainerClass()' => ['nav-item'],
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
                    'class()' => ['navbar-nav me-auto mb-2 mb-lg-0'],
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
            <a class="navbar-brand" href="#">NavBar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</a>
            <ul class="dropdown-menu">
            <li class="nav-item">
            <a class="dropdown-item" href="#">Action</a>
            </li>
            <li class="nav-item">
            <a class="dropdown-item" href="#">Another action</a>
            </li>
            <li>
            <hr class="dropdown-divider">
            </li>
            <li class="nav-item">
            <a class="dropdown-item" href="#">Something else here</a>
            </li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            </ul>
            </div>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand')
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarSupportedContent')
                ->class('navbar navbar-expand-lg bg-light')
                ->begin() .
                Nav::create(config: $definitions)
                    ->currentPath('/home')
                    ->id('navbarSupportedContent')
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
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ])
                    ->render() .
            NavBar::end()
        );
    }

    /**
     * Navbar may contain bits of text with the help of `.navbar-text`.
     *
     * This class adjusts vertical alignment and horizontal spacing for strings of text.
     *
     * @link https://getbootstrap.com/docs/5.2/components/navbar/#text-1
     *
     * @throws ReflectionException
     */
    public function testText(): void
    {
        $assert = new Assert();
        $definitions = [
            'menuDefinitions()' => [
                [
                    'beforeClass()' => ['navbar-text me-2'],
                    'beforeContent()' => ['Navbar text with an inline element'],
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
            <a class="navbar-brand" href="#">Navbar w/ text</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarText">
            <span class="navbar-text me-2">Navbar text with an inline element</span>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            </ul>
            </div>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Navbar w/ text')
                ->brandClass('navbar-brand')
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarText')
                ->class('navbar navbar-expand-lg bg-light')
                ->begin() .
                Nav::create(config: $definitions)
                    ->currentPath('/home')
                    ->id('navbarText')
                    ->items([
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Features', 'link' => '#'],
                        ['label' => 'Pricing', 'link' => '#'],
                    ])
                    ->render() .
            NavBar::end()
        );

        $definitions = [
            'menuDefinitions()' => [
                [
                    'afterClass()' => ['navbar-text'],
                    'afterContent()' => ['Navbar text with an inline element'],
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
            <a class="navbar-brand" href="#">Navbar w/ text</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" href="/home" aria-current="page">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            </ul>
            <span class="navbar-text">Navbar text with an inline element</span>
            </div>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Navbar w/ text')
                ->brandClass('navbar-brand')
                ->buttonToggle(true)
                ->buttonToggleClass('navbar-toggler')
                ->buttonToggleId('navbarText')
                ->class('navbar navbar-expand-lg bg-light')
                ->begin() .
                Nav::create(config: $definitions)
                    ->currentPath('/home')
                    ->id('navbarText')
                    ->items([
                        ['label' => 'Home', 'link' => '/home'],
                        ['label' => 'Features', 'link' => '#'],
                        ['label' => 'Pricing', 'link' => '#'],
                    ])
                    ->render() .
            NavBar::end()
        );
    }
}
