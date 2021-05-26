<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p>Travis</p>

[![Build Status](https://travis-ci.com/Ampheris/mvc_project.svg?branch=main)](https://www.travis-ci.com/canax/router)

<p>Scrutinizer</p>

[![Build Status](https://scrutinizer-ci.com/g/Ampheris/framework/badges/build.png?b=main)](https://scrutinizer-ci.com/g/canax/database/build-status/master) [![Code Coverage](https://scrutinizer-ci.com/g/Ampheris/framework/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/canax/router/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Ampheris/framework/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/canax/database/?branch=master)

# Mitt projekt

MVC project är slutprojektet för kursen MVC. Applikationen innehåller spelet Dice 21 med ens highscore plus vadslagning.
Det finns även en sida för olika böcker som är lagrade i min databas.

## Installation

Du kan clona mitt projekt via **HTTPS** genom denna url:en
https://github.com/Ampheris/framework.git

**SSH**:
`git@github.com:Ampheris/framework.git`

eller **GitHub CLI:**
`gh repo clone Ampheris/framework`

## Köra programmet
För att kunna köra projektet behöver du se till att ha uppdaterat din composer via

`composer dump`

`make install`

`make test`

Kör koden ovan för att installera projektet. Se även till att ha composer installerat på din egna maskin. Ifall du
använder dig av phpstorm, se då till så du har laravel pluginet för att kunna köra en lokal vm.

Du kan även behöva köra följande kod för att se till så allting är rensat:

`php artisan route:clear`

`php artisan config:clear`

`php artisan view:clear`

även följande för att uppdatera databasen

`php artisan migrate`

