<?php
Class AdminModel extends Core\mvc\Model{

public function modelNews($titre,$contenu,$auteur){
        $req = $this->db->prepare('INSERT INTO news(titre,auteur,contenu) VALUES( :titre, :auteur , :contenu)');
        $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu,
            'auteur'=>$auteur

    
        ));    
}
public function astaff($nom,$rang,$contenu){
   $req = $this->db->prepare('INSERT INTO equipe(nom,rang,contenu) VALUES( :nom, :rang , :contenu)');
        $req->execute(array(
            'nom' => $nom,
            'contenu' => $contenu,
            'rang'=>$rang

    
        ));
}
public function Sstaff($id){
	   $req = $this->db->prepare('DELETE  FROM equipe WHERE id = :id');
       $req->bindValue('id',$id);
       return  $req->execute();
}
public function Selectitem($id){
    $req = $this->db->prepare('SELECT * FROM `item_template` WHERE id=:id');
        $req->bindValue('id',$id);
        $req->execute();
       return $req->fetch();
}
public function InsertItem($name,$iditem,$type,$level,$prix,$stats){
        $req = $this->db->prepare('INSERT INTO boutique(name,iditem,type,level,prix,stats) VALUES( :name, :iditem , :type,:level,:prix,:stats)');
        $req->execute(array(
            'name' => $name,
            'iditem' => $iditem,
            'type'=>$type,
            'level'=>$level,
            'prix'=>$prix,
            'stats'=>$stats

    
        ));    
}
public function gnews(){
        $req =   $this->db->query('SELECT * FROM news ORDER BY id DESC');
        return $req->fetchAll();
}
public function snews($id){
   $req = $this->db->prepare('DELETE  FROM news WHERE id = :id');
       $req->bindValue('id',$id);
       return  $req->execute();
}
public function Pboutique($id){
    $req = $this->db->prepare('SELECT prix,type FROM `boutique` WHERE id=:id');
        $req->bindValue('id',$id);
        $req->execute();
       return $req->fetch();
}
public function Sboutique($id,$reduction,$solde){

        $req = $this->db->prepare('UPDATE boutique SET solde = :solde,prix=:reduction WHERE id =  :id');
  return  $req->execute(array(
    'id'=>$id,
    'reduction' => $reduction,
    'solde'=>$solde
    ));
}
}
    
  
