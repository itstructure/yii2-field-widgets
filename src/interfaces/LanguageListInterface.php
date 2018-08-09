<?php

namespace Itstructure\FieldWidgets\interfaces;

/**
 * Interface LanguageListInterface
 *
 * @package Itstructure\AdminModule\interfaces
 */
interface LanguageListInterface
{
    /**
     * Returns list of available system languages (array of Language records).
     *
     * @return array
     */
    public function getLanguageList(): array;
}
