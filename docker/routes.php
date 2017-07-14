<?php

$app->get('/', App\Action\HomePageAction::class, 'home');
$app->get('/api/ping', App\Action\PingAction::class, 'api.ping');

$app->get('/static/terms', StaticPages\Action\StaticPagesAction::class, 'static.terms');
$app->get('/static/disclosure', StaticPages\Action\StaticPagesAction::class, 'static.disclosure');
