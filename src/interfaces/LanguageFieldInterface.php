<?php

namespace Itstructure\FieldWidgets\interfaces;

/**
 * Interface LanguageFieldInterface
 *
 * @package Itstructure\AdminModule\interfaces
 */
interface LanguageFieldInterface
{
    /**
     * Returns full language name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns short language name.
     *
     * @return string
     */
    public function getShortName(): string;

    /**
     * Returns default mode.
     *
     * @return int
     */
    public function getDefault(): int;
}
