<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_controller {

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
		$this->load->view('login');	
	}
	
	public function goToinscription()
	{
		$this->load->view('inscription');	
	}

	public function deconnect(){
		$this->session->unset_userdata('user');
		redirect('welcome/index');
	}

	public function checkUser(){
        $mail = $this->input->post('mail');
        $mdp = $this->input->post('mdp');

		$this->load->model('fonction_model');
		$result=$this->fonction_model->login($mail,$mdp);

		$data['id'] = $result;

		if($result!=0)
		{
			$this->session->set_userdata('user', $result);
			if($result==1)
				redirect('Userlog/adminPage');
				// $this->load->view('test',$data);
				redirect('Userlog/userPage');
			// $this->load->view('test',$data);
		}
		$this->load->view('login');
    }

	public function inscription()
	{
		$name = $this->input->post('name');
		$mail = $this->input->post('mail');
        $mdp = $this->input->post('mdp');

		$this->fonction_model->inscription($name,$mail,$mdp);
		$result=$this->fonction_model->login($mail,$mdp);

		$data['id'] = $result;

		$this->session->set_userdata('user', $result);
		redirect('Userlog/userPage');
		// $this->load->view('test',$data);
	}

	public function modifyCategorie(){
        $name = $this->input->post('name');
		$this->fonction_model->modifyCategorie($name);
		redirect('Userlog/adminPage');
	}

	public function envoi()
	{
		$this->load->view('page/envoi');
	}

	public function envoi2()
	{
		$this->load->view('page/envoi2');
	}

	public function do_upload(){
        $config = array(
        'upload_path' => "./uploads/",
        'allowed_types' => "gif|jpg|png|jpeg|pdf",
        'overwrite' => TRUE,
        'max_size' => "10048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'max_height' => "768",
        'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload())
        {
        $data = array('upload_data' => $this->upload->data());
        $this->load->view('envoi2',$data);
        }
        else
        {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('envoi', $error);
        }
        }
}
