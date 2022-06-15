<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Components;

use Forge\Html\Widgets\Attribute\Globals;
use Forge\Html\Widgets\Helper\Normalize;
use ReflectionException;
use Stringable;

use function array_merge;
use function count;
use function implode;
use function strtr;

/**
 * Menu displays a multi-level menu using nested HTML lists.
 *
 * The {@see Menu::items()} method specifies the possible items in the menu.
 * A menu item can contain sub-items which specify the sub-menu under that menu item.
 *
 * Menu checks the current route and request parameters to toggle certain menu items with active state.
 *
 * Note that Menu only renders the HTML tags about the menu. It does not do any styling.
 * You are responsible to provide CSS styles to make it look like a real menu.
 *
 * The following example shows how to use Menu:
 *
 * ```php
 * <?= Menu::Widget()
 *     ->items([
 *         ['label' => 'Login', 'link' => 'site/login', 'visible' => true],
 *     ]);
 * ?>
 * ```
 */
final class Menu extends Globals
{
    private array $afterAttributes = [];
    private string $afterClass = '';
    private string $afterContent = '';
    private string $afterTag = 'span';
    private string $activeClass = 'active';
    private bool $activateItems = true;
    private array $beforeAttributes = [];
    private string $beforeClass = '';
    private string $beforeContent = '';
    private string $beforeTag = 'span';
    private bool $container = true;
    private string $currentPath = '';
    private string $disabledClass = 'disabled';
    /** @psalm-var array<int, mixed> */
    private array $dropdownArguments = [];
    private string $dropdownConfigFile = '';
    private bool $dropdownContainer = true;
    private array $dropdownContainerAttributes = [];
    private string $dropdownContainerClass = '';
    private string $dropdownContainerTag = 'li';
    private array $dropdownDefinitions = [];
    private string $firstItemClass = '';
    private array $items = [];
    private bool $itemsContainer = true;
    private array $itemsContainerAttributes = [];
    private string $itemsContainerClass = '';
    private string $itemsTag = 'li';
    private string $labelTemplate = '{label}';
    private string $lastItemClass = '';
    private string $linkClass = '';
    private string $linkTemplate = '<a{attributes}>{label}</a>';
    private string $tagName = 'ul';
    private string $template = '{items}';

    /**
     * Returns a new instance with the specified after container attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function afterAttributes(array $values): self
    {
        $new = clone $this;
        $new->afterAttributes = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified after container class.
     *
     * @param string $class The class name.
     *
     * @return self
     */
    public function afterClass(string $class): self
    {
        $new = clone $this;
        $new->afterClass = $class;
        return $new;
    }

    /**
     * Returns a new instance with the specified after content.
     *
     * @param string|Stringable $content The content.
     *
     * @return self
     */
    public function afterContent(string|Stringable $content): self
    {
        $new = clone $this;
        $new->afterContent = (string) $content;
        return $new;
    }

    /**
     * Returns a new instance with the specified after container tag.
     *
     * @param string $value The after container tag.
     *
     * @return self
     */
    public function afterTag(string $value): self
    {
        $new = clone $this;
        $new->afterTag = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified active CSS class.
     *
     * @param string $value The CSS class to be appended to the active menu item.
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
     * Returns a new instance with the specified before container attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function beforeAttributes(array $values): self
    {
        $new = clone $this;
        $new->beforeAttributes = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified before container class.
     *
     * @param string $value The before container class.
     *
     * @return self
     */
    public function beforeClass(string $value): self
    {
        $new = clone $this;
        $new->beforeClass = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified before content.
     *
     * @param string|Stringable $value The content.
     *
     * @return self
     */
    public function beforeContent(string|Stringable $value): self
    {
        $new = clone $this;
        $new->beforeContent = (string) $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified before container tag.
     *
     * @param string $value The before container tag.
     *
     * @return self
     */
    public function beforeTag(string $value): self
    {
        $new = clone $this;
        $new->beforeTag = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the class `menu` widget.
     *
     * @param string $value The class `menu` widget.
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
     * Returns a new instance with the specified disabled CSS class.
     *
     * @param string $value The CSS class to be appended to the disabled menu item.
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
     * Returns a new instance with the specified dropdown container class.
     *
     * @param string $value The dropdown container class.
     *
     * @return self
     */
    public function dropdownContainerClass(string $value): self
    {
        $new = clone $this;
        $new->dropdownContainerClass = $value;
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
     * Returns a new instance with the specified first item CSS class.
     *
     * @param string $value The CSS class that will be assigned to the first item in the main menu or each submenu.
     *
     * @return self
     */
    public function firstItemClass(string $value): self
    {
        $new = clone $this;
        $new->firstItemClass = $value;
        return $new;
    }

    /**
     * List of items in the nav widget. Each array element represents a single menu item which can be either a string or
     * an array with the following structure:
     *
     * - label: string, required, the nav item label.
     * - active: bool, whether the item should be on active state or not.
     * - disabled: bool, whether the item should be on disabled state or not. For default `disabled` is false.
     * - encodeLabel: bool, whether the label should be HTML encoded or not. For default `encodeLabel` is true.
     * - items: array, optional, the item's submenu items. The structure is the same as for `items` option.
     * - itemsContainerAttributes: array, optional, the HTML attributes for the item's submenu container.
     * - link: string, the item's href. Defaults to "#". For default `link` is "#".
     * - linkAttributes: array, the HTML attributes of the item's link. For default `linkAttributes` is `[]`.
     * - icon: string, the item's icon. For default `icon` is ``.
     * - iconAttributes: array, the HTML attributes of the item's icon. For default `iconAttributes` is `[]`.
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
    public function items(array $values): self
    {
        $new = clone $this;
        $new->items = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified if enabled or disabled the items container.
     *
     * @param bool $value The items container enable or disable, for default is `true`.
     *
     * @return self
     */
    public function itemsContainer(bool $value): self
    {
        $new = clone $this;
        $new->itemsContainer = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified items' container attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function itemsContainerAttributes(array $values): self
    {
        $new = clone $this;
        $new-> itemsContainerAttributes = $values;
        return $new;
    }

    /**
     * Returns a new instance with the specified items' container class.
     *
     * @param string $value The CSS class that will be assigned to the items' container.
     *
     * @return self
     */
    public function itemsContainerClass(string $value): self
    {
        $new = clone $this;
        $new->itemsContainerClass = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified items tag.
     *
     * @param string $value The tag that will be used to wrap the items.
     *
     * @return self
     */
    public function itemsTag(string $value): self
    {
        $new = clone $this;
        $new->itemsTag = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified label template.
     *
     * @param string $value The template used to render the body of a menu which is NOT a link.
     *
     * In this template, the token `{label}` will be replaced with the label of the menu item.
     *
     * This property will be overridden by the `template` option set in individual menu items via {@see items}.
     *
     * @return self
     */
    public function labelTemplate(string $value): self
    {
        $new = clone $this;
        $new->labelTemplate = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified last item CSS class.
     *
     * @param string $value The CSS class that will be assigned to the last item in the main menu or each submenu.
     *
     * @return self
     */
    public function lastItemClass(string $value): self
    {
        $new = clone $this;
        $new->lastItemClass = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified link css class.
     *
     * @param string $value The CSS class that will be assigned to the link.
     *
     * @return self
     */
    public function linkClass(string $value): self
    {
        $new = clone $this;
        $new->linkClass = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified link template.
     *
     * @param string $value The template used to render the body of a menu which is a link. In this template, the token
     * `{link}` will be replaced with the corresponding link URL; while `{label}` will be replaced with the link text.
     *
     * This property will be overridden by the `template` option set in individual menu items via {@see items}.
     *
     * @return self
     */
    public function linkTemplate(string $value): self
    {
        $new = clone $this;
        $new->linkTemplate = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified tag for rendering the menu.
     *
     * @param string $value The tag for rendering the menu.
     *
     * @return self
     */
    public function tagName(string $value): self
    {
        $new = clone $this;
        $new->tagName = $value;
        return $new;
    }

    /**
     * Returns a new instance with the specified the template used to render the main menu.
     *
     * @param string $value The template used to render the main menu. In this template, the token `{items}` will be
     * replaced.
     *
     * @return self
     */
    public function template(string $value): self
    {
        $new = clone $this;
        $new->template = $value;
        return $new;
    }

    /**
     * Renders the menu.
     *
     * @throws ReflectionException
     *
     * @return string The result of Widget execution to be outputted.
     */
    protected function run(): string
    {
        $items = Normalize::menu($this->items, $this->currentPath, $this->activateItems);

        if ($items === []) {
            return '';
        }

        return $this->renderMenu($items);
    }

    private function renderAfterContent(): string
    {
        $afterAttributes = $this->afterAttributes;

        $this->cssClass->add($afterAttributes, $this->afterClass);

        return PHP_EOL . $this->tag->create($this->afterTag, $this->afterContent, $afterAttributes);
    }

    private function renderBeforeContent(): string
    {
        $beforeAttributes = $this->beforeAttributes;

        $this->cssClass->add($beforeAttributes, $this->beforeClass);

        return $this->tag->create($this->beforeTag, $this->beforeContent, $beforeAttributes);
    }

    /**
     * @throws ReflectionException
     */
    private function renderDropdown(array $items): string
    {
        $dropdownContainerAttributes = $this->dropdownContainerAttributes;
        $this->cssClass->add($dropdownContainerAttributes, $this->dropdownContainerClass);

        $dropdown = Dropdown::create($this->dropdownConfigFile, $this->dropdownDefinitions, $this->dropdownArguments)
            ->items($items)
            ->render();

        return match ($this->dropdownContainer) {
            true => $this->tag->create($this->dropdownContainerTag, $dropdown, $dropdownContainerAttributes),
            false => $dropdown,
        };
    }

    /**
     * Renders the content of a menu item.
     *
     * Note that the container and the sub-menus are not rendered here.
     *
     * @param array $item The menu item to be rendered. Please refer to {@see items} to see what data might be in the
     * item.
     *
     * @return string The rendering result.
     */
    private function renderItem(array $item): string
    {
        /** @var string */
        $label = $item['label'];
        /** @var array */
        $linkAttributes = $item['linkAttributes'] ?? [];
        $this->cssClass->add($linkAttributes, $this->linkClass);

        if ($item['active']) {
            $linkAttributes['aria-current'] = 'page';
            $this->cssClass->add($linkAttributes, $this->activeClass);
        }

        if ($item['disabled']) {
            $this->cssClass->add($linkAttributes, $this->disabledClass);
        }

        if ($item['encodeLabel']) {
            $label = $this->encode->content($label);
        }

        if (isset($item['link'])) {
            /** @var string */
            $linkAttributes['href'] = $item['link'];
        }

        /** @var string */
        $labelTemplate = $item['labelTemplate'] ?? $this->labelTemplate;

        /** @var string */
        $linkTemplate = $item['linkTemplate'] ?? $this->linkTemplate;

        return match (isset($linkAttributes['href'])) {
            true => strtr($linkTemplate, [
                '{attributes}' => $this->attributesHelper->render($linkAttributes),
                '{label}' => $label,
            ]),
            false => strtr($labelTemplate, ['{label}' => $label]),
        };
    }

    /**
     * Recursively renders the menu items (without the container tag).
     *
     * @param array $items The menu items to be rendered recursively.
     *
     * @throws ReflectionException
     *
     * @return string The rendering result.
     */
    private function renderItems(array $items): string
    {
        $lines = [];
        $n = count($items);

        /** @psalm-var array[] $items  */
        foreach ($items as $i => $item) {
            if (isset($item['items'])) {
                /** @psalm-var array $item['items'] */
                $lines[] = strtr($this->template, ['{items}' => $this->renderDropdown([$item])]);
            } else {
                /** @psalm-var array|null $item['itemsContainerAttributes'] */
                $itemsContainerAttributes = array_merge(
                    $this->itemsContainerAttributes,
                    $item['itemsContainerAttributes'] ?? [],
                );

                $this->cssClass->add($itemsContainerAttributes, $this->itemsContainerClass);

                if ($i === 0 && $this->firstItemClass !== '') {
                    $this->cssClass->add($itemsContainerAttributes, $this->firstItemClass);
                }

                if ($i === $n - 1 && $this->lastItemClass !== '') {
                    $this->cssClass->add($itemsContainerAttributes, $this->lastItemClass);
                }

                $menu = $this->renderItem($item);

                $lines[] = match ($this->itemsContainer) {
                    false => $menu,
                    default => $this->tag->create($this->itemsTag, $menu, $itemsContainerAttributes),
                };
            }
        }

        return implode(PHP_EOL, $lines);
    }

    /**
     * @throws ReflectionException
     */
    private function renderMenu(array $items): string
    {
        $afterContent = '';
        $attributes = $this->attributes;
        $beforeContent = '';

        $content = $this->renderItems($items);

        if ($this->beforeContent !== '') {
            $beforeContent = $this->renderBeforeContent() . PHP_EOL;
        }

        if ($this->afterContent !== '') {
            $afterContent = $this->renderAfterContent();
        }

        return match ($this->container) {
            false => $beforeContent . $content . $afterContent,
            default => $beforeContent . $this->tag->create($this->tagName, $content, $attributes) . $afterContent,
        };
    }
}
