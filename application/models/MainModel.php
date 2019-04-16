<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

    function insert_data($data){
        $this -> db -> insert('tabletaches', $data);
    }

    function fetch_data(){
        $query = $this -> db -> query('SELECT * FROM tabletaches ORDER BY idTache DESC');
        return $query;
    }

    function delete_data($data){
        $this -> db -> where('idTache', $data);
        $this -> db -> delete('tabletaches');
    }

    function print_data($data){
        $this -> db -> where('idTache', $data);
        $query = $this -> db -> get('tabletaches');
        return $query;
    }
}