<?php

 /*
 * Database Class To Do Connection With Database
 * Provide Some Methods To Make Functionalty With Database
 */

 namespace Core;

 class Database {

    //Define Connection Authenection Permission

    private $DBAuth = array(
      'host' => DB_HOST,
      'name' => DB_NAME,
      'user' => DB_USER,
      'pass' => DB_PASS
    );

    //Define Handeler Variables

    private $DBh;
    private $Stmt;


    //Construct Function To Init PDO Object

    public function __construct() {

      $PDOption = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);
      $DSN = 'mysql:host=' . $this->DBAuth['host'] . ';dbname=' . $this->DBAuth['name'] . ';charset=utf8';

      try {
        $this->DBh = new \PDO($DSN, $this->DBAuth['user'], $this->DBAuth['pass']);
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

    }


    //Query Function To Fetch Admin Auth Permission
    public function query($sql) {
      $this->Stmt = $this->DBh->prepare($sql);
    }

    //Bind SQL Params To Avoid Injuction
    public function bindAuthParam($param, $value) {
      $this->Stmt->bindParam(':'.$param, $value);
    }

    //Funcion To Get True Query Or Not
    public function rowCount() {
      $this->Stmt->execute();
      if($this->Stmt->rowCount()) {
        return true;
      }
      return false;
    }

    //Function To Give Fetch Results
    public function getResults() {
      $this->Stmt->execute();
      return $this->Stmt->fetch(\PDO::FETCH_OBJ);
    }

    //Function To Give Fetch All Results
    public function getAllResults() {
      $this->Stmt->execute();
      return $this->Stmt->fetchAll(\PDO::FETCH_OBJ);
    }

   
 }