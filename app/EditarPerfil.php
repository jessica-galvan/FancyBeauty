<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class EditarPerfil extends Model{

    public function array(){
        $array = [
            'tipoPiel' => [
                [
                    "valor" => "n",
                    "dato" => "Normal"
                ],
                [
                    "valor" => "s",
                    "dato" => "Seca"
                ],
                [
                    "valor" => "g",
                    "dato" => "Grasa"
                ],
                [
                    "valor" => "m",
                    "dato" => "Mixta"
                ],
            ],

            'tonoPiel' => [
                [
                    "valor" => "cla",
                    "dato" => "Clara"
                ],
                [
                    "valor" => "med",
                    "dato" => "Media"
                ],
                [
                    "valor" => "osc",
                    "dato" => "Oscura"
                ],
                [
                    "valor" => "prof",
                    "dato" => "Profunda"
                ],
            ],

            'genero' => [
                [
                    "valor" => "fem",
                    "dato" => "Femenino"
                ],
                [
                    "valor" => "mas",
                    "dato" => "Masculino"
                ],
                [
                    "valor" => "otro",
                    "dato" => "Otro"
                ],
            ],

            'provincia' => [
                [
                    "valor" => "bsas",
                    "dato" => "Buenos Aires"
                ],
                [
                    "valor" => "caba",
                    "dato" => "Capital Federal"
                ],
                [
                    "valor" => "cat",
                    "dato" => "Catamarca"
                ],
                [
                    "valor" => "chu",
                    "dato" => "Chubut"
                ],
                [
                    "valor" => "cor",
                    "dato" => "Córdoba"
                ],
                [
                    "valor" => "corri",
                    "dato" => "Corrientes"
                ],
                [
                    "valor" => "entre",
                    "dato" => "Entre Ríos"
                ],
                [
                    "valor" => "for",
                    "dato" => "Formosa"
                ],
                [
                    "valor" => "juj",
                    "dato" => "Jujuy"
                ],
                [
                    "valor" => "laP",
                    "dato" => "La Pampa"
                ],
                [
                    "valor" => "laR",
                    "dato" => "La Rioja"
                ],
                [
                    "valor" => "men",
                    "dato" => "Mendoza"
                ],
                [
                    "valor" => "mi",
                    "dato" => "Misiones"
                ],
                [
                    "valor" => "neu",
                    "dato" => "Neuquén"
                ],
                [
                    "valor" => "rio",
                    "dato" => "Río Negro"
                ],
                [
                    "valor" => "sal",
                    "dato" => "Salta"
                ],
                [
                    "valor" => "sanJ",
                    "dato" => "San Juan"
                ],
                [
                    "valor" => "sanL",
                    "dato" => "San Luis"
                ],
                [
                    "valor" => "santaC",
                    "dato" => "Santa Cruz"
                ],
                [
                    "valor" => "sanF",
                    "dato" => "Santa Fe"
                ],
                [
                    "valor" => "santi",
                    "dato" => "Santiago del Estero"
                ],
                [
                    "valor" => "tierr",
                    "dato" => "Tierra del Fuego"
                ],
                [
                    "valor" => "tucu",
                    "dato" => "Tucumán"
                ],
            ],
        ];

        return $array;
    }

    function recuperarDato($indice, $valor){
        $listaArray = $this->array();
        foreach ($listaArray as $array => $subArray){
            if($array == $indice) {
                foreach ($subArray as $opcion) {
                    if($opcion['valor'] == $valor){
                        return $opcion['dato'];
                    }
                }
            }
        }
    }
}
