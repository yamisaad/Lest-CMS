<?php
Class AccountsModel extends Core\mvc\Model{

    
    public function AccountExist($account)
    {
        $req = $this->db->prepare('SELECT COUNT(*) FROM accounts WHERE account = ?');
        $req->execute(array($account));
        $num_rows = $req->fetch();
        return $num_rows['COUNT(*)'] > 0;
    }
    
    public function PseudoExist($pseudo)
    {
        $req = $this->db->prepare('SELECT COUNT(*) FROM accounts WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $num_rows = $req->fetch();
        return $num_rows['COUNT(*)'] > 0;
    }
    public function EmailExist($email){
      $req = $this->db->prepare('SELECT COUNT(*) FROM accounts WHERE email = ?');
        $req->execute(array($email));
        $num_rows = $req->fetch();
        return $num_rows['COUNT(*)'] > 0;
    }
    public function CreateAccount($account, $pseudo, $pass, $question, $reponse, $email, $level = 0)
    {
        $req = $this->db->prepare('INSERT INTO accounts(account, pass, level, email, question ,reponse, pseudo) VALUES( :account, :pass, :level, :email, :question, :reponse, :pseudo)');
        $req->execute(array(
            'account' => $account,
            'pass' => $pass,
            'pseudo' => $pseudo,
            'question' => $question,
            'reponse' => $reponse,
            'level' => $level,
            'email' => $email
        ));
    }
        public function Connexion($account)
    
    {
        $req = $this->db->prepare('SELECT * FROM `accounts` WHERE account=:account');
        $req->bindValue('account',$account);
        $req->execute();
        return  $req->fetch();
      /*  if(count($data) !== 1)
        {
            return false;
        }
        */
    }
    public function verificateCpassword($reponse){
      $req = $this->db->prepare('SELECT * FROM `accounts` WHERE reponse=:reponse');
        $req->bindValue('reponse',$reponse);
        $req->execute();
        return  $req->fetch();
    }
    public function cspassword($guid){
              $req = $this->db->prepare('SELECT * FROM `accounts` WHERE guid=:guid');
        $req->bindValue('guid',$guid);
        $req->execute();
        return  $req->fetch();
    }
    public function changepassword($pass,$npass){
       $req = $this->db->prepare('UPDATE accounts SET pass=:npass WHERE pass=:pass');
        $req->bindValue('npass',$npass);
        $req->bindValue('pass',$pass);
        return $req->execute();

    }
    public function recuPersonnage(){
        return $this->db->query('SELECT * FROM personnages ')->fetchAll();
    }
      public function numPersonnage(){
        $data =  $this->db->query('SELECT COUNT(*) FROM personnages ')->fetch();
        return $data['COUNT(*)'];

    }
     public function ModelVote($guid){
        $req = $this->db->prepare('SELECT * FROM `accounts` WHERE guid=:guid');
        $req->bindValue('guid',$guid);
        $req->execute();
        return  $req->fetch();
     }
     public function modifAccount($dates,$vote,$points,$account){
   $data =  $this->db->prepare('UPDATE accounts set heurevote =:dates, vote = :vote , points = :points  where account = :account');
   $data->bindValue('dates',$dates);
   $data->bindValue('vote',$vote);
   $data->bindValue('points',$points);
   $data->bindValue('account',$account);
   return $data->execute();

     }
     public function Updatepoints($id,$points){
       $req = $this->db->prepare('UPDATE accounts SET points=:points WHERE guid=:id');
       $req->bindValue('id',$id);  
       $req->bindValue('points',$points);    
       return $req->execute();            
          

     }
        public function UpdateVIP($id){
       $req = $this->db->prepare('UPDATE accounts SET vip = :vip WHERE guid=:id');
       $req->bindValue('id',$id); 
       $req->bindValue('vip',1); 

       return $req->execute();            
          

     }
     public function addpoints($id,$points){

        $req = $this->db->prepare('UPDATE accounts SET points = :points WHERE guid =  :id');
  return  $req->execute(array(
    'points' => $points,
    'id'=>$id
    ));
     }
          public function points($guid){
        $req = $this->db->prepare('SELECT points,vip FROM `accounts` WHERE guid=:guid');
        $req->bindValue('guid',$guid);
        $req->execute();
        return  $req->fetch();
     }
            public function SelectPersonnages($id)
    
    {
        $req = $this->db->prepare('SELECT name,class,level FROM `personnages` WHERE account=:id');
        $req->bindValue('id',$id);
        $req->execute();
        return  $req->fetchAll();

    }


}