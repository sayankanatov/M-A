<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SeoPageRequest as StoreRequest;
use App\Http\Requests\SeoPageUpdateRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SeoPageCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\SeoPage');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/seo_page');
        $this->crud->setEntityNameStrings('SEO страницу', 'SEO страницы');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn('title');

        $this->crud->addField([ //
            'name' => 'title',
            'label' => "Название",
            'type' => 'text',
            'attributes' => ['disabled' => 'disabled']
            
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
        $this->crud->denyAccess(['create', 'delete']);

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
