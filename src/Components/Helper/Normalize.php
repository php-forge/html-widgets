<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Components\Helper;

use InvalidArgumentException;

final class Normalize
{
    /**
     * Normalize the given array of items for the dropdown.
     *
     * @param array $items The array of items to normalize.
     * @param bool $active Whether the item is active or not.
     * @param string $currentPath The current path.
     * @param bool $activeItems Whether the item is active or not.
     *
     * @return array The normalized array of items.
     */
    public function dropdown(array $items, bool &$active = false): array
    {
        /**
         * @psalm-var array[] $items
         * @psalm-suppress RedundantConditionGivenDocblockType
         */
        foreach ($items as $i => $child) {
            if (is_array($child)) {
                $items[$i]['label'] = $this->label($child);
                /** @var bool */
                $items[$i]['active'] = $child['active'] ?? false;
                /** @var bool */
                $items[$i]['disabled'] = $child['disabled'] ?? false;
                /** @var bool */
                $items[$i]['enclose'] = $child['enclose'] ?? true;
                /** @var array */
                $items[$i]['headerAttributes'] = $child['headerAttributes'] ?? [];
                /** @var string */
                $items[$i]['link'] = $child['link'] ?? '/';
                /** @var array */
                $items[$i]['linkAttributes'] = $child['linkAttributes'] ?? [];
                /** @var array */
                $items[$i]['iconAttributes'] = $child['iconAttributes'] ?? [];
                /** @var string */
                $items[$i]['icon'] = $child['icon'] ?? '';
                /** @var string */
                $items[$i]['iconClass'] = $child['iconClass'] ?? '';
                /** @var array */
                $items[$i]['iconContainerAttributes'] = $child['iconContainerAttributes'] ?? [];
                /** @var bool */
                $items[$i]['visible'] = $child['visible'] ?? true;
                /** @var array */
                $dropdown = $child['items'] ?? [];
                /** @var array */
                $items[$i]['itemsAttributes'] = $child['itemsttributes'] ?? [];

                if ($dropdown !== []) {
                    $items[$i]['items'] = $this->dropdown($dropdown);
                }
            }
        }

        return $items;
    }

    /**
     * Normalize the given array of items for the menu.
     *
     * @param array $items {@see items}
     * @param bool $active Should the parent be active too.
     * @param string $currentPath The current path.
     * @param bool $activeItems Whether the item is active or not.
     *
     * @return array The normalized array of items.
     */
    public function menu(
        array $items,
        string $currentPath = '/',
        bool $activateItems = true,
        bool &$active = false,
    ): array {
        /**
         * @psalm-var array[] $items
         * @psalm-suppress RedundantConditionGivenDocblockType
         */
        foreach ($items as $i => $child) {
            if (is_array($child)) {
                /** @var array */
                $dropdown = $child['items'] ?? [];

                if ($dropdown !== []) {
                    $items[$i]['items'] = $this->menu($dropdown, $currentPath, $activateItems, $active);
                } else {
                    /** @var string */
                    $link = $child['link'] ?? '/';
                    /** @var bool */
                    $active = $child['active'] ?? false;

                    if ($active === false) {
                        $items[$i]['active'] = $this->isItemActive($link, $currentPath, $activateItems);
                    }

                    /** @var bool */
                    $items[$i]['disabled'] = $child['disabled'] ?? false;
                    /** @var bool */
                    $items[$i]['encodeLabel'] = $child['encodeLabel'] ?? true;
                }
            }
        }

        return $items;
    }

    /**
     * Checks whether a menu item is active.
     *
     * This is done by checking match that specified in the `url` option of the menu item.
     *
     * @param string $link The link of the menu item.
     * @param bool $active Whether the menu item is active or not.
     * @param string $currentPath The current path.
     *
     * @return bool Whether the menu item is active.
     */
    private function isItemActive(string $link, string $currentPath, bool $activateItems): bool
    {
        return ($link === $currentPath) && $activateItems;
    }

    private function label(array $item): string
    {
        if (!isset($item['label'])) {
            throw new InvalidArgumentException('The "label" option is required.');
        }

        if (!is_string($item['label'])) {
            throw new InvalidArgumentException('The "label" option must be a string.');
        }

        if ($item['label'] === '') {
            throw new InvalidArgumentException('The "label" cannot be an empty string.');
        }

        /** @var bool */
        $encodeLabels = $item['encodeLabel'] ?? true;

        if ($encodeLabels) {
            return htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8', false);
        }

        return $item['label'];
    }
}
