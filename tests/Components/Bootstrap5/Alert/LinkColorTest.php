<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Alert;

use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Components\Alert;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class LinkColorTest extends TestCase
{
    public function createLinkColorProvider(): array
    {
        $attributes = ['class' => 'alert-link', 'href' => '#'];
        $content = 'an example link';

        return [
            [
                'alert alert-primary',
                'A simple primary alert with ' . Tag::a($attributes, $content) . '. Give it a click if you like.',
                <<<HTML
                <div class="alert alert-primary" role="alert">
                A simple primary alert with <a class="alert-link" href="#">an example link</a>. Give it a click if you like.
                </div>
                HTML,
            ],
            [
                'alert alert-secondary',
                'A simple secondary alert with ' . Tag::a($attributes, $content) . '. Give it a click if you like.',
                <<<HTML
                <div class="alert alert-secondary" role="alert">
                A simple secondary alert with <a class="alert-link" href="#">an example link</a>. Give it a click if you like.
                </div>
                HTML,
            ],
            [
                'alert alert-success',
                'A simple success alert with ' . Tag::a($attributes, $content) . '. Give it a click if you like.',
                <<<HTML
                <div class="alert alert-success" role="alert">
                A simple success alert with <a class="alert-link" href="#">an example link</a>. Give it a click if you like.
                </div>
                HTML,
            ],
            [
                'alert alert-danger',
                'A simple danger alert with ' . Tag::a($attributes, $content) . '. Give it a click if you like.',
                <<<HTML
                <div class="alert alert-danger" role="alert">
                A simple danger alert with <a class="alert-link" href="#">an example link</a>. Give it a click if you like.
                </div>
                HTML,
            ],
            [
                'alert alert-warning',
                'A simple warning alert with ' . Tag::a($attributes, $content) . '. Give it a click if you like.',
                <<<HTML
                <div class="alert alert-warning" role="alert">
                A simple warning alert with <a class="alert-link" href="#">an example link</a>. Give it a click if you like.
                </div>
                HTML,
            ],
            [
                'alert alert-info',
                'A simple info alert with ' . Tag::a($attributes, $content) . '. Give it a click if you like.',
                <<<HTML
                <div class="alert alert-info" role="alert">
                A simple info alert with <a class="alert-link" href="#">an example link</a>. Give it a click if you like.
                </div>
                HTML,
            ],
            [
                'alert alert-light',
                'A simple light alert with ' . Tag::a($attributes, $content) . '. Give it a click if you like.',
                <<<HTML
                <div class="alert alert-light" role="alert">
                A simple light alert with <a class="alert-link" href="#">an example link</a>. Give it a click if you like.
                </div>
                HTML,
            ],
            [
                'alert alert-dark',
                'A simple dark alert with ' . Tag::a($attributes, $content) . '. Give it a click if you like.',
                <<<HTML
                <div class="alert alert-dark" role="alert">
                A simple dark alert with <a class="alert-link" href="#">an example link</a>. Give it a click if you like.
                </div>
                HTML,
            ],
        ];
    }

    /**
     * @dataProvider createLinkColorProvider
     *
     * Use the `.alert-link` utility class to quickly provide matching colored links within any alert.
     *
     * @param string $class The class name.
     * @param string $content The content.
     * @param string $expected The expected HTML.
     *
     * @link https://getbootstrap.com/docs/5.2/components/alerts/#link-color
     */
    public function testsLinkColor(string $class, string $content, string $expected): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE($expected, Alert::create()->class($class)->content($content)->render());
    }
}
