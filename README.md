> [!IMPORTANT]
> ENGLISH BELOW

# Clubgolf Testaufgabe 2026

Vielen Dank für Deine Zeit. Wie angekündigt ist hier die kleine Testaufgabe, um zusehen wie Du ähnliche Aufgaben lösen würdest.

> [!CAUTION]
> Bitte investiere nicht mehr als 30 minuten Coding.
> Es ist ok, wenn nicht alle Teilaufgaben gelöst sind.

## Was du benötigst

- Eine IDE / Einen Editor deiner Wahl
- Docker

Du kannst auch deine eigene Umgebung nutzen und musst den Docker-Teil nicht verwenden.

## Einrichtung

1) **Forke** dieses Repository
2) Führe zum ersten Einrichten folgende Befehle aus:
    - `composer install`
    - `cp .env.example .env`
    - `./vendor/bin/sail up -d`
    - `./vendor/bin/sail artisan key:generate`
    - `./vendor/bin/sail artisan migrate`
3) Nun kannst du auf der Seite [http://laravel.test](http://laravel.test) (Fallback: [http://127.0.0.1](http://127.0.0.1) ) die Startseite einer neuen Laravel Instanz sehen

## Aufgaben

Bitte bearbeite jede Aufgabe einzeln, nacheinander. Checke jede Lösung zu einer Aufgabe einzeln ein.

Du löst Aufgabenteil 1:

- `git add .`
- `git commit -am 'task 1'` <-- jeweils die Nummer des Aufgabenteils
- `git push`

So können wir einfach und schnell nachvollziehen, was Du wie und wozu geändert hast.

Bleib einfach im `main` Branch.

> [!TIP]
> Du darfst alles benutzen: Composer-Pakete, Datenbank-Funktionen, Caching, Mathematik-Tricks, …

### Task 1

Führe `./vendor/bin/sail artisan db:seed --class GolferSeeder` aus, um Dir Golfer erstellen zu lassen.

Stelle sicher, dass der `GolferSeeder` für den `debitor_account` fortlaufende Nummern vergibt.

### Task 2

Egal wie oft Du den `GolferSeeder` ausführst, soll sichergestellt sein, dass jeder `debitor_account` nur einmal vergeben wird.

Der `GolferSeeder` soll für den `debitor_account` fortlaufende Nummern vergeben, die an die bereits erstellten `debitor_account` anknüpfen.

### Task 3

Erstelle einen API-Endpunkt der für zwei Koordinaten (bspw. Berlin: `52.5243` & `13.4105`) die 500 am nächsten wohnenden Golfer ausgibt.

### Task 4

Erstelle einen weiteren Endpunkt der das Ergebnis aus Task 3 als CSV Datei zum Download anbietet.

---

> [!NOTE]
> ENGLISH

# Clubgolf Test 2026

Thank you very much for your time. As promised here is a small test task to see how you'd solve such tasks.

> [!CAUTION]
> Please do not invest more than 30 minutes in coding.
> It's ok if not all tasks are completed.

## What you need

- An IDE / An Editor of your liking
- Docker

You can also use your existing setup and skip the Docker part.

## Setup

1) **Fork** this repository
2) Execute the following commands to get started:
    - `composer install`
    - `cp .env.example .env`
    - `./vendor/bin/sail up -d`
    - `./vendor/bin/sail artisan key:generate`
    - `./vendor/bin/sail artisan migrate`
3) Now [http://laravel.test](http://laravel.test) (fallback: [http://127.0.0.1](http://127.0.0.1) ) is available as home of this Laravel instance.

## Tasks

Please solve each task separately, one after another. Check in each solution individually.

To solve task 1:

- `git add .`
- `git commit -am 'task 1'` <-- change the number accordingly
- `git push`

This way it's easier for us to see how you solved each step.

Just stay in the `main` branch.

> [!TIP]
> You are allowed to use everything: Composer-packages, database functions, caching, math tricks, …

### Task 1

Execute `./vendor/bin/sail artisan db:seed --class GolferSeeder` to get a few golfers.

Ensure that the `GolferSeeder` uses consecutive numbers for the `debitor_account`.

### Task 2

No matter how often you run the `GolferSeeder`, you should ensure that each `debtor_account` is assigned only once.

The `GolferSeeder` should assign consecutive numbers to the `debtor_account` that are linked to the previously created `debtor_accounts`.

### Task 3

Create an API endpoint that returns the 500 nearest golfers for two coordinates (e.g. Berlin: `52.5243` & `13.4105`).

### Task 4

Create another endpoint that offers the result from Task 3 as a CSV file for download.
