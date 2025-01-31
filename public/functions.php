<?php

use App\Menu;
use GuzzleHttp\Psr7\Uri;
use Hamcrest\Type\IsBoolean;
use Illuminate\Support\Facades\Auth;

function sidebar()
{
    return Menu::sidebar();
}

function url_tab($key = '')
{
    if ($key == '') {
        return explode('/', request()->path()) ?? [];
    }

    $current = explode('/', request()->path())[$key] ?? '';

    return $current == '' ? '/' : $current;
}

function url_()
{
    return request()->path();
}

function map_data(array|object $data, array $arrayMap)
{
    $data = (array)$data;
    $datas = array();
    foreach ($arrayMap as $key => $value) :
        $key = (is_numeric($key)) ? $value : $key;
        if (isset($data[$value])) {
            $datas[$key] = $data[$value];
        }
    endforeach;

    return $datas;
}

function removeEmptyKeys($array) {
    return array_filter($array, function($value) {
        return !is_null($value) && $value !== '';
    });
}


function insert_table(array|object $table, array $data)
{
    $data = (array)$data;
    foreach ($data as $key => $value) {
        $table[$key] = $value;
    }
    return $table;
}

function map_data_rule(array|object $data, array $arrayMap)
{
    $data = (array)$data;
    $rules = array();
    foreach ($data as $key => $value) {
       if (isset($arrayMap[$key])) {
       $rules[$key] = $arrayMap[$key];
       }
    }
    return $rules;
}

 function select_modele( $model ,string $value, string $libele, $id_ref = null )
    { 
        $data = [];
        $dataModels = $model::all([$value, $libele]); 
        foreach ($dataModels as $dataModel)
        {
            $attr = ($id_ref == $dataModel[$value]) ? 'selected' : '';
            $data[$dataModel['id']."|{$attr}"] = $dataModel[$libele];
        }
        return $data;
    }

    function value_select( $dataModels ,string $value, string $libele, $id_ref = null )
    { 
        $data = []; 
        foreach ($dataModels as $dataModel)
        {
            $attr = ($id_ref == $dataModel[$value]) ? 'selected' : '';
            $data[$dataModel['id']."|{$attr}"] = $dataModel[$libele];
        }
        return $data;
    }


    function select_Table(array $table, $selectedOption = null)
    {
        $data = [];
        foreach ($table as $key => $value){
            $attr = ($selectedOption == $key) ? 'selected' : '';
            $data[$key."|{$attr}"] = $value;
        }
        return $data;
    }



// Fonction pour générer les attributs HTML
function generateAttribute($attributes = [])
{
    $html = '';
    foreach ($attributes as $key => $value) {

        if (is_bool($value) && $value === true) {
            $html .= ' '.$key.' ' ;
        }else if (is_bool($value) && $value !== true) {
            unset($attributes[$key]);
        }
        else {
            $html .= $key . '="' . htmlspecialchars($value) . '" ';
        }
        
    }
    return $html;
}

// Fonction pour générer un champ de formulaire avec Bootstrap
function formField($type, $name, $label, $options = [], $attributes = [])
{

    // Générer les attributs HTML à partir du tableau
    $attributesHtml = generateAttribute($attributes);

    // Créer le conteneur Bootstrap pour le champ
    $html = '';

    // Ajouter le label sauf pour les checkbox et radio
   // if ($type !== 'checkbox' && $type !== 'radio') {
        $html .= "<label for='{$name}' class='form-label'>{$label}</label>".PHP_EOL;
   // }

    // Générer les différents types de champs
    switch ($type) {
        case 'textarea':
            $html .= "<textarea class='form-control' id='{$name}' name='{$name}' {$attributesHtml}></textarea>".PHP_EOL;
            break;
        case 'select':
            $html .= "<select class='form-select' id='{$name}' name='{$name}' {$attributesHtml}>".PHP_EOL;
            foreach ($options as $valueAttr => $optionLabel) {
                $value = explode('|', $valueAttr)[0];
                $attr = explode('|', $valueAttr)[1] ?? '';
                $html .= "<option value='{$value}' {$attr}>{$optionLabel}</option>".PHP_EOL;
            }
            $html .= "</select>".PHP_EOL;
            break;
        case 'checkbox':
            foreach ($options as $value => $optionLabel) {
                $html .= "
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' name='{$name}[]' id='{$name}_{$value}' value='{$value}' {$attributesHtml}>
                    <label class='form-check-label' for='{$name}_{$value}'>{$optionLabel}</label>
                </div>";
            }
            break;
        case 'radio':
            foreach ($options as $value => $optionLabel) {
                $html .= "
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='{$name}' id='{$name}_{$value}' value='{$value}' {$attributesHtml}>
                    <label class='form-check-label' for='{$name}_{$value}'>{$optionLabel}</label>
                </div>";
            }
            break;
        default:
            $html .= "<input type='{$type}' class='form-control' id='{$name}' name='{$name}' {$attributesHtml} />".PHP_EOL;
            break;
    }

    return $html;
}


function tousNumeriques($array) {
    foreach ($array as $value) {
        if (!is_numeric($value)) {
            return false; // Si un élément n'est pas numérique, retourner false
        }
    }
    return true; // Si tous les éléments sont numériques, retourner true
}

function makeSlug($string) {
    // Convertir en minuscules
    $string = strtolower($string);
    
    // Remplacer les caractères accentués par leurs équivalents non accentués
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    
    // Supprimer les caractères non désirés (garder lettres, chiffres, tirets)
    $string = preg_replace('/[^a-z0-9-]+/', '-', $string);
    
    // Supprimer les tirets multiples
    $string = preg_replace('/-+/', '-', $string);
    
    // Supprimer les tirets en début ou fin de chaîne
    $string = trim($string, '-');
    
    return $string;
}


function removeAccents($string) {
    $accents = [
        'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
        'à' => 'a', 'â' => 'a', 'ä' => 'a',
        'ô' => 'o', 'ö' => 'o', 'ò' => 'o',
        'ù' => 'u', 'û' => 'u', 'ü' => 'u',
        'ç' => 'c', 'î' => 'i', 'ï' => 'i',
        'ñ' => 'n'
    ];

    return strtr($string, $accents);
}

function appClient()
{
    return 'http://127.0.0.1:8000/';
}

function _user(string $element){
   return Auth::user()->$element ?? null;
}