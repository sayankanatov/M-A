<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ServiceCategoryRequest as StoreRequest;
use App\Http\Requests\ServiceCategoryRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Illuminate\Support\Str;

/**
 * Class ContactCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ServiceCategoryCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ServiceCategory');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service_category');
        $this->crud->setEntityNameStrings('категорию', 'категории');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addField([
            'label' => "Название услуги на русском",
            'name' => 'name_ru',
            'type' => 'text'
        ]);
        $this->crud->addField([
            'label' => "Название услуги на казахском",
            'name' => 'name_kz',
            'type' => 'text'
        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();
        // $this->crud->denyAccess(['create', 'delete']);

        // add asterisk for fields that are required in ContactRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $cut_name = str_limit($request->input('name'), $limit = 200, $end = '-');
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
