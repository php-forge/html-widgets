<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Alert;

use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Components\Alert;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class IconsTest extends TestCase
{
    public function createIconsProvider(): array
    {
        return [
            [
                'primary',
                Tag::div([], 'An example alert with an icon.'),
                'bi bi-exclamation-triangle-fill flex-shrink-0 me-2',
                <<<HTML
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"></i>
                <div>
                An example alert with an icon.
                </div>
                </div>
                HTML,
            ],
            [
                'success',
                Tag::div([], 'An example success alert with an icon.'),
                'bi bi-check-circle-fill flex-shrink-0 me-2',
                <<<HTML
                <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill flex-shrink-0 me-2"></i>
                <div>
                An example success alert with an icon.
                </div>
                </div>
                HTML,
            ],
            [
                'warning',
                Tag::div([], 'An example warning alert with an icon.'),
                'bi bi-exclamation-triangle-fill flex-shrink-0 me-2',
                <<<HTML
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"></i>
                <div>
                An example warning alert with an icon.
                </div>
                </div>
                HTML,
            ],
            [
                'danger',
                Tag::div([], 'An example danger alert with an icon.'),
                'bi bi-exclamation-triangle-fill flex-shrink-0 me-2',
                <<<HTML
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"></i>
                <div>
                An example danger alert with an icon.
                </div>
                </div>
                HTML,
            ],
        ];
    }

    /**
     * @dataProvider createIconsProvider
     *
     * @param string $type The type of alert.
     * @param string $content The content to use for the alert.
     * @param string $iconClass The class to use for the icon.
     * @param string $expected The expected HTML output.
     */
    public function testIcons(string $type, string $content, string $iconClass, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            $expected,
            Alert::create()
                ->class('d-flex align-items-center')
                ->content($content)
                ->iconClass($iconClass)
                ->type($type)
                ->render(),
        );
    }

    public function createIconsTemplatePositionProvider(): array
    {
        return [
            [
                'primary',
                Tag::div([], 'An example alert with an icon.'),
                'bi bi-exclamation-triangle-fill flex-shrink-0 ms-2',
                <<<HTML
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                <div>
                An example alert with an icon.
                </div>
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0 ms-2"></i>
                </div>
                HTML,
            ],
            [
                'success',
                Tag::div([], 'An example success alert with an icon.'),
                'bi bi-check-circle-fill flex-shrink-0 ms-2',
                <<<HTML
                <div class="alert alert-success d-flex align-items-center" role="alert">
                <div>
                An example success alert with an icon.
                </div>
                <i class="bi bi-check-circle-fill flex-shrink-0 ms-2"></i>
                </div>
                HTML,
            ],
            [
                'warning',
                Tag::div([], 'An example warning alert with an icon.'),
                'bi bi-exclamation-triangle-fill flex-shrink-0 ms-2',
                <<<HTML
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                <div>
                An example warning alert with an icon.
                </div>
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0 ms-2"></i>
                </div>
                HTML,
            ],
            [
                'danger',
                Tag::div([], 'An example danger alert with an icon.'),
                'bi bi-exclamation-triangle-fill flex-shrink-0 ms-2',
                <<<HTML
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                An example danger alert with an icon.
                </div>
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0 ms-2"></i>
                </div>
                HTML,
            ],
        ];
    }

    /**
     * @dataProvider createIconsTemplatePositionProvider
     *
     * @param string $type The type of alert.
     * @param string $content The content to use for the alert.
     * @param string $iconClass The class to use for the icon.
     * @param string $expected The expected HTML output.
     */
    public function testIconsTemplatePosition(string $type, string $content, string $iconClass, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            $expected,
            Alert::create()
                ->class('d-flex align-items-center')
                ->content($content)
                ->iconClass($iconClass)
                ->template('{content}' . PHP_EOL . '{icon}')
                ->type($type)
                ->render(),
        );
    }

    public function createIconsValueProvider(): array
    {
        return [
            [
                'primary',
                Tag::div([], 'An example alert with an icon text.'),
                '&#9842;',
                <<<HTML
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                <i class="me-2">&#9842;</i>
                <div>
                An example alert with an icon text.
                </div>
                </div>
                HTML,
            ],
            [
                'success',
                Tag::div([], 'An example success alert with an icon.'),
                '&#9762;',
                <<<HTML
                <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="me-2">&#9762;</i>
                <div>
                An example success alert with an icon.
                </div>
                </div>
                HTML,
            ],
            [
                'warning',
                Tag::div([], 'An example warning alert with an icon.'),
                '&#9947;',
                <<<HTML
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                <i class="me-2">&#9947;</i>
                <div>
                An example warning alert with an icon.
                </div>
                </div>
                HTML,
            ],
            [
                'danger',
                Tag::div([], 'An example danger alert with an icon.'),
                '&#9733;',
                <<<HTML
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="me-2">&#9733;</i>
                <div>
                An example danger alert with an icon.
                </div>
                </div>
                HTML,
            ],
        ];
    }

    /**
     * @dataProvider createIconsValueProvider
     *
     * @param string $type The type of alert.
     * @param string $content The content to use for the alert.
     * @param string $iconValue The value to use for the icon.
     * @param string $expected The expected HTML output.
     */
    public function testIconsValue(string $type, string $content, string $iconValue, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            $expected,
            Alert::create()
                ->class('d-flex align-items-center')
                ->content($content)
                ->iconClass('me-2')
                ->iconValue($iconValue)
                ->type($type)
                ->render(),
        );
    }
}
