<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Button;

use Forge\Html\Tag\Form\Input;
use Forge\Html\Widgets\Components\Button;
use PHPUnit\Framework\TestCase;

/**
 * The `.btn` classes are designed to be used with the `<button>` element. However, you can also use these classes on
 * `<a>` or `<input>` elements (though some browsers may apply a slightly different rendering).
 *
 * When using button classes on <a> elements that are used to trigger in-page functionality (like collapsing content),
 * rather than linking to new pages or sections within the current page, these links should be given a role="button"
 * to appropriately convey their purpose to assistive technologies such as screen readers.
 *
 * @link https://getbootstrap.com/docs/5.2/components/buttons/#button-tags
 */
final class TagsTest extends TestCase
{
    public function testButtonTags(): void
    {
        $input = new Input();
        // Button `a` tag with `button` type.
        $this->assertSame(
            '<a class="btn btn-primary" href="#" role="button">Link</a>',
            button::create()->class('btn btn-primary')->type('link')->content('Link')->render(),
        );

        // Submit button
        $this->assertSame(
            '<button class="btn btn-primary" type="submit">Button</button>',
            button::create()->class('btn btn-primary')->type('submit')->content('Button')->render(),
        );

        // Input button
        $this->assertSame('<input type="button" value="Input">', $input->create('button', ['value' => 'Input']));

        // Input submit button
        $this->assertSame('<input type="submit" value="Submit">', $input->create('submit', ['value' => 'Submit']));

        // Input reset button
        $this->assertSame('<input type="reset" value="Reset">', $input->create('reset', ['value' => 'Reset']));
    }
}
