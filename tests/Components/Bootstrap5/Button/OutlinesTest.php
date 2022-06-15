<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Button;

use Forge\Html\Widgets\Components\Button;
use PHPUnit\Framework\TestCase;

/**
 * In need of a button, but not the hefty background colors they bring? Replace the default modifier classes with the
 * `.btn-outline-*` ones to remove all background images and colors on any button.
 *
 * Some button styles use a relatively light foreground color, and should only be used on a dark background in
 * order to have sufficient contrast.
 *
 * @link https://getbootstrap.com/docs/5.2/components/buttons/#outline-buttons
 */
final class OutlinesTest extends TestCase
{
    public function outlinesProvider(): array
    {
        return [
            [
                'btn btn-outline-primary',
                'Primary',
                '<button class="btn btn-outline-primary" type="button">Primary</button>',
            ],
            [
                'btn btn-outline-secondary',
                'Secondary',
                '<button class="btn btn-outline-secondary" type="button">Secondary</button>',
            ],
            [
                'btn btn-outline-success',
                'Success',
                '<button class="btn btn-outline-success" type="button">Success</button>',
            ],
            [
                'btn btn-outline-danger',
                'Danger',
                '<button class="btn btn-outline-danger" type="button">Danger</button>',
            ],
            [
                'btn btn-outline-warning',
                'Warning',
                '<button class="btn btn-outline-warning" type="button">Warning</button>',
            ],
            [
                'btn btn-outline-info',
                'Info',
                '<button class="btn btn-outline-info" type="button">Info</button>',
            ],
            [
                'btn btn-outline-light',
                'Light',
                '<button class="btn btn-outline-light" type="button">Light</button>',
            ],
            [
                'btn btn-outline-dark',
                'Dark',
                '<button class="btn btn-outline-dark" type="button">Dark</button>',
            ],
        ];
    }

    /**
     * @dataProvider outlinesProvider
     *
     * @param string $class The class to use for the button.
     * @param string $content The content to use for the button.
     * @param string $expected The expected HTML output.
     */
    public function testOutlines(string $class, string $content, string $expected): void
    {
        $this->assertSame($expected, button::create()->class($class)->content($content)->render());
    }
}
