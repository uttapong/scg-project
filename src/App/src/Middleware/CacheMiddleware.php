<?php
namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Server\MiddlewareInterface as PsrInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\TextResponse;
use Psr\Http\Server\RequestHandlerInterface;

class CacheMiddleware implements PsrInterface
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
       
    }
    
    /**
     *
     * Handle request to /scg/search/:lat/:lng/:radius[/:token]  url  
     *
     * @param    request  $object http request object
     * @param    handler  $object http response handling object
     * @return   response http esponse object
     *
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        $url  = str_replace('/', '_', $request->getUri()->getPath());
        $file = $this->config['path'] . $url . '.html';
        if ($this->config['enabled'] && file_exists($file) &&
            (time() - filemtime($file)) < $this->config['lifetime']) {
            return new TextResponse(file_get_contents($file),
                        200,
                        ['Content-Type' => ['application/json'],'Access-Control-Allow-Origin' => ['*']]
                    );
        }

        $response = $handler->handle($request);
        if ($this->config['enabled']) {
            file_put_contents($file, $response->getBody());
        }
        return $response;
    }
}