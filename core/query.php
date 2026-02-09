<?php

class Query
{
  private $db, $query, $reqType_select, $reqType_update;

  private static $host, $user,$dbname,$pass;

  public function __construct(){
    $this->db = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$user,self::$pass);
  }

  public static function connect($host,$dbname,$user,$pass){
    self::$host = htmlspecialchars(trim($host));
    self::$dbname = htmlspecialchars(trim($dbname));
    self::$user = htmlspecialchars(trim($user));
    self::$pass = htmlspecialchars(trim($pass));
  }

  // INSERT INTO table (champ1,champ) VALUES (?,?)
  public function insert($table){
    $this->query = "INSERT INTO $table ";
    return $this;
  }

  // SELECT * FROM table WHERE condition
  public function select($colone, $table){
    $this->reqType_select = "select";
    $this->query = "SELECT $colone FROM $table ";
    return $this;
  }
  public function select1($colone, $table){
    $this->reqType_select = "select";
    $this->query = "(SELECT $colone FROM $table ";
    return $this;
  }
  // DELETE FROM table WHERE condition
  public function delete($table){
    $this->query = "DELETE FROM $table ";
    return $this;
  }
  // UPDATE table SET nom_colonne_1 = 'nouvelle valeur',nom_colonne_2 = 'nouvelle valeur' WHERE condition
  public function update($table){
    $this->reqType_update = "update";
    $this->query = "UPDATE $table SET ";
    return $this;
  }
 //SELECT * FROM voiture INNER JOIN personne ON voiture.idPers = personne.id";
 public function inner_join($table2){
  $this->query .= "INNER JOIN $table2 ";
    return $this;
 }

public function on($table2, $table1){
  $this->query .= "ON $table1.id = $table2.idSender OR $table1.id = $table2.idReceiver ";
    return $this;
 }
  public function where($par, $champ, $operateur){
    $this->query .= "WHERE $par $champ $operateur ? ";
    return $this;
  }
  public function where2($champ, $operateur){
    $this->query .= "WHERE $champ $operateur ";
    return $this;
  }
  public function par(){
    $this->query .= ") ";
    return $this;
  }
 
  public function group_by($champ){
    $this->query .= "GROUP BY  $champ ";
    return $this;
  }
  public function order_by($champ1, $champ2){
    $this->query .= "ORDER BY  $champ1  $champ2";
    return $this;
  }

  public function andCondition($champ, $operateur){
    $this->query .= "AND $champ $operateur ? ";
    return $this;
  }
  public function orCondition($champ, $operateur, $par){
    $this->query .= "OR $champ $operateur ? $par";
    return $this;
  }
  public function parenthese2(){
    $this->query .= ") ";
    return $this;
  }
  public function parenthese1(){
    $this->query .= "( ";
    return $this;
  }

  public function champ($tab)
  {
    
    if(is_array($tab)){
      if($this->reqType_update == "update"){
      $champ = "";
      for($i = 0;$i < count($tab);$i++){
        $champ .= $tab[$i]." = ? ,";
      }
      $champ = trim($champ,",");
      $this->query .= "$champ";
      }else{
        $champ = "";
        $trous = "";
        for($i = 0;$i < count($tab);$i++){
          $champ .= $tab[$i]." ,";
          $trous .= "?,";
        }
        $champ = trim($champ,",");
        $trous = trim($trous,",");
        $this->query .= "($champ) VALUES ($trous)";
      }
    }else{
      echo "Le parametre du fonction champ() doit être de type array";
    }
    return $this;
  }

  public function execute($tab = ""){
    if(!empty($tab)){
      if($this->reqType_select == "select"){
        $req = $this->db->prepare($this->query);
        $req->execute($tab);
        return $req->fetchAll(PDO::FETCH_OBJ);
      }else{
        $req = $this->db->prepare($this->query);
        $req->execute($tab);
      }
    }else{
      if($this->reqType_select == "select"){
        $req = $this->db->prepare($this->query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
      }
    }
  }

  // public function getQuery()
  // {
  //   return $this->query;
  // }

}

// ============================================
// CONNEXION À LA BASE DE DONNÉES
// ============================================
Query::connect("localhost", "skillhubdb", "root", "");

$db = new Query();