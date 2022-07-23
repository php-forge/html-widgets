<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Alert;

use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Components\Alert;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class AdditionalContentTest extends TestCase
{
    public function testAdditionalContent(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">
            Well done!
            </h4>
            <p>
            Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.
            </p>
            <hr>
            <p class="mb-0">
            Whenever you need to, be sure to use margin utilities to keep things nice and tidy.
            </p>
            </div>
            HTML,
            Alert::create()
                ->content(
                    Tag::h(4, ['class' => 'alert-heading'], 'Well done!') . PHP_EOL .
                    Tag::p(
                        [],
                        'Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.',
                    ) . PHP_EOL .
                    Tag::hr() . PHP_EOL .
                    Tag::p(
                        ['class' => 'mb-0'],
                        'Whenever you need to, be sure to use margin utilities to keep things nice and tidy.'
                    )
                )
                ->type('success')
                ->render(),
        );
    }
}
