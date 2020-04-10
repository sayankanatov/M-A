<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UserStoreRequest as StoreRequest;
use App\Http\Requests\UserUpdateRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CommentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\BackpackUser');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/user');
        $this->crud->setEntityNameStrings('пользователя', 'пользователи');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn('name');

        $this->crud->addField([ //
            'name' => 'name',
            'label' => "Логин",
            'type' => 'text'
        ]);

        $this->crud->addField([ //
            'name' => 'email',
            'label' => "Электронная почта",
            'type' => 'text'
        ]);

        $this->crud->addField([ //
            'name' => 'password',
            'label' => "Пароль",
            'type' => 'password'
        ]);

        $this->crud->addField([ //
            'name' => 'password_confirmation',
            'label' => "Пароль",
            'type' => 'password'
        ]);

        $this->crud->addField([  // Select
           'label' => "Выберите роль",
           'type' => 'select',
           'name' => 'role_id', // the db column for the foreign key
           'entity' => 'role', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\Role" // foreign key model
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
        $request->request->set('password', bcrypt($request->input('password')));

        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $request->request->set('password', bcrypt($request->input('password')));

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
