<?php

namespace Itstructure\FieldWidgets;

use Itstructure\CKEditor\CKEditor;

/**
 * Class FieldTypeCKEditor
 * Class for printing a CKEditor.
 *
 * @package Itstructure\FieldWidgets
 */
class FieldTypeCKEditor extends FieldType
{
    public function run(): string
    {
        return $this->getField()
            ->widget(
                CKEditor::class,
                [
                    'preset' => $this->preset,
                    'clientOptions' => $this->getOptions()
                ]
            )
            ->label($this->getLabel());
    }
}
