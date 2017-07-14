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

## Getting Started / Installing

To install the module, use Composer by running `composer require zfmastery/ze-static-pages`.
The current release doesn't support automatic creation of the required module configuration file, nor of the template directory.
That is planned for a future release however.
Given that:
 
1. Copy the default config file `config/static-pages.global.php` to your Zend Expressive's `config/autoload/` directory.
2. In the root directory, create the directory structure `templates/static-pages/` and in there create your static templates files.

## Running the Tests

To run the unit tests, run `composer test`.
