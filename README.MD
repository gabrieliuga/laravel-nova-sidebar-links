# Laravel nova sidebar links
Add links to your nova backend

#### Install the package
```php
composer require gabrieliuga/laravel-nova-sidebar-links
```

#### Usage

In app/Providers/NovaServiceProvider.php use the following imports

```php
<?php

namespace App\Providers;

use Giuga\LaravelNovaSidebar\NovaSidebar;
use Giuga\LaravelNovaSidebar\SidebarGroup;
use Giuga\LaravelNovaSidebar\SidebarLink;

...
```

Within the tools() function in the same service provider you can now define your links
```php
/**
 * Get the tools that should be listed in the Nova sidebar.
 *
 * @return array
 */
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
```
