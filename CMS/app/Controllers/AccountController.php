<?php

Class AccountController extends Core\mvc\Controller {

    public function index() {
        Helper::redirect('home', 'index');
    }

    public function logout() {

        session_unset();
        session_destroy();
        Helper::redirect('home', 'index');
    }

    public function connexion() {
        if (!Session::get('id')) {


            if (isset($_POST['username']) && isset($_POST['username'])) {
                $username = htmlentities($_POST['username']);
                $password = htmlentities($_POST['password']);
                $modeLogin = $this->loadModel('Accounts')->Connexion($username);
                if (($username == $modeLogin['account']) and ($password == $modeLogin['pass'])) {
                    if ($modeLogin['banned'] == 1) {
                        $this->Output->view('connexion', array('error' => 'Votre compte a été bannis'));
                    } else {
                        Session::set('id', $modeLogin['guid']);

                        //Session::set('id', $modeLogin['guid']);
                        Session::set('password', $password);
                        Session::set('username', $username);
                        Session::set('points', $modeLogin['points']);
                        Session::set('level', $modeLogin['level']);
                        Session::set('vip', $modeLogin['vip']);




                        $this->Output->view('success', array('titre' => 'Connexion Réussite', 'contenu' => 'Connexion réussite ,  vous étes maitenant Connecter  '));
                        Helper::redirect('home', 'index');
                    }
                } else {
                    $this->Output->view('connexion', array('error' => 'Nom de Compte ou Mot de passe incorrect'));
                }
            }
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function inscription($id = 0) {
        $id = (int) $id;
        if ($id == 0) {
            $this->Output->view('inscription', array());
        } else {

            if (isset($_POST['submit'])) {
                extract($_POST);
                $username = htmlentities($_POST['username']);
                $password = htmlentities($_POST['password']);
                $rpassword = htmlentities($_POST['rpassword']);
                $pseudo = htmlentities($_POST['pseudo']);
                $email = htmlentities($_POST['email']);
                $question = htmlentities($_POST['question']);
                $reponse = htmlentities($_POST['reponse']);
                $captcha = htmlentities($_POST['captcha']);
                $erreurs = array();

                if (empty($username) || !preg_match('#^[a-z0-9_-]{4,24}$#i', $username)) {
                    $erreurs[] = 'Nom de compte incorrect';
                }
                if (empty($password) || !preg_match('#^[a-z0-9_-]{4,24}$#i', $password)) {
                    $erreurs[] = 'Mot de passe incorrect';
                }
                if (empty($rpassword) || $password !== $rpassword) {
                    $erreurs[] = 'Les deux mot de passes ne sont pas correspendants';
                }
                if (empty($pseudo) || !preg_match('#^[a-z0-9_-]{4,24}$#i', $pseudo)) {
                    $erreurs[] = 'Pseudo incorrect';
                }
                if (empty($email) || !preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i', $email)) {
                    $erreurs[] = 'Email Incorrect';
                }
                if (empty($question)) {
                    $erreurs[] = 'Question incorrect';
                }
                if (empty($reponse)) {
                    $erreurs[] = 'Reponse incorrect';
                }
                if ($captcha !== Session::get('captcha')) {
                    $erreurs[] = 'Captcha incorrect';
                }

                if (!empty($erreurs)) {
                    $this->Output->view('inscription', array('erreurs' => $erreurs));
                } else {
                    $modelAccount = $this->loadModel('Accounts');
                    if ($modelAccount->AccountExist($username)) {
                        $erreurs[] = 'Nom de compte deja existant';
                    }
                    if ($modelAccount->PseudoExist($pseudo)) {
                        $erreurs[] = 'Pseudo deja existant';
                    }
                    if ($modelAccount->EmailExist($email)) {
                        $erreurs[] = 'Email deja existant';
                    }
                    if (!empty($erreurs)) {
                        $this->Output->view('inscription', array('erreurs' => $erreurs));
                    } else {
                        Helper::redirect('home', 'index');
                    }
                }
            }
        }
    }

    public function cpassword($id = 0) {

        $id = (int) $id;
        if (!Session::get('id')) {
            if ($id == 0) {
                $this->Output->view('cpassword', array());
            } else {
                if (isset($_POST['submit'])) {
                    $question = htmlentities($_POST['question']);
                    $reponse = htmlentities($_POST['reponse']);
                    $captcha = htmlentities($_POST['captcha']);
                    $erreurs = array();
                    if (empty($question)) {
                        $erreurs[] = 'Question Incorrect';
                    }
                    if (empty($reponse)) {
                        $erreurs[] = 'Reponse incorrect';
                    }
                    if ($captcha !== Session::get('captcha')) {
                        $erreurs[] = 'Captcha incorrect';
                    }

                    if (!empty($erreurs)) {
                        $this->Output->view('cpassword', array('erreurs' => $erreurs));
                    } else {
                        $cpassword = $this->loadModel('Accounts')->verificateCpassword($reponse);
                        if (($reponse == $cpassword['reponse']) and ($question == $cpassword['question'])) {
                            if ($cpassword['banned'] == 1) {
                                $this->Output->view('erreur', array('titre' => 'Vous pouvez pas recevoir votre mot de passe parceque votre compte est banni !'));
                            } else {



                                $this->Output->view('successcpassword', array('titre' => ' Mot de passe Réussi', 'contenu' => 'Votre  mot de passe est :', 'mdp' => $cpassword['pass']));
                            }
                        } else {



                            $this->Output->view('erreur', array('titre' => 'Vos identifiant sont incorrect'));
                        }
                    }
                }
            }
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function Compte() {
        if (Session::get('id')) {


            $this->Output->view('compte', array('compte' => $this->loadModel('Accounts')->points(Session::get('id'))));
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function cspassword() {
        if (Session::get('id')) {

            if (isset($_POST['submit'])) {

                $erreur = array();
                if (empty($_POST['password'])) {
                    $erreur[] = 'mot de passe incorrect';
                }
                if (empty($_POST['question'])) {
                    $erreur[] = 'question incorrect';
                }
                if (empty($_POST['npassword']) || !preg_match('#^[a-z0-9._-]{6,32}$#i', $_POST['npassword'])) {
                    $erreur[] = 'nouveau mot de passe incorrect';
                }
                if (empty($_POST['reponse'])) {
                    $erreur[] = 'reponse incorrect';
                }
                if (empty($_POST['password']) == Session::get('password')) {
                    $erreur[] = 'Veuillez entrer votre mot de passe';
                }
                if ($_POST['captcha'] !== Session::get('captcha')) {
                    $erreur[] = 'Captcha incorrect';
                }
                if (!empty($erreur)) {
                    $this->Output->view('erreurs', array('erreur' => $erreur));
                } else {

                    $cspassword = $this->loadModel('Accounts')->cspassword(Session::get('id'));
                    if ($_POST['question'] == $cspassword['question'] and $_POST['reponse'] == $cspassword['reponse']) {

                        $cspasswords = $this->loadModel('Accounts')->changepassword($_POST['password'], $_POST['npassword']);
                        $this->Output->view('success', array('titre' => ' Mot de passe ', 'contenu' => 'Votre mot de passe a été parfaitement changer'));
                    } else {
                        $this->Output->view('erreur', array('titre' => 'Vos identifiant sont incorrect'));
                    }
                }
            }

            $this->Output->view('cspassword', array());
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function captcha() {
        $captcha = new Captcha;

        header('Content-type: image/png');
        Session::set('captcha', $captcha->generate());
        $captcha->show();
    }

    public function statistique() {
        if (!$this->Cache->startCache('statistique')) {
            $StatsModel = $this->loadModel('Accounts');
            $Personnage = $StatsModel->recuPersonnage();
            $NumPersonnage = $StatsModel->numPersonnage();
            $class = array(
                'feca',
                'osa',
                'enu',
                'sram',
                'xelor',
                'eca',
                'eni',
                'iop',
                'cra',
                'sadida',
                'sacri',
                'pandawa',
                'neutre',
                'ange',
                'demon',
                'mercenaire'
            );
            $class = array_fill_keys($class, 0);

            for ($i = 0; $i < $NumPersonnage; $i++) {

                switch ($Personnage[$i]['class']) {
                    case 1:
                        $class['feca'] +=1;
                        break;
                    case 2:
                        $class['osa'] +=1;
                        break;
                    case 3:
                        $class['enu'] +=1;
                        break;
                    case 4:
                        $class['sram'] +=1;
                        break;
                    case 5:
                        $class['xelor'] +=1;
                        break;
                    case 6:
                        $class['eca'] +=1;

                        break;
                    case 7:
                        $class['eni'] +=1;
                        break;
                    case 8:
                        $class['iop'] +=1;
                        break;
                    case 9:
                        $class['cra'] +=1;
                        break;
                    case 10:
                        $class['sadida'] +=1;
                        break;
                    case 11:
                        $class['sacri'] +=1;
                        break;
                    case 12:
                        $class['pandawa'] +=1;
                        break;
                    default:
                        echo "*";
                }
                if ($Personnage[$i]['alignement'] == 0) {
                    $class['neutre'] += 1;
                } elseif ($Personnage[$i]['alignement'] == 1) {
                    $class['ange'] += 1;
                } elseif ($Personnage[$i]['alignement'] == 2) {
                    $class['demon'] += 1;
                } else {
                    $class['mercenaire'] += 1;
                }
            }
            $pers = array();

            $pers['feca'] = $this->prc($class['feca'], $NumPersonnage);
            $pers['osa'] = $this->prc($class['osa'], $NumPersonnage);
            $pers['enu'] = $this->prc($class['enu'], $NumPersonnage);
            $pers['sram'] = $this->prc($class['sram'], $NumPersonnage);
            $pers['xelor'] = $this->prc($class['xelor'], $NumPersonnage);
            $pers['eca'] = $this->prc($class['eca'], $NumPersonnage);
            $pers['eni'] = $this->prc($class['eni'], $NumPersonnage);
            $pers['iop'] = $this->prc($class['iop'], $NumPersonnage);
            $pers['cra'] = $this->prc($class['cra'], $NumPersonnage);
            $pers['sadida'] = $this->prc($class['sadida'], $NumPersonnage);
            $pers['sacri'] = $this->prc($class['sacri'], $NumPersonnage);
            $pers['pandawa'] = $this->prc($class['pandawa'], $NumPersonnage);
            $pers['neutre'] = $this->prc($class['neutre'], $NumPersonnage);
            $pers['ange'] = $this->prc($class['ange'], $NumPersonnage);
            $pers['demon'] = $this->prc($class['demon'], $NumPersonnage);
            $pers['mercenaire'] = $this->prc($class['mercenaire'], $NumPersonnage);


            $this->Output->view('stats', array('personnage' => $pers));
        }
        $this->Cache->endCache();
    }

    public function prc($nombre, $nombrepersonnage) {
        return ceil($nombre * 100 / $nombrepersonnage);
    }

    public function vote() {
        $this->Output->view('vote', array());
    }

    public function voteaction() {
        $ModelVote = $this->loadModel('Accounts')->ModelVote(Session::get('id'));
        $date = time();
        $time = ($date - $ModelVote['heurevote']) / 60;
        if ($time > \Core\Core::get()->config['vote']) {
            $vote = $ModelVote['vote'] + 1;

            if (Session::get('vip') >= 1) {
                $points = $ModelVote['points'] + \Core\Core::get()->config['nmbvotevip'];
            } else {

                $points = $ModelVote['points'] + \Core\Core::get()->config['nmbvote'];
            }

            $ModelVotes = $this->loadModel('Accounts')->modifAccount($date, $vote, $points, Session::get('username'));
            //$this->Output->view('voteaction',array());
            Helper::rpg(\Core\Core::get()->config['lienrpg']);
        } else {
            $tmprestant = round(120 - $time, 0);
            $this->Output->view('erreurvote', array('contenu' => 'Vous ne pouvez pas votez vous devez attendre ', 'temps' => $tmprestant));
        }
    }

    public function vip() {
        if (Session::get('id')) {
            $this->Output->view('vip/Vipindex', array());
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function Vvip() {
        if (Session::get('id')) {
            if (!Session::get('vip')) {
                $Modelpoints = $this->loadModel('Accounts')->ModelVote(Session::get('id'));
                if ($Modelpoints['points'] < Helper::coutvip()) {
                    $this->Output->view('vip/ErreurVip', array('contenu' => 'Vous avez pas assez de points pour étre vip .'));
                } else {
                    $Rpoints = $Modelpoints['points'] - Helper::coutvip();
                    $this->loadModel('Accounts')->Updatepoints(Session::get('id'), $Rpoints);
                    $this->loadModel('Accounts')->UpdateVIP(Session::get('id'));
                    $this->Output->view('vip/SucessVip', array('contenu' => 'Vous étes maintenant VIP , vous devez deconnecter et se connecter pour voir la panel VIP !!'));
                }
            } else {
                Helper::redirect('home', 'index');
            }
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function achat() {
        if (Session::get('id')) {

            $this->Output->view('achat/index', array($this->Output->vars(
                        array('idd' => Helper::idd(),
                            'idp' => Helper::idp())
            )));
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function addachat() {
        if (Session::get('id')) {

            $ident = $idp = $ids = $idd = $codes = $code1 = $code2 = $code3 = $code4 = $code5 = $datas = '';
            $idp = Helper::idp();
            $idd = Helper::idd();
            $ident = $idp . ";" . $ids . ";" . $idd;
            if (isset($_POST['code1']))
                $code1 = $_POST['code1'];
            if (isset($_POST['code2']))
                $code2 = ";" . $_POST['code2'];
            if (isset($_POST['code3']))
                $code3 = ";" . $_POST['code3'];
            if (isset($_POST['code4']))
                $code4 = ";" . $_POST['code4'];
            if (isset($_POST['code5']))
                $code5 = ";" . $_POST['code5'];
            $codes = $code1 . $code2 . $code3 . $code4 . $code5;
            if (isset($_POST['DATAS']))
                $datas = $_POST['DATAS'];
            $ident = urlencode($ident);
            $codes = urlencode($codes);
            $datas = urlencode($datas);

            $get_f = @file("http://script.starpass.fr/check_php.php?ident=$ident&codes=$codes&DATAS=$datas");
            if (!$get_f) {
                exit("Votre serveur n'a pas accès au serveur de StarPass, merci de contacter votre hébergeur.");
            }
            $tab = explode("|", $get_f[0]);
            if (!$tab[1])
                $url = "http://script.starpass.fr/error.php";
            else
                $url = $tab[1];
            $pays = $tab[2];
            $palier = urldecode($tab[3]);
            $id_palier = urldecode($tab[4]);
            $type = urldecode($tab[5]);

            if (substr($tab[0], 0, 3) != "OUI") {
                header("Location: $url");
                exit;
            } else {

                $Modelpoints = $this->loadModel('Accounts')->ModelVote(Session::get('id'));
                $points = $Modelpoints['points'] + Helper::coutachat();
                $this->loadModel('Accounts')->addpoints(Session::get('id'), $points);
                Helper::redirect('account', 'Successachat');
            }
        } else {
            Helper::redirect('home', 'index');
        }
    }

    public function ErreurAchat() {
        if (Session::get('id')) {

            $this->Output->view('achat/erreur', array());
        } else {
            Helper::redirect('account', 'Successachat');
        }
    }

    public function Successachat() {
        $this->Output->view('achat/Sucess', array());
    }

    public function personnages() {
        if (Session::get('id')) {
            if (!($cache = $this->PCache->get('Accounts/personnages' . Session::get('id')))) {

                $cache = array('personnages' => $this->loadModel('Accounts')->SelectPersonnages(Session::get('id')));

                $this->PCache->write($cache, 'Accounts/personnages' . Session::get('id'), 600);
            }
            $this->Output->view('personnages', $cache);
        } else {
            Helper::redirect('home', 'index');
        }
    }

}