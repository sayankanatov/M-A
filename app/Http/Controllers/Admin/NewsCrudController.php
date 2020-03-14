<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\NewsRequest as StoreRequest;
use App\Http\Requests\NewsRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Config;
use Illuminate\Support\Str;

/**
 * Class FactCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class NewsCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\News');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/news');
        $this->crud->setEntityNameStrings('', 'новости');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn('title');

        $this->crud->addField([
            'name' => 'title',
            'label' => "Заголовок",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'label' => "Главная картинка",
            'name' => 'image',
            'type' => 'browse',
            'hint' => 'Желательно загружать в папку news во вкладке "Файловый менеджер" '
        ]);

        // $this->crud->addField([  // Select
        //    'label' => "Компания",
        //    'type' => 'select',
        //    'name' => 'company', // the db column for the foreign key
        //    'entity' => 'company', // the method that defines the relationship in your Model
        //    'attribute' => 'name', // foreign key attribute that is shown to user
        //    'model' => "App\Models\Company" // foreign key model
        // ]);

        $this->crud->addField([
            'name' => 'text',
            'label' => "Описание",
            'type' => 'ckeditor'
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // add asterisk for fields that are required in FactRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $cut_name = str_limit($request->input('title'), $limit = 200, $end = '-');
        $alias = Str::slug($cut_name.'-'.rand(1,9999), '-');
        $request->request->set('alias', $alias);

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
