# Posta API

Laravel REST API az irányítószámos feladathoz.

## Indítás

```
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Teszt felhasználó: `admin@posta.hu` / `admin123`

## Végpontok

| Metódus | Végpont | Token kell | Leírás |
|---|---|---|---|
| POST | /api/login | nem | Bejelentkezés, tokent ad vissza |
| GET | /api/telepulesek | nem | Települések listája |
| GET | /api/telepulesek?search=sze | nem | Keresés névre vagy irányítószámra |
| GET | /api/telepulesek?megye=Pest | nem | Szűrés megyére |
| POST | /api/telepulesek | igen | Új település |
| PUT | /api/telepulesek/{id} | igen | Település módosítása |
| DELETE | /api/telepulesek/{id} | igen | Település törlése |

A tokent így kell küldeni: `Authorization: Bearer <token>`

## APIDOC

A dokumentáció a `docs` mappában van. Generálás:

```
npx apidoc -i app/Http/Controllers -o docs
```

## Bruno

A `bruno` mappát Brunóban az **Open Collection** gombbal lehet megnyitni. Először a **Login** kérést kell futtatni, a token utána automatikusan bekerül a többi kérésbe.
