<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Dropdown;

use Forge\Html\Widgets\Components\Dropdown;
use Forge\Html\Widgets\Components\Nav;
use Forge\Html\Widgets\Components\NavBar;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Opt into darker dropdowns to match a dark navbar or custom style by adding `.dropdown-menu-dark` onto an existing
 * `.dropdown-menu`. No changes are required to the dropdown items.
 *
 * @link https://getbootstrap.com/docs/5.2/components/dropdowns/#dark-dropdowns
 */
final class DarkTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testDarkDropdowns(): void
    {
        $assert = new Assert();
        $definitions = [
            'containerClass()' => ['dropdown'],
            'dividerClass()' => ['dropdown-divider'],
            'itemClass()' => ['dropdown-item'],
            'itemsContainerClass()' => ['dropdown-menu dropdown-menu-dark'],
            'toggleAttributes()' => [['aria-expanded' => 'false', 'data-bs-toggle' => 'dropdown']],
            'toggleClass()' => ['btn btn-secondary dropdown-toggle'],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="dropdown-example" type="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown button</button>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown-example">
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
                            'label' => 'Dropdown button',
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
     * And putting it to use in a navbar.
     *
     * @throws ReflectionException
     */
    public function testDarkMenu(): void
    {
        $assert = new Assert();
        $definitions = [
            'dropdownDefinitions()' => [
                [
                    'container()' => [false],
                    'dividerClass()' => ['dropdown-divider'],
                    'headerClass()' => ['dropdown-header'],
                    'id()' => ['navbarDarkDropdownMenuLink'],
                    'itemClass()' => ['dropdown-item'],
                    'itemsContainerClass()' => ['dropdown-menu dropdown-menu-dark'],
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
                    'class()' => ['navbar-nav'],
                    'dropdownContainerClass()' => ['nav-item dropdown'],
                    'linkClass()' => ['nav-link'],
                ],
            ],
        ];

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">NavBar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" href="#" role="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
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
                ->buttonToggleId('navbarNavDarkDropdown')
                ->class('navbar navbar-expand-lg navbar-dark bg-dark')
                ->begin() .
                Nav::create(config: $definitions)
                    ->currentPath('/home')
                    ->id('navbarNavDarkDropdown')
                    ->items([
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                            ],
                        ],
                    ])
                    ->render() .
            NavBar::end()
        );
    }
}
