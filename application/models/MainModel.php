<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model 
{

    function insert_tache($data)
    {
        $this -> db -> insert('tache', $data);
    }

    function insert_user($data)
    {
        $this -> db -> insert('user', $data);
    }
    
    function fetch_data()
    {
        $query = $this -> db -> query('SELECT * FROM tache ORDER BY id DESC');
        return $query;
    }

    public function fetch_user($data)
    {
        $this -> db -> where($data);
        $query = $this -> db ->get('user');
        $result = $query -> result();
        return  $result;
    }
/*
    function fetch_user($pwd)
    {
        $query = $this -> db -> query('SELECT * FROM user WHERE pwd = ' . $pwd );
        return $query;        
    }
*/
    function fetch_taches()
    {
        $query = $this -> db -> query('SELECT * FROM tache');
        return $query;
    }

    function tache_en_cours($en_cours)
    {
        $query = $this -> db -> query('SELECT * FROM tache WHERE etat = ' . $en_cours);
        return $query;
    }

    function fetch_users()
    {
        $query = $this -> db -> query('SELECT * FROM user ');
        return $query;
    }

    function delete_data($data)
    {
        $this -> db -> where('id', $data);
        $this -> db -> delete('tache');
    }

    function print_data($data)
    {
        $this -> db -> where('id', $data);
        $query = $this -> db -> get('tache');
        return $query;
    }
}