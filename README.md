> [!NOTE]
> Aqui tienes una nota especial

> [!TIP]
> Aqui tienes una nota especial

> [!IMPORTANT]
> Aqui tienes una nota especial

> [!WARNING]
> Aqui tienes una nota especial 

# 📚 Proyecto Laravel: Gestión de Libros

Este proyecto permite **crear, leer, actualizar y eliminar libros**, asociando cada uno a su respectivo autor.

---

## 📂 Estructura base del proyecto

```
CRUD
├─ .dockerignore
├─ .editorconfig
├─ app
│  ├─ Http
│  │  └─ Controllers
│  │     ├─ Controller.php
│  │     └─ LibrosController.php
│  ├─ Models
│  │  ├─ Autor.php
│  │  ├─ Libros.php
│  │  └─ User.php
│  └─ Providers
│     └─ AppServiceProvider.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ composer.json
├─ composer.lock
├─ conf
│  └─ nginx
│     └─ nginx-site.conf
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2025_06_22_020513_create_autor_table.php
│  │  └─ 2025_06_22_020519_create_libros_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ Dockerfile
├─ package.json
├─ php.ini
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  ├─ info.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  ├─ app.js
│  │  └─ bootstrap.js
│  └─ views
│     ├─ layouts
│     │  └─ app.blade.php
│     ├─ libros
│     │  ├─ actualizar.blade.php
│     │  ├─ crear.blade.php
│     │  ├─ eliminar.blade.php
│     │  └─ leer.blade.php
│     └─ welcome.blade.php
├─ routes
│  ├─ console.php
│  └─ web.php
├─ scripts
│  └─ 00-laravel-deploy.sh
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  │     ├─ 23c309d903f7399e978da8e403a5be5c.php
│  │     ├─ 2591184e2a688dd7778d49eddeb9ab8b.php
│  │     ├─ 26f1df46261b9bf504004007ce81af9d.php
│  │     ├─ 278b5fbad031effb7b5ff750bd826a5d.php
│  │     ├─ 32926fe3e132ee31bf5addaa94684a2d.php
│  │     ├─ 4968ee0394a1efa9df95880710511776.php
│  │     ├─ 4f2d1c88ff50419f6c35ba7b0b8b134a.php
│  │     ├─ 654694424c26410813cbb52f6e9c4b0b.php
│  │     ├─ 6a7a6846e227e21ea5a19a1c67ddda9b.php
│  │     ├─ 6a8a6c4ad6c551f60e51853f5a24965a.php
│  │     ├─ 6fdc3c3fbdc3db8cd6834e6b9167d754.php
│  │     ├─ 70c1e1898254a6d143c474d07feaaed0.php
│  │     ├─ 78d0c4b78dd4302ab9812f35c2572766.php
│  │     ├─ 8158fbc218d08798c9f50b5d136ff9e4.php
│  │     ├─ 869a35278440576691986c737ee84040.php
│  │     ├─ a90796d25076a8dc4563e5157ca9a254.php
│  │     ├─ c3c2fd8944b5bba45f6f96587ef1d5b7.php
│  │     ├─ d301c58b42517b79af18d3e260e584ad.php
│  │     ├─ d6d4510dc447152bbfd1482a8772ad20.php
│  │     ├─ d8a9492bf1453218327bdd61eb0e9d5e.php
│  │     ├─ de3c4995fd51ab3e38758eecfcc65128.php
│  │     ├─ e428ff64dcb85eaa1171c7f4da0f82a7.php
│  │     ├─ e4573b4efc7643a05aaf23ab6a69314d.php
│  │     └─ f9ef990f01e27eee33f829328839e0e0.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js
```

---

## ⚙️ Tecnologías utilizadas

- <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" height="35" width="35"/> Laravel 12.19.3
- <img src="https://cdn.worldvectorlogo.com/logos/laragon.svg" alt="Laragon" height="35" width="35"/> Laragon 8.1.0
- <img src="https://www.php.net/images/logos/new-php-logo.svg" alt="PHP" height="35" width="35"/>PHP 8.3.16
- <img src="https://www.vectorlogo.zone/logos/postgresql/postgresql-icon.svg" alt="Postgresql" height="35" width="35"/>PostgreSQL 17
