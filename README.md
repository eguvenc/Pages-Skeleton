# Obullo-Pages Skeleton

## Introduction

This is a skeleton application using the Obullo-Pages and module
systems. This application is meant to be used as a starting place for those
looking to get their feet wet with Obullo.

## Installation using Composer

The easiest way to create a new Laminas MVC project is to use
[Composer](https://getcomposer.org/). If you don't have it already installed,
then please install as per the [documentation](https://getcomposer.org/doc/00-intro.md).

To create your new Obullo-Pages project:

```bash
$ composer create-project obullo/pages-skeleton path/to/install
```

Once installed, you can test it out immediately using PHP's built-in web server:

```bash
$ cd path/to/install
$ php -S 0.0.0.0:8080 -t public
# OR use the composer alias:
$ composer run --timeout 0 serve
```

This will start the cli-server on port 8080, and bind it to all network
interfaces. You can then visit the site at http://localhost:8080/
- which will bring up Obullo-Pages welcome page.

**Note:** The built-in CLI server is *for development only*.

## Development mode


## Running Unit Tests


## Web server setup

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

```apache

```

### Nginx setup

To setup nginx, open your `/path/to/nginx/nginx.conf` and add an
[include directive](http://nginx.org/en/docs/ngx_core_module.html#include) below
into `http` block if it does not already exist:

```nginx
http {
    # ...
    include sites-enabled/*.conf;
}
```


Create a virtual host configuration file for your project under `/path/to/nginx/sites-enabled/obulloapp.localhost.conf`
it should look something like below:

```nginx
server {
    listen       80;
    server_name  obulloapp.localhost;
    root         /path/to/obulloapp/public;

    location / {
        index index.php;
        try_files $uri $uri/ @php;
    }

    location @php {
        # Pass the PHP requests to FastCGI server (php-fpm) on 127.0.0.1:9000
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_param  SCRIPT_FILENAME /path/to/obulloapp/public/index.php;
        include fastcgi_params;
    }
}
```

Restart the nginx, now you should be ready to go!