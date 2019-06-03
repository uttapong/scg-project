<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Router;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\ZendView\ZendViewRenderer;

class SCGHandler implements RequestHandlerInterface
{
    /** @var null|String */
    private $config;

    public function __construct(array $config) {
        $this->config = $config;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $endPoint = $this->config['google_map']['endPoint'];
        $mapKey = $this->config['google_map']['mapKey'];      

        $lat = str_replace(',','.',$request->getAttribute('lat','13.8234866'));
        $lng = str_replace(',','.',$request->getAttribute('lng','100.5081204'));
        $radius = $request->getAttribute('radius',1000);
        $pagetoken = $request->getQueryParams('next_page_token');
            //    return new JsonResponse($pagetoken['next_page_token'],200,['Content-Type' => ['application/json'],'Access-Control-Allow-Origin' => ['*']]);
        //Nearby restaurant search from specified lat,lng    
        if($pagetoken)
            $nearbySearchQuery = http_build_query([
                'radius' => $radius,
                'location' => "{$lat},{$lng}",
                'key' => $mapKey,
                'type' => 'restaurant',
                'pagetoken' =>$pagetoken['next_page_token']
            ]); 
        else
            $nearbySearchQuery = http_build_query([
                'radius' => $radius,
                'location' => "{$lat},{$lng}",
                'key' => $mapKey,
                'type' => 'restaurant',
                'fields' => 'photos,formatted_address,name,rating,opening_hours,geometry',
            ]);  

        $searchNearbyUrl = "{$endPoint}nearbysearch/json?{$nearbySearchQuery}";//die($searchNearbyUrl);
        $responseNearbySearch = json_decode(file_get_contents($searchNearbyUrl),true);
        // $redis->set('location_'.$searchLocation, serialize ($responseList['results']));
        return new JsonResponse($responseNearbySearch,200,['Content-Type' => ['application/json'],'Access-Control-Allow-Origin' => ['*']]);
    }
}
