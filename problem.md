<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Timetable Management and Monitoring

La Plateforme de Gestion et de suivi des emplois du temps à l’institut Supérieur ISSTMADD est un système numérique intégré conçu pour faciliter l'administration, la gestion et la programation des cours éducatif. Elle permet aux enseignants, aux étudiants et aux administrateurs de gérer et de suivre facilement les activités pédagogiques en ligne et en présentiel.

## Analyse des besoin

## Identification des acteurs

Cycle(id_cycle, nom, description, nb_niveau)

Niveau(id_niveau, numero, nom, description)

Cycle 1 -- 1..* Niveau

### Diagramme des cas Utilisation

![Diagrame de cas d'utilisation](design\useCase-Diagram.png)

### Diagramme de Classe

![Diagrame de cas d'utilisation](design\classDiagram.svg)
