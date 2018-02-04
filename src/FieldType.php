<?php

namespace Itstructure\FieldWidgets;

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\base\{InvalidConfigException, Widget};
use yii\db\ActiveRecord;
use Itstructure\FieldWidgets\interfaces\LanguageFieldInterface;

/**
 * Class FieldType
 * Widget class for outputting the form field depending on the field type.
 *
 * @property string $name
 * @property string $label
 * @property string $type
 * @property string $preset
 * @property bool $ckeditor
 * @property ActiveForm $form
 * @property ActiveRecord $model
 * @property array $data
 * @property array $options
 * @property bool $hide
 * @property LanguageFieldInterface|null $language
 *
 * @package Itstructure\FieldWidgets
 */
class FieldType extends Widget
{
    /**
     * Field type constants.
     *
     * @var string
     */
    const FIELD_TYPE_TEXT = 'text';
    const FIELD_TYPE_TEXT_AREA = 'textarea';
    const FIELD_TYPE_CKEDITOR = 'ckeditor';
    const FIELD_TYPE_CKEDITOR_ADMIN = 'ckeditorAdmin';
    const FIELD_TYPE_FILE = 'file';
    const FIELD_TYPE_CHECKBOX = 'checkbox';
    const FIELD_TYPE_PASSWORD = 'password';
    const FIELD_TYPE_DROPDOWN = 'dropdown';

    /**
     * Field name.
     *
     * @var string
     */
    public $name;

    /**
     * Field label.
     *
     * @var string
     */
    public $label;

    /**
     * Field type, text as default.
     *
     * @var string
     */
    public $type = self::FIELD_TYPE_TEXT;

    /**
     * CKEditor preset.
     *
     * @var string
     */
    public $preset = 'basic';

    /**
     * Form object, in which the field is placed.
     *
     * @var ActiveForm
     */
    public $form;

    /**
     * The model to which the field corresponds.
     *
     * @var ActiveRecord
     */
    public $model;

    /**
     * Data to be inserted in to the field.
     *
     * @var array
     */
    public $data = [];

    /**
     * Field options.
     *
     * @var array
     */
    public $options = [];

    /**
     * Hide field.
     *
     * @var bool
     */
    public $hide = false;

    /**
     * The object of languages.
     * For multilanguage mode.
     *
     * @var LanguageFieldInterface
     */
    protected $language = null;

    /**
     * Set the language model.
     * For multilanguage mode.
     *
     * @param LanguageFieldInterface $language
     *
     * @return void
     */
    public function setLanguage(LanguageFieldInterface $language): void
    {
        $this->language = $language;
    }

    /**
     * Starts the output widget of the required form field, depending on the type of field.
     *
     * @throws InvalidConfigException
     *
     * @return mixed
     */
    public function run()
    {
        if ($this->hide){
            return '';
        }

        switch ($this->type) {
            case self::FIELD_TYPE_TEXT: {
                $instance = $this->getInstance(FieldTypeText::class);
                break;
            }

            case self::FIELD_TYPE_TEXT_AREA: {
                $instance = $this->getInstance(FieldTypeTextArea::class);
                break;
            }

            case self::FIELD_TYPE_CKEDITOR: {
                $instance = $this->getInstance(FieldTypeCKEditor::class);
                break;
            }

            case self::FIELD_TYPE_CKEDITOR_ADMIN: {
                $instance = $this->getInstance(FieldTypeCKEditorAdmin::class);
                break;
            }

            case self::FIELD_TYPE_FILE: {
                $instance = $this->getInstance(FieldTypeFile::class);
                break;
            }

            case self::FIELD_TYPE_DROPDOWN: {
                $instance = $this->getInstance(FieldTypeDropdown::class);
                break;
            }

            case self::FIELD_TYPE_CHECKBOX: {
                $instance = $this->getInstance(FieldTypeCheckbox::class);
                break;
            }

            case self::FIELD_TYPE_PASSWORD: {
                $instance = $this->getInstance(FieldTypePassword::class);
                break;
            }

            default: {
                throw new InvalidConfigException('Unknown type of field');
            }
        }

        return $instance->run();
    }

    /**
     * Data to be inserted in to the field.
     *
     * @param array $data
     *
     * @return void
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * Set field options.
     *
     * @param array $options
     *
     * @return void
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Data to be inserted in to the field.
     *
     * @return array
     */
    protected function getData(): array
    {
        return $this->data;
    }

    /**
     * Get field options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Creates an object from the class of the selected field widget.
     *
     * @return object
     */
    protected function getInstance(string $className)
    {
        $config = [
            'class'   => $className,
            'name'    => $this->name,
            'form'    => $this->form,
            'model'   => $this->model,
            'label'   => $this->label,
            'data'    => $this->data,
            'options' => $this->options,
            'preset'  => $this->preset,
        ];

        if ($this->language !== null){
            $config['language'] = $this->language;
        }

        return \Yii::createObject($config);
    }

    /**
     * Returns the form field object.
     *
     * @return mixed
     */
    protected function getField()
    {
        return $this->form->field($this->model, $this->getFieldName());
    }

    /**
     * Returns the label of the field.
     *
     * @return string
     */
    protected function getLabel(): string
    {
        if ($this->label != null) {
            return $this->label;
        }

        if (isset($this->model->attributeLabels()[$this->name])) {
            return $this->model->attributeLabels()[$this->name];
        }

        return ucfirst($this->name);
    }

    /**
     * Returns the name of the field tag with the language.
     *
     * @return string
     */
    protected function getFieldName(): string
    {
        if ($this->language === null){
            return $this->name;
        }

        return $this->name . '_' . strtolower($this->language->getShortName());
    }

    /**
     * Returns ID of the field.
     *
     * @return string
     */
    protected function getFieldId()
    {
        return Html::getInputId($this->model, $this->getFieldName());
    }
}
