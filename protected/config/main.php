<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'RestoApp 1.0',
    'language' => 'id',
    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'bootstrap.helpers.TbHtml',
        'application.modules.image.components.*',
        'application.modules.image.models.Image',
    ),

    'aliases' => array(
        // yiistrap configuration
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change if necessary
        // yiiwheels configuration
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
        // restfulyii configuration
        'RestfullYii' => realpath(__DIR__ . '/../extensions/starship/RestfullYii'), // change if necessary
    ),

    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'terserah',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array('bootstrap.gii'),
        ),
        'image' => array(
            'createOnDemand' => true, // requires apache mod_rewrite enabled
            'install' => false, // allows you to run the installer
        ),
        'auth' => array(
            'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
            'userClass' => 'Pengguna', // the name of the user model class.
            'userIdColumn' => 'id', // the name of the user id column.
            'userNameColumn' => 'username', // the name of the user name column.
            'defaultLayout' => 'application.views.layouts.column1', // the layout used by the module.
            'viewDir' => null, // the path to view files to use with this module.
        ),
    ),

    // application components
    'components' => array(
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'behaviors' => array(
                'auth' => array(
                    'class' => 'auth.components.AuthBehavior',
                ),
            ),
        ),
        'user' => array(
            'class' => 'auth.components.AuthWebUser',
            'admins' => array('admin'),
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => require(
                    dirname(__FILE__) . '/../extensions/starship/RestfullYii/config/routes.php'
                ),
            'showScriptName' => false,
        ),
        'image' => array(
            'class' => 'ImgManager',
            'versions' => array(
                'tiny' => array('width' => 48, 'height' => 48),
                'small' => array('width' => 120, 'height' => 120),
                'medium' => array('width' => 320, 'height' => 320),
                'large' => array('width' => 640, 'height' => 640),
            ),
        ),
        // yiistrap configuration
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=resto',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'admin',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                 *
                 */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>[
        'RestfullYii' => [
            'req.auth.user'=>function($application_id, $username, $password) {
                    return true;
                },
        ]
    ]

);