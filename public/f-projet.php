<?php

use App\Http\Controllers\RealisationController;

function getQuantiteSuperviseur($id_objectif = null){
    return RealisationController::getquantite_superviseur($id_objectif) ;
}

function getQuantiteEnqueteur($id_objectif = null){
    return RealisationController::getquantite_enqueteur($id_objectif) ;
}

function getQuantiteControleur($id_objectif = null){
    return RealisationController::getquantite_controleur($id_objectif) ;
}