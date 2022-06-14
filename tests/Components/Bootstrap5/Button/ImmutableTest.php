<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Button;

use Forge\Html\Widgets\Components\Button;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutableTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutable(): void
    {
        $button = Button::create();
        $this->assertNotSame($button, $button->class(''));
        $this->assertNotSame($button, $button->content(''));
        $this->assertNotSame($button, $button->disabled(true));
        $this->assertNotSame($button, $button->link(''));
        $this->assertNotSame($button, $button->type(''));
    }
}
