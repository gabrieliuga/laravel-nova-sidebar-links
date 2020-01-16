# Laravel nova sidebar links
[![Build Status](https://img.shields.io/travis/gabrieliuga/laravel-nova-sidebar-links/master.svg?style=flat-square)](https://travis-ci.org/gabrieliuga/laravel-nova-sidebar-links)
[![Quality Score](https://img.shields.io/scrutinizer/g/gabrieliuga/laravel-nova-sidebar-links.svg?style=flat-square)](https://scrutinizer-ci.com/g/gabrieliuga/laravel-nova-sidebar-links)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/gabrieliuga/laravel-nova-sidebar-links.svg?style=flat-square)](https://packagist.org/packages/gabrieliuga/laravel-nova-sidebar-links)
[![StyleCI](https://github.styleci.io/repos/233714380/shield?branch=master)](https://github.styleci.io/repos/233714380)
[![Total Downloads](https://img.shields.io/packagist/dt/gabrieliuga/laravel-nova-sidebar-links.svg?style=flat-square)](https://packagist.org/packages/gabrieliuga/laravel-nova-sidebar-links)

Add links to your nova backend


## Installation

You can install the package via composer:

```bash
composer require gabrieliuga/laravel-nova-sidebar-links
```

## Usage
``` php
NovaServiceProvider.php
<?php

namespace App\Providers;

use Giuga\LaravelNovaSidebar\NovaSidebar;
use Giuga\LaravelNovaSidebar\SidebarGroup;
use Giuga\LaravelNovaSidebar\SidebarLink;

...

public function tools()
{
    return [
        (new NovaSidebar())
            ->addGroup((new SidebarGroup())
                ->setName('Utilities')
                ->addLink((new SidebarLink())
                    ->setName('Telescope')
                    ->setType('_blank')
                    ->setUrl('/telescope')
                )
                ->addLink((new SidebarLink())
                    ->setName('Horizon')
                    ->setType('_blank')
                    ->setUrl('/horizon')
                )
            )
        ->addLink((new SidebarLink())
            ->setUrl('https://google.com')
            ->setType('_blank')
            ->setName('Google')
        )
    ];
}

OR

public function tools()
{
    return [
        (new NovaSidebar())->hydrate([
            'Utilities' => [
                ['Telescope', '/telescope'],
                ['Horizon', '/horizon'],
                ['Google', 'https://google.com', '_self']
            ],
            'Google 2' => 'https://google.com'
        ])
    ];
}
```

The result of the above will be:

![Laravel nova menu](https://raw.githubusercontent.com/gabrieliuga/laravel-nova-sidebar-links/master/Screenshot.png)


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email me@iuga.dev instead of using the issue tracker.

## Credits

- [Gabriel Iuga](https://github.com/gabrieliuga)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
