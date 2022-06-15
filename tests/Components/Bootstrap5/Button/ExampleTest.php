<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Button;

use Forge\Html\Widgets\Components\Button;
use PHPUnit\Framework\TestCase;

/**
 * Bootstrap includes several predefined button styles, each serving its own semantic purpose, with a few extras thrown
 * in for more control.
 *
 * Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive
 * technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the
 * content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with
 * the `.visually-hidden` class.
 *
 * @link https://getbootstrap.com/docs/5.2/components/buttons/#examples
 */
final class ExampleTest extends TestCase
{
    public function buttonProvider(): array
    {
        return [
            ['btn btn-primary', 'Primary', '<button class="btn btn-primary" type="button">Primary</button>'],
            ['btn btn-secondary', 'Secondary', '<button class="btn btn-secondary" type="button">Secondary</button>'],
            ['btn btn-success', 'Success', '<button class="btn btn-success" type="button">Success</button>'],
            ['btn btn-danger', 'Danger', '<button class="btn btn-danger" type="button">Danger</button>'],
            ['btn btn-warning', 'Warning', '<button class="btn btn-warning" type="button">Warning</button>'],
            ['btn btn-info', 'Info', '<button class="btn btn-info" type="button">Info</button>'],
            ['btn btn-light', 'Light', '<button class="btn btn-light" type="button">Light</button>'],
            ['btn btn-dark', 'Dark', '<button class="btn btn-dark" type="button">Dark</button>'],
            ['btn btn-link', 'Link', '<button class="btn btn-link" type="button">Link</button>'],
        ];
    }

    /**
     * @dataProvider buttonProvider
     *
     * @param string $class The class to use for the button.
     * @param string $content The content to use for the button.
     * @param string $expected The expected HTML output.
     */
    public function testButton(string $class, string $content, string $expected): void
    {
        $this->assertSame($expected, button::create()->class($class)->content($content)->render());
    }
}
