<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\ZendView\ZendViewRenderer;

class HomeHandler implements RequestHandlerInterface
{
    /** @var null|TemplateRendererInterface */
    private $template;

    public function __construct(
        ?TemplateRendererInterface $template = null
    ) {
        
        $this->template      = $template;
    }
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        if ($this->template === null) {
            return new JsonResponse([
                'welcome' => 'SCG mini project'
            ]);
        }

        $data = [];
        return new HtmlResponse($this->template->render('app::home-page', $data));
    }
}
