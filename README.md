[![Build Status](https://travis-ci.org/TuxBoy/repolinks.svg?branch=master)](https://travis-ci.org/TuxBoy/repolinks)

# repolinks v0.1 Bêta
C'est une application qui permet de garder dans un coin tous les liens (en rapport avec le développement web) que l'on trouve un peut partout, par exemple vous êtes au boulot, vous tombez sur un site intéressant mais vous n'avez pas le temps de le lire ou vous voulez vous en souvenir, c'est ici qu'entre en jeu RepoLinks (nom encore temporaire).
Dans RepoLinks, vous allez pouvoir voir également ce que d'autres utilisateurs ont postés et peut être découvrir de nouveaux site.

## Pourquoi cette application ?

Cette application m'a permis surtout de me former et de découvrir le framework Laravel dans un cas concret, mais aussi à répondre à une problématique personnelle; Se souvenir des liens que je vois un peut partout.

## Server Requirements

* PHP >= 7.0

## Installtion

```bash
> git clone https://github.com/TuxBoy/repolinks.git
> composer install
> php artisan migrate
```

## Tester l'application

```bash
> phpunit
```

## TODO

* Améliorer l'accès au formulaire d'ajout via une popup.
* Pouvoir créer des liens en privé.
