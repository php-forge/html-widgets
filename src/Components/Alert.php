<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Components;

use Forge\Html\Helper\Attribute;
use Forge\Html\Helper\CssClass;
use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Attribute\Globals;
use InvalidArgumentException;

/**
 * Alert renders an alert component.
 *
 * @link https://getbootstrap.com/docs/5.0/components/alerts/
 */
final class Alert extends Globals
{
    /** @psalm-var string[] */
    private array $alertTypes = [
        'danger' => 'alert alert-danger',
        'dark' => 'alert alert-dark',
        'info' => 'alert alert-info',
        'light' => 'alert alert-light',
        'primary' => 'alert alert-primary',
        'secondary' => 'alert alert-secondary',
        'success' => 'alert alert-success',
        'warning' => 'alert alert-warning',
    ];
    private array $buttonAttributes = [];
    private string $buttonClass = 'btn-close';
    private string $buttonLabel = '';
    private string $class = '';
    private string $content = '';
    private bool $container = true;
    private bool $dismissing = false;
    private array $iconAttributes = [];
    private string $iconClass = '';
    private string $iconValue = '';
    private string $template = '{icon}' . PHP_EOL . '{content}' . PHP_EOL . '{dismissing}';
    private string $type = '';

    /**
     * Returns a new instance with the HTML attributes for rendering the close button tag.
     *
     * The close button is displayed in the header of the modal window. Clicking on the button will hide the modal
     * window.
     *
     * If {@see closeButtonEnabled} is false, no close button will be rendered.
     *
     * The rest of the options will be rendered as the HTML attributes of the button tag.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function buttonAttributes(array $values): self
    {
        $new = clone $this;
        $new->buttonAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the CSS class for the close button.
     *
     * @param string $value The CSS class for the close button.
     *
     * @return self
     */
    public function buttonClass(string $value): self
    {
        $new = clone $this;
        $new->buttonClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the label for the close button.
     *
     * @param string $value The label for the close button.
     *
     * @return self
     */
    public function buttonLabel(string $value): self
    {
        $new = clone $this;
        $new->buttonLabel = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified the alert class.
     *
     * @param string $value The alert class.
     *
     * @return self
     */
    public function class(string $value): self
    {
        $new = clone $this;
        $new->class = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified if the container is enabled, or not. Default is true.
     *
     * @param bool $value The container enabled.
     *
     * @return self
     */
    public function container(bool $value): self
    {
        $new = clone $this;
        $new->container = $value;

        return $new;
    }

    /**
     * Returns a new instance with the message content in the alert component. Alert widget will also be treated as the
     * message content, and will be rendered before this.
     *
     * @param string $value The message content
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
     * Returns a new instance with the specified if the alert is dismissible, or not. Default is false.
     *
     * @param bool $value The alert is dismissible.
     *
     * @return self
     */
    public function dismissing(bool $value): self
    {
        $new = clone $this;
        $new->dismissing = $value;

        return $new;
    }

    /**
     * Returns a new instance with the HTML attributes for rendering the icon tag.
     *
     * The icon is displayed in the content of the alert component.
     *
     * The rest of the options will be rendered as the HTML attributes of the icon tag.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function iconAttributes(array $values): self
    {
        $new = clone $this;
        $new->iconAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified the icon class.
     *
     * @param string $value The icon class.
     *
     * @return self
     */
    public function iconClass(string $value): self
    {
        $new = clone $this;
        $new->iconClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified the icon value.
     *
     * @param string $value The icon value.
     *
     * @return self
     */
    public function iconValue(string $value): self
    {
        $new = clone $this;
        $new->iconValue = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified the template.
     *
     * @param string $value The template.
     *
     * @return self
     */
    public function template(string $value): self
    {
        $new = clone $this;
        $new->template = $value;

        return $new;
    }

    public function type(string $value): self
    {
        if (!isset($this->alertTypes[$value])) {
            throw new InvalidArgumentException(sprintf('Invalid alert type "%s".', $value));
        }

        $new = clone $this;
        CssClass::add($new->attributes, $this->alertTypes[$value]);

        return $new;
    }

    protected function run(): string
    {
        return '' !== $this->content ? $this->renderAlert() : '';
    }

    /**
     * Render Alert.
     */
    private function renderAlert(): string
    {
        $attributes = $this->attributes;

        CssClass::add($attributes, $this->class);
        CssClass::add($attributes, $this->type);

        $parts = [];
        $parts['{content}'] = $this->content;
        $parts['{dismissing}'] = $this->dismissing ? $this->renderDismissing() : '';
        $parts['{icon}'] = $this->iconClass !== '' || $this->iconValue !== '' ? $this->renderIcon() : '';

        // add role attribute
        if (!array_key_exists('role', $attributes)) {
            Attribute::add($attributes, 'role', 'alert');
        }

        $content = trim(strtr($this->template, $parts));

        if ($this->dismissing) {
            CssClass::add($attributes, 'alert-dismissible fade show');
        }

        return match ($this->container) {
            true => Tag::div($attributes, $content),
            false => $content,
        };
    }

    /**
     * Renders close button.
     */
    private function renderDismissing(): string
    {
        $buttonAttributes = $this->buttonAttributes;

        if (!array_key_exists('data-bs-dismiss', $buttonAttributes)) {
            Attribute::add($buttonAttributes, 'data-bs-dismiss', 'alert');
        }

        if (!array_key_exists('aria-label', $buttonAttributes)) {
            Attribute::add($buttonAttributes, 'aria-label', 'Close');
        }

        CssClass::add($buttonAttributes, $this->buttonClass);

        return Button::create()->attributes($buttonAttributes)->content($this->buttonLabel)->render();
    }

    private function renderIcon(): string
    {
        $iconAttributes = $this->iconAttributes;
        CssClass::add($iconAttributes, $this->iconClass);

        return Tag::i($iconAttributes, $this->iconValue);
    }
}
