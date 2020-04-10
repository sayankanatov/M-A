<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TopCompanyRequest as StoreRequest;
use App\Http\Requests\TopCompanyRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Config;
use Alert;
use App\Models\TopCompany;

/**
 * Class MainPageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TopCompanyCrudController extends CrudController
{
    private $error_place = "Это место уже занято";
    private $error_company = "Эта компания уже используется";
    private $redirect = "admin/top-company";

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\TopCompany');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/top-company');
        $this->crud->setEntityNameStrings('', 'Компании');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn([
            'label' => 'Компании',
            'type' => 'select',
            'name' => 'company_id',
            'entity' => 'top',
            'attribute' => 'name',
            'model' => "App\Models\Company"
        ]);

        $this->crud->addColumn('place');

        $this->crud->addField([   // select_from_array
            'name' => 'place',
            'label' => "Место в сортировке",
            'type' => 'select_from_array',
            'options' => Config::get('constants.top'),
            'allows_null' => false
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);

        $this->crud->addField([
            'label' => "Компании",
            'name' => "company_id",
            'type' => 'select',
            'entity' => 'top',
            'attribute' => 'name',
            'model' => 'App\Models\Company'
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
        $place = $request->input('place');
        $company = $request->input('company_id');
        $exist = TopCompany::where('place',$place)->count();
        $existCompany = TopCompany::where('company_id',$company)->count();
        if($exist > 0) 
            return redirect($this->redirect)->with([Alert::error($this->error_place)->flash()]);
        elseif ($existCompany > 0) 
            return redirect($this->redirect)->with([Alert::error($this->error_company)->flash()]);

        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $id = $request->input('id');
        $place = $request->input('place');
        $company = $request->input('company_id');
        $exist = TopCompany::where('place',$place)->where('id','!=',$id)->count();
        $existCompany = TopCompany::where('company_id',$company)->where('id','!=',$id)->count();
        if($exist > 0) 
            return redirect($this->redirect)->with([Alert::error($this->error_place)->flash()]);
        elseif ($existCompany > 0) 
            return redirect($this->redirect)->with([Alert::error($this->error_company)->flash()]);

        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
