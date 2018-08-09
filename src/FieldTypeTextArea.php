<?php

namespace Itstructure\FieldWidgets;

use yii\helpers\{ArrayHelper, Html};

/**
 * Class FieldTypeTextArea
 * Class for printing a text block of a form.
 *
 * @package Itstructure\FieldWidgets
 */
class FieldTypeTextArea extends FieldType
{
    /**
     * @return string
     */
    public function run(): string
    {
        return $this->getField()
            ->textarea(
                ArrayHelper::merge(
                    [
                        'rows' => 10,
                        'cols' => 80
                    ],
                    $this->getOptions()
                )
            )
            ->label($this->getLabel());
    }
}
