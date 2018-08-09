<?php

namespace Itstructure\FieldWidgets;

use yii\helpers\ArrayHelper;

/**
 * Class FieldTypeCheckbox
 * Class for printing the form checkbox field.
 *
 * @package Itstructure\FieldWidgets
 */
class FieldTypeCheckbox extends FieldType
{
    /**
     * @return string
     */
    public function run(): string
    {
        return $this->getField()
            ->checkboxList(
                $this->getData(),
                ArrayHelper::merge(
                    [
                        'separator' => '<br />'
                    ],
                    $this->getOptions()
                )
            )
            ->label($this->getLabel());
    }
}
