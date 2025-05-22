# NP-Auto
Dit project en de applicatie hierin beschreven zijn gemaakt voor NP-auto. Deze website is gemaakt voor het beheren en verkopen occasions en het beheren en maken van onderhouds services en afspraken. 

De applicatie is responsive voor desktop, tablet of mobiel en is gemaakt met Laravel, livewire, filament en Tailwind CSS, met MYSQL voor de database opslag.


## Over het project

Deze website maakt het mogelijk op occasions, services, openingstijden en algemene informatie te beheren, de occasions te reserveren,
afspraken in te plannen en een overzicht te geven voor de al bestaande afspraken.

Gebruikers kunnen occasions filteren op basis van status zoals gereserveerd of alleen onverkochte autos.


### Features
- afspraken zijn in te plannen met een up to date kalender voor beschikbaarheid.
- Occasions zijn te filteren op meerdere criteria in de pagina.
- Website is responsive doormiddel van Tailwind CSS.
- Via het RDW api wordt data voor occasions opgehaald.

## Installatie
Volg de opnderstaande stappen om de applicatie werkend te zetten.

#### Benodigdheden

- MYSQL 8, voor de database
- PHP versie 8.2+
- Composer (laatse versie)
- NPM 8+
- De minimum software en hardware specificaties om laravel 12 en MYSQL 8 te gebruiken. 

#### Opzetten van de applicatie

- Clone de repository

- Ga naar de projectmap
cd jouwprojectnaam

- Installeer afhankelijkheden
composer install
npm install && npm run dev / npm run build (verschilt tussen lokaal en hosting)

- Kopieer .env bestand en genereer app key
cp .env.example .env
php artisan key:generate

- Voer migraties uit en vul voorgegeven data in
php artisan migrate --seed

- voor lokaal draaien: "php artisan serve"

## Software
- Laravel 12
- Livewire 3
- Filament 3.3
- MySQL 8
- Tailwind CSS
- Alpine.js

### Datapunten
Een paar belangrijke datapunten voor het gebruik van de website, bijvoorbeeld de data namen voor de informatie.

1. In de pagina voor informatie beheer, zijn er een paar namen waar mee rekening gehouden moet worden voor het aanmaken van de data van de website,
   deze zijn: "general_info" voor de tekst op de voorpagina,

   "phonenumber" voor het telefoonnummer op de website in de contactpagina en de footer.

   "email" voor de email te vinden in de footer, en in de contactpagina,

   "adress" voor het adress te vinden in de footer,

   "zipcode" voor de postcode te vinden in de footer


2. Occasions kunnen niet via het bewerken op gereserveerd gezet worden, dit wordt gedaan door een actuele reservatie te maken via de reserveringen pagina.


3. Een dag heeft 48 uur om in te plannen, dit betekent dat er bijvoorbeeld: 2 afspraken van een hele dag op een dag kunnen staan, of 4 van een halve dag.


4. Het project komt met ingebouwde data voor een hele dag en een halve dag, het is mogelijk om hier aan toe te voegen in onderhouds beheer,
   wel opletten dat de uren aantal onafhankelijk is van hoelang een werkdag is.

