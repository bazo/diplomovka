<?php
require LIBS_DIR . '/Nette/loader.php';
require LIBS_DIR.'/debug.php';
Debug::enable(Debug::DEVELOPMENT, APP_DIR.'log/log.txt');
Debug::enableProfiler();
Environment::loadConfig();

$application = Environment::getApplication();
$router = $application->getRouter();

$router[] = new Route('index.php', array(
		'module' => 'Default',
		'presenter' => 'Default',
		'action' => 'default'
                ), Route::ONE_WAY);

$router[] = new Route('<module student|teacher|admin|default>/<presenter>/<action>/<id>', array(
	'presenter' => 'Default',
	'action' => 'default',
	'id' => NULL
));
$router[] = new Route('<module>', array(
	'module' => 'Default',
	'presenter' => 'Default',
	'action' => 'default',
	'id' => NULL,
));
$application->errorPresenter = 'Error';
$application->catchExceptions = FALSE;
db::connect();
$application->run();