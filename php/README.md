# Angus' Application Skeleton

## Tech

- CakePHP
- jQuery
- Bootstrap w/ UI kit (SASS)
- Grunt

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer update
```

Start up the built-in webserver with:

```bash
bin/cake server
```

To specify the port:

```bash
bin/cake server -p 31115
```

Then visit `http://localhost:31115` to see the welcome page.