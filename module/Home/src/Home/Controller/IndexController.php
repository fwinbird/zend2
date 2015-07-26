<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Home\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Api\Client\ApiClient;
use Home\Forms\RegisterForm;
//	use Home\Forms\LoginForm;
use Home\Entity\GameUser;
//	use Zend\Validator\File\Size;
//	use Zend\Validator\File\IsImage;
use Zend\Authentication\AuthenticationService;
use Common\Authentication\Adapter\Api as AuthAdapter;

use Home\Entity\Home;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
//        die('indexdie');

    	return new ViewModel();
    }
    
    
    public function registerAction()
    {
    	$this->layout('layout/register');				////////////////////////////////////////
    	
    	$viewData = array();
    	$registerForm = new RegisterForm();
    	$registerForm->setAttribute('action', $this->url()->fromRoute('home-register'));	//鎸囧畾璺宠浆澶勭悊椤甸潰
//    	$registerForm->setAttribute('action', $this->url()->fromRoute('home'));	//鎸囧畾璺宠浆澶勭悊椤甸潰
    	   
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$data = $request->getPost()->toArray();
//    		print_r($data);
//    		die('datadata');
    		$registerForm->setInputFilter(RegisterForm::getRegisterInputFilter());		//鎸囧畾杩囪檻鍣�
    		$registerForm->setData($data);												//璁惧鏁版嵁
    	
    		if ($registerForm->isValid()) {												//杩囨护
    			$files = $request->getFiles()->toArray();
    			$data = $registerForm->getData();
//			print_r($data);
//    		die('datadata2222');
    			    
   	
    			unset($data['repeat_password']);
    			unset($data['csrf']);
    			unset($data['register']);
//    			print_r($data);
//    			die('dddddddddd');
    			 
    			$response = ApiClient::registerUser($data);//////////////////////
    			print_r($data);
    			die('after apiclient');
    			if ($response['result'] == true) {
    				die('true');
    				$this->flashMessenger()->addMessage('Account created!');
    				return $this->redirect()->toRoute('wall', array('username' => $data['username']));
    			}
    			else {
    				die('false');
    			}
    		}
    	}
    	
    	$viewData['registerForm'] = $registerForm;
    	$viewData['dataddd']='adddd';
    	
    	return $viewData;
    }
    
	//function loginAction not used already
    public function loginAction()
    {
    	$viewData = array();
    	$login_form = new LoginForm();
    	$login_form->setAttribute('action', $this->url()->fromRoute('home-login'));
    
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$data = $request->getPost()->toArray();
    
    		$login_form->setInputFilter(LoginForm::getRegisterInputFilter());
    		$login_form->setData($data);
    
    		if ($login_form->isValid()) {
    
    			$data = $login_form->getData();
    			unset($data['repeat_password']);
    			unset($data['register']);
    			//    			$response = RegisterForm::registerUser($data);		//淇濆瓨鍒版暟鎹簱
    
    			if ($response['success'] == true) {
    			}
    		}
    	}
    
    	$viewData['login_form'] = $login_form;
    	return $viewData;
    }
    
    
    
}
