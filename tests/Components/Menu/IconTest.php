<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Menu;

use Forge\Html\Widgets\Components\Menu;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class IconTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testIcon(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <ul>
            <li>
            <a class="me-2" href="/active"><span class="me-2"><i class="bi bi-house"></i></span>Home</a>
            </li>
            <li>
            <a class="me-2" href="#"><span class="me-2"><i class="bi bi-envelope"></i></span>Contact</a>
            </li>
            <li>
            <a class="me-2" href="#"><span class="me-2"><i class="bi bi-lock"></i></span>Login</a>
            </li>
            </ul>
            HTML,
            Menu::create()
                ->iconContainerAttributes(['class' => 'me-2'])
                ->linkAttributes(['class' => 'me-2'])
                ->items(
                    [
                        ['label' => 'Home', 'link' => '/active', 'iconClass' => 'bi bi-house'],
                        ['label' => 'Contact', 'link' => '#', 'iconClass' => 'bi bi-envelope'],
                        ['label' => 'Login', 'link' => '#', 'iconClass' => 'bi bi-lock'],
                    ],
                )
                ->render(),
        );
    }
}
