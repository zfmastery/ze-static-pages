<?php

namespace StaticPagesTest\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophet;
use Psr\Http\Message\ServerRequestInterface;
use StaticPages\Action\StaticPagesAction;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router\RouteResult;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class StaticPagesActionTest extends TestCase
{
    /**
     * @var Prophet
     */
    private $prophet;

    public function setUp()
    {
        $this->prophet = new Prophet;
    }

    /**
     * @dataProvider correctTemplateData
     * @param string $routeName
     * @param string $templateName
     */
    public function testDoesRequestCorrectTemplate($routeName, $templateName)
    {
        $delegate = $this->prophet->prophesize(DelegateInterface::class);
        $template = $this->prophet->prophesize(TemplateRendererInterface::class);
        $template
            ->render($templateName)
            ->shouldBeCalledTimes(1)
            ->willReturn('<html></html>');

        $action = new StaticPagesAction($template->reveal());

        $routeResult = $this->prophet->prophesize(RouteResult::class);
        $routeResult->getMatchedRouteName()
            ->willReturn($routeName);

        $request = $this->prophet->prophesize(ServerRequestInterface::class);
        $request->getAttribute(RouteResult::class)
            ->willReturn($routeResult->reveal());

        $this->assertInstanceOf(
            HtmlResponse::class,
            $action->process($request->reveal(), $delegate->reveal())
        );
    }

    /**
     * @return array
     */
    public function correctTemplateData()
    {
        return [
            [
                'static.terms',
                'static-pages::terms'
            ],
            [
                'static.disclosure',
                'static-pages::disclosure'
            ],
        ];
    }

    public function tearDown()
    {
        $this->prophet->checkPredictions();
    }
}
