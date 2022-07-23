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
                'alert alert-primary d-flex align-items-center',
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
                'alert alert-success d-flex align-items-center',
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
                'alert alert-warning d-flex align-items-center',
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
                'alert alert-danger d-flex align-items-center',
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
     * @param string $class The class to use for the alert.
     * @param string $content The content to use for the alert.
     * @param string $iconClass The class to use for the icon.
     * @param string $expected The expected HTML output.
     */
    public function testIcons(string $class, string $content, string $iconClass, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            $expected,
            Alert::create()->class($class)->content($content)->iconClass($iconClass)->render(),
        );
    }

    public function createIconsTemplatePositionProvider(): array
    {
        return [
            [
                'alert alert-primary d-flex align-items-center',
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
                'alert alert-success d-flex align-items-center',
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
                'alert alert-warning d-flex align-items-center',
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
                'alert alert-danger d-flex align-items-center',
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
     * @param string $class The class to use for the alert.
     * @param string $content The content to use for the alert.
     * @param string $iconClass The class to use for the icon.
     * @param string $expected The expected HTML output.
     */
    public function testIconsTemplatePosition(string $class, string $content, string $iconClass, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            $expected,
            Alert::create()
                ->class($class)
                ->content($content)
                ->iconClass($iconClass)
                ->template('{content}' . PHP_EOL . '{icon}')
                ->render(),
        );
    }

    public function createIconsValueProvider(): array
    {
        return [
            [
                'alert alert-primary d-flex align-items-center',
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
                'alert alert-success d-flex align-items-center',
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
                'alert alert-warning d-flex align-items-center',
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
                'alert alert-danger d-flex align-items-center',
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
     * @param string $class The class to use for the alert.
     * @param string $content The content to use for the alert.
     * @param string $iconValue The value to use for the icon.
     * @param string $expected The expected HTML output.
     */
    public function testIconsValue(string $class, string $content, string $iconValue, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            $expected,
            Alert::create()->class($class)->content($content)->iconClass('me-2')->iconValue($iconValue)->render(),
        );
    }
}
