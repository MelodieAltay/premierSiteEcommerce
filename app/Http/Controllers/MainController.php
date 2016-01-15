<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class MainController
 * @package App\Http\Controllers
 * Suffixé par le mot clef Controller
 * et doit hérité de la super classe Controller
 */
class MainController extends Controller
{
    public function accueil(){

        return view('Accueil');
    }
    public function contact(Request $request){

        //die(dump($request));
        if ($request->isMethod("POST")){

            $validator = Validator::make($request->all(),
                [
                    'userName' => 'required|min:3|max:255',
                    'userEmail' => 'required|email',
                    'userPhone' => 'required|numeric',
                    'userMsg' => 'required|max:1000',
                ],
                [
                'userName.required' => 'Attention le champ nom est vide',
                'required' => 'Attention le champ est vide',
                ]
            );

            if ($validator->fails())
            {
                return redirect()->route('contact')
                    ->withInput()
                    ->withErrors($validator);
            }

            Mail::send(['emails.contact-email', 'emails.contact-email-text'],
                ["data" => $request->all()], function ($message) {
                $message->from('contact@site-ecommerce.fr');
                $message->to('julien.boyer@3wa.fr');
                $message->subject("Formulaire de contact");
            });

            return redirect()->route('contact')->with('successContact', 'Votre message a bien été envoyé');
        }
        return view('contact');
    }


    /*---------- pages de test ---------------------*/
    public function essai()
    {
        return view('testController',[
            "firstname"=>"Ludo"
        ]);
    }

    public function tableau(){

        $products = [
            [
                "id" => 1,
                "title" => "Mon premier produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 10
            ],
            [
                "id" => 2,
                "title" => "Mon deuxième produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 20
            ],
            [
                "id" => 3,
                "title" => "Mon troisième produit",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 30
            ],
            [
                "id" => 4,
                "title" => "",
                "description" => "lorem ipsum",
                "date_created" => new \DateTime('now'),
                "prix" => 410
            ],
        ];

        // pour cibler un fichier dans un sous dossier : "chemin.acces.foo"
        return view('fichierTableau', ['products'=>$products]);

    }

    public function equipe(){

        $equipes = [
            [
                "id" => 1,
                "firstname" => "Marc",
                "lastname" => "Toto",
                "chef" => true,
                "description" => "Lorem ipsum",
                "statut" => "chef",
                "image" => "images/1.png"
            ],
            [
                "id" => 2,
                "firstname" => "Jean",
                "lastname" => "Michel",
                "chef" => false,
                "description" => "Lorem ipsum",
                "statut" => "graphiste",
                "image" => "images/3.jpg"
            ],
            [
                "id" => 3,
                "firstname" => "Martine",
                "lastname" => "a la plage",
                "chef" => false,
                "description" => "Lorem ipsum",
                "statut" => "developpeur",
                "image" => "images/2.jpg"
            ],
        ];

        return view('notre-equipe', ['equipe'=>$equipes]);
    }


}