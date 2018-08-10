<?php

namespace Itstructure\FieldWidgets\helpers;

use Itstructure\FieldWidgets\interfaces\LanguageFieldInterface;

/**
 * Class Helper
 *
 * @package Itstructure\FieldWidgets\helpers
 */
class Helper
{
    /**
     * Check if the current language is default, then set class "active" for tab.
     *
     * @param LanguageFieldInterface $language
     *
     * @return string
     */
    public static function isActiveTab(LanguageFieldInterface $language)
    {
        return $language->getDefault() == 1 ? 'active' : '';
    }
}
