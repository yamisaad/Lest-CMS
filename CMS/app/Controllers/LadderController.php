<?php

Class LadderController extends Core\mvc\Controller {

    public function index() {
        $this->Output->view('ladder', array());
    }

    public function ladderxp() {

        if (!($cache = $this->PCache->get('ladder/xp'))) {
            $cache = array('ladderxp' => $this->loadModel('Ladder')->Ladderxp());
            $this->PCache->write($cache, 'ladder/xp', 1200);
        }


        $this->Output->view('ladderxp', $cache);
    }

    public function ladderpvp() {
        if (!$cache = $this->PCache->get('ladder/pvp')) {
            $cache = array('ladderpvp' => $this->loadModel('Ladder')->Ladderpvp());
            $this->PCache->write($cache, 'ladder/pvp', 1200);
        }

        //  $ladderpvp = $this->loadModel('Ladder')->Ladderpvp();
        $this->Output->view('ladderpvp', $cache);
    }

    public function laddervote() {

        if (!($cache = $this->PCache->get('ladder/vote'))) {
            $cache = array('laddervote' => $this->loadModel('Ladder')->Laddervote());
            $this->PCache->write($cache, 'ladder/vote', 0);
        }


        $this->Output->view('laddervote', $cache);
    }

}