Yii2 Field widgets
==============

1 Introduction
----------------------------

[![Latest Stable Version](https://poser.pugx.org/itstructure/yii2-field-widgets/v/stable)](https://packagist.org/packages/itstructure/yii2-field-widgets)
[![Latest Unstable Version](https://poser.pugx.org/itstructure/yii2-field-widgets/v/unstable)](https://packagist.org/packages/itstructure/yii2-field-widgets)
[![License](https://poser.pugx.org/itstructure/yii2-field-widgets/license)](https://packagist.org/packages/itstructure/yii2-field-widgets)
[![Total Downloads](https://poser.pugx.org/itstructure/yii2-field-widgets/downloads)](https://packagist.org/packages/itstructure/yii2-field-widgets)
[![Build Status](https://scrutinizer-ci.com/g/itstructure/yii2-field-widgets/badges/build.png?b=master)](https://scrutinizer-ci.com/g/itstructure/yii2-field-widgets/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/itstructure/yii2-field-widgets/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/itstructure/yii2-field-widgets/?branch=master)

This is form field's widgets for the yii2 framework with the next field types:

- text
- textarea
- ckeditor
- ckeditorAdmin
- file
- checkbox
- dropdown
- password

2 Dependencies
----------------------------

- php >= 7.1
- composer

3 Installation
----------------------------

### 3.1 Base install

Via composer:

```composer require "itstructure/yii2-field-widgets": "^1.2.2"```

or in section **require** of composer.json file set the following:
```
"require": {
    "itstructure/yii2-field-widgets": "^1.2.2"
}
```
and command ```composer install```, if you install yii2 project extensions first,

or command ```composer update```, if all yii2 project extensions are already installed.

### 3.2 If you are testing this package from local server directory

In application ```composer.json``` file set the repository, like in example:

```
"repositories": [
    {
        "type": "path",
        "url": "../yii2-field-widgets",
        "options": {
            "symlink": true
        }
    }
],
```

Here,

**yii2-field-widgets** - directory name, which has the same directory level like application and contains yii2 field widgets package.

Then run command:

```composer require itstructure/yii2-field-widgets:dev-master --prefer-source```

4 Usage
----------------------------

### 4.1 Requirements

That widgets are designed to work in form with an active **model**, which is inherited from 
yii\db\ActiveRecord.

### 4.2 Single mode

To use this mode, don't set ```languageModel```. That will be **null**.

### 4.3 Multilanguage mode

All fields will be with a language postfix:

**title_en**

**description_en**

**title_ru**

**description_ru**, e t. c.

For this mode it's necessary to have Language model with some of languages records.

Example:

```php
$form = ActiveForm::begin();
```

```php
echo Fields::widget([
    'fields' => [
        [
            'name' => 'title',
            'type' => FieldType::FIELD_TYPE_TEXT,
        ],
        [
            'name' => 'description',
            'type' => FieldType::FIELD_TYPE_CKEDITOR_ADMIN,
            'preset' => 'full',
            'options' => [
                'filebrowserBrowseUrl' => '/ckfinder/ckfinder.html',
                'filebrowserImageBrowseUrl' => '/ckfinder/ckfinder.html?type=Images',
                'filebrowserUploadUrl' => '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                'filebrowserImageUploadUrl' => '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                'filebrowserWindowWidth' => '1000',
                'filebrowserWindowHeight' => '700',
            ]
        ],
    ],
    'model'         => $model,
    'form'          => $form,
    'languageModel' => new Language()
]) ?>
```

```php
echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
```

```php
ActiveForm::end();
```

License
----------------------------

Copyright © 2018 Andrey Girnik girnikandrey@gmail.com.

Licensed under the [MIT license](http://opensource.org/licenses/MIT). See LICENSE.txt for details.
