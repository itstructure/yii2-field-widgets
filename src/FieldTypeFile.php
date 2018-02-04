<?php

namespace Itstructure\FieldWidgets;

/**
 * Class FieldTypeFile
 * Class for upload file.
 *
 * @package Itstructure\FieldWidgets
 */
class FieldTypeFile extends FieldType
{
    public function run(): string
    {
        return $this->getField()
            ->fileInput(
                $this->getOptions()
            )
            ->label($this->getLabel());
    }
}
