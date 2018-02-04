<?php

namespace Itstructure\FieldWidgets;

use yii\helpers\ArrayHelper;

/**
 * Class FieldTypeText
 * Class for printing the form text field.
 *
 * @package Itstructure\FieldWidgets
 */
class FieldTypeText extends FieldType
{
    public function run(): string
    {
        return $this->getField()
            ->textInput(
                ArrayHelper::merge(
                    [
                        'maxlength' => true,
                        'style' => 'width: 50%;'
                    ],
                    $this->getOptions()
                )
            )
            ->label($this->getLabel());
    }
}
