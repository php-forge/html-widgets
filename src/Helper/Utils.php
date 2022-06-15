<?php

declare(strict_types=1);

namespace Forge\Html\Widgets\Helper;

final class Utils
{
    /**
     * Remove double spaces from string.
     *
     * @param string $string String to remove double spaces from.
     *
     * @return string
     */
    public static function removeDoubleLinesBreaks(string $string): string
    {
        return preg_replace("/([\r\n]{4,}|[\n]{2,}|[\r]{2,})/", PHP_EOL, $string);
    }
}
