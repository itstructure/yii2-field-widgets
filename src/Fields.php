<?php

namespace Itstructure\FieldWidgets;

use Itstructure\FieldWidgets\interfaces\LanguageListInterface;
use yii\base\{Widget, Model};
use yii\widgets\ActiveForm;

/**
 * Class Fields
 * Widget class for displaying a list of form fields with given types.
 *
 * @property array $fields
 * @property LanguageListInterface|null $languageModel
 * @property Model $model
 * @property ActiveForm $form
 *
 * @package Itstructure\FieldWidgets
 */
class Fields extends Widget
{
    /**
     * List of form fields.
     * You must set the following parameters for each field:: name, type.
     * name (string) - field name, example: title, description.
     * type (string) - field type, may be: text, textarea, ckeditor, 'ckeditorAdmin', file, checkbox, dropdown,
     * password.
     * Optional:
     * label (string) - field label.
     * data (array) - data to be inserted in to the field.
     * options (array) - field options.
     * hide (bool) - to switch off the field. Default false.
     * Example:
     * $fields = [
     *      [
     *          'name' => 'title',
     *          'type' => 'text'
     *      ],
     *      [
     *          'name' => 'description',
     *          'type' => 'ckeditor',
     *          'label' => 'Description',
     *          'preset' => 'custom',
     *          'options' => [
     *              'toolbarGroups' => [
     *                  [
     *                      'name' => 'undo'
     *                  ],
     *                  [
     *                      'name' => 'basicstyles',
     *                      'groups' => ['basicstyles', 'cleanup']
     *                  ],
     *                  [
     *                      'name' => 'colors'
     *                  ],
     *                  [
     *                      'name' => 'links',
     *                      'groups' => ['links', 'insert']
     *                  ],
     *                  [
     *                      'name' => 'others',
     *                      'groups' => ['others', 'about']
     *                  ],
     *                  ],
     *              'filebrowserBrowseUrl' => '/ckfinder/ckfinder.html',
     *              'filebrowserImageBrowseUrl' => '/ckfinder/ckfinder.html?type=Images',
     *              'filebrowserUploadUrl' => '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
     *              'filebrowserImageUploadUrl' => '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
     *              'filebrowserWindowWidth' => '1000',
     *              'filebrowserWindowHeight' => '700',
     *          ]
     *      ],
     *      [
     *          'name' => 'roles',
     *          'type' => 'checkbox',
     *          'label' => 'Roles',
     *          'data' => ArrayHelper::map($roles, 'name', 'name'),
     *          'options' => ['style' => 'width: 50%;'],
     *      ],
     * ];
     *
     * @var array
     */
    public $fields = [];

    /**
     * Language model.
     * For multilanguage mode.
     *
     * @var LanguageListInterface
     */
    private $languageModel = null;

    /**
     * Model with fields.
     *
     * @var Model
     */
    private $model;

    /**
     * Form object.
     *
     * @var ActiveForm
     */
    private $form;

    /**
     * Set the language model.
     * For multilanguage mode.
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
     * Set model.
     *
     * @param Model $model
     *
     * @return void
     */
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    /**
     * Set form.
     *
     * @param mixed $form
     *
     * @return void
     */
    public function setForm(ActiveForm $form): void
    {
        $this->form = $form;
    }

    /**
     * Starts the output widget of the form fields list with the specified types.
     *
     * @return string
     */
    public function run(): string
    {
        $params = [
            'fields' => $this->fields,
            'model'  => $this->model,
            'form'   => $this->form,
        ];

        if ($this->languageModel === null){
            $template = 'fieldsSimple';
        } else {
            $template = 'fieldsMultilanguage';
            $params['languageModel'] = $this->languageModel;
        }

        return $this->render($template, $params);
    }
}
