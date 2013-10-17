<?php

Class HomeController extends Core\mvc\Controller {

    public function home() {
        
    }

    public function index($page = 1) {

        $page = (int) $page;
        if ($page < 1) {
            $page = 1;
        }


        if (!($cache = $this->PCache->get('home/index' . $page))) {
            $cache = array(
                'news' => $this->loadModel('News')->NewsLimit($page),
                'page' => ceil($this->loadModel('News')->NewsNumber() / \Core\Core::get()->config['News']['page']),
                'end' => $this->loadModel('News')->NewsNumber()
            );
            $this->PCache->write($cache, 'home/index' . $page, 600); // 600s = 10m
        }



        $this->Output->view('index', $cache);
    }

    public function comment($id) {
        $id = (int) $id;
        if ($id < 1) {
            $id = 1;
        }
        if (isset($_POST['submit'])) {
            $contenu = htmlentities($_POST['contenu']);
            $erreur = array();
            if (empty($contenu)) {

                $erreur[] = 'Commentaires incorrect ';
            }
            if (!empty($erreur)) {
                $this->Output->view('commentaires', array('erreur' => $erreur));
            } else {

                $modelComment = $this->loadModel('News')->modelComment($id, $contenu, Session::get('username'));
                $this->PCache->delete('home/comment/commentaires' . $id);
                $this->Output->view('success', array('titre' => 'Commentaires Postée', 'contenu' => 'Votre Commentaire a été poster'));
            }
        }
    }

    public function commentaires($id) {
        $id = (int) $id;
        if ($id < 1) {
            $id = 1;
        }
        if (!($cache = $this->PCache->get('home/comment/commentaires' . $id))) {


            $cache = array(
                'commentaires' => $this->loadModel('News')->CommentairesLimit($id),
                'news' => $this->loadModel('News')->NewsComment($id),
                'id' => $id
            );

            $this->PCache->write($cache, 'home/comment/commentaires' . $id, 600); // 600s = 10m
        }
        $this->Output->view('commentaires', $cache);
    }

    public function equipe() {
        if (!($cache = $this->PCache->get('home/equipe'))) {

            $cache = array('Equipe' => $this->loadModel('News')->Equipe());

            $this->PCache->write($cache, 'home/equie', 1200);
        }



        $this->Output->view('equipe', $cache);
    }

    public function rejoindre() {
        $this->Output->view('rejoindre', array());
    }

    public function telecharger($fichier) {
        if ($fichier == "client") {
            $line = BASE . 'download' . DS . \Core\Core::get()->config['client'];

            header("Content-Type: application/exe");
            header('Expires: 0');
            header("Content-Disposition: attachment; filename=" . \Core\Core::get()->config['client'] . "");
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header("Content-Transfer-Encoding: binary");
            header('Pragma: public');
            header("Content-Length: " . filesize($line));
            readfile($line);
        } else {
            $line = BASE . 'download' . DS . \Core\Core::get()->config['launcher'];

            header("Content-Type: application/exe");
            header('Expires: 0');
            header("Content-Disposition: attachment; filename=" . \Core\Core::get()->config['launcher'] . "");
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header("Content-Transfer-Encoding: binary");
            header('Pragma: public');
            header("Content-Length: " . filesize($line));
            readfile($line);
        }
    }

    public function reglement() {
        $this->Output->view('reglement', array());
    }

}

