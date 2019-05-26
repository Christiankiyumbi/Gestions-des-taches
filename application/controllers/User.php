<?php

    include_once('User.php');
    class User extends CI_Controller
    {
       
        // Connect user
        public function connect()
        {
            $this -> form_validation -> set_rules('login', 'login', 'required|min_length[5]|max_length[255]',
                array(
                    'required' => 'Le champs %s est obligatoire.',
                    'min_length' => 'Le [%s] doit contenir au moins 5 caractères.',
                    'max_length' => 'Le [%s] ne doit pas dépasser 255 caractères.'
                ));
            
            $this -> form_validation -> set_rules('pwd', 'password', 'required|min_length[8]|max_length[255]',
                array(
                    'required' => 'Le champs %s est obligatoire.',
                    'min_length' => 'Le [%s] doit contenir au moins 8 caractères.',
                    'max_length' => 'Le [%s] ne doit pas dépasser 255 caractères.'
            ));

            if($this -> form_validation -> run())
            {
                $login = $this -> input -> post('login');
                $pwd = $this -> input -> post('pwd');
                $data = array('pseudo' => $login, 'pwd' => $pwd);

                $this -> load -> model('mainmodel');
                $result = $this -> mainmodel -> get_user($data);

                if(count($result) > 0)
                {
                    $user = $result[0];
                    $data = 
                        array(
                                'id' => $user -> id, 
                                'login' => $user -> pseudo, 
                                'pwd' => $user -> pwd, 
                                'connected' => true
                            );
                    $this -> session -> set_userdata($data);
                    redirect('accueil');
                }
                else
                {
                    $msg =  array('err_msg' => 'Login ou mot de passe incorrect.');
                    $this->session->set_flashdata($msg);
                    $form_auth = $this -> load -> view('viewAuthentification', [], true);
                    $page = array('page' => $form_auth);
                    $this->load->view('viewAuthentification', $page);
                }
            }
            else
            {
                $this -> load -> view('viewAuthentification');
            } 
        }

        // Save user
        public function new_user()
        {
            $this -> form_validation -> set_rules('login', 'login', 'required|min_length[5]|max_length[255]',
            array(
                'required' => 'Le champs [%s] est obligatoire.',
                'min_length' => 'Le champs [%s] doit contenir au moins 5 caractères.',
                'max_length' => 'Le champs [%s] ne doit pas dépasser 255 caractères.'
            ));
        
            $this -> form_validation -> set_rules('pwd', 'password', 'required|min_length[8]|max_length[255]',
                array(
                    'required' => 'Le champs %s est obligatoire.',
                    'min_length' => 'Le champs [%s] doit contenir au moins 8 caractères.',
                    'max_length' => 'Le champs [%s] ne doit pas dépasser 255 caractères.'
            ));
    
            $this -> form_validation -> set_rules('confirmation', 'confirmation', 'required|min_length[8]|max_length[255]|matches[pwd]',
                array(
                    'required' => 'Le champs [%s] est obligatoire.',
                    'min_length' => 'Le champs [%s] doit contenir au moins 8 caractères.',
                    'max_length' => 'Le champs [%s] ne doit pas dépasser 255 caractères.',
                    'matches' => 'Le champs [%s] ne correspond pas au mot de passe'
            ));
    
            if($this -> form_validation -> run())
            {
            
                $this -> pseudo = $this -> input -> post('login');
                $this -> pwd =  $this -> input -> post('pwd');
                $data = 
                array(
                    'pseudo' => $this -> input -> post('login'),
                    'pwd' => $this -> input -> post('pwd')                
                );
                $this -> load -> model('mainmodel');
                $this -> mainmodel -> save_user($data);
                redirect('accueil/authentification');
            }
            else
            {
                $this -> load -> view('viewCreerCompte');
            } 
        }


        // Fetch all users
        public function get_all_users()
        {
            $this -> load -> model('mainmodel');
            $data['users'] = $this -> mainmodel -> get_all_users();
            $this -> load -> view('viewAccueil', $data);
        }


        // Update user
        public function update_user()
        {
            $id = $this -> uri -> segment(3);
            $this -> load -> model('mainmodel');
            $data['users'] = $this -> mainmodel -> update_user($id);
            // Return to the user profil
        }
 
 
        // Delete user
        public function delete_user()
        {
            $id = $this -> uri -> segment(3);
            $this -> load -> model('mainmodel');
            $this -> mainmodel -> delete_user($id);
            $this -> load -> view('viewConnexion');
        }

        public function deconnexion()
        {
            $this -> session -> unset_userdata('is_connected');
            redirect('accueil/authentification');
        }
    }
    