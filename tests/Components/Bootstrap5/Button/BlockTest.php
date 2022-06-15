<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Tests\Components\Bootstrap5\Button;

use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Components\Button;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class BlockTest extends TestCase
{
    /**
     * @link https://getbootstrap.com/docs/5.2/components/buttons/#block-buttons
     *
     * @throws ReflectionException
     */
    public function testBlock(): void
    {
        $assert = new Assert();
        $tag = new Tag();

        $button1 = Button::create()->class('btn btn-primary')->content('Button')->render() . PHP_EOL;
        $button2 = Button::create()->class('btn btn-primary')->content('Button')->render();

        /**
         * Create responsive stacks of full-width, `“block buttons”` like those in `Bootstrap 4` with a mix of our
         * display and gap utilities. By using utilities instead of button specific classes, we have much greater
         * control over spacing, alignment, and responsive behaviors.
         */
        $assert->equalsWithoutLE(
            <<<HTML
            <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Button</button>
            <button class="btn btn-primary" type="button">Button</button>
            </div>
            HTML,
            $tag->create('div', $button1 . $button2, ['class' => 'd-grid gap-2'])
        );

        /**
         * Here we create a responsive variation, starting with vertically stacked buttons until the md breakpoint,
         * where `.d-md-block` replaces the `.d-grid class`, thus nullifying the `gap-2` utility.
         *
         * Resize your browser to see them change.
         */
        $assert->equalsWithoutLE(
            <<<HTML
            <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-primary" type="button">Button</button>
            <button class="btn btn-primary" type="button">Button</button>
            </div>
            HTML,
            $tag->create('div', $button1 . $button2, ['class' => 'd-grid gap-2 d-md-block'])
        );

        /**
         * You can adjust the width of your block buttons with grid column width classes.
         *
         * For example, for a half-width `“block button”`, use `.col-6`. Center it horizontally with `.mx-auto`, too.
         */
        $assert->equalsWithoutLE(
            <<<HTML
            <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="button">Button</button>
            <button class="btn btn-primary" type="button">Button</button>
            </div>
            HTML,
            $tag->create('div', $button1 . $button2, ['class' => 'd-grid gap-2 col-6 mx-auto'])
        );

        /**
         * Additional utilities can be used to adjust the alignment of buttons when horizontal.
         *
         * Here we’ve taken our previous responsive example and added some flex utilities and a margin utility on the
         * button to right align the buttons when they’re no longer stacked.
         */
        $button1 = Button::create()->class('btn btn-primary me-md-2')->content('Button')->render() . PHP_EOL;

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="button">Button</button>
            <button class="btn btn-primary" type="button">Button</button>
            </div>
            HTML,
            $tag->create('div', $button1 . $button2, ['class' => 'd-grid gap-2 d-md-flex justify-content-md-end'])
        );
    }
}
