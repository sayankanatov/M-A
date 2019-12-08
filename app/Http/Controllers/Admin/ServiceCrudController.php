<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ServiceRequest as StoreRequest;
use App\Http\Requests\ServiceRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ContactCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ServiceCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Service');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service');
        $this->crud->setEntityNameStrings('услугу', 'услуги');

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

        // $this->crud->addField([
        //     'label' => "Выберите категорию",
        //     'type' => 'select',
        //     'name' => 'category_id', // the db column for the foreign key
        //     'entity' => 'categories', // the method that defines the relationship in your Model
        //     'attribute' => 'name_ru', // foreign key attribute that is shown to user
        //     'model' => "App\Models\ServiceCategory" // foreign key model
        // ]);

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
        $this->crud->setFromDb();
        // $this->crud->denyAccess(['create', 'delete']);

        // add asterisk for fields that are required in ContactRequest
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
