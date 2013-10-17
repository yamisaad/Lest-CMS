<?php

Class AdminController extends Core\mvc\Controller {

    public function index() {
        $this->Output->view('admin/index', array());
    }

    public function anews($id = 0) {
        $id = (int) $id;

        if ($id == 0) {
            $this->Output->view('admin/anews', array());
        } else {
            if (isset($_POST['submit'])) {
                $erreurs = array();
                if (empty($_POST['titre'])) {
                    $erreurs[] = 'Le champs Titre est vide';
                }
                if (empty($_POST['contenu'])) {
                    $erreurs[] = 'Le champs Contenu est vide';
                }
                if (!empty($erreurs)) {
                    $this->Output->view('admin/anews', array('erreurs' => $erreurs));
                } else {


                    $modelNews = $this->loadModel('Admin')->modelNews($_POST['titre'], $_POST['contenu'], Session::get('username'));
                    $this->PCache->delete('home/index');
                    $this->Output->view('success', array('titre' => ' News ajouter ', 'contenu' => 'Votre News a été parfaitement ajouter !'));
                }
            }
        }
    }

    public function astaff() {
        if (Session::get('level') >= 4) {

            if (isset($_POST['submit'])) {

                $erreurs = array();
                if (empty($_POST['nom'])) {
                    $erreurs[] = 'Le champs Titre est vide';
                }
                if (empty($_POST['rang'])) {
                    $erreurs[] = 'Le champs Contenu est vide';
                }
                if (empty($_POST['contenu'])) {
                    $erreurs[] = 'Le champs Contenu est vide';
                }
                if (!empty($erreurs)) {
                    $this->Output->view('admin/astaffErreur', array('erreurs' => $erreurs));
                } else {
                    $modelStaff = $this->loadModel('Admin')->astaff($_POST['nom'], $_POST['rang'], $_POST['contenu']);
                    $this->Output->view('success', array('titre' => ' Staff ajouter ', 'contenu' => 'Le staff a été parfaitement ajouter !'));
                }
            } else {

                Helper::redirect('home', 'index');
            }
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function Sstaff($id) {
        $id = (int) $id;

        if (Session::get('level') >= 4) {
            $modelStaff = $this->loadModel('Admin')->Sstaff($id);
            $this->Output->view('success', array('titre' => ' Staff Supprimer ', 'contenu' => 'Le staff a été parfaitement Supprimer !'));
        } else {

            Helper::redirect('home', 'index');
        }
    }

    public function aboutique() {
        if (Session::get('level') >= 4) {

            $this->Output->view('admin/aboutique', array());
        } else {

            Helper::redirect('home', 'index');
        }
    }

    public function aitem() {
        if (Session::get('level') >= 4) {

            if (isset($_POST['submit'])) {

                extract($_POST);
                $id = htmlentities($id);
                $cout = htmlentities($cout);
                $modelitem = $this->loadModel('Admin')->Selectitem($id);
//var_dump($modelitem);
                $this->loadModel('Admin')->InsertItem($modelitem['name'], $modelitem['id'], $modelitem['type'], $modelitem['level'], $cout, $modelitem['statsTemplate']);
                $this->Output->view('admin/Sucess', array());
            } else {
                $this->Output->view('admin/aitem', array());
            }
        } else {

            Helper::redirect('home', 'index');
        }
    }

    public function gnews() {
        if (Session::get('level') >= 4) {

            $gnews = $this->loadModel('Admin')->gnews();
            $this->Output->view('admin/gnews', array('news' => $gnews));
        } else {

            Helper::redirect('home', 'index');
        }
    }

    public function snews($id) {
        if (Session::get('level') >= 4) {

            $id = (int) $id;
            $this->loadModel('Admin')->snews($id);
            $this->Output->view('success', array('titre' => ' News Supprimer ', 'contenu' => 'La news a été parfaitement Supprimer !'));
        } else {

            Helper::redirect('home', 'index');
        }
    }

    public function Soldeboutique($id) {
        if (Session::get('level') >= 4) {

            $id = (int) $id;
            $this->Output->view('boutique/Soldeboutique', array('id' => $id));
        } else {

            Helper::redirect('home', 'index');
        }
    }

    public function Soldevalide($id) {
        $id = (int) $id;
        if (Session::get('level') >= 4) {
            if (isset($_POST['submit'])) {
                extract($_POST);
                $solde = htmlentities($_POST['solde']);
                $points = $this->loadModel('Admin')->Pboutique($id);
                $reduction = $points['prix'] - $solde;
                $cat = $this->getCat($points['type']);
                $this->PCache->delete('boutique/item_' . $cat);
                $this->loadModel('Admin')->Sboutique($id, $reduction, $solde);
                $this->Output->view('success', array('titre' => 'Solde Suceess', 'contenu' => 'L\'item a été parfaitement modifer  !'));
            } else {
                Helper::redirect('home', 'index');
            }
        } else {

            Helper::redirect('home', 'index');
        }
    }

    private function getCat($id) {

        $item = require BASE . 'lang' . DS . 'itemcategory' . EXT;
        return $item[$id];
    }

}