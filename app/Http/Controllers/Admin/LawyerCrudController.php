<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LawyerRequest as StoreRequest;
use App\Http\Requests\LawyerRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Config;
use Illuminate\Support\Str;

/**
 * Class FactCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class LawyerCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Lawyer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/lawyer');
        $this->crud->setEntityNameStrings('юриста', 'юристы');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn('last_name');
        $this->crud->addColumn('first_name');

        $this->crud->addField([
            'name' => 'last_name',
            'label' => "Фамилия",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'first_name',
            'label' => "Имя",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'patronymic',
            'label' => "Отчество",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'label' => "Фотография",
            'name' => 'image',
            'type' => 'browse',
            'hint' => 'Желательно загружать в папку lawyers во вкладке "Файловый менеджер" '
        ]);

        $this->crud->addField([  // Select
           'label' => "Компания",
           'type' => 'select',
           'name' => 'company', // the db column for the foreign key
           'entity' => 'company', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\Company" // foreign key model
        ]);

        $this->crud->addField([
            'name' => 'telephone',
            'label' => "Телефон",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'extra_telephone',
            'label' => "Дополнительный телефон",
            'type' => 'text',
            'hint' => 'Поле необязательно для заполнения',
        ]);

        $this->crud->addField([
            'name' => 'email',
            'label' => "Электронная почта",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'link',
            'label' => "Ссылка",
            'type' => 'text',
            'hint' => 'Внешнняя ссылка на сайт или instagram, например https://instagram.com/test'
        ]);

        $this->crud->addField([  // Select
           'label' => "Город",
           'type' => 'select',
           'name' => 'city_id', // the db column for the foreign key
           'entity' => 'city', // the method that defines the relationship in your Model
           'attribute' => 'name_ru', // foreign key attribute that is shown to user
           'model' => "App\Models\City" // foreign key model
        ]);

        $this->crud->addField([
            'name' => 'address',
            'label' => "Адрес",
            'type' => 'text'
        ]);

        $this->crud->addField([   // Checkbox
            'name' => 'monday',
            'label' => 'Понедельник',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([   // Checkbox
            'name' => 'tuesday',
            'label' => 'Вторник',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([   // Checkbox
            'name' => 'wednesday',
            'label' => 'Среда',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([   // Checkbox
            'name' => 'thursday',
            'label' => 'Четверг',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([   // Checkbox
            'name' => 'friday',
            'label' => 'Пятница',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([   // Checkbox
            'name' => 'saturday',
            'label' => 'Суббота',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([   // Checkbox
            'name' => 'sunday',
            'label' => 'Воскресенье',
            'type' => 'checkbox'
        ]);

        $this->crud->addField([
            'name' => 'timetext',
            'label' => "Время работы",
            'type' => 'text',
            'hint' => 'Текстовое поле для описания режима работы, поле не обязательное для заполнения',
        ]);

        $this->crud->addField([
            'name' => 'education',
            'label' => "Образование",
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'name' => 'extra',
            'label' => "Дополнительная информация",
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'name' => 'advokat_licence',
            'label' => "Адвокатская лицензия",
            'type' => 'textarea',
            'hint' => 'Подсказка: №___________от "__" ______20__ '
        ]);

        $this->crud->addField([
            'name'        => 'langs', // the name of the db column
            'label'       => 'Языки', // the input label
            'type'        => 'radio',
            'options'     => Config::get('constants.langs'),
            // optional
            //'inline'      => false, // show the radios all on the same line?
        ]);

        $this->crud->addField([
            'name' => 'work_experience',
            'label' => "Стаж работы",
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'practice',
            'label' => "Опыт работы",
            'type' => 'textarea'
        ]);

        $this->crud->addField([
            'name'        => 'work_for', // the name of the db column
            'label'       => 'Оказания услуг для', // the input label
            'type'        => 'radio',
            'options'     => Config::get('constants.work_for'),
            // optional
            //'inline'      => false, // show the radios all on the same line?
        ]);

        $this->crud->addField([
            'label'     => 'Услуги',
            'type'      => 'checklist',
            'name'      => 'services',
            'entity'    => 'services',
            'attribute' => 'name_ru',
            'model'     => "App\Models\Service",
            'pivot'     => true,
        ]);

        $this->crud->addField([
            'name'        => 'is_free', // the name of the db column
            'label'       => 'Предоставляете ли Вы юридическую помощь на бесплатной основе', // the input label
            'type'        => 'radio',
            'options'     => Config::get('constants.is_free'),
            // optional
            'inline'      => true, // show the radios all on the same line?
        ]);

        $this->crud->addField([
            'name'        => 'is_member', // the name of the db column
            'label'       => 'Являетесь ли Вы (фирма) членом каких либо ассоциаций (союзов, объединений) юридических фирм, в том числе международных', // the input label
            'type'        => 'radio',
            'options'     => Config::get('constants.is_member'),
            // optional
            'inline'      => true, // show the radios all on the same line?
        ]);

        $this->crud->addField([
            'name' => 'member_title',
            'label' => "Ассоциации (союзы, объединения) юридические фирмы",
            'type' => 'text',
            'hint' => 'Если да, то перечислите их',
        ]);

        $this->crud->addField([
            'name'        => 'price',
            'label'       => 'Стоимость услуг',
            'type'        => 'text'
        ]);

        $this->crud->addField([  // Select
           'label' => "Пользователь",
           'type' => 'select',
           'name' => 'user_id', // the db column for the foreign key
           'entity' => 'user', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\User" // foreign key model
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

        // add asterisk for fields that are required in FactRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $cut_name = str_limit($request->input('last_name').'-'.$request->input('first_name').'-'.$request->input('patronymic'), $limit = 200, $end = '-');
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
