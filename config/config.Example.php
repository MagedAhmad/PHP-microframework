<?php


return [
    /*
     * Help set your project to deployment
     * or still in development phase .
     *
     * Options : development | deployment
     */
    'env' => 'development',

    /*
    * Default Pagination Offset
    *
    */
    'offset' => 10,

    /*
     * Set your Api default attributes
     *
     */
    'Api' => [
        'provider' => 'github',
        'language' => 'PHP',
        'since' => 'weekly'
    ],

    /*
    * Supported providers
    *
    */
    'providers' => [
        'github',
        'gitlab',
        'bitbucket'
    ],
];
