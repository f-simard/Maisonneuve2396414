# Maisonneuve2396414 - TP1

1. Creer projet Lavavel
```
composer create-project --prefer-dist laravel/laravel Maisonneuve2396414
```

2. Creer les models et fichier de migration correspondan
```
php artisan make:model City -m
php artisan make:model Student -m
```

3. Creer table dans la base de donnee

```
php artisan migrate
```
4. Saisir des villes en utilisant Seeder
```
php artisan make:seeder CitySeeder
php artisan db:seed --class=CitySeeder
```

6. Saisie des etudiants avec le Factory
```
php artisan make:factory StaudentFactory --model=Task
php artisan tinker
\App\Models\Task::factory()->times(100)->create();
```
