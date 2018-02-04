<?php

namespace Itstructure\FieldWidgets;

use yii\helpers\ArrayHelper;

/**
 * Class FieldTypeDropdown
 * Class for printing the form dropdown field.
 *
 * @package Itstructure\FieldWidgets
 */
class FieldTypeDropdown extends FieldType
{
    public function run(): string
    {
        return $this->getField()
            ->dropDownList(
                $this->getData(),
                ArrayHelper::merge(
                    [
                        'prompt' => 'Not chosen'
                    ],
                    $this->getOptions()
                )
            )
            ->label($this->getLabel());
    }
}
