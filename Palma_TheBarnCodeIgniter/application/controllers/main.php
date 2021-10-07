<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model("main_model"); 
		$data["fetch_data"] = $this->main_model->fetch_data();
          $this->load->view('barn/index', $data);
	}

 	public function form_validation()  
      {  
           //echo 'OK';  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules("username", "Username", 'required');  
           $this->form_validation->set_rules('username', 'Username', 'required|is_unique[feedback.username]');
           $this->form_validation->set_rules("message", "Message", 'required');

           if($this->form_validation->run())  
           {  
                //true  
                $this->load->model("main_model");  
                $data = array(  
                     "username"   => $this->input->post("username"),  
                     "message"    => $this->input->post("message")  
                );  
                if($this->input->post("insert"))  
                {  
                     $this->main_model->insert_data($data);  
                     redirect(base_url() . "main/inserted");  
                }  
           }  
           else  
           {  
                //false  
                $this->index();  
           }  
      }  

      public function inserted()  
      {  
           $this->index();  
      }  

}
