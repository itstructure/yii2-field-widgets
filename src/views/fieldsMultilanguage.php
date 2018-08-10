<?php

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use Itstructure\FieldWidgets\helpers\Helper;
use Itstructure\FieldWidgets\FieldType;
use Itstructure\FieldWidgets\interfaces\{LanguageListInterface, LanguageFieldInterface};

/** @var LanguageListInterface $languageModel */
/** @var LanguageFieldInterface $language */
/** @var array[] $fields */
/** @var Model $model */
/** @var ActiveForm $form */
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

            <?php foreach ($fields as $field): ?>

                <?php if (empty($field)) {
                    continue;
                } ?>

                <?php echo FieldType::widget(ArrayHelper::merge($field, [
                    'model' => $model,
                    'form' => $form,
                    'language' => $language,
                ])) ?>

            <?php endforeach; ?>

        </div>
    <?php endforeach; ?>
</div>
