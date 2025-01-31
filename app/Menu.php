<?php

namespace App;

class Menu
{
    public const DASHBOARD =  ['icon' => 'bi bi-grid', 'path' => '/'];

    public const OUVRAGE  = ['icon' => 'bi bi-wrench-adjustable', 'path' => 'ouvrages'];
    public const USER  = ['icon' => 'bi bi-person', 'path' => 'utilisateur'];
    public const ENQUETEUR  = ['icon' => 'bi bi-search', 'path' => 'enqueteur'];
    public const OBJECTIF = ['icon' => 'ri-focus-3-line', 'path' => 'objectifs'];
    public const COLLECTE = ['icon' => 'ri-database-2-line', 'path' => 'collecte'];


    // public const RESSOURCE = ['icon' => 'ri-folder-chart-line', 'path' => 'ressources', 'items' => [
    //     'Agences' => ['path' => 'ressources/coursiers'],
    //     'Communes' => ['path' => 'ressources/communes'],
    //     'Coursiers' => ['path' => 'ressources/agences']
    // ]];

    // public const SERVICES = ['icon' => 'bi bi-collection', 'path' => 'services', 'items' => [
    //     'Groupes Service' => ['path' => 'services/groupes-service'],
    //     'Services' => ['path' => 'services/services'],
    // ]];

    // public const GESTIONNAIRES = ['icon' => 'bi bi-person', 'path' => 'gestionnaires', 'items' => [
    //     'Gestionnaires' => ['path' => 'gestionnaires/gestionnaires'],
    //     'Suppervisseurs' => ['path' => 'gestionnaires/supperviseurs'],
    // ]];

    // public const DEMANDES = ['icon' => 'ri-file-list-2-line', 'path' => 'demandes', 'items' => [
    //     'Employeurs' => ['path' => 'demandes/employeurs-1'],
    //     'salariés' => ['path' => 'demandes/salaries-2'],
    //     'indépendants' => ['path' => 'demandes/independants-3'],
    //     'retraités' => ['path' => 'demandes/retraites-4']
    // ]];

    // public const RDV = ['icon' => 'ri-calendar-event-line', 'path' => 'rendez-vous', 'items' => [
    //     'Employeurs' => ['path' => 'rendez-vous/employeurs-1-rdv'],
    //     'salariés' => ['path' => 'rendez-vous/salaries-2-rdv'],
    //     'indépendants' => ['path' => 'rendez-vous/independants-3-rdv'],
    //     'retraités' => ['path' => 'rendez-vous/retraites-4-rdv']
    // ]];

    // public const DOSSIERS_CNPS = ['icon' => 'ri-folder-5-line', 'path' => 'dossiers-cnps', 'items' => [
    //     'Employeurs' => ['path' => 'dossiers-cnps/employeurs-1-dsr'],
    //     'salariés' => ['path' => 'dossiers-cnps/salaries-2-dsr'],
    //     'indépendants' => ['path' => 'dossiers-cnps/independants-3-dsr'],
    //     'retraités' => ['path' => 'dossiers-cnps/retraites-4-dsr']
    // ]];

    public static function sidebar()
    {

        $ValueSidebar = [];

        $ValueSidebar['Tableau de bord'] = self::DASHBOARD;
        $ValueSidebar['Collecte'] = self::COLLECTE;
        if (_user('role') != 'superviseur') {
            $ValueSidebar['Objectifs'] = self::OBJECTIF;
        }
        if (_user('role') == 'admin') {
            $ValueSidebar['Ouvrages'] = self::OUVRAGE;
        }
        if (_user('role') != 'superviseur') {
            $ValueSidebar['Enqueteur'] = self::ENQUETEUR;
        }
        if (_user('role') == 'admin') {
            $ValueSidebar['Utilisateurs'] = self::USER;
        }

        if (_user('role') != 'controleur') {
            $ValueSidebar['Collecte']['path'] = 'collecte/validation-n2';
        }

        // $ValueSidebar['Demandes'] = self::DEMANDES;
        // $ValueSidebar['Rendez-vous'] = self::RDV;
        // $ValueSidebar['Dossiers CNPS'] = self::DOSSIERS_CNPS;

        return $ValueSidebar;
    }
}
