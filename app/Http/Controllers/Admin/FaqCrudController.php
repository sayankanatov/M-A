<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\FaqRequest as StoreRequest;
use App\Http\Requests\FaqRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class FaqCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Faq');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/faq');
        $this->crud->setEntityNameStrings('вопрос', 'вопросы');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn('question_ru');

        $this->crud->addField([ // base64_image
            'name' => 'question_ru',
            'label' => "Вопрос RU",
            'type' => 'text',
        ]);
        $this->crud->addField([ // base64_image
            'name' => 'question_kz',
            'label' => "Вопрос KZ",
            'type' => 'text',
        ]);

        $this->crud->addField([ // base64_image
            'name' => 'answer_ru',
            'label' => "Ответ RU",
            'type' => 'ckeditor',
        ]);
        $this->crud->addField([ // base64_image
            'name' => 'answer_kz',
            'label' => "Ответ KZ",
            'type' => 'ckeditor',
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
