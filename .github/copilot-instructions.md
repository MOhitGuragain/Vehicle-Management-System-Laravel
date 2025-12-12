# Copilot / AI Agent Guidance for this Repository

Purpose: enable AI coding agents to be productive quickly by describing project shape, key workflows, and concrete places to change code.

- Project type: Laravel 12 application scaffold (Breeze auth) with Vite/Tailwind front-end. See `composer.json` and `package.json` for stacks and scripts.

- Big picture:
  - HTTP surface: `routes/web.php` and `routes/auth.php` (Breeze). Controllers live under `app/Http/Controllers/`.
  - Domain models: `app/Models/` (example: `User.php` uses `Spatie\Permission\Traits\HasRoles`).
  - Views: Blade templates in `resources/views/` and view components in `app/View/Components` + `resources/views/components`.
  - Assets: `resources/js/app.js`, `resources/css/app.css`, built by Vite. Config: `vite.config.js`.
  - DB migrations & seeds: `database/migrations/`, `database/seeders/`, with factories in `database/factories/`.
  - Tests: PHPUnit plus Laravel test helpers — tests live in `tests/Feature` and `tests/Unit`. See `phpunit.xml` (uses sqlite in-memory for tests).

- Important integrations / packages:
  - `spatie/laravel-permission`: role/permission system; code expects roles middleware like `role:admin` in routes (see `routes/web.php`).
  - `laravel/breeze`: auth routes and views under `routes/auth.php` and `resources/views/auth`.
  - Frontend toolchain: `vite`, `tailwindcss`, `alpinejs` configured in `package.json` and `tailwind.config.js`.

- Local developer workflows (concrete commands):
  - Initial setup (recommended):
    1. `composer install`
    2. `cp .env.example .env` (or copy manually on Windows)
    3. `php artisan key:generate`
    4. configure DB in `.env` (SQLite or local MySQL)
    5. `php artisan migrate --force`
    6. `npm install` and `npm run dev` (or `npm run build` for production)
  - Shortcuts defined in `composer.json`:
    - `composer run-script setup` — runs install, env copy, migrate, and frontend build steps.
    - `composer run-script dev` — concurrently runs `php artisan serve`, queue listener, pail, and Vite dev server.
    - `composer run-script test` — clears config and runs `php artisan test`.
  - Running tests: `composer run-script test` or `php artisan test` (phpunit.xml config uses in-memory sqlite by default).

- Code & pattern notes for agents:
  - Use Laravel patterns: controllers -> requests -> models -> views. Validation is often in `app/Http/Requests/`.
  - Blade templates may conditionally load built assets: look for `public/build/manifest.json` or Vite (`@vite([...])`) in views (example: `resources/views/welcome.blade.php`).
  - Role/permission checks use Spatie middleware and `HasRoles` on `User` — when adding admin routes, ensure permissions/roles are seeded or created by seeders.
  - Jobs/queues: composer `dev` script runs `php artisan queue:listen` — long-running queue work is expected locally for background processing.

- Testing & CI considerations:
  - Tests run against an in-memory sqlite DB by default (see `phpunit.xml`). Prefer factories in `database/factories/` for test data.
  - Avoid touching environment-specific config in tests; use Laravel's testing helpers and `RefreshDatabase` traits where appropriate.

- Where to change common things (examples):
  - Add a new route and controller: `routes/web.php` -> `app/Http/Controllers/YourController.php` -> view in `resources/views/`.
  - Add model fields: migration in `database/migrations/`, update `app/Models/*` `$fillable` and casts accordingly.
  - Frontend changes: `resources/js/app.js` and `resources/css/app.css`; rebuild with `npm run build` or run Vite with `npm run dev`.

- Safety and merge guidance for agents:
  - Do not modify configuration secrets in `.env` files. If creating migrations, follow timestamp naming convention in `database/migrations/`.
  - When adding middleware that requires roles/permissions, ensure a seeder or migration creates the required roles (Spatie patterns).

If anything above is unclear or you want examples added (e.g., a short example of adding a route+controller+test), tell me which area to expand.
