<?php

namespace Itstructure\FieldWidgets;

use yii\helpers\ArrayHelper;

/**
 * Class FieldTypePassword
 * Class for printing the form password field.
 *
 * @package Itstructure\FieldWidgets
 */
class FieldTypePassword extends FieldType
{
    public function run(): string
    {
        return $this->getField()
            ->passwordInput(
                ArrayHelper::merge(
                    [
                        'maxlength' => true
                    ],
                    $this->getOptions()
                )
            )
            ->label($this->getLabel());
    }
}
