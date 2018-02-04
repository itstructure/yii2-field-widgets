<?php

use yii\helpers\ArrayHelper;
use Itstructure\FieldWidgets\FieldType;

/** @var array[] $fields */
/** @var \yii\db\ActiveRecord $model */
/** @var \yii\widgets\ActiveForm $form */
?>


<div>
    <?php foreach ($fields as $field): ?>

        <?php if (null === $field || empty($field)){continue;} ?>

        <?php echo FieldType::widget(ArrayHelper::merge($field, [
            'model' => $model,
            'form' => $form,
        ])) ?>

    <?php endforeach; ?>
</div>