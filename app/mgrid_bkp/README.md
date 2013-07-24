# Mgrid - Grid solution for PHP 5

Mgrid generates for you a optimal and handy grid.

## Instalation

The recommended way to install Mgrid is [through
composer](http://getcomposer.org). Just create a `composer.json` file into the 
root of your project and add the following lines:

    {
        "require": {
            "mdn/mgrid": "dev-master"
        }
    }

then run the `php composer.phar install` command to install it. At this stage 
everything should go smooth. 

Alternatively, you can download the [`mgrid.zip`][1] file and extract it.


## Usage

At the moment this grid is only available to go with Zend Framework 1.x. 
We are working to try to make it as universal as possible. 
Keen to help? Join the [`github project`][2].


## Core Concepts

This grid should be able to display data sources from PHP arrays and Doctrine Query Builder objects.
Rendering it in plain html table, pdf and csv. Filters and sort by columns are also 
available.


## Docs

See the `doc` directory for more detailed documentation or go to http://mgrid.mdnsolutions.com/documentation.



##About


##Requirements

- Any flavor of PHP 5.3 or above should do
- [optional] PHPUnit 3.5+ to execute the test suite (phpunit --version)

##Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](http://mgrid.mdnsolutions.com/issues)


##Frameworks Integration

At the moment this grid is only available for Zend Framework 1.x (Sorry for that).


##Author

Renato Medina - <medinadato@gmail.com> - <http://twitter.com/medinadato><br />
See also the list of [contributors](https://github.com/medinadato/mgrid/contributors) 
which participated in this project.


##License

Mgrid is licensed under the MIT License - see the `LICENSE` file for details


[1]: http://mgrid.mdnsolutions.com/download
[2]: https://github.com/medinadato/mgrid/
