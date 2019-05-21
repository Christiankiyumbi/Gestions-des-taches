<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model 
{

    function insert_data($data)
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