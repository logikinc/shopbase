## Shopbase ##

A Laravel based Shopify Rest API wrapper for Rapid Development and Prototyping

## Installation and Configuration

- Add Shopbase as a dependency for your project using composer.

```bash
composer require anurag/shopbase
```

- Open Config/App.php and add, in the Laravel Package Providers Section.

```php
Anurag\ShopbaseServiceProvider::class,
```

- Open Terminal and run, to publish the shopbase.php to the Config/shopbase.php

```bash
php artisan vendor:publish --tag=shopbase
```

- Now you can add your API Key, API Secret, Scopes and Redirect Url in the config file.

- Now Browse to the Laravel Project and Open

```url
http://yourproject.com/shopbaseInit

or

https://yourproject.com/shopbaseInit
```

- Now you will be prompted to add the name of your store. Add the name without the preceding http:// or https://

```
storename.myshopify.com
```

- This will now take you to the Shopify Store and install the Base Blank App in your Shopify Store.

