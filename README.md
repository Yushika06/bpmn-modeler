# User Roles

-   Client > Normal
-   Admin > Admin

# Setup

```bash
composer update
```

```bash
php artisan migrate:fresh
or
php artisan migrate:refresh
```

```bash

php artisan db:seed --class=ProvincesTableSeeder
php artisan db:seed --class=CitiesTableSeeder
php artisan db:seed --class=CompanySizeTableSeeder

```

```bash
npm install
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init
npm run dev && npm run build
```

```bash
php artisan key:generate
```

# Env 

```bash
cp .env.example .env
```

```
# Env Database

# Database PostgreSqL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=alurkerja
DB_USERNAME=postgres
DB_PASSWORD=postgres

# Database MySqL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alurkerja
DB_USERNAME=root
DB_PASSWORD=
```

# Env Google, Github, and Gitlab
```
GOOGLE_CLIENT_ID=1088120285078-51dfnhboccc3ch66q0aj7meaogd3c3m3.apps.googleusercontent.com
GOOGLE_CLIENT_SECRET=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
GOOGLE_CALLBACK=http://127.0.0.1:8000/auth/google/callback

GITHUB_CLIENT_ID=Ov23likH08FdDUOagI4A
GITHUB_CLIENT_SECRET=c056ac8ac8fa24bfe256c396647d72deaefc4415
GITHUB_CALLBACK=http://127.0.0.1:8000/auth/github/callback

GITLAB_CLIENT_ID=6d4100c8f1508f99fac5b1c6f20e6e768bd43b8118e8ab8b29a5d46f7f373838
GITLAB_CLIENT_SECRET=c056ac8ac8fa24bfe256c396647d72deaefc4415
GITLAB_CALLBACK=http://127.0.0.1:8000/auth/gitlab/callback
```
