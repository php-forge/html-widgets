<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Button;

use Forge\Html\Widgets\Components\Button;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * The button plugin allows you to create simple on/off toggle buttons.
 *
 * Visually, these toggle buttons are identical to the checkbox toggle buttons. However, they are conveyed differently
 * by assistive technologies: the checkbox toggles will be announced by screen readers as `“checked”/“not checked”`
 * (since, despite their appearance, they are fundamentally still checkboxes), whereas these toggle buttons will be
 * announced as `“button”/“button pressed”`. The choice between these two approaches will depend on the type of toggle
 * you are creating, and whether the toggle will make sense to users when announced as a checkbox or as an actual
 * button.
 *
 * @link https://getbootstrap.com/docs/5.2/components/buttons/#button-plugin
 */
final class PluginTest extends TestCase
{
    /**
     * Add `data-bs-toggle="button"` to toggle a button’s active state. If you’re pre-toggling a button, you must
     * manually add the `.active` class and `aria-pressed="true"` to ensure that it is conveyed appropriately to
     * assistive technologies.
     *
     * @link https://getbootstrap.com/docs/5.2/components/buttons/#toggle-states
     *
     * @throws ReflectionException
     */
    public function testToggleStates(): void
    {
        $this->assertSame(
            '<button class="btn btn-primary" type="button" data-bs-toggle="button">Toggle button</button>',
            button::create()
                ->attributes(['data-bs-toggle' => 'button'])
                ->class('btn btn-primary')
                ->content('Toggle button')
                ->render(),
        );

        $this->assertSame(
            '<button class="btn btn-primary active" type="button" data-bs-toggle="button" aria-pressed="true">Active toggle button</button>',
            button::create()
                ->attributes(['data-bs-toggle' => 'button', 'aria-pressed' => 'true'])
                ->class('btn btn-primary active')
                ->content('Active toggle button')
                ->render(),
        );

        $this->assertSame(
            '<button class="btn btn-primary" type="button" disabled data-bs-toggle="button">Disabled toggle button</button>',
            button::create()
                ->attributes(['data-bs-toggle' => 'button', 'disabled' => true])
                ->class('btn btn-primary')
                ->content('Disabled toggle button')
                ->render(),
        );
    }
}
