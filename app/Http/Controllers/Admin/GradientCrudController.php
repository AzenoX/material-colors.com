<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GradientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GradientCrudController
 *
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GradientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Gradient::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/gradient');
        CRUD::setEntityNameStrings('gradient', 'gradients');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     *
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('user_id');
        CRUD::column('gradient_name');
        CRUD::column('colors');
        CRUD::column('angle');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     *
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(GradientRequest::class);

        CRUD::addField([
            'name' => 'user_id',
            'type' => 'number',
            'default' => 23,
        ]);
        CRUD::field('gradient_name');
        CRUD::addField([
            'name' => 'colors',
            'type' => 'text',
            'default' => '{"0": "ffffff","50": "f0f0f0","100": "000000"}',
        ]);

        // Create PR to add indicator
        CRUD::addField([
            'name' => 'angle',
            'type' => 'number',
            'default' => 90,
            'attributes' => [
                'min' => 0,
                'max' => 360,
            ],
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     *
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
