<?php

    class Tache extends CI_Controller
    {
        
        // Create task
        public function create_task()
        {
            
            $this -> form_validation -> set_rules('description', 'description', 'required|max_length[255]',
                array(
                    'required' => 'Le champs %s est obligatoire.',
                    'max_length' => 'Le champs %s doit contenir au moins 255 caractères.'
                ));

            if($this -> form_validation -> run())
            {
                $this -> load -> model('mainmodel');
                $id_user = $this -> session -> id;
                $data = 
                    array(
                        'id_user' => $id_user, 
                        'description' => $this -> input -> post('description'),
                        'etat' =>  $this -> input -> post('etat'),
                        'date_creation' => $this -> input -> post('date_creation')          
                    );
                
                $this -> mainmodel -> create_task($data);
                redirect('accueil');
            }
            else
            {
                $this -> load -> view('viewNouvelleTache');
            } 
        }

        public function recover_task()
        {
            $id = $this -> uri -> segment(3);
            $this -> load -> model('mainmodel');
            $data['task'] = $this -> mainmodel -> get_task($id);
            $this -> load -> view('viewModifierTache', $data);
        }


        // Delete task
        public function delete_task()
        {
            $id = $this -> uri -> segment(3);
            $this -> load -> model('mainmodel');
            $this -> mainmodel -> delete_task($id);
            redirect('accueil');
        }

        // Deleted task confirmation
        public function deleled_task_confirmation()
        {
            $id = $this -> uri -> segment(3);
            $this -> load -> model('mainmodel');
            $data['task'] = $this -> mainmodel -> get_task($id);
            $this -> load -> view('viewConfirmerSuppression', $data);
        }
        
        // Update task
        public function update_task()
        {
            
            $this -> form_validation -> set_rules('description', 'description', 'required|max_length[255]',
                array(
                    'required' => 'Le champs %s est obligatoire.',
                    'max_length' => 'Le champs %s doit contenir au moins 255 caractères.'
                ));
    
            if($this -> form_validation -> run())
            {

                $id = $this -> input -> post('id');
                $user = $this -> session -> id;
    
                $data = 
                    array(
                        'id_user' => $user, 
                        'description' => $this -> input -> post('description'),
                        'etat' =>  $this -> input -> post('etat'),
                        'date_creation' => $this -> input -> post('date_creation')          
                    );
                $this -> load -> model('mainmodel');
                $this -> mainmodel -> update_task($id, $data);
                redirect('accueil');
            }
            else
            {
                $this -> load -> view('viewNouvelleTache');
            } 
        }

    // Finished task
    public function finished_task()
	{
        $id = $this -> uri -> segment(3);
        $id_user = $this -> uri -> segment(4);
        $this -> load -> model('mainmodel');
        $result = $this -> mainmodel -> get_task($id);

        if(count($result) > 0)
        {
            $task = $result[0];
            $data = 
                array(
                    'id' => $id, 
                    'id_user' => $id_user, 
                    'description' => $task -> description,
                    'etat' => 1, 
                    'date_creation' => $task -> date_creation
            );
            $this -> mainmodel -> update_task($id, $data);
            ///$data['tasks'] = $this -> mainmodel -> get_tasks_by_date($id);
            redirect('accueil');
        }
        else
        {
            $msg =  array('err_msg' => 'TODOAPP RETURN [Error].');
            $this -> session -> set_flashdata($msg);
            $form_auth = $this -> load -> view('viewAccueil', [], true);
            $page = array('page' => $form_auth);
            $this->load->view('viewAccueil', $page);
        }
    }
    
    // task in progress
    public function task_in_progress()
	{
        $id = $this -> uri -> segment(3);
        $id_user = $this -> uri -> segment(4);
        $this -> load -> model('mainmodel');
        $result = $this -> mainmodel -> get_task($id);
        
        if(count($result) > 0)
        {
            $user = $result[0];
            $data = 
                array(
                    'id' => $id, 
                    'id_user' => $id_user, 
                    'description' => $user -> description,
                    'etat' => 0, 
                    'date_creation' => $user -> date_creation
            );
            $this -> mainmodel -> update_task($id, $data);
            redirect('accueil');
        }
        else
        {
            $msg =  array('err_msg' => 'TODOAPP RETURN [Error].');
            $this -> session -> set_flashdata($msg);
            $form_auth = $this -> load -> view('viewAccueil', [], true);
            $page = array('page' => $form_auth);
            $this -> load->view('viewAccueil', $page);
        }
	}


        // Get all tasks
        public function get_all_tasks()
        {
            $this -> load -> model('mainmodel');
            $data['tasks'] = $this -> mainmodel -> get_all_tasks();
            redirect('accueil', $data);
        }
    }