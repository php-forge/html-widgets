<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Button;

use Forge\Html\Widgets\Components\Button;
use PHPUnit\Framework\TestCase;

final class DisabledStateTest extends TestCase
{
    /**
     * @link https://getbootstrap.com/docs/5.2/components/buttons/#disabled-state
     */
    public function testDisabledState(): void
    {
        /**
         * Make buttons look inactive by adding the disabled boolean attribute to any `<button>` element.
         * Disabled buttons have `pointer-events: none` applied to, preventing hover and active states from triggering.
         */
        $this->assertSame(
            '<button class="btn btn-primary" type="button" disabled>Primary button</button>',
            button::create()->class('btn btn-primary')->content('Primary button')->disabled()->render(),
        );

        $this->assertSame(
            '<button class="btn btn-secondary" type="button" disabled>Button</button>',
            button::create()->class('btn btn-secondary')->content('Button')->disabled()->render(),
        );

        $this->assertSame(
            '<button class="btn btn-outline-primary" type="button" disabled>Primary button</button>',
            button::create()->class('btn btn-outline-primary')->content('Primary button')->disabled()->render(),
        );

        $this->assertSame(
            '<button class="btn btn-outline-secondary" type="button" disabled>Button</button>',
            button::create()->class('btn btn-outline-secondary')->content('Button')->disabled()->render(),
        );

        /**
         * Disabled buttons using the <a> element behave a bit different:
         *
         * <a> don’t support the disabled attribute, so you must add the `.disabled` class to make it visually appear
         * disabled.
         *
         * Some future-friendly styles are included to disable all `pointer-events` on anchor buttons.
         * Disabled buttons using `<a>` should include the `aria-disabled="true"` attribute to indicate the state of the
         * element to assistive technologies.
         * Disabled buttons using `<a>` should not include the `href` attribute.
         */
        $this->assertSame(
            '<a class="btn btn-primary disabled" href="#" role="button" aria-disabled="true">Primary link</a>',
            button::create()->class('btn btn-primary')->content('Primary link')->disabled()->type('link')->render(),
        );

        $this->assertSame(
            '<a class="btn btn-secondary disabled" href="#" role="button" aria-disabled="true">Link</a>',
            button::create()->class('btn btn-secondary disabled')->content('Link')->disabled()->type('link')->render(),
        );
    }

    /**
     * To cover cases where you have to keep the `href` attribute on a `disabled link`, the `.disabled` class uses
     * `pointer-events: none` to try to disable the link functionality of `<a>`.
     *
     * Note that this CSS property is not yet standardized for HTML, but all modern browsers support it.
     *
     * In addition, even in browsers that do support `pointer-events: none`, keyboard navigation remains unaffected,
     * meaning that sighted keyboard users and users of assistive technologies will still be able to activate these
     * links.
     *
     * So to be safe, in addition to `aria-disabled="true"`, also include a `tabindex="-1"` attribute on these links to
     * prevent them from receiving keyboard focus, and use custom JavaScript to disable their functionality altogether.
     *
     * @link https://getbootstrap.com/docs/5.2/components/buttons/#link-functionality-caveat
     */
    public function testLinkFunctionalityCaveat(): void
    {
        $attributes = [
            'tabindex' => '-1',
        ];

        $this->assertSame(
            '<a class="btn btn-primary disabled" href="#" role="button" tabindex="-1" aria-disabled="true">Primary link</a>',
            button::create()
                ->attributes($attributes)
                ->class('btn btn-primary')
                ->content('Primary link')
                ->disabled()
                ->type('link')
                ->render(),
        );

        $this->assertSame(
            '<a class="btn btn-secondary disabled" href="#" role="button" tabindex="-1" aria-disabled="true">Link</a>',
            button::create()
                ->attributes($attributes)
                ->class('btn btn-secondary')
                ->content('Link')
                ->disabled()
                ->type('link')
                ->render(),
        );
    }
}
