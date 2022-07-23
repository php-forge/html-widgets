<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Components;

use Forge\Html\Helper\CssClass;
use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Attribute\Globals;
use Forge\Html\Widgets\Helper\Normalize;
use ReflectionException;

use function gettype;

final class Dropdown extends Globals
{
    private string $activeClass = 'active';
    private bool $container = true;
    private array $containerAttributes = [];
    private string $containerClass = '';
    private string $containerTag = 'div';
    private string $disabledClass = 'disabled';
    private array $dividerAttributes = [];
    private string $dividerTag = 'hr';
    private string $headerClass = '';
    private string $headerTag = 'span';
    private string $itemClass = '';
    private string $itemTag = 'a';
    private bool $itemContainer = true;
    private array $itemContainerAttributes = [];
    private string $itemContainerTag = 'li';
    private array $items = [];
    private array $itemsContainerAttributes = [];
    private string $itemsContainerTag = 'ul';
    private array $splitButtonAttributes = [];
    private array $splitButtonSpanAttributes = [];
    private array $toggleAttributes = [];
    private string $toggleType = 'button';

    /**
     * Returns a new instance with the specified active class.
     *
     * @param string $value The active class.
     *
     * @return self
     */
    public function activeClass(string $value): self
    {
        $new = clone $this;
        $new->activeClass = $value;

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
     * Returns a new instance with the specified container HTML attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function containerAttributes(array $values): self
    {
        $new = clone $this;
        $new->containerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified container class.
     *
     * @param string $value The container class.
     *
     * @return self
     */
    public function containerClass(string $value): self
    {
        $new = clone $this;
        $new->containerClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified container tag.
     *
     * @param string $value The container tag.
     *
     * @return self
     */
    public function containerTag(string $value): self
    {
        $new = clone $this;
        $new->containerTag = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified disabled class.
     *
     * @param string $value The disabled class.
     *
     * @return self
     */
    public function disabledClass(string $value): self
    {
        $new = clone $this;
        $new->disabledClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified divider HTML attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function dividerAttributes(array $values): self
    {
        $new = clone $this;
        $new->dividerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified divider class.
     *
     * @param string $value The divider class.
     *
     * @return self
     */
    public function dividerClass(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->dividerAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the specified divider tag.
     *
     * @param string $value The divider tag.
     *
     * @return self
     */
    public function dividerTag(string $value): self
    {
        $new = clone $this;
        $new->dividerTag = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified header class.
     *
     * @param string $value The header class.
     *
     * @return self
     */
    public function headerClass(string $value): self
    {
        $new = clone $this;
        $new->headerClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified header tag.
     *
     * @param string $value The header tag.
     *
     * @return self
     */
    public function headerTag(string $value): self
    {
        $new = clone $this;
        $new->headerTag = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified item class.
     *
     * @param string $value The item class.
     *
     * @return self
     */
    public function itemClass(string $value): self
    {
        $new = clone $this;
        $new->itemClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified item container, if false, the item container will not be rendered.
     *
     * @param bool $value The item container.
     *
     * @return self
     */
    public function itemContainer(bool $value): self
    {
        $new = clone $this;
        $new->itemContainer = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified item container HTML attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function itemContainerAttributes(array $values): self
    {
        $new = clone $this;
        $new->itemContainerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified item container class.
     *
     * @param string $value The item container class.
     *
     * @return self
     */
    public function itemContainerClass(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->itemContainerAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the specified item container tag.
     *
     * @param string $value The item container tag.
     *
     * @return self
     */
    public function itemContainerTag(string $value): self
    {
        $new = clone $this;
        $new->itemContainerTag = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified item tag.
     *
     * @param string $value The item tag.
     *
     * @return self
     */
    public function itemTag(string $value): self
    {
        $new = clone $this;
        $new->itemTag = $value;

        return $new;
    }

    /**
     * List of menu items in the dropdown. Each array element can be either an HTML string, or an array representing a
     * single menu with the following structure:
     *
     * - label: string, required, the nav item label.
     * - active: bool, whether the item should be on active state or not.
     * - disabled: bool, whether the item should be on disabled state or not. For default `disabled` is false.
     * - enclose: bool, whether the item should be enclosed by a `<li>` tag or not. For default `enclose` is true.
     * - encodeLabel: bool, whether the label should be HTML encoded or not. For default `encodeLabel` is true.
     * - headerAttributes: array, HTML attributes to be rendered in the item header.
     * - link: string, the item's href. Defaults to "#". For default `link` is "#".
     * - linkAttributes: array, the HTML attributes of the item's link. For default `linkAttributes` is `[]`.
     * - icon: string, the item's icon. For default `icon` is ``.
     * - iconAttributes: array, the HTML attributes of the item's icon. For default `iconAttributes` is `[]`.
     * - visible: bool, optional, whether this menu item is visible. Defaults to true.
     * - items: array, optional, the submenu items. The structure is the same as this property.
     *   Note that Bootstrap doesn't support dropdown submenu. You have to add your own CSS styles to support it.
     * - itemsAttributes: array, optional, the HTML attributes for sub-menu.
     *
     * To insert dropdown divider use `-`.
     *
     * @param array $value
     *
     * @return static
     */
    public function items(array $value): self
    {
        $new = clone $this;
        $new->items = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified items container HTML attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function itemsContainerAttributes(array $values): self
    {
        $new = clone $this;
        $new->itemsContainerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified item container class.
     *
     * @param string $value The item container class.
     *
     * @return self
     */
    public function itemsContainerClass(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->itemsContainerAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the specified split button attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function splitButtonAttributes(array $values): self
    {
        $new = clone $this;
        $new->splitButtonAttributes = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified split button class.
     *
     * @param string $value The split button class.
     *
     * @return self
     */
    public function splitButtonClass(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->splitButtonAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the specified split button span class.
     *
     * @param string $value The split button span class.
     *
     * @return self
     */
    public function splitButtonSpanClass(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->splitButtonSpanAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the specified toggle HTML attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function toggleAttributes(array $values): self
    {
        $new = clone $this;
        $new->toggleAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified toggle class.
     *
     * @param string $value The toggle class.
     *
     * @return self
     */
    public function toggleClass(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->toggleAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the specified toggle type, if `button` the toggle will be a button, otherwise a
     * `a` tag will be used.
     *
     * @param string $value The toggle tag.
     *
     * @return self
     */
    public function toggleType(string $value): self
    {
        $new = clone $this;
        $new->toggleType = $value;

        return $new;
    }

    /**
     * @throws ReflectionException
     */
    protected function run(): string
    {
        $containerAttributes = $this->containerAttributes;
        $items = Normalize::dropdown($this->items);
        $items = $this->renderItems($items);

        CssClass::add($containerAttributes, $this->containerClass);

        return match ($this->container) {
            true => Tag::create($this->containerTag, $items, $containerAttributes),
            false => $items,
        };
    }

    private function renderDivider(): string
    {
        $dividerAttributes = $this->dividerAttributes;
        $itemContainerAttributes = $this->itemContainerAttributes;

        return Tag::create(
            $this->itemContainerTag,
            Tag::create($this->dividerTag, '', $dividerAttributes),
            $itemContainerAttributes,
        );
    }

    /**
     * @throws ReflectionException
     */
    private function renderDropdown(array $items, array $itemsAttributes = []): string
    {
        return self::create()
            ->attributes($itemsAttributes)
            ->container(false)
            ->dividerAttributes($this->dividerAttributes)
            ->headerClass($this->headerClass)
            ->headerTag($this->headerTag)
            ->itemClass($this->itemClass)
            ->itemContainerAttributes($this->itemContainerAttributes)
            ->itemContainerTag($this->itemContainerTag)
            ->itemTag($this->itemTag)
            ->items($items)
            ->itemsContainerAttributes($this->itemsContainerAttributes)
            ->toggleAttributes($this->toggleAttributes)
            ->toggleType($this->toggleType)
            ->render();
    }

    private function renderHeader(string $label, array $headerAttributes = []): string
    {
        $itemContainerAttributes = $this->itemContainerAttributes;

        CssClass::add($headerAttributes, $this->headerClass);

        return Tag::create(
            $this->itemContainerTag,
            Tag::create($this->headerTag, $label, $headerAttributes),
            $itemContainerAttributes,
        );
    }

    /**
     * @param array $item The item to be rendered.
     *
     * @throws ReflectionException
     *
     * @return string
     */
    private function renderItem(array $item): string
    {
        /** @var bool */
        $enclose = $item['enclose'] ?? true;
        /** @var array */
        $headerAttributes = $item['headerAttributes'];
        /** @var array */
        $items = $item['items'] ?? [];
        /** @var array */
        $itemsAttributes = $item['itemsAttributes'] ?? [];
        /**
         * @var string $item['label']
         * @var string $item['icon']
         * @var string $item['iconClass']
         * @var array $item['iconAttributes']
         * @var array $item['iconContainerAttributes']
         */
        $label = $this->renderLabel(
            $item['label'],
            $item['icon'],
            $item['iconClass'],
            $item['iconAttributes'],
            $item['iconContainerAttributes'],
        );
        /** @var array */
        $lines = [];
        /** @var string */
        $link = $item['link'];
        /** @var array */
        $linkAttributes = $item['linkAttributes'];
        /** @var array */
        $toggleAttributes = $item['toggleAttributes'] ?? [];

        CssClass::add($linkAttributes, $this->itemClass);

        if ($item['active']) {
            $linkAttributes['aria-current'] = 'true';
            CssClass::add($linkAttributes, [$this->activeClass]);
        }

        if ($item['disabled']) {
            CssClass::add($linkAttributes, $this->disabledClass);
        }

        if ($items === []) {
            $lines[] = $this->renderItemContent($label, $link, $enclose, $linkAttributes, $headerAttributes);
        } else {
            $itemContainer = $this->renderItemContainer($items, $itemsAttributes);
            $toggle = $this->renderToggle($label, $link, $toggleAttributes);
            $toggleSplitButton = $this->renderToggleSplitButton($label);

            if ($this->toggleType === 'split' && !str_contains($this->containerClass, 'dropstart')) {
                $lines[] = $toggleSplitButton . PHP_EOL . $toggle . PHP_EOL . $itemContainer;
            } elseif ($this->toggleType === 'split' && str_contains($this->containerClass, 'dropstart')) {
                $lines[] = $toggle . PHP_EOL . $itemContainer . PHP_EOL . $toggleSplitButton;
            } else {
                $lines[] = $toggle . PHP_EOL . $itemContainer;
            }
        }

        /** @psalm-var string[] $lines */
        return implode(PHP_EOL, $lines);
    }

    /**
     * @throws ReflectionException
     */
    private function renderItemContainer(array $items, array $itemsContainerAttributes = []): string
    {
        if ($itemsContainerAttributes === []) {
            $itemsContainerAttributes = $this->itemsContainerAttributes;
        }

        if (isset($this->attributes['id'])) {
            /** @var string */
            $itemsContainerAttributes['aria-labelledby'] = $this->attributes['id'];
        }

        return Tag::create(
            $this->itemsContainerTag,
            $this->renderDropdown($items, $itemsContainerAttributes),
            $itemsContainerAttributes,
        );
    }

    private function renderItemContent(
        string $label,
        string $link,
        bool $enclose,
        array $linkAttributes = [],
        array $headerAttributes = []
    ): string {
        return match (true) {
            $label === '-' => $this->renderDivider(),
            $enclose === false => $label,
            $link === '' => $this->renderHeader($label, $headerAttributes),
            default => $this->renderItemLink($label, $link, $linkAttributes),
        };
    }

    /**
     * @throws ReflectionException
     */
    private function renderItems(array $items = []): string
    {
        $lines = [];

        /** @var array|string $item */
        foreach ($items as $item) {
            $lines[] = match (gettype($item)) {
                'array' => $this->renderItem($item),
                'string' => $this->renderDivider(),
            };
        }

        return implode(PHP_EOL, $lines);
    }

    private function renderLabel(
        string $label,
        string $icon,
        string $iconClass,
        array $iconAttributes = [],
        array $iconContainerAttributes = []
    ): string {
        $html = '';

        CssClass::add($iconAttributes, $iconClass);

        if ($icon !== '' || $iconClass !== '') {
            $i = Tag::i($iconAttributes, $icon);
            $html = Tag::span($iconContainerAttributes, $i);
        }

        if ($label !== '') {
            $html .= $label;
        }

        return $html;
    }

    private function renderItemLink(
        string $label,
        string $link,
        array $linkAttributes = []
    ): string {
        $itemContainerAttributes = $this->itemContainerAttributes;
        $linkAttributes['href'] = $link;

        $a = Tag::create($this->itemTag, $label, $linkAttributes);

        return match ($this->itemContainer) {
            true => Tag::create($this->itemContainerTag, $a, $itemContainerAttributes),
            default => $a,
        };
    }

    /**
     * @throws ReflectionException
     */
    private function renderToggle(string $label, string $link, array $toggleAttributes = []): string
    {
        if ($toggleAttributes === []) {
            $toggleAttributes = $this->toggleAttributes;
        }

        if (isset($this->attributes['id'])) {
            /** @var string */
            $toggleAttributes['id'] = $this->attributes['id'];
        }

        return match ($this->toggleType) {
            'link' => $this->renderToggleLink($label, $link, $toggleAttributes),
            'split' => $this->renderToggleSplit($label, $toggleAttributes),
            default => $this->renderToggleButton($label, $toggleAttributes),
        };
    }

    /**
     * @throws ReflectionException
     */
    private function renderToggleButton(string $label, array $toggleAttributes = []): string
    {
        $toggleAttributes['type'] = 'button';

        return Button::create()->attributes($toggleAttributes)->content($label)->render();
    }

    /**
     * @throws ReflectionException
     */
    private function renderToggleLink(string $label, string $link, array $toggleAttributes = []): string
    {
        $toggleAttributes['href'] = $link;

        return Button::create()->attributes($toggleAttributes)->content($label)->type('link')->render();
    }

    /**
     * @throws ReflectionException
     */
    private function renderToggleSplit(string $label, array $toggleAttributes = []): string
    {
        $splitButtonSpanAttributes = $this->splitButtonSpanAttributes;
        $toggleAttributes['type'] = 'button';

        return Button::create()
            ->attributes($toggleAttributes)
            ->content(Tag::span($splitButtonSpanAttributes, $label))
            ->render();
    }

    /**
     * @throws ReflectionException
     */
    private function renderToggleSplitButton(string $label): string
    {
        $splitButtonAttributes = $this->splitButtonAttributes;
        $splitButtonAttributes['type'] = 'button';

        return Button::create()->attributes($splitButtonAttributes)->content($label)->render();
    }
}
