<?php

use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;
use Itstructure\FieldWidgets\FieldType;
use Itstructure\FieldWidgets\interfaces\{LanguageListInterface, LanguageFieldInterface};

/** @var LanguageListInterface|ActiveRecord $languageModel */
/** @var LanguageFieldInterface|ActiveRecord $language */
/** @var array[] $fields */
/** @var ActiveRecord $model */
/** @var ActiveForm $form */

function isActive(LanguageFieldInterface $language)
{
    return $language->getDefault() == 1 ? 'active' : '';
}
?>

<ul class="nav nav-tabs" id="languages">
    <?php foreach ($languageModel->getLanguageList() as $language): ?>
        <li class="<?php echo isActive($language) ?>">
            <a href="#<?php echo $language->getShortName() ?>" data-toggle="tab"><?php echo $language->getName() ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<div class="tab-content">
    <?php foreach ($languageModel->getLanguageList() as $language): ?>
        <div class="tab-pane <?php echo isActive($language) ?>" id="<?php echo $language->getShortName() ?>">

            <?php foreach ($fields as $field): ?>

                <?php if (null === $field || empty($field)){continue;} ?>

                <?php echo FieldType::widget(ArrayHelper::merge($field, [
                    'model' => $model,
                    'form' => $form,
                    'language' => $language,
                ])) ?>

            <?php endforeach; ?>

        </div>
    <?php endforeach; ?>
</div>
