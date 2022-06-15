<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Nav;

use Forge\Html\Widgets\Components\Nav;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

/**
 * Add dropdown menus with a little extra HTML and the dropdowns JavaScript plugin.
 *
 * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#using-dropdowns
 */
final class DropdownTest extends TestCase
{
    /**
     * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#pills-with-dropdowns
     */
    public function testPillsWithdropdowns(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul class="nav nav-pills">
            <li class="nav-item">
            <a class="nav-link active" href="/active" aria-current="page">Active</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</a>
            <ul class="dropdown-menu">
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
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                                '-',
                                ['label' => 'Separated link', 'link' => '#'],
                            ],
                        ],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ]
                )
                ->dropdownDefinitions(
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
                    ]
                )
                ->menuDefinitions(
                    [
                        'class()' => ['nav nav-pills'],
                        'dropdownContainerClass()' => ['nav-item dropdown'],
                        'itemsContainerClass()' => ['nav-item'],
                        'linkClass()' => ['nav-link'],
                    ]
                )
            ->render(),
        );
    }

    /**
     * @link https://getbootstrap.com/docs/5.2/components/navs-tabs/#tabs-with-dropdowns
     */
    public function testTabsWithDropdowns(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link active" href="/active" aria-current="page">Active</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" aria-expanded="false" data-bs-toggle="dropdown">Dropdown</a>
            <ul class="dropdown-menu">
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
                        [
                            'label' => 'Dropdown',
                            'link' => '#',
                            'items' => [
                                ['label' => 'Action', 'link' => '#'],
                                ['label' => 'Another action', 'link' => '#'],
                                ['label' => 'Something else here', 'link' => '#'],
                                '-',
                                ['label' => 'Separated link', 'link' => '#'],
                            ],
                        ],
                        ['label' => 'Link', 'link' => '#'],
                        ['label' => 'Disabled', 'link' => '#', 'disabled' => true],
                    ]
                )
                ->dropdownDefinitions(
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
                    ]
                )
                ->menuDefinitions(
                    [
                        'class()' => ['nav nav-tabs'],
                        'dropdownContainerClass()' => ['nav-item dropdown'],
                        'itemsContainerClass()' => ['nav-item'],
                        'linkClass()' => ['nav-link'],
                    ]
                )
            ->render(),
        );
    }
}
