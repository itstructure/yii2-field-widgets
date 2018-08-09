<?php

use yii\base\Model;
use yii\helpers\{ArrayHelper, Html};
use Itstructure\FieldWidgets\TableMultilanguageField;
use Itstructure\FieldWidgets\interfaces\LanguageListInterface;

/** @var LanguageListInterface $languageModel */
/** @var array[] $fields */
/** @var Model $model */

?>

<table class="table table-striped table-bordered">
<tbody>
    <tr>
        <td><b></b></td>
        <?php foreach ($languageModel->getLanguageList() as $language): ?>
            <td><b><?php echo $language->getName() ?></b></td>
        <?php endforeach; ?>
    </tr>

    <?php foreach ($fields as $field): ?>
    <tr>

        <td>
            <b><?php echo empty($field['label']) ? $field['name'] : $field['label']; ?></b>
        </td>

        <?php foreach ($languageModel->getLanguageList() as $language): ?>
        <td>
            <?php if ($field['name']== 'image'): ?>
                <?php echo  Html::img(TableMultilanguageField::widget(
                                ArrayHelper::merge($field,
                                    [
                                        'model'    => $model,
                                        'language' => $language,
                                    ]
                                )
                            )
                        ); ?>

            <?php else: ?>
                <?php echo TableMultilanguageField::widget(
                                ArrayHelper::merge($field,
                                    [
                                        'model'    => $model,
                                        'language' => $language,
                                    ]
                                )
                            ) ?>
            <?php endif; ?>
        </td>
        <?php endforeach; ?>

    </tr>
    <?php endforeach; ?>

</tbody>
</table>
