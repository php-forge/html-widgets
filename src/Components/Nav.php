<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Components;

use Forge\Html\Helper\CssClass;
use Forge\Html\Widgets\Attribute\Globals;
use Forge\Html\Widgets\Helper\Utils;

final class Nav extends Globals
{
    private bool $container = true;
    private string $currentPath = '';
    /** @psalm-var array<int, mixed> */
    private array $dropdownArguments = [];
    private string $dropdownConfigFile = '';
    private array $dropdownDefinitions = [];
    private array $items = [];
    /** @psalm-var array<int, mixed> */
    private array $menuArguments = [];
    private string $menuConfigFile = '';
    private array $menuDefinitions = [];
    private bool $offCanvas = false;
    private array $offCanvasAttributes = [];
    private string $offCanvasClass = 'offcanvas offcanvas-end';
    private array $offCanvasHeaderAttributes = [];
    private array $offCanvasHeaderButtonAttributes = [];
    private string $offCanvasHeaderButtonClass = 'btn-close';
    private string $offCanvasHeaderButtonContent = '';
    private string $offCanvasHeaderButtonTag = 'button';
    private string $offCanvasHeaderClass = 'offcanvas-header';
    private string $offCanvasHeaderTag = 'div';
    private array $offCanvasHeaderTitleAttributes = [];
    private string $offCanvasHeaderTitleClass = 'offcanvas-title';
    private string $offCanvasHeaderTitleContent = '';
    private string $offCanvasHeaderTitleId = '';
    private string $offCanvasHeaderTitleTag = 'h5';
    private string $offCanvasId = '';
    private string $offCanvasTag = 'div';

    /**
     * Returns a new instance with the specified the class `nav` widget.
     *
     * @param string $value The class `nav` widget.
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
     * Returns a new instance with the specified enable or disable the container widget.
     *
     * @param bool $value The container widget enable or disable, for default is `true`.
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
     * Returns a new instance with the specified the current path.
     *
     * @param string $value The current path.
     *
     * @return self
     */
    public function currentPath(string $value): self
    {
        $new = clone $this;
        $new->currentPath = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified dropdown arguments widget.
     *
     * @param array $values The dropdown arguments widget.
     *
     * @return self
     *
     * @psalm-param array<int, mixed> $values
     */
    public function dropdownArguments(array $values): self
    {
        $new = clone $this;
        $new->dropdownArguments = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified dropdown configuration file widget.
     *
     * @param string $value The dropdown configuration file widget.
     *
     * @return self
     */
    public function dropdownConfigFile(string $value): self
    {
        $new = clone $this;
        $new->dropdownConfigFile = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified dropdown definition widget.
     *
     * @param array $values The dropdown definition widget.
     *
     * @return self
     */
    public function dropdownDefinitions(array $values): self
    {
        $new = clone $this;
        $new->dropdownDefinitions = $values;
        return $new;
    }

    /**
     * List of items in the nav widget. Each array element represents a single menu item which can be either a string or
     * an array with the following structure:
     *
     * - label: string, required, the nav item label.
     * - active: bool, optional, whether the item should be on active state or not.
     * - disabled: bool, optional, whether the item should be on disabled state or not.
     * - encodeLabel: bool, optional, whether the label should be HTML encoded or not.
     * - link: optional, the item's href. Defaults to "#".
     * - linkAttributes: array, optional, the HTML attributes of the item's link.
     * - icon: optional, the item's icon.
     * - iconAttributes: array, optional, the HTML attributes of the item's icon.
     * - liAttributes: array, optional, the HTML attributes of the item container.
     * - visible: bool, optional, whether this menu item is visible. Defaults to true.
     * - dropdown: array, optional, the configuration array for creating dropdown submenu items. The array structure is
     *   the same as the parent item configuration array.
     *
     * If a menu item is a string, it will be rendered directly without HTML encoding.
     *
     * @param array $values the list of items to be rendered.
     *
     * @return self
     */
    public function items(array $values = []): self
    {
        $new = clone $this;
        $new->items = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified menu arguments widget.
     *
     * @param array $values The menu arguments widget.
     *
     * @return self
     *
     * @psalm-param array<int, mixed> $values
     */
    public function menuArguments(array $values): self
    {
        $new = clone $this;
        $new->menuArguments = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified menu configuration file widget.
     *
     * @param string $value The menu configuration file widget.
     *
     * @return self
     */
    public function menuConfigFile(string $value): self
    {
        $new = clone $this;
        $new->menuConfigFile = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified menu definition widget.
     *
     * @param array $values The menu definition widget.
     *
     * @return self
     */
    public function menuDefinitions(array $values): self
    {
        $new = clone $this;
        $new->menuDefinitions = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas its enable, for default is `false`.
     *
     * @return self
     */
    public function offCanvas(): self
    {
        $new = clone $this;
        $new->offCanvas = true;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function offCanvasAttributes(array $values): self
    {
        $new = clone $this;
        $new->offCanvasAttributes = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas class.
     *
     * @param string $value The off-canvas class.
     *
     * @return self
     */
    public function offCanvasClass(string $value): self
    {
        $new = clone $this;
        $new->offCanvasClass = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function offCanvasHeaderAttributes(array $values): self
    {
        $new = clone $this;
        $new->offCanvasHeaderAttributes = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header button class.
     *
     * @param string $value The off-canvas header button class.
     *
     * @return self
     */
    public function offCanvasHeaderButtonClass(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderButtonClass = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header button content.
     *
     * @param string $value The off-canvas header button content.
     *
     * @return self
     */
    public function offCanvasHeaderButtonContent(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderButtonContent = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header button tag.
     *
     * @param string $value The off-canvas header button tag.
     *
     * @return self
     */
    public function offCanvasHeaderButtonTag(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderButtonTag = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header class.
     *
     * @param string $value The off-canvas header class.
     *
     * @return self
     */
    public function offCanvasHeaderClass(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderClass = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header tag.
     *
     * @param string $value The off-canvas header tag.
     *
     * @return self
     */
    public function offCanvasHeaderTag(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderTag = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header title attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function offCanvasHeaderTitleAttributes(array $values): self
    {
        $new = clone $this;
        $new->offCanvasHeaderTitleAttributes = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header title class.
     *
     * @param string $value The off-canvas header title class.
     *
     * @return self
     */
    public function offCanvasHeaderTitleClass(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderTitleClass = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header title content.
     *
     * @param string $value The off-canvas header title content.
     *
     * @return self
     */
    public function offCanvasHeaderTitleContent(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderTitleContent = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas header title id.
     *
     * @param string $value The off-canvas header title id.
     *
     * @return self
     */
    public function offCanvasHeaderTitleId(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderTitleId = $value;
        return $new;
    }

    public function offCanvasHeaderTitleTag(string $value): self
    {
        $new = clone $this;
        $new->offCanvasHeaderTitleTag = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas id.
     *
     * @param string $value The off-canvas id.
     *
     * @return self
     */
    public function offCanvasId(string $value): self
    {
        $new = clone $this;
        $new->offCanvasId = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the off-canvas tag.
     *
     * @param string $value The off-canvas tag.
     *
     * @return self
     */
    public function offCanvasTag(string $value): self
    {
        $new = clone $this;
        $new->offCanvasTag = $value;
        return $new;
    }

    protected function run(): string
    {
        return Utils::removeDoubleLinesBreaks($this->renderNav());
    }

    private function renderContainer(): string
    {
        $html = '';
        $attributes = $this->attributes;

        if ($this->renderMenu() !== '') {
            if ($this->container) {
                $html .= $this->tag->create('div', $this->renderMenu(), $attributes) . PHP_EOL;
            } else {
                $html .= $this->renderMenu();
            }
        }

        return $html;
    }

    private function renderMenu(): string
    {
        return Menu::create($this->menuConfigFile, $this->menuDefinitions, $this->menuArguments)
            ->currentPath($this->currentPath)
            ->dropdownArguments($this->dropdownArguments)
            ->dropdownConfigFile($this->dropdownConfigFile)
            ->dropdownDefinitions($this->dropdownDefinitions)
            ->items($this->items)
            ->render();
    }

    private function renderNav(): string
    {
        return match ($this->offCanvas) {
            true => $this->renderOffCanvas(),
            false => $this->renderContainer(),
        };
    }

    private function renderOffCanvas(): string
    {
        $html = '';
        $offCanvasAttributes = $this->offCanvasAttributes;

        if (!isset($offCanvasAttributes['aria-labelledby']) && $this->offCanvasHeaderTitleId !== '') {
            $offCanvasAttributes['aria-labelledby'] = $this->offCanvasHeaderTitleId;
        }

        CssClass::add($offCanvasAttributes, $this->offCanvasClass);

        if ($this->offCanvasId !== '') {
            $offCanvasAttributes['id'] = $this->offCanvasId;
        }

        if (!isset($offCanvasAttributes['tabindex'])) {
            $offCanvasAttributes['tabindex'] = -1;
        }

        if ($this->renderOffCanvasHeader() !== '') {
            $html .= $this->renderOffCanvasHeader();
        }

        if ($this->renderContainer() !== '') {
            $html .= PHP_EOL . $this->renderContainer();
        }

        return $this->tag->create($this->offCanvasTag, $html, $offCanvasAttributes) . PHP_EOL;
    }

    private function renderOffCanvasHeader(): string
    {
        $html = '';
        $offCanvasHeaderAttributes = $this->offCanvasHeaderAttributes;

        CssClass::add($offCanvasHeaderAttributes, $this->offCanvasHeaderClass);

        if ($this->renderOffCanvasHeaderTitle() !== '') {
            $html .= $this->renderOffCanvasHeaderTitle();
        }

        if ($this->renderOffCanvasHeaderButton() !== '') {
            $html .= $this->renderOffCanvasHeaderButton();
        }

        return $this->tag->create($this->offCanvasHeaderTag, $html, $offCanvasHeaderAttributes);
    }

    private function renderOffCanvasHeaderButton(): string
    {
        $offCanvasHeaderButtonAttributes = $this->offCanvasHeaderButtonAttributes;
        $offCanvasHeaderButtonAttributes['type'] = 'button';

        if (!array_key_exists('aria-label', $offCanvasHeaderButtonAttributes)) {
            $offCanvasHeaderButtonAttributes['aria-label'] = 'Close';
        }

        if (!array_key_exists('data-bs-dismiss', $offCanvasHeaderButtonAttributes)) {
            $offCanvasHeaderButtonAttributes['data-bs-dismiss'] = 'offcanvas';
        }

        CssClass::add($offCanvasHeaderButtonAttributes, $this->offCanvasHeaderButtonClass);

        return PHP_EOL .
            $this->tag->create(
                $this->offCanvasHeaderButtonTag,
                $this->offCanvasHeaderButtonContent,
                $offCanvasHeaderButtonAttributes,
            );
    }

    private function renderOffCanvasHeaderTitle(): string
    {
        $offCanvasHeaderTitleAttributes = $this->offCanvasHeaderTitleAttributes;

        if ($this->offCanvasHeaderTitleId !== '') {
            $offCanvasHeaderTitleAttributes['id'] = $this->offCanvasHeaderTitleId;
        }

        CssClass::add($offCanvasHeaderTitleAttributes, $this->offCanvasHeaderTitleClass);

        return $this->tag->create(
            $this->offCanvasHeaderTitleTag,
            $this->offCanvasHeaderTitleContent,
            $offCanvasHeaderTitleAttributes,
        );
    }
}
