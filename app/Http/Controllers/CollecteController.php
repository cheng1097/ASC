<?php

namespace App\Http\Controllers;

use App\Models\TypeOuvrage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CollecteController extends Controller
{
    public function index(){
        //$date = Carbon::tomorrow()->format('Y-m-d');
        $date = request('date') ? request('date') : Carbon::today()->format('Y-m-d');
        $enqueteurs = ObjectifController::getEnqueteurWithObjectif($date);
        $ouvrages = TypeOuvrage::all();
        $option1 = 'collecte';
        $route_collecte = route('save-collecte');
       
        $view = view(
            'components.objectif.liste-objectif-component',
            compact(
                'enqueteurs',
                'ouvrages',
                'option1',
                'route_collecte'
            )
            );
       
        // $tabs = [
        //     [ // vue données collecter
        //         'title' => 'Données collectées',
        //         'action' => view(
        //             'components.objectif.liste-objectif-component',
        //             compact(
        //                 'enqueteurs',
        //                 'ouvrages',
        //                 'option1',
        //                 'route_collecte'
        //             )
        //         )
        //     ],
        //     [ //vue validation
        //         'title' => 'Validation Niveau 1',
        //         'action' => view(
        //             'components.objectif.liste-objectif-component',
        //             compact(
        //                 'enqueteurs',
        //                 'ouvrages',
        //                 'option2',
        //                 'route_validation_n1'
                       
        //             )
        //         )
        //     ],
        //     [ //vue validation
        //         'title' => 'Validation Niveau 2 ',
        //         'action' => view(
        //             'components.objectif.liste-objectif-component',
        //             compact(
        //                 'enqueteurs',
        //                 'ouvrages',
        //                 'option3',
        //                 'route_validation_n2'
        //             )
        //         )
        //     ],
        // ];
        return view('pages.collecte', compact('view'));
    }

    public function validation_n1(){
        //$date = Carbon::tomorrow()->format('Y-m-d');
        $date = request('date') ? request('date') : Carbon::today()->format('Y-m-d');
        $enqueteurs = ObjectifController::getEnqueteurWithObjectif($date);
        $ouvrages = TypeOuvrage::all();
        $option2 = 'v-controleur';
        $route_validation_n1 = route('validation-n1');

        $view =  view(
            'components.objectif.liste-objectif-component',
            compact(
                'enqueteurs',
                'ouvrages',
                'option2',
                'route_validation_n1'
               
            )
            );

            return view('pages.collecte', compact('view'));
    }

    public function validation_n2(){
        //$date = Carbon::tomorrow()->format('Y-m-d');
        $date = request('date') ? request('date') : Carbon::today()->format('Y-m-d');
        $enqueteurs = ObjectifController::getEnqueteurWithObjectif($date);
        $ouvrages = TypeOuvrage::all();
        $option3 = 'v-superviseur';
        $route_validation_n2 = route('validation-n2');

        $view = view(
            'components.objectif.liste-objectif-component',
            compact(
                'enqueteurs',
                'ouvrages',
                'option3',
                'route_validation_n2'
            )
            );

            return view('pages.collecte', compact('view'));
    }
}
