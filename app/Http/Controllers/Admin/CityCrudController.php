<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CityRequest as StoreRequest;
use App\Http\Requests\CityRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CityCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\City');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/city');
        $this->crud->setEntityNameStrings('город', 'города');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn('name_ru');

        $this->crud->addField([ //
            'name' => 'name_ru',
            'label' => "Название на русском",
            'type' => 'text'
        ]);
        $this->crud->addField([ //
            'name' => 'name_kz',
            'label' => "Название на казахском",
            'type' => 'text'
        ]);

        $this->crud->addField([ //
            'name' => 'prepositional_ru',
            'label' => "Название на русском в предложенном падеже",
            'type' => 'text',
            'hint' => 'Например: Астане'
        ]);

        $this->crud->addField([ //
            'name' => 'prepositional_kz',
            'label' => "Название на казахском в предложенном падеже",
            'type' => 'text',
            'hint' => 'Мысалы: Астанада'
        ]);

        $this->crud->addField([ //
            'name' => "alias",
            'label' => "URL города",
            'type' => 'text',
            'hint' => 'Будет отображаться в адресной строке, писать латинскими и маленькими буквами'
        ]);

        $this->crud->addField([ //
            'name' => "h_one",
            'label' => "H1",
            'type' => 'text'
        ]);

        $this->crud->addField([ //
            'name' => "seo_title",
            'label' => "SEO Title",
            'type' => 'text',
            'hint' => '70 символов максимум'
        ]);

        $this->crud->addField([ //
            'name' => "seo_desc",
            'label' => "SEO Description",
            'type' => 'textarea',
            'hint' => '150 символов максимум'
        ]);

        $this->crud->addField([ //
            'name' => "seo_keywords",
            'label' => "SEO Keywords",
            'type' => 'text'
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        // $this->crud->denyAccess(['create', 'delete']);

        // add asterisk for fields that are required in CommentRequest
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

    public function show($id)
    {
        return parent::show($this->request->id);
    }
}
