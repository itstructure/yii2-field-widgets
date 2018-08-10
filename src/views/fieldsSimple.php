<?php

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use Itstructure\FieldWidgets\FieldType;

/** @var array[] $fields */
/** @var Model $model */
/** @var ActiveForm $form */
?>

<div>
    <?php foreach ($fields as $field): ?>

        <?php if (empty($field)) {
            continue;
        } ?>

        <?php echo FieldType::widget(ArrayHelper::merge($field, [
            'model' => $model,
            'form' => $form,
        ])) ?>

    <?php endforeach; ?>
</div>
