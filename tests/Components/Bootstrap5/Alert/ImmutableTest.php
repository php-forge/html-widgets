<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Alert;

use Forge\Html\Widgets\Components\Alert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutableTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutable(): void
    {
        $alert = Alert::create();
        $this->assertNotSame($alert, $alert->buttonAttributes([]));
        $this->assertNotSame($alert, $alert->buttonClass(''));
        $this->assertNotSame($alert, $alert->buttonLabel(''));
        $this->assertNotSame($alert, $alert->class(''));
        $this->assertNotSame($alert, $alert->content(''));
        $this->assertNotSame($alert, $alert->container(false));
        $this->assertNotSame($alert, $alert->dismissing(false));
        $this->assertNotSame($alert, $alert->iconAttributes([]));
        $this->assertNotSame($alert, $alert->iconClass(''));
        $this->assertNotSame($alert, $alert->iconValue(''));
        $this->assertNotSame($alert, $alert->template(''));
        $this->assertNotSame($alert, $alert->type('success'));
    }
}
