<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
//die('home-module.config');
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/[home[/]]',
                    'defaults' => array(
                        'controller' => 'Home\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),

       		'home-register' => array(
       				'type'    => 'Segment',
       				'options' => array(
       						'route'    => '/user/register[/]',
       						'defaults' => array(
       								'controller' => 'Home\Controller\Index',
       								'action'     => 'register',
        		
       						),
       				),
       		),

       		'home-login' => array(
       				'type'    => 'Segment',
       				'options' => array(
       						'route'    => '/user/login[/]',
       						'defaults' => array(
       								'controller' => 'Home\Controller\Index',
       								'action'     => 'login',
       		
       						),
       				),
       		),
       		 
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Home\Controller\Index' => 'Home\Controller\IndexController'
        ),
    ),

    'view_manager' => array(
    		'template_path_stack' => array(
    				__DIR__ . '/../view',
    		),
    		'template_map' => array(
    				'layout/register'	=> __DIR__ . '/../view/layout/register.phtml',
		            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
		            'error/404'               => __DIR__ . '/../view/error/404.phtml',
		            'error/index'             => __DIR__ . '/../view/error/index.phtml',
    		),

    ),
    // Placeholder for console routes

);
