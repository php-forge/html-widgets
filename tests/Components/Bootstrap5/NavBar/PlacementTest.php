<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\NavBar;

use Forge\Html\Widgets\Components\NavBar;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Use our position utilities to place navbar in non-static positions. Choose from fixed to the top, fixed to the
 * bottom, stickied to the top (scrolls with the page until it reaches the top, then stays there), or stickied to the
 * bottom (scrolls with the page until it reaches the bottom, then stays there).
 *
 * Fixed navbars use position: fixed, meaning they’re pulled from the normal flow of the DOM and may require custom CSS
 * (e.g., `padding-top` on the `<body>`) to prevent overlap with other elements.
 */
final class PlacementTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testDefault(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Default</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Default')
                ->brandClass('navbar-brand')
                ->class('navbar bg-light')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFixedBottom(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar fixed-bottom bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed bottom</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Fixed bottom')
                ->brandClass('navbar-brand')
                ->class('navbar fixed-bottom bg-light')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFixedTop(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar fixed-top bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed top</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Fixed top')
                ->brandClass('navbar-brand')
                ->class('navbar fixed-top bg-light')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStickyBottom(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar sticky-top bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Sticky bottom</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Sticky bottom')
                ->brandClass('navbar-brand')
                ->class('navbar sticky-top bg-light')
                ->begin() .
            NavBar::end()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStickyTop(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <nav class="navbar sticky-top bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Sticky top</a>
            </div>
            </nav>
            HTML,
            NavBar::create()
                ->brand('Sticky top')
                ->brandClass('navbar-brand')
                ->class('navbar sticky-top bg-light')
                ->begin() .
            NavBar::end()
        );
    }
}
