<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Alert;

use Forge\Html\Widgets\Components\Alert;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class ExamplesTest extends TestCase
{
    public function createExampleProvider(): array
    {
        return [
            [
                'primary',
                'A simple primary alert—check it out!',
                <<<HTML
                <div class="alert alert-primary" role="alert">
                A simple primary alert—check it out!
                </div>
                HTML,
            ],
            [
                'secondary',
                'A simple secondary alert—check it out!',
                <<<HTML
                <div class="alert alert-secondary" role="alert">
                A simple secondary alert—check it out!
                </div>
                HTML,
            ],
            [
                'success',
                'A simple success alert—check it out!',
                <<<HTML
                <div class="alert alert-success" role="alert">
                A simple success alert—check it out!
                </div>
                HTML,
            ],
            [
                'danger',
                'A simple danger alert—check it out!',
                <<<HTML
                <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
                </div>
                HTML,
            ],
            [
                'warning',
                'A simple warning alert—check it out!',
                <<<HTML
                <div class="alert alert-warning" role="alert">
                A simple warning alert—check it out!
                </div>
                HTML,
            ],
            [
                'info',
                'A simple info alert—check it out!',
                <<<HTML
                <div class="alert alert-info" role="alert">
                A simple info alert—check it out!
                </div>
                HTML,
            ],
            [
                'light',
                'A simple light alert—check it out!',
                <<<HTML
                <div class="alert alert-light" role="alert">
                A simple light alert—check it out!
                </div>
                HTML,
            ],
            [
                'dark',
                'A simple dark alert—check it out!',
                <<<HTML
                <div class="alert alert-dark" role="alert">
                A simple dark alert—check it out!
                </div>
                HTML,
            ],
        ];
    }

    /**
     * @dataProvider createExampleProvider
     *
     * Alerts are available for any length of text, as well as an optional close button. For proper styling, use one of
     * the eight required contextual classes (e.g., .alert-success). For inline dismissal, use the alerts JavaScript
     * plugin.
     *
     * @param string $type The type of alert.
     * @param string $content The content.
     * @param string $expected The expected HTML.
     *
     * @link https://getbootstrap.com/docs/5.2/components/alerts/#examples
     */
    public function testsExamples(string $type, string $content, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE($expected, Alert::create()->content($content)->type($type)->render());
    }
}
