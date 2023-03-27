## Getting Started

### Requirements

1. Install [Docker & Docker Compose](https://docs.docker.com/compose/install/).
2. Install [Composer](https://getcomposer.org/).
3. Install [Git](https://git-scm.com/downloads).

### Launching application.

1. Run `git clone https://github.com/mdjnelson/hatchet-test.git hatchet-test`.
2. Run `cd hatchet-test`.
3. Run `cp .env.example .env`.
4. Run `composer install`.
5. Run `./vendor/bin/sail up -d`.
6. Run `./vendor/bin/sail artisan migrate --seed`.
7. Run `./vendor/bin/sail npm install`.
8. Run `./vendor/bin/sail npm run dev`.
9. Visit `http://localhost` to view the site.

### PHPUnit tests.

1. Run `./vendor/bin/sail artisan migrate --env=testing`.
2. These can be run by using `./vendor/bin/sail test`.
