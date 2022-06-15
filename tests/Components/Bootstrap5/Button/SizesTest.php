<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Button;

use Forge\Html\Widgets\Components\Button;
use PHPUnit\Framework\TestCase;

/**
 * Fancy larger or smaller buttons? Add `.btn-lg` or `.btn-sm` for additional sizes.
 *
 * @link https://getbootstrap.com/docs/5.2/components/buttons/#sizes
 */
final class SizesTest extends TestCase
{
    /**
     * You can even roll your own custom sizing with CSS variables.
     */
    public function testCustom(): void
    {
        $attributes = ['style' => '--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'];

        $this->assertSame(
            '<button class="btn btn-primary" type="button" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Custom button</button>',
            button::create()->attributes($attributes)->class('btn btn-primary')->content('Custom button')->render(),
        );
    }

    public function testLarge(): void
    {
        $this->assertSame(
            '<button class="btn btn-primary btn-lg" type="button">Large button</button>',
            button::create()->class('btn btn-primary btn-lg')->content('Large button')->render(),
        );

        $this->assertSame(
            '<button class="btn btn-secondary btn-lg" type="button">Large button</button>',
            button::create()->class('btn btn-secondary btn-lg')->content('Large button')->render(),
        );
    }

    public function testSmall(): void
    {
        $this->assertSame(
            '<button class="btn btn-primary btn-sm" type="button">Small button</button>',
            button::create()->class('btn btn-primary btn-sm')->content('Small button')->render(),
        );

        $this->assertSame(
            '<button class="btn btn-secondary btn-sm" type="button">Small button</button>',
            button::create()->class('btn btn-secondary btn-sm')->content('Small button')->render(),
        );
    }
}
