<?php

namespace Itstructure\FieldWidgets;

use yii\base\{Widget, InvalidConfigException};
use yii\db\ActiveRecord;
use Itstructure\FieldWidgets\interfaces\LanguageFieldInterface;

/**
 * Class TableMultilanguageField
 * The Widget class of the translation output for specified field.
 *
 * @property string $name
 * @property string $label
 * @property ActiveRecord $model
 * @property LanguageFieldInterface $language
 * @property string $default
 *
 * @package Itstructure\FieldWidgets
 */
class TableMultilanguageField extends Widget
{
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
     * The model of the current field.
     *
     * @var ActiveRecord
     */
    public $model;

    /**
     * Model of languages.
     *
     * @var LanguageFieldInterface
     */
    protected $language;

    /**
     * The value of the empty field is the default.
     *
     * @var string
     */
    public $default = '-';

    /**
     * Set the language model.
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
     * Returns the translation of the field.
     *
     * @throws InvalidConfigException
     *
     * @return string
     */
    public function run(): string
    {
        if (null === $this->language){
            throw  new InvalidConfigException('Language model is not defined.');
        }

        if (strpos($this->name, '.') !== false){

            $out = $this->getDataByPath($this->name);

        } else {
            $out = $this->model->{$this->name.'_'.$this->language->getShortName()};
        }

        return empty($out) ? $this->default : $out;
    }

    /**
     * Obtaining a field translation of another model along a given path through a series
     * of entities, separated by a point.
     *
     * @param $name string, separated by dot.
     *
     * @return string
     */
    private function getDataByPath($name): string
    {
        $namePath = explode('.', $name);
        $out = $this->model;

        for ($i=0; $i < count($namePath); $i++){

            $out = $i+1 < count($namePath) ? $out->{$namePath[$i]} : $out->{$namePath[$i].'_'.$this->language->getShortName()};

            if (is_array($out)) {
                for ($j=0; $j < count($out); $j++) {
                    $out[$j] = $out[$j]->{$namePath[$i+1].'_'.$this->language->getShortName()};
                }
                $out = implode(', ', $out);
                break;
            }
        }
        return trim($out, ', ');
    }
}
