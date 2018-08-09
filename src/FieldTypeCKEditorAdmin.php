<?php

namespace Itstructure\FieldWidgets;

use Itstructure\CKEditor\CKEditorAdmin;

/**
 * Class FieldTypeCKEditorAdmin
 * Class for printing a CKEditor.
 *
 * @package Itstructure\FieldWidgets
 */
class FieldTypeCKEditorAdmin extends FieldType
{
    /**
     * @return string
     */
    public function run(): string
    {
        return $this->getField()
            ->widget(
                CKEditorAdmin::class,
                [
                    'preset' => $this->preset,
                    'clientOptions' => $this->getOptions()
                ]
            )
            ->label($this->getLabel());
    }
}
