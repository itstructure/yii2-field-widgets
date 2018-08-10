<?php

use yii\base\Model;
use yii\helpers\{ArrayHelper, Html};
use Itstructure\FieldWidgets\helpers\Helper;
use Itstructure\FieldWidgets\TableMultilanguageField;
use Itstructure\FieldWidgets\interfaces\{LanguageListInterface, LanguageFieldInterface};

/** @var LanguageListInterface $languageModel */
/** @var LanguageFieldInterface $language */
/** @var array[] $fields */
/** @var Model $model */
?>

<ul class="nav nav-tabs" id="languages">
    <?php foreach ($languageModel->getLanguageList() as $language): ?>
        <li class="<?php echo Helper::isActiveTab($language) ?>">
            <a href="#<?php echo $language->getShortName() ?>" data-toggle="tab"><?php echo $language->getName() ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php foreach ($languageModel->getLanguageList() as $language): ?>
        <div class="tab-pane <?php echo Helper::isActiveTab($language) ?>" id="<?php echo $language->getShortName() ?>">
            <table class="table table-striped table-bordered">
                <tbody>

                <?php foreach ($fields as $field): ?>
                    <tr>
                        <td>
                            <b><?php echo empty($field['label']) ? $field['name'] : $field['label']; ?></b>
                        </td>
                        <td>

                            <?php if ($field['name'] == 'image'): ?>
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
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    <?php endforeach; ?>
</div>
