<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Components;

use Forge\Html\Helper\Attribute;
use Forge\Html\Helper\CssClass;
use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Attribute\Globals;

final class Button extends Globals
{
    private string $content = '';
    private bool $disabled = false;
    private string $link = '#';
    private string $type = 'button';

    /**
     * Returns a new instance with the specified the button class.
     *
     * @param string $value The button class.
     *
     * @return self
     */
    public function class(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->attributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the specified the button content.
     *
     * @param string $value The button content.
     *
     * @return self
     */
    public function content(string $value): self
    {
        $new = clone $this;
        $new->content = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified the button disabled state.
     *
     * @param bool $value The button disabled state.
     *
     * @return self
     */
    public function disabled(bool $value = true): self
    {
        $new = clone $this;
        $new->disabled = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified the link for the button.
     *
     * @param string $value The link for the button.
     *
     * @return self
     */
    public function link(string $value): self
    {
        $new = clone $this;
        $new->link = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified button type, if `button` the toggle will be a button, otherwise a `a`
     * tag will be used.
     *
     * @param string $value The button type.
     *
     * @return self
     */
    public function type(string $value): self
    {
        $new = clone $this;
        $new->type = $value;

        return $new;
    }

    protected function run(): string
    {
        $attributes = $this->attributes;

        return match ($this->type) {
            'link' => $this->renderButtonLink($attributes),
            default => $this->renderButton($attributes),
        };
    }

    private function renderButton(array $attributes): string
    {
        if ($this->disabled) {
            $attributes['disabled'] = true;
        }

        Attribute::add($attributes, 'type', $this->type);

        return Tag::button($attributes, $this->content);
    }

    private function renderButtonLink(array $attributes): string
    {
        if ($this->disabled) {
            CssClass::add($attributes, 'disabled');
            Attribute::add($attributes, 'aria-disabled', 'true');
        }

        Attribute::add($attributes, 'href', $this->link);
        Attribute::add($attributes, 'role', 'button');

        return Tag::a($attributes, $this->content);
    }
}
