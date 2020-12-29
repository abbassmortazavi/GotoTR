<?php
$moduleName = "Business";

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    */

    'path' => [

        'migration'         => base_path() .  "/Modules/" .$moduleName . "/" . 'Database/Migrations/',

        'model'             => base_path() .  "/Modules/" .$moduleName . "/" . 'Entities/',

        'datatables'        => base_path() .  "/Modules/" .$moduleName . "/" . 'DataTables/',

        'repository'        => base_path() .  "/Modules/" .$moduleName . "/" . 'Repositories/',

        'routes'            => base_path() .  "/Modules/" .$moduleName . "/" . 'Routes/web.php',

        'api_routes'        => base_path() .  "/Modules/" .$moduleName . "/" . 'Routes/api.php',

        'request'           => base_path() .  "/Modules/" .$moduleName . "/" . 'Http/Requests/',

        'api_request'       => base_path() .  "/Modules/" .$moduleName . "/" . 'Http/Requests/API/',

        'controller'        => base_path() .  "/Modules/" .$moduleName . "/" . 'Http/Controllers/',

        'api_controller'    => base_path() .  "/Modules/" .$moduleName . "/" . 'Http/Controllers/API/',

        'repository_test'   => base_path() .  "/Modules/" .$moduleName . "/" . 'Tests/Repositories/',

        'api_test'          => base_path() .  "/Modules/" .$moduleName . "/" . 'Tests/APIs/',

        'tests'             => base_path() .  "/Modules/" .$moduleName . "/" . 'Tests/',

        'views'             => base_path() .  "/Modules/" .$moduleName . "/" . 'Resources/views/',

        'schema_files'      => base_path() .  "/Modules/" .$moduleName . "/" . 'Resources/model_schemas/',

        'templates_dir'     => base_path() .  "/Modules/" .$moduleName . "/" . 'Resources/infyom/infyom-generator-templates/',

        'seeder'            => base_path() .  "/Modules/" .$moduleName . "/" . 'Database/Seeders/',

        'database_seeder'   => base_path() .  "/Modules/" .$moduleName . "/" . "Database/Seeders/$moduleName"."DatabaseSeeder.php",

        'modelJs'           => base_path() .  "/Modules/" .$moduleName . "/" . 'Resources/assets/js/models/',

        'factory'           => base_path() .  "/Modules/" .$moduleName . "/" . 'Database/factories/',

        'view_provider'     => base_path() .  "/Modules/" .$moduleName .  "/" .'Providers/ViewServiceProvider.php',
    ],

    /*
    |--------------------------------------------------------------------------
    | Namespaces
    |--------------------------------------------------------------------------
    |
    */

    'namespace' => [

        'model'             => "Modules\\$moduleName\Entities",

        'datatables'        => "Modules\\$moduleName\DataTables",

        'repository'        => "Modules\\$moduleName\Repositories",

        'controller'        => "Modules\\$moduleName\Http\Controllers",

        'api_controller'    => "Modules\\$moduleName\Http\Controllers\API",

        'request'           => "Modules\\$moduleName\Http\Requests",

        'api_request'       => "Modules\\$moduleName\Http\Requests\API",

        'repository_test'   => "Modules\\$moduleName\\Tests\Repositories",

        'api_test'          => "Modules\\$moduleName\\Tests\APIs",

        'tests'             => "Modules\\$moduleName\\Tests",
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    */

    'templates'         => 'adminlte-templates',

    /*
    |--------------------------------------------------------------------------
    | Model extend class
    |--------------------------------------------------------------------------
    |
    */

    'model_extend_class' => 'Eloquent',

    /*
    |--------------------------------------------------------------------------
    | API routes prefix & version
    |--------------------------------------------------------------------------
    |
    */

    'api_prefix'  => 'api',

    'api_version' => 'v1',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    */

    'options' => [

        'softDelete' => true,

        'save_schema_file' => true,

        'localized' => false,

        'tables_searchable_default' => false,

        'repository_pattern' => true,

        'excluded_fields' => ['id'], // Array of columns that doesn't required while creating module
    ],

    /*
    |--------------------------------------------------------------------------
    | Prefixes
    |--------------------------------------------------------------------------
    |
    */

    'prefixes' => [

        'route' => '',  // using admin will create route('admin.?.index') type routes

        'path' => '',

        'view' => '',  // using backend will create return view('backend.?.index') type the backend views directory

        'public' => '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Add-Ons
    |--------------------------------------------------------------------------
    |
    */

    'add_on' => [

        'swagger'       => false,

        'tests'         => true,

        'datatables'    => false,

        'menu'          => [

            'enabled'       => false,

            'menu_file'     => 'layouts/menu.blade.php',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timestamp Fields
    |--------------------------------------------------------------------------
    |
    */

    'timestamps' => [

        'enabled'       => true,

        'created_at'    => 'created_at',

        'updated_at'    => 'updated_at',

        'deleted_at'    => 'deleted_at',
    ],

    /*
    |--------------------------------------------------------------------------
    | Save model files to `App/Models` when use `--prefix`. see #208
    |--------------------------------------------------------------------------
    |
    */
    'ignore_model_prefix' => false,

    /*
    |--------------------------------------------------------------------------
    | Specify custom doctrine mappings as per your need
    |--------------------------------------------------------------------------
    |
    */
    'from_table' => [

        'doctrine_mappings' => [],
    ],

];
