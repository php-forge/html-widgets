<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Components;

use Forge\Html\Widgets\Attribute\Globals;

final class Button extends Globals
{
    private string $class = '';
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
        $new->cssClass->add($new->attributes, $value);
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

        if ($this->class !== '') {
            $this->cssClass->add($attributes, $this->class);
        }

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

        $attributes['type'] = $this->type;

        return $this->tag->create('button', $this->content, $attributes);
    }

    private function renderButtonLink(array $attributes): string
    {
        if ($this->disabled) {
            $this->cssClass->add($attributes, 'disabled');
            $attributes['aria-disabled'] = 'true';
        }

        $attributes['href'] = $this->link;
        $attributes['role'] = 'button';

        return $this->tag->create('a', $this->content, $attributes);
    }
}
