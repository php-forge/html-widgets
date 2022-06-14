<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Attribute;

use Forge\Html\Widgets\Attribute\Globals;
use PHPUnit\Framework\TestCase;

final class GlobalAttributeTest extends TestCase
{
    public function testImmutability(): void
    {
        $globals = $this->createWidget();
        $this->assertNotSame($globals, $globals->id(null));
    }

    private function createWidget(): Globals
    {
        return new class () extends Globals {
            protected function run(): string
            {
                return '';
            }
        };
    }
}
