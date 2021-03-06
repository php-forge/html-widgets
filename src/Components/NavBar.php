<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Components;

use Forge\Html\Helper\Attribute;
use Forge\Html\Helper\CssClass;
use Forge\Html\Tag\Tag;
use Forge\Html\Widgets\Attribute\Globals;
use Forge\Html\Widgets\Helper\Utils;

/**
 * NavBar renders a navbar HTML component.
 *
 * Any content enclosed between the {@see begin()} and {@see end()} calls of NavBar is treated as the content of the
 * navbar. You may use widgets such as {@see Nav} to build up such content. For example,
 */
final class NavBar extends Globals
{
    private string $brand = '';
    private array $brandAttributes = [];
    private string $brandClass = '';
    private string $brandImage = '';
    private array $brandImageAttributes = [];
    private string $brandImageClass = '';
    private string $brandLink = '#';
    private string $brandTag = 'a';
    private bool $buttonToggle = false;
    private string $buttonToggleId = '';
    private array $buttonToggleAttributes = [];
    private string $buttonToggleClass = '';
    private string $buttonToggleContent = '<span class="navbar-toggler-icon"></span>';
    private bool $container = false;
    private array $containerAttributes = [];
    private string $containerClass = 'container';
    private string $containerTag = 'div';
    private bool $menuContainer = true;
    private array $menuContainerAttributes = [];
    private string $menuContainerClass = 'container-fluid';
    private string $menuContainerTag = 'div';
    private string $tagName = 'nav';
    private string $template = '{containerMenu}{brand}{toggle}';

    /**
     *  Returns a new instance with the specified brand content.
     *
     * @param string $value The brand content.
     *
     * @return self
     */
    public function brand(string $value): self
    {
        $new = clone $this;
        $new->brand = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified brand attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function brandAttributes(array $values): self
    {
        $new = clone $this;
        $new->brandAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified brand class.
     *
     * @param string $value The brand class.
     *
     * @return self
     */
    public function brandClass(string $value): self
    {
        $new = clone $this;
        $new->brandClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified brand image.
     *
     * @param string $value The brand image.
     *
     * @return self
     */
    public function brandImage(string $value): self
    {
        $new = clone $this;
        $new->brandImage = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified brand image attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function brandImageAttributes(array $values): self
    {
        $new = clone $this;
        $new->brandImageAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified brand image class.
     *
     * @param string $value The brand image class.
     *
     * @return self
     */
    public function brandImageClass(string $value): self
    {
        $new = clone $this;
        $new->brandImageClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified brand link.
     *
     * @param string $value The brand link.
     *
     * @return self
     */
    public function brandLink(string $value): self
    {
        $new = clone $this;
        $new->brandLink = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified brand tag.
     *
     * @param string $value The brand tag.
     *
     * @return self
     */
    public function brandTag(string $value): self
    {
        $new = clone $this;
        $new->brandTag = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified enable or disable the button toggle.
     *
     * @param bool $value The button toggle enable or disable, for default is `true`.
     *
     * @return self
     */
    public function buttonToggle(bool $value): self
    {
        $new = clone $this;
        $new->buttonToggle = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified button toggle attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function buttonToggleAttributes(array $values): self
    {
        $new = clone $this;
        $new->buttonToggleAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified button toggle class.
     *
     * @param string $value The button toggle class.
     *
     * @return self
     */
    public function buttonToggleClass(string $value): self
    {
        $new = clone $this;
        $new->buttonToggleClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified button toggle content.
     *
     * @param string $value The button toggle content.
     *
     * @return self
     */
    public function buttonToggleContent(string $value): self
    {
        $new = clone $this;
        $new->buttonToggleContent = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified Id so that it is used in the `nav` widget.
     *
     * @param string $value The Id of the `nav` widget.
     *
     * @return self
     */
    public function buttonToggleId(string $value): self
    {
        $new = clone $this;
        $new->buttonToggleId = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified the class `navbar` widget.
     *
     * @param string $value The class `navbar` widget.
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
     * @param bool $value The container widget enable or disable, for default is `false`.
     *
     * @return self
     */
    public function container(bool $value = true): self
    {
        $new = clone $this;
        $new->container = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified container attributes.
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
     * Returns a new instance with the specified enable or disable the container `menu` widget.
     *
     * @param bool $value The container `menu` widget enable or disable, for default is `true`.
     *
     * @return self
     */
    public function menuContainer(bool $value = true): self
    {
        $new = clone $this;
        $new->menuContainer = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified container `menu` attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return self
     */
    public function menuContainerAttributes(array $values): self
    {
        $new = clone $this;
        $new->menuContainerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the specified container `menu` class.
     *
     * @param string $value The container `menu` class.
     *
     * @return self
     */
    public function menuContainerClass(string $value): self
    {
        $new = clone $this;
        $new->menuContainerClass = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified container `menu` tag.
     *
     * @param string $value The container `menu` tag.
     *
     * @return self
     */
    public function menuContainerTag(string $value): self
    {
        $new = clone $this;
        $new->menuContainerTag = $value;

        return $new;
    }

    /**
     * Returns a new instance with the specified template render widget.
     *
     * @param string $value The template render widget.
     *
     * @return self
     */
    public function template(string $value): self
    {
        $new = clone $this;
        $new->template = $value;

        return $new;
    }

    public function begin(): string
    {
        parent::begin();

        $attributes = $this->attributes;
        $containerAttributes = $this->containerAttributes;
        $content = '';
        $parts = ['{brand}' => '', '{containerMenu}' => '', '{toggle}' => ''];

        CssClass::add($containerAttributes, $this->containerClass);

        $content .= Tag::begin($this->tagName, $attributes);

        if ($this->renderBrand() !== '') {
            $parts['{brand}'] = PHP_EOL . $this->renderBrand();
        }

        if ($this->menuContainer) {
            $parts['{containerMenu}'] = $this->renderMenuContainer();
        }

        if ($this->renderButtonToggle() !== '') {
            $parts['{toggle}'] = PHP_EOL . $this->renderButtonToggle();
        }

        $content .= Utils::removeDoubleLinesBreaks(strtr($this->template, $parts));

        return match ($this->container) {
            true => Tag::begin($this->containerTag, $containerAttributes) . PHP_EOL . $content . PHP_EOL,
            default => $content . PHP_EOL,
        };
    }

    protected function run(): string
    {
        $content = '';

        if ($this->menuContainer) {
            $content .= Tag::end($this->menuContainerTag) . PHP_EOL;
        }

        return $content . $this->renderEndTag();
    }

    private function renderBrand(): string
    {
        $brand = $this->brand;
        $brandAttributes = $this->brandAttributes;
        $brandImageAttributes = $this->brandImageAttributes;

        CssClass::add($brandAttributes, $this->brandClass);

        if (!isset($brandAttributes['href'])) {
            Attribute::add($brandAttributes, 'href', $this->brandLink);
        }

        if ($this->brandImage !== '') {
            Attribute::add($brandImageAttributes, 'src', $this->brandImage);
            CssClass::add($brandImageAttributes, $this->brandImageClass);

            $brand = Tag::create('img', '', $brandImageAttributes);
        }

        if ($this->brand !== '' && $this->brandImage !== '') {
            $brand = Tag::create('img', '', $brandImageAttributes) . $this->brand;
        }

        $brandTag = Tag::create($this->brandTag, $brand, $brandAttributes);

        return match ($brand) {
            '' => '',
            default => $this->menuContainer ? $brandTag : PHP_EOL . $brandTag,
        };
    }

    private function renderButtonToggle(): string
    {
        $buttonToggleAttributes = $this->buttonToggleAttributes;
        /** @var string */

        CssClass::add($buttonToggleAttributes, $this->buttonToggleClass);

        if (!array_key_exists('data-bs-toggle', $buttonToggleAttributes)) {
            Attribute::add($buttonToggleAttributes, 'data-bs-toggle', 'collapse');
        }

        if (!array_key_exists('data-bs-target', $buttonToggleAttributes) && $this->buttonToggleId !== '') {
            Attribute::add($buttonToggleAttributes, 'data-bs-target', '#' . $this->buttonToggleId);
        }

        if (!array_key_exists('aria-controls', $buttonToggleAttributes) && $this->buttonToggleId !== '') {
            Attribute::add($buttonToggleAttributes, 'aria-controls', $this->buttonToggleId);
        }

        if (!array_key_exists('aria-expanded', $buttonToggleAttributes)) {
            Attribute::add($buttonToggleAttributes, 'aria-expanded', 'false');
        }

        if (!array_key_exists('aria-label', $buttonToggleAttributes)) {
            Attribute::add($buttonToggleAttributes, 'aria-label', 'Toggle navigation');
        }

        return match ($this->buttonToggle) {
            false => '',
            default => Tag::button($buttonToggleAttributes, $this->buttonToggleContent),
        };
    }

    private function renderMenuContainer(): string
    {
        $menuContainerAttributes = $this->menuContainerAttributes;

        CssClass::add($menuContainerAttributes, $this->menuContainerClass);

        return PHP_EOL . Tag::begin($this->menuContainerTag, $menuContainerAttributes);
    }

    private function renderEndTag(): string
    {
        return match ($this->container) {
            false => Tag::end($this->tagName),
            default => Tag::end($this->tagName) . PHP_EOL . Tag::end($this->containerTag),
        };
    }
}
