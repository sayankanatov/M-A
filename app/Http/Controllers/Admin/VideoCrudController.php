<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\VideoRequest as StoreRequest;
use App\Http\Requests\VideoRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class VideoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class VideoCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Video');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/video');
        $this->crud->setEntityNameStrings('sidebar', 'SideBar');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn('alias');

        $this->crud->addField([ //
            'name' => 'image',
            'label' => "Картинка для анонсирового ролика",
            'type' => 'browse',
            'hint' => 'Желательно загружать в папку videos во вкладке "Файловый менеджер" '
        ]);

        $this->crud->addField([ //
            'name' => 'alias',
            'label' => "Ссылка на анонсированный ролик",
            'type' => 'text',
            'hint' => 'Внешнняя ссылка, например https://youtube.com/test'

        ]);

        $this->crud->addField([ //
            'name' => 'instagram',
            'label' => "Код Instagram поста",
            'type' => 'textarea',
            'hint' => 'Вставьте код'

        ]);

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        $this->crud->denyAccess(['create', 'delete']);

        // add asterisk for fields that are required in VideoRequest
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
