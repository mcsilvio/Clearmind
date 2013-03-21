<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
		'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name'=>'Funisher',
		'defaultController' => 'user/login',
		

		// preloading 'log' component
		'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.giix-components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii' => array(
					'class' => 'system.gii.GiiModule',
					'password' => 'oink2oink',
					'generatorPaths' => array( 'ext.giix-core' ),
			),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager' => array(
						'urlFormat' => 'path',
						'showScriptName' => false,
						
				),

				'db'=>array(
						'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
				),
				// uncomment the following to use a MySQL database

				'db'=>array(
						'connectionString' => 'mysql:host=localhost;dbname=clearmind',
						'emulatePrepare' => true,
						'username' => 'cmadmin',
						'password' => '1oinkSoink',
						'charset' => 'utf8',
				),

				'errorHandler'=>array(
						// use 'site/error' action to display errors
						'errorAction'=>'user/error',
				),
				'log'=>array(
						'class'=>'CLogRouter',
						'routes'=>array(
								array(
										'class'=>'CFileLogRoute',
										'levels'=>'error, warning',
								),
								// uncomment the following to show log messages on web pages

				//array( 'class'=>'CWebLogRoute',	),

						),
				),
		),

		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params'=>array(
				// this is used in contact page
				'adminEmail'=>'info@funisher.com',
				
		),
);
