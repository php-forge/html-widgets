<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\NavBar;

use Forge\Html\Widgets\Components\NavBar;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Although it’s not required, you can wrap a navbar in a `.container` to center it on a page–though note that an inner
 * container is still required. Or you can add a container inside the `.navbar` to only center the contents of a fixed
 * or static top navbar.
 *
 * @link https://getbootstrap.com/docs/5.2/components/navbar/#containers
 */
final class ContainerTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testContainers(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="container">
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">NavBar</a>
            </div>
            </nav>
            </div>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand')
                ->class('navbar navbar-expand-lg bg-light')
                ->container()
                ->containerClass('container')
                ->begin() .
            NavBar::end()
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-md">
            <a class="navbar-brand" href="#">NavBar</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand')
                ->class('navbar navbar-expand-lg bg-light')
                ->container(false)
                ->menuContainerClass('container-md')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testContainerWithoutContainer(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">NavBar</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand')
                ->class('navbar navbar-expand-lg bg-light')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testContainerWithoutMenuContainer(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar navbar-expand-lg bg-light">
            <a class="navbar-brand" href="#">NavBar</a>
            </nav>
            HTML,
            NavBar::create()
                ->brand('NavBar')
                ->brandClass('navbar-brand')
                ->class('navbar navbar-expand-lg bg-light')
                ->menuContainer(false)
                ->begin() .
            NavBar::end()
        );
    }
}
