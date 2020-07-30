
# Obullo-Pages Skeleton

[![License](https://img.shields.io/badge/License-BSD%203--Clause-blue.svg)](https://opensource.org/licenses/BSD-3-Clause)

## Introduction

This is a skeleton application using the Obullo-Pages. This application is designed to create a new project start with Obullo-Pages.

## Installation using Composer

The easiest way to create a new Obullo-Pages project is to use
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
```

This will start the cli-server on port 8080, and bind it to all network
interfaces. You can then visit the site at http://localhost:8080/
- which will bring up Obullo-Pages welcome page.

**Note:** The built-in CLI server is *for development only*.
