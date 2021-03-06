<?php
///////////////////////////////////////
///               GET               ///
///////////////////////////////////////


use dbproject\vue\VuePageHTMLBackOffice;
use dbproject\vue\VuePageHTMLFrontOffice;

$app->get('/', function () use ($app){
    print VuePageHTMLFrontOffice::header();
    (new dbproject\controleur\ControleurFrontOffice())->index();
    print VuePageHTMLFrontOffice::getFooter();
})->name("accueil");

$app->get('/enregistrement(/)', function (){
    print VuePageHTMLFrontOffice::header();
    (new dbproject\controleur\ControleurFrontOffice())->formulaireOk();
    print VuePageHTMLFrontOffice::getFooter();
})->name("formulaireOk");

$app->get('/echec(/)', function (){
    print VuePageHTMLFrontOffice::header();
    (new dbproject\controleur\ControleurFrontOffice())->formulaireEchec();
    print VuePageHTMLFrontOffice::getFooter();
})->name("formulaireEchec");

////////////////////////////////////

$app->get('/admin(/)', function (){
    print VuePageHTMLBackOffice::header();
    (new dbproject\controleur\ControleurBackOffice())->index();
    print VuePageHTMLBackOffice::getFooter();
})->name("connexionAdmin");

$app->get('/admin/deconnexion(/)',function(){
    print VuePageHTMLBackOffice::header();
    (new dbproject\controleur\ControleurBackOffice())->deconnexion();
    print VuePageHTMLBackOffice::getFooter();
})->name("deconnexion");

$app->get('/admin/gestion(/)',function(){
    print VuePageHTMLBackOffice::header();
    (new dbproject\controleur\ControleurBackOffice())->gestionCompte();
    print VuePageHTMLBackOffice::getFooter();
})->name("gestionCompte");

$app->get('/admin/gestion/creation(/)',function(){
    print VuePageHTMLBackOffice::header();
    (new dbproject\controleur\ControleurBackOffice())->creationCompte();
    print VuePageHTMLBackOffice::getFooter();
})->name("creationCompte");

$app->get('/admin/formulaire', function (){
    print VuePageHTMLBackOffice::header();
    (new dbproject\controleur\ControleurBackOffice())->affichageFormulaires();
    print VuePageHTMLBackOffice::getFooter();
})->name("listeFormulaires");

$app->get('/admin/formulaire/:no', function ($no){
    print VuePageHTMLBackOffice::header();
    (new dbproject\controleur\ControleurBackOffice())->affichageProjet($no);
    print VuePageHTMLBackOffice::getFooter();
})->name("projet");

$app->get('/admin/formulaire/recherche/:recherche', function ($recherche){
    print VuePageHTMLBackOffice::header();
    (new dbproject\controleur\ControleurBackOffice())->affichageRecherche($recherche);
    print VuePageHTMLBackOffice::getFooter();
})->name("recherche");

$app->get('/admin/formulaire/:no/supprimerFichier(/)', function ($no){
    (new dbproject\controleur\ControleurBackOffice())->supprimerFichier($no);
})->name("suppFichier");



///////////////////////////////////////
///               POST              ///
///////////////////////////////////////

$app->post('/postForm(/)',function(){
    (new dbproject\controleur\ControleurFrontOffice())->postFomulaire();
})->name("postFormulaire");

/////////////////////////////////////////////

$app->post('/postConnexion(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postConnexion();
})->name("postConnexion");

$app->post('/postCreationCompte(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postCreationCompte();
})->name("postCreationCompte");

$app->post('/postModifCompte(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postModificationCompte();
})->name("postModifCompte");
    
$app->post('/postSuppCompte(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postSuppressionCompte();
})->name("postSuppCompte");

$app->post('/postSupprForm(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postSuppressionFomulaire();
})->name("postSuppressionFormulaire");

$app->post('/postRedirection(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postRedirectionProjet();
})->name("postRedirection");

$app->post('/postModificationProjet(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postModificationProjet();
})->name("postModificationProjet");

$app->post('/postModificationRepresentant(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postModificationRepresentant();
})->name("postModificationRepresentant");

$app->post('/postModificationResponsable(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postModificationResponsable();
})->name("postModificationResponsable");

$app->post('/postModificationStructure(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postModificationStructure();
})->name("postModificationStructure");

$app->post('/postModificationCoFinanceur(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postModificationCoFinanceur();
})->name("postModificationCofinanceur");

$app->post('/postModificationParrain(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postModificationParrain();
})->name("postModificationParrain");

$app->post('/postModificationSuivi(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postModificationSuivi();
})->name("postModificationSuivi");

$app->post('/postAjoutFichier(/)',function(){
    (new dbproject\controleur\ControleurBackOffice())->postAjoutFichier();
})->name("postAjoutFichier");




///////////////////////////////////////
///             NOT FOUND           ///
///////////////////////////////////////

$app->notFound(function(){
    print VuePageHTMLFrontOffice::header();
    (new dbproject\controleur\ControleurError404())->affichageErreur();
    print VuePageHTMLFrontOffice::getFooter();
});