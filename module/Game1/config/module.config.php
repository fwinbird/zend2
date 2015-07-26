<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home_game1' => array(
//                'type' => 'literal',
            		'type' => 'Segment',
            		'options' => array(
                    'route'    => '/game1[/]',
                    'defaults' => array(
                        'controller' => 'Game1\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Game1\Controller\Index' => 'Game1\Controller\IndexController'
        ),
    ),

    'view_manager' => array(
    		'template_path_stack' => array(
    				__DIR__ . '/../view',
    		),
    		'template_map' => array(
    				'layout/game1'	=> __DIR__ . '/../view/layout/layout.phtml',
		            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
		            'error/404'               => __DIR__ . '/../view/error/404.phtml',
		            'error/index'             => __DIR__ . '/../view/error/index.phtml',
    		),    		
	),
    // Placeholder for console routes

);
