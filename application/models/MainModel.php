<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model 
{

    //
    function insert_tache($data)
    {
        $this -> db -> insert('tache', $data);
    }

    //
    function insert_user($data)
    {
        $this -> db -> insert('user', $data);
    }
    
    //
    function fetch_data($id)
    {
        $query = $this -> db -> query('SELECT * FROM tache WHERE id_user = ' . $id);
        return $query;
    }

    //
    function fetch_data_by_date($id)
    {
        $this -> db -> where('id_user', $id);
        $query = $this -> db -> query('SELECT * FROM tache  WHERE id_user = ' . $id . ' ORDER BY date_creation');
        return $query;
    }

    //
    function delete_data($data)
    {
        $this -> db -> where('id', $data);
        $this -> db -> delete('tache');
    }

    //
    function get_taches($id)
    {
        $this -> db -> where('id', $id);
        $query = $this -> db -> get('tache');
        $result = $query -> result();
        return $result ;
    }

    function update_tache($id, $data)
    {
        $this -> db -> where('id', $id);
        $this -> db -> update('tache', $data);
    }

    //
    public function get_user($data)
    {
        $this -> db -> where($data);
        $query = $this -> db -> get('user');
        $result = $query -> result();
        return  $result;
    }

    /******************************************************************************** */
    /*
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
    */
}