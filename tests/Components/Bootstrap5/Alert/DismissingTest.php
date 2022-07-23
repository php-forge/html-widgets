<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Alert;

use Forge\Html\Widgets\Components\Alert;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;

final class DismissingTest extends TestCase
{
    /**
     * Using the alert JavaScript plugin, it’s possible to dismiss any alert inline. Here’s how:
     *
     * Be sure you’ve loaded the alert plugin, or the compiled Bootstrap JavaScript.
     *
     * Add a close button and the `.alert-dismissible` class, which adds extra padding to the right of the alert and
     * positions the close button.
     *
     * On the close button, add the `data-bs-dismiss="alert"` attribute, which triggers the JavaScript functionality. Be
     * sure to use the `<button>` element with it for proper behavior across all devices.
     *
     * To animate alerts when dismissing them, be sure to add the `.fade` and `.show` classes.
     *
     * When an alert is dismissed, the element is completely removed from the page structure. If a keyboard user
     * dismisses the alert using the close button, their focus will suddenly be lost and, depending on the browser,
     * reset to the start of the page/document. For this reason, we recommend including additional JavaScript that
     * listens for the `closed.bs.alert` event and programmatically sets `focus()` to the most appropriate location in
     * the page. If you’re planning to move focus to a non-interactive element that normally does not receive focus,
     * make sure to add `tabindex="-1"` to the element.
     */
    public function testDismissing(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            HTML,
            Alert::create()
                ->class('alert alert-warning alert-dismissible fade show')
                ->content('<strong>Holy guacamole!</strong> You should check in on some of those fields below.')
                ->dismissing(true)
                ->render(),
        );
    }
}
