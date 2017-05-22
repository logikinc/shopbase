# Shopbase

A Laravel based Shopify Rest API wrapper for Rapid Development and Prototyping

## Installation

- Add Shopbase as a dependency for your project using composer.

```bash
composer require anurag/shopbase dev-master
```

- Open Config/App.php and add the code below in the Laravel Package Providers Section.

```php
Anurag\ShopbaseServiceProvider::class,
```

## Asset Publishing

- Open Terminal and point to the root of your project

- The command below will publish the package config file to Config/shopbase.php

```bash
php artisan vendor:publish --tag=config --force
```

- The command below will publish the package assets to public/shopbase


```bash
php artisan vendor:publish --tag=assets --force
```

- The command below will publish the views to resources/views

```bash
php artisan vendor:publish --tag=views --force
```

## Migration

- Now run the migrations using

```
php artisan migrate
```

- This will add a new table stores in the database that is needed by the package to complete the app installation procedure.


## App Configuration

- Open Shopify and add these to the Whitelisted Url and App Url Section Respectively

```url

App Url         : https://yourproject.com/app
WhiteListed Url : https://yourproject.com/initialize

```

- Now you can add your API Key, API Secret, Scopes and Redirect Url in the config file i.e Config/Shopbase.php

- The Redirect Url will be the Whitelisted Url you added in the step above.


## App Installation

- Now Open

```url
https://yourproject.com/
```

- Now you will be prompted to add the name of your store.

- This will now take you to the Shopify Store and install the Base Blank App in your Shopify Store.

