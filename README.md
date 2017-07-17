# Zend Expressive Static Pages Module

An easy, almost painless, way to render static pages in Zend Expressive applications.

So many projects will have a number of static pages, pages that require no template variable interpolation or any other form of logic.
Given that it should be as simple as possible to just render as many as you need with a minimum of fuss and effort.
 However, by default, you have to either code this yourself; worse case scenario, you may end up creating loads of code, just to render static content.
The intent of the module is to take all that effort away.
All you need to do is:

 - Create the content itself
 - Organise the files as best you see fit in the template directory
 - Create routes which link to the respective templates

At this stage, the project is still under heavy development.
So there are no further instructions.
But, they will follow shortly.

## How it Works

This module aims to make organising and rendering static content as simple as possible.
It does so by using the route's name to determine the template to render.
In the example below, you can see that it defines a new route, called `/disclosure`.
The route uses `StaticPagesAction::class` as the handling middleware and has the name `static.disclosure`.

```php
$app->get('/disclosure', \StaticPages\Action\StaticPagesAction::class, 'static.disclosure');
```

The name is important, as it infers the name of the template which `StaticPagesAction` will attempt to render.
Specifically, it will attempt to render `disclosure.phtml`.
So you can see that the route’s name is the template’s name, minus the `.phtml` extension, and prefixed with `static.`.

At this point, as the module’s quite new, the template directory that is searched, `templates/static-pages`, is fixed, and all templates need to be in the top-level of that directory.
What’s more, it’s not been tested with other template rendering engines.
However, these are expected to change in an upcoming release.

## Getting Started / Installing

To install the module, use Composer by running `composer require zfmastery/ze-static-pages`.
The current release doesn't support automatic creation of the required module configuration file, nor of the template directory.
That is planned for a future release however.

Given that:

1. Copy the default config file `config/static-pages.global.php` to your Zend Expressive's `config/autoload/` directory.
2. In the root directory, create the directory structure `templates/static-pages/` and in there create your static templates files.
3. Add routes to use your new static templates.


## Running the Tests

To run the unit tests, run `composer test`.
