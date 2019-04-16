<?php return [
    'beyondcode/laravel-dump-server' => 
    [
        'providers' => 
        [
        0 => 'BeyondCode\\DumpServer\\DumpServerServiceProvider',
        ],
    ],
    'fideloper/proxy' => 
    [
        'providers' => 
        [
        0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
        ],
    ],
    'laravel/tinker' => 
    [
        'providers' => 
        [
        0 => 'Laravel\\Tinker\\TinkerServiceProvider',
        ],
    ],
    'nesbot/carbon' => 
    [
        'providers' => 
        [
        0 => 'Carbon\\Laravel\\ServiceProvider',
        ],
    ],
    'nunomaduro/collision' => 
    [
        'providers' => 
        [
        0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
        ],
    ],
    'yajra/laravel-datatables-oracle' => 
    [
        'providers' => 
        [
        0 => 'Yajra\\DataTables\\DataTablesServiceProvider',
        ],
        'aliases' => 
        [
        'DataTables' => 'Yajra\\DataTables\\Facades\\DataTables',
        ],
    ],
];
