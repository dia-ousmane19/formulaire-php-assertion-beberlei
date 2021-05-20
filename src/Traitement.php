<?php

namespace App;

class Traitement
{
    public function process()
    {
        $request = new Request();
        $request->nom = $_POST['nom'];
        $request->prenom = $_POST['prenom'];
        $request->nomCompletPereOuMere = $_POST['nomCompletPereOuMere'];
        $request->telephoneMereOuPere = $_POST['telephoneMereOuPere'];
        $request->dateDeNaissance = $_POST['dateDeNaissance'];
        $validation = new Validation();
        $validation->execute($request);
    }
}
