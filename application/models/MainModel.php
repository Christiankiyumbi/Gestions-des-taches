<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model 
{

    /** Operations about user */

    // Save user
    function save_user(User $user)
    {
        $this -> db -> insert('user', $user);
    }

    function get_user($user)
    {
        $this -> db -> where($user);
        $query = $this -> db -> get('user');
        $result = $query -> result();
        return  $result;
    }

    // Get all users
    public function get_all_users()
    {
        $query = $this -> db -> query('SELECT * FROM user');
        return $query;
    }


    // Update user
    function update_user(User $user, $id)
    {
        $this->db->update('user', $user, array('id' => $id));
    }


    // Delete user
    function delete_user(User $user)
    {
        
    }









    

    /** Operations about task */

    // Create task
    function create_task(Tache $tache)
    {
        $this -> db -> insert('tache', $tache);
    }

    // Get just one task
    function get_task($id)
    {
        $query = $this -> db -> query('SELECT * FROM tache WHERE id = ' . $id);
        $result = $query -> result();
        return $result;
    }


    // Delete task
    function delete_task($id)
    {
        $this -> db -> where('id', $id);
        $this -> db -> delete('tache');
    }
    
    // Update task
    function update_task($id, $tache)
    {
        $this -> db -> where('id', $id);
        $this -> db -> update('tache', $tache);
    }

    // Get tasks by date
    function get_tasks_by_date($id)
    {
        $this -> db -> where('id_user', $id);
        $query = $this -> db -> query('SELECT * FROM tache  WHERE id_user = ' . $id . ' ORDER BY date_creation');
        return $query;
    }

    // Get all tasks
    function get_all_tasks()
    {
        $query = $this -> db -> query('SELECT * FROM tache');
        return $query;
    }

    // Get user's tasks
    function get_user_tasks($id)
    {
        $this -> db -> where('id', $id);
        $query = $this -> db -> get('tache');
        $result = $query -> result();
        return $result ;
    }

}