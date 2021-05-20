<?php

namespace App;

use Assert\Assert;
use Assert\LazyAssertionException;

class Validation
{
    protected $notification;

    public function __construct()
    {
        $this->notification = new Notification();
    }

    public function execute(Request $request)
    {
        $isValid = $this->validateRequest($request);
        if ($isValid) {
            $this->notification->notify('<div style="color:green">votre fomulaire a ete valide avec succes !</div>');
        } else {
            $html = '<div style="color:black"><span style="color:red">%s</span> : %s</div>';
            foreach ($this->notification->getError() as  $key => $message) {
                $this->notification->notify(sprintf($html, $key, $message));
            }
        }
    }

    public function validateRequest(Request $request): bool
    {
        try {
            Assert::lazy()
                ->that($request->nom, 'nom')->string('Ce champ ne doit etre qu\'une chaine de caractere')->regex('(^[a-zA-Z ]+$)', 'Ce champ contient une chaine invalide')->notNull('Ce champ ne doit pas etre null')
                ->that($request->prenom, 'prenom')->string('Ce champ ne doit etre qu\'une chaine de caractere')->regex('(^[a-zA-Z ]+$)', 'Ce champ contient une chaine invalide')->notNull('Ce champ ne doit pas etre null')
                ->that($request->nomCompletPereOuMere, 'nom complet')->string('Ce champ ne doit etre qu\'une chaine de caractere')->regex('(^[a-zA-Z ]+$)', 'Ce champ contient une chaine invalide')->notNull('Ce champ ne doit pas etre null')
                ->that($request->telephoneMereOuPere, 'telephone')->regex('(^[0-9+]+$)', 'Ce champ contient une chaine invalide')
                ->that($request->dateDeNaissance, 'date de naissance')->date('d-m-Y', 'Le format de la date est invalide (exemple de date valide: 15-12-2021) ')
                ->verifyNow();
            return true;
        } catch (LazyAssertionException $e) {
            foreach ($e->getErrorExceptions() as $error) {
                $this->notification->addError($error->getPropertyPath(), $error->getMessage());
            }
            return false;
        }
    }
}
