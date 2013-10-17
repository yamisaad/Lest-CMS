<?php
Class LadderModel extends Core\mvc\Model{

public function Ladderxp(){
  return $data  = $this->db->query('SELECT p.name , p.class, p.kamas , p.level ,p.xp ,p.honor FROM personnages p JOIN accounts a ON p.account = a.guid WHERE a.level < 1 ORDER BY xp DESC LIMIT 50')->fetchAll();
   // return  $data = $this->db->query('SELECT name,class,kamas,xp,honor,level FROM personnages ORDER BY xp DESC LIMIT 50')->fetchAll();
    
}
public function Ladderpvp(){
 return $data  = $this->db->query('SELECT p.name , p.class, p.kamas , p.level ,p.xp,p.alignement ,p.honor FROM personnages p JOIN accounts a ON p.account = a.guid WHERE a.level < 1 ORDER BY honor DESC LIMIT 50')->fetchAll();
   //return  $data = $this->db->query('SELECT name,class,kamas,xp,honor,level FROM personnages ORDER BY xp DESC LIMIT 50')->fetchAll();
    
}
public function Laddervote(){
 return $data  = $this->db->query('SELECT account,vote FROM accounts  ORDER BY vote DESC LIMIT 50')->fetchAll();
   //return  $data = $this->db->query('SELECT name,class,kamas,xp,honor,level FROM personnages ORDER BY xp DESC LIMIT 50')->fetchAll();
    
}
    
  
}