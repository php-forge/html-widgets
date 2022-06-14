<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Attribute;

use Forge\Html\Attribute\Attributes;
use Forge\Html\Attribute\CssClass;
use Forge\Html\Helper\Encode;
use Forge\Html\Tag\Tag;
use Forge\Widget\AbstractWidget;

abstract class Globals extends AbstractWidget
{
    protected Attributes $attributesHelper;
    protected CssClass $cssClass;
    protected Encode $encode;
    protected Tag $tag;

    public function __construct()
    {
        $this->attributesHelper = new Attributes();
        $this->cssClass = new CssClass();
        $this->encode = new Encode();
        $this->tag = new Tag();
    }

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
