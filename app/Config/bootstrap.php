<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); // Loads a single plugin named DebugKit
 */

/**
 * To prefer app translation over plugin translation, you can set
 *
 * Configure::write('I18n.preferApp', true);
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *		'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 *		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));
/*
 * Custom Inflector rules, can be set to correctly pluralize or singularize
 * table, model, controller names or whatever other string is passed to the
 * inflection functions.
 */
//Adicionando as regras de plurais em português

$singular = array(
    '/^(.*)(oes|aes|aos)$/i' => '\1ao',
    '/^(.*)(a|e|o|u)is$/i' => '\1\2l',
    '/^(.*)e?is$/i' => '\1il',
    '/^(.*)(r|s|z)es$/i' => '\1\2',
    '/^(.*)ns$/i' => '\1m',
    '/^(.*)s$/i' => '\1',
);

$uninflected = array(
    'atlas',
    'lapis',
    'onibus',
    'pires',
    'virus',
    '.*x',
    'status'
);

$plural = array(
    '/^(.*)ao$/i' => '\1oes',
    '/^(.*)(r|s|z)$/i' => '\1\2es',
    '/^(.*)(a|e|o|u)l$/i' => '\1\2is',
    '/^(.*)il$/i' => '\1is',
    '/^(.*)(m|n)$/i' => '\1ns',
    '/^(.*)$/i' => '\1s'
);

$plural_irregular = array(
    'abdomen' => 'abdomens',
    'alemao' => 'alemaes',
    'artesa' => 'artesaos',
    'as' => 'ases',
    'bencao' => 'bencaos',
    'cao' => 'caes',
    'campus' => 'campi',
    'capelao' => 'capelaes',
    'capitao' => 'capitaes',
    'chao' => 'chaos',
    'charlatao' => 'charlataes',
    'cidadao' => 'cidadaos',
    'consul' => 'consules',
    'cristao' => 'cristaos',
    'dificil' => 'dificeis',
    'email' => 'emails',
    'escrivao' => 'escrivaes',
    'fossel' => 'fosseis',
    'germens' => 'germen',
    'grao' => 'graos',
    'hifens' => 'hifen',
    'irmao' => 'irmaos',
    'liquens' => 'liquen',
    'mal' => 'males',
    'mao' => 'maos',
    'orfao' => 'orfaos',
    'pais' => 'paises',
    'pai' => 'pais',
    'pao' => 'paes',
    'projetil' => 'projeteis',
    'reptil' => 'repteis',
    'sacristao' => 'sacristaes',
    'sotao' => 'sotaos',
    'tabeliao' => 'tabeliaes',
    'gas' => 'gases',
    'alcool' => 'alcoois'    
);

$transliteration = array(
    'À' => 'A',
    'Á' => 'A',
    'Â' => 'A',
    'Ã' => 'A',
    'Ä' => 'A',
    'Å' => 'A',
    'È' => 'E',
    'É' => 'E',
    'Ê' => 'E',
    'Ë' => 'E',
    'Ì' => 'I',
    'Í' => 'I',
    'Î' => 'I',
    'Ï' => 'I',
    'Ò' => 'O',
    'Ó' => 'O',
    'Ô' => 'O',
    'Õ' => 'O',
    'Ö' => 'O',
    'Ø' => 'O',
    'Ù' => 'U',
    'Ú' => 'U',
    'Û' => 'U',
    'Ü' => 'U',
    'Ç' => 'C',
    'Ð' => 'D',
    'Ñ' => 'N',
    'Š' => 'S',
    'Ý' => 'Y',
    'Ÿ' => 'Y',
    'Ž' => 'Z',
    'Æ' => 'AE',
    'ß' => 'ss',
    'Œ' => 'OE',
    'à' => 'a',
    'á' => 'a',
    'â' => 'a',
    'ã' => 'a',
    'ä' => 'a',
    'å' => 'a',
    'ª' => 'a',
    'è' => 'e',
    'é' => 'e',
    'ê' => 'e',
    'ë' => 'e',
    '&' => 'e',
    'ì' => 'i',
    'í' => 'i',
    'î' => 'i',
    'ï' => 'i',
    'ò' => 'o',
    'ó' => 'o',
    'ô' => 'o',
    'õ' => 'o',
    'ö' => 'o',
    'ø' => 'o',
    'º' => 'o',
    'ù' => 'u',
    'ú' => 'u',
    'û' => 'u',
    'ü' => 'u',
    'ç' => 'c',
    'ð' => 'd',
    'ñ' => 'n',
    'š' => 's',
    'ý' => 'y',
    'ÿ' => 'ÿ',
    'ž' => 'z',
    'æ' => 'ae',
    'œ' => 'oe',
    'ƒ' => 'f'
);

Inflector::rules('singular', array(
    'rules' => $singular,
    'uninflected' => $uninflected,
    'irregular' => array_flip($plural_irregular)
    
));

Inflector::rules('plural', array(
    'rules' => $plural,
    'uninflected' => $uninflected,
    'irregular' => $plural_irregular
    
));
