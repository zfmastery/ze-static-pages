<?php

namespace StaticPages\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router\RouteResult;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class StaticPagesAction implements ServerMiddlewareInterface
{
    const TEMPLATE_NS = 'static-pages';

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * StaticPagesAction constructor.
     * @param RouterInterface $router
     * @param TemplateRendererInterface|null $template
     */
    public function __construct(TemplateRendererInterface $template = null)
    {
        $this->template = $template;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return HtmlResponse
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        /** @var RouteResult     $routeName */
        $routeName = ($request->getAttribute("Zend\Expressive\Router\RouteResult"))->getMatchedRouteName();
        $templateName = sprintf('%s::%s', self::TEMPLATE_NS, substr($routeName, strrpos($routeName, '.') + 1));

        return new HtmlResponse($this->template->render($templateName));
    }
}
