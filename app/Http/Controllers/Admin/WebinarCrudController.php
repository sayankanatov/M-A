<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\WebinarRequest as StoreRequest;
use App\Http\Requests\WebinarRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class WebinarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class WebinarCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Webinar');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/webinar');
        $this->crud->setEntityNameStrings('вебинар', 'Вебинары');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn('theme_title');

        $this->crud->addField([ //
            'name' => 'theme_title',
            'label' => "Название темы вебинара",
            'type' => 'text',
            'hint' => ''
        ]);
        $this->crud->addField([ //
            'name' => 'theme_image',
            'label' => "Фотография темы вебинара",
            'type' => 'browse',
            'hint' => 'Желательно загружать в папку webinars во вкладке "Файловый менеджер" '
        ]);

        $this->crud->addField([ //
            'name' => 'title_1',
            'label' => "Название",
            'type' => 'text',
            'hint' => 'Название первого видео вебинара'
        ]);
        $this->crud->addField([ //
            'name' => 'alias_1',
            'label' => 'Внешняя ссылка',
            'type' => 'text',
            'hint' => 'Ссылка на первое видео вебинара, например https://youtube.com/test'
        ]);
        $this->crud->addField([ //
            'name' => 'image_1',
            'label' => 'Вступительное фото',
            'type' => 'browse',
            'hint' => 'Вступительное фото первого видео вебинара, желательно загружать в папку webinars во вкладке "Файловый менеджер" '
        ]);

        $this->crud->addField([ //
            'name' => 'title_2',
            'label' => "Название",
            'type' => 'text',
            'hint' => 'Название второго видео вебинара'
        ]);
        $this->crud->addField([ //
            'name' => 'alias_2',
            'label' => 'Внешняя ссылка',
            'type' => 'text',
            'hint' => 'Ссылка на второе видео вебинара, например https://youtube.com/test'
        ]);
        $this->crud->addField([ //
            'name' => 'image_2',
            'label' => 'Вступительное фото',
            'type' => 'browse',
            'hint' => 'Вступительное фото второго видео вебинара, желательно загружать в папку webinars во вкладке "Файловый менеджер" '
        ]);

        $this->crud->addField([ //
            'name' => 'title_3',
            'label' => "Название",
            'type' => 'text',
            'hint' => 'Название третьего видео вебинара'
        ]);
        $this->crud->addField([ //
            'name' => 'alias_3',
            'label' => 'Внешняя ссылка',
            'type' => 'text',
            'hint' => 'Ссылка на третье видео вебинара, например https://youtube.com/test'
        ]);
        $this->crud->addField([ //
            'name' => 'image_3',
            'label' => 'Вступительное фото',
            'type' => 'browse',
            'hint' => 'Вступительное фото третьего видео вебинара, желательно загружать в папку webinars во вкладке "Файловый менеджер" '
        ]);

        $this->crud->addField([ //
            'name' => 'title_4',
            'label' => "Название",
            'type' => 'text',
            'hint' => 'Название четвертого видео вебинара'
        ]);
        $this->crud->addField([ //
            'name' => 'alias_4',
            'label' => 'Внешняя ссылка',
            'type' => 'text',
            'hint' => 'Ссылка на четвертое видео вебинара, например https://youtube.com/test'
        ]);
        $this->crud->addField([ //
            'name' => 'image_4',
            'label' => 'Вступительное фото',
            'type' => 'browse',
            'hint' => 'Вступительное фото четвертого видео вебинара, желательно загружать в папку webinars во вкладке "Файловый менеджер" '
        ]);

        $this->crud->addField([ //
            'label' => "Дата вебинара",
            'name' => 'date',
            'type' => 'date_picker',
            'hint' => 'формат даты 2019-12-31',
            'date_picker_options' => [
                'todayBtn' => true,
                'format' => 'yyyy-mm-dd',
                'language' => 'ru'
            ],
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // add asterisk for fields that are required in WebinarRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
