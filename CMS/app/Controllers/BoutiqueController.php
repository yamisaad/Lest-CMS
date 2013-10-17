<?php

Class BoutiqueController extends Core\mvc\Controller {

public  $panier = array();

    public function index() {
        $this->Output->view('boutique/index', array());
    }

    public function category($id) {
        $id = (int) $id;
        if ($id < 1) {
            $id = 1;
        }
        if (Session::get('id')) {



            $cat = $this->getCat($id);
            if (!($cache = $this->PCache->get('boutique/item_'.$cat))) {

                $cache = array(
                    'item' => $this->loadModel('Boutique')->itemCat($id),
                    'namecat' => $cat
                );
                $this->PCache->write($cache,'boutique/item_'.$cat, 0); // 600s = 10m
            }
            $this->Output->view('boutique/catboutique', $cache);
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function arme() {
        if (Session::get('id')) {

            $this->Output->view('boutique/armeboutique', array());
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function SelectPersonnage($id) {
        $id = (int) $id;
        if (Session::get('id')) {
            if ($this->loadModel('Boutique')->numPersonnage(Session::get('id')) < 1) {

                $this->Output->view('boutique/erreur', array('titre' => 'Personnages', 'contenu' => 'Vous devez au moins avoir un personnage pour recevoir l\'item'));
            } else {
                $Personnages = $this->loadModel('Boutique')->Personnage(Session::get('id'));
                $this->Output->view('boutique/selectpersonnage', array(
                    'objet' => $id,
                    'personnages' => $Personnages
                ));
            }
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function buy($id) {
        if (Session::get('id')) {
            $id = (int) $id;
            if (isset($_POST['submit'])) {
                $personnages = $_POST['personnage'];
                $accounts = $this->loadModel('Boutique')->accounts(Session::get('id'));
                $item = $this->loadModel('Boutique')->boutique($id);



                if ($accounts['points'] < $item['prix']) {
                    $this->Output->view('boutique/erreur', array('titre' => 'item', 'contenu' => 'Vous avez pas assez de points pour acheter ce item , je t\'invite d\'allez acheter plus de points .'));
                } else {
                    $points = $accounts['points'] - $item['prix'];
                    $this->loadModel('Boutique')->updatepoints(Session::get('id'), $points);
                    $this->loadModel('Boutique')->senditem($personnages, 21, $id);

                    Helper::redirect('boutique', 'sucess');
                }
            } else {
                Helper::redirect('home', 'index');
            }
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function sucess() {
        if (Session::get('id')) {

            $this->Output->view('boutique/sucess', array());
        } else {
            Helper::redirect('home', 'index');
        }
    }
/*******
*Systeme de panier sera integrer sur la prochaine version
********/
public function apanel(){
       if(isset($_SESSION['panier'])){

      if(array_key_exists($_POST['id'], $_SESSION['panier']))
        $_SESSION['panier'][$_POST['id']]++;
    else
        $_SESSION['panier'][$_POST['id']] = 1;
       }else{
       $_SESSION['panier'] = array();
       }
  
}
    private function getCat($id) {

        $item = require BASE . 'lang' . DS . 'itemcategory' . EXT;
        return $item[$id];
    }

}
