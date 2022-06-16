<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Attribute;

use Forge\Widget\AbstractWidget;

abstract class Globals extends AbstractWidget
{
    /**
     * Set the ID of the widget.
     *
     * @param string|null $value
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-id-attribute
     */
    public function id(?string $value): static
    {
        $new = clone $this;
        $new->attributes['id'] = $value;
        return $new;
    }
}
