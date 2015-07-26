<?php

namespace Api\Client;

use Zend\Http\Client as Client;
use Zend\Http\Request as Request;
use Zend\Json\Decoder as JsonDecoder;
use Zend\Json\Json as Json;

/**
 * This client manages all the operations needed to interface with the
 * social network API
 *
 * @package default
 */
class ApiClient {
    
    /**
     * Holds the client we will reuse in this class
     *
     * @var Client
     */
    protected static $client = null;
    
    /**
     * Holds the endpoint urls
     *
     * @var string
     */

	protected static $endpointHost = 'http://localhost.shaguangyu-api';
//	protected static $endpointHost = 'http://localhost.game';     
    protected static $endpointUsers = '/users/';
    protected static $endpointRegisterUser = '/user/register';/////////////////////////


//	以上是本地部分，以下是服务器部分
/*   
    protected static $endpointHost = 'http://api.card.shaguangyu.fr';
    protected static $endpointUsers = '/users/';
    protected static $endpointRegisterUser = '/user/register';/////////////////////////
*/   
    
    public static function registerUser($postData)
    {

    	$url = self::$endpointHost . self::$endpointRegisterUser;
    die($url);
	die('apiclient.php');
        return self::doRequest($url, $postData, Request::METHOD_POST);
    }
    
    protected static function doRequest($url, array $postData, $method = Request::METHOD_POST)
    {
        $client = self::getClientInstance();
        $client->setUri($url);
        $client->setMethod($method);
        if ($postData !== null) {

        	$client->setParameterPost($postData);
        }
        
        $response = $client->send();
//        print_r($response->getBody());
//        die('apiclietn.php');
        if ($response->isSuccess()) {
            return JsonDecoder::decode($response->getBody(), Json::TYPE_ARRAY);   //取返回值中需要的东西，decode解包
        } else {
        	return FALSE;
        }
    }
    /**
     * Create a new instance of the Client if we don't have it or 
     * return the one we already have to reuse
     *
     * @return Client
     */
    protected static function getClientInstance()
    {
        if (self::$client === null) {
            self::$client = new Client();
            self::$client->setEncType(Client::ENC_URLENCODED);
        }
            
        return self::$client;
    }
    
/*    protected static function doRequest($url, array $postData = null, $method = Request::METHOD_GET)
    {
        $client = self::getClientInstance();
        $client->setUri($url);
        $client->setMethod($method);
        
        if ($postData !== null) {
            $client->setParameterPost($postData);
        }
        
        $response = $client->send();
        
        if ($response->isSuccess()) {
            return JsonDecoder::decode($response->getBody(), Json::TYPE_ARRAY);
        } else {
            return FALSE;
        }
    }
*/
    
    
}