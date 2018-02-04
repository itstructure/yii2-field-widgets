<?php

namespace Itstructure\FieldWidgets;

use yii\db\ActiveRecord;
use yii\base\{Widget, InvalidConfigException};
use Itstructure\FieldWidgets\interfaces\LanguageListInterface;

/**
 * Class TableMultilanguage
 * The output widget class for each specified translation list field.
 *
 * @property LanguageListInterface $languageModel
 * @property array $fields
 * @property ActiveRecord $model
 *
 * @package Itstructure\FieldWidgets
 */
class TableMultilanguage extends Widget
{
    /**
     * Language model.
     * For multilanguage mode.
     *
     * @var LanguageListInterface
     */
    private $languageModel;

    /**
     * Field list
     * For each field, you must specify its name: name. Optional parameter: label.
     * To get the value of a field from other parts, you need to specify the path with the combination of entities through the point.
     * Example:
     * fields => [
     *      [
     *          'name' => 'id',
     *          'label' => 'Name',
     *      ],
     *      [
     *          'name' => 'title',
     *          'label' => 'Title',
     *      ],
     *      [
     *          'name' => 'posts.tag',
     *          'label' => 'Post tags',
     *      ]
     * ];
     *
     * @var array
     */
    public $fields = [];

    /**
     * Model for current fields.
     *
     * @var ActiveRecord
     */
    private $model;

    /**
     * Sets the language model.
     *
     * @param mixed $languageModel
     *
     * @return void
     */
    public function setLanguageModel(LanguageListInterface $languageModel): void
    {
        $this->languageModel = $languageModel;
    }

    /**
     * Sets the model of the current fields.
     *
     * @param ActiveRecord $model
     *
     * @return void
     */
    public function setModel(ActiveRecord $model): void
    {
        $this->model = $model;
    }

    /**
     * Starts output for each specified field of the translation list.
     *
     * @throws InvalidConfigException
     *
     * @return string
     */
    public function run(): string
    {
        if (null === $this->languageModel){
            throw new InvalidConfigException('Language model is not defined.');
        }

        return $this->render('tableMultilanguage', [
            'languageModel' => $this->languageModel,
            'fields'        => $this->fields,
            'model'         => $this->model,
        ]);
    }
}