<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PageRequest as StoreRequest;
use App\Http\Requests\PageRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class MainPageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PageCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Page');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/page');
        $this->crud->setEntityNameStrings('страницу', 'Страницы');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn('title_ru');
        $this->crud->addField([ //
            'label' => "Машинное имя",
            'name' => 'alias',
            'type' => 'text',
            'hint' => 'Вводить латинскими буквами, будет отображаться в адресной строке'
        ]);

        $this->crud->addField([ // base64_image
            'name' => 'title_ru',
            'label' => "Заголовок RU",
            'type' => 'text',
            'hint' => 'Название страницы на русском языке'
        ]);
        $this->crud->addField([ // base64_image
            'name' => 'title_en',
            'label' => "Заголовок ENG",
            'type' => 'text',
            'hint' => 'Название страницы на английском языке'
        ]);
        $this->crud->addField([ // base64_image
            'name' => 'title_kz',
            'label' => "Заголовок KZ",
            'type' => 'text',
            'hint' => 'Название страницы на казахском языке'
        ]);

        $this->crud->addField([ // base64_image
            'name' => 'text_ru',
            'label' => "Текст RU",
            'type' => 'ckeditor',
            'hint' => 'Описание страницы на русском языке'
        ]);
        $this->crud->addField([ // base64_image
            'name' => 'text_en',
            'label' => "Текст ENG",
            'type' => 'ckeditor',
            'hint' => 'Описание страницы на английском языке'
        ]);
        $this->crud->addField([ // base64_image
            'name' => 'text_kz',
            'label' => "Текст KZ",
            'type' => 'ckeditor',
            'hint' => 'Описание страницы на казахском языке'
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        // $this->crud->denyAccess(['create', 'delete']);

        // add asterisk for fields that are required in MainPageRequest
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
