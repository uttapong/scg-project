<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace App\Controller;

use \Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class SCGController extends AbstractActionController
{
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function indexAction()
    {
        // echo "adfadfadf";
        //https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=13.8206972,100.5239867&radius=1500&type=restaurant&key=AIzaSyCQWpAtVowR7C1BRlml8_LeRMWSpKUZ1HQ
        $view = new ViewModel();
        $view->setTerminal(true);
       print_r($this->config['google_map']['endPoint']); die('xxx');
        return $view;
    }

    public function searchAction()
    {
        // print_r(__DIR__);die();
        $endPoint = $this->config['google_map']['endPoint'];
        $mapKey = $this->config['google_map']['mapKey'];
        // $searchLocation = $this->getRequest()->getQuery('keyword');
        $searchLocation = $this->getRequest()->getAttribute('keyword', 'Bangsue');
        $googlePageToken = $this->getRequest()->getQuery('next_page_token')||'';
        $searchRadius = 5000;

        //return cached result if exists
        $this->cache->setItem('foo', 'bar');
// echo $this->cache->getItem('foo');
        // if($redis->get('location_'.$searchLocation))return new JsonModel(unserialize ($redis->get('location_'.$searchLocation)));

        $textSearchQuery = http_build_query([
            'input' => $searchLocation,
            'key' => $mapKey,
            'inputtype' => 'textquery',
            'fields' => 'photos,formatted_address,name,rating,opening_hours,geometry'
        ]);   

        $searchTextUrl="{$endPoint}findplacefromtext/json?{$textSearchQuery}";

        $responseTextSearch = json_decode(file_get_contents($searchTextUrl),true);
        $resultLatLng = $responseTextSearch["candidates"][0]["geometry"]["location"];
        if(!$resultLatLng)
            return new JsonModel(['status'=>-1,"message"=>"Location not found"]);

        //Nearby restaurant search from specified lat,lng    
        $nearbySearchQuery = http_build_query([
            'radius' => $searchRadius,
            'location' => "{$resultLatLng['lat']},{$resultLatLng['lng']}",
            'key' => $mapKey,
            'type' => 'restaurant',
            'fields' => 'photos,formatted_address,name,rating,opening_hours,geometry'
        ]);  

        $searchNearbyUrl = "{$endPoint}nearbysearch/json?{$nearbySearchQuery}";
        $responseNearbySearch = json_decode(file_get_contents($searchNearbyUrl),true);
        // $redis->set('location_'.$searchLocation, serialize ($responseList['results']));
        return new JsonModel($responseNearbySearch);
    }

    public function polynomialAction(){
        $headers = $this->getResponse()->getHeaders();
        $headers->addHeaderLine(
             "Access-Control-Allow-Origin: *");

        $redis = new \Redis();
        $redis->connect('redis', 6379);
        $redis->set('message', 'Hello world');

        $numCount =intval( $this->getRequest()->getQuery('count'));
            // print_r(unserialize( $redis->get('count_'.$numCount)));   die();     
        if($redis->get('count_'.$numCount))return new JsonModel(unserialize ($redis->get('count_'.$numCount)));

        $result=array();
        for($i=0;$i<$numCount;$i++){
            array_push($result,3+$i+($i*$i));
        }
        $redis->set('count_'.$numCount, serialize ($result));

        return new JsonModel($result);
    }   
}
