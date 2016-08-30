## Yii 2 Advanced API Skeleton
===============================

Yii2-advanced-api-skeleton is based on [Yii2 App Advanced Template](https://github.com/yiisoft/yii2-app-advanced)

### Installation
-------------------

1. Download

   ```
   git clone git@github.com:clintliang/yii2-advanced-api-skeleton.git
   ```
2. Install dependencies with composer ```composer install```
3. Run ``` php init --env=Development``` to initialize the application with development environment
4. Create PostgreSQL database yii2api-dev and adjust the ```components['db']``` configuration in ```common/config/main-local.php```
5. Apply migrations with console command ```php yii migrate```

### Available URL Rules
-------------------

See [api/config/main.php](api/config/main.php)

```
POST api/v1/session
DELETE api/v1/session
```

### DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
api
    config/              contains api configurations
    controllers/         contains Web controller classes
    modules/             contains api modules for versioning control
      v1/
        controllers/     contains api controllers
    runtime/             contains files generated during runtime
    web/                 contains the entry script and Web resources
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

