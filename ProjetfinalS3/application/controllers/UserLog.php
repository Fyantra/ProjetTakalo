<?php defined('BASEPATH') OR exit('No direct script access allowed');
include('BaseSession.php');
class Userlog extends BaseSession{

    public function adminPage()
    {
        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
        $result=$this->fonction_model->getallcategorie();
        $data['listCategorie'] = $result;

		$data['contents'] = 'pageAdmin/AllCategorie';

		$this->load->view('templatesAdmin/templates', $data);        
    }

    public function userPage()
    {
        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
        $result=$this->fonction_model->getYourObjects($idUser);
        $data['listCategorie'] = $result;

		$data['contents'] = 'pages/AllCategorie';

		$this->load->view('templates/templates', $data);
    }

    public function listObjet()
    {
        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
        $data['ido1'] = $this->input->get('ido1');
        $result=$this->fonction_model->getOtherObjects($idUser);
        $data['listCategorie'] = $result;

		$data['contents'] = 'pages/proposition';

		$this->load->view('templates/templates', $data);
    }

    public function addObjet()
    {
        $idcategorie=$this->input->GET('idcategorie');
        $idUtilisateur = $this->session->userdata('user');
        $nom=$this->input->GET('nom');
        $description=$this->input->GET('description');
        $prix=$this->input->GET('prix');
        $this->fonction_model->addObjet($idcategorie,$idUtilisateur,$nom,$description,$prix);
	    
        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
        $result=$this->fonction_model->getYourObjects($idUser);
        $data['listCategorie'] = $result;

		$data['contents'] = 'pages/AllCategorie';

		$this->load->view('templates/templates', $data);
    }

    public function addCategorie(){
		$name = $this->input->post('name');
        $this->fonction_model->addCategorie($name);
		redirect('Userlog/adminPage');

        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';

        $result=$this->fonction_model->getallcategorie();

        $data['listeCategorie'] = $result;
        
		$data['contents'] = 'pages/ajoutObjet';
        $this->load->view('templatesAdmin/templates',$data);
	}

    public function modifyCategorie(){
        $name = $this->input->post('name');
		$this->fonction_model->modifyCategorie($name);
		redirect('Userlog/adminPage');
	}

    public function getAllObjects(){
		$result=$this->fonction_model->getAllObjects();
        $data['objects'] = $result;
	    $this->load->view('test',$data);
    }

    public function getObject($id){
		$result=$this->fonction_model->getObject($id);
        $data['objects'] = $result;
	    $this->load->view('test',$data);
    }

    public function refuser()
    {
        $id=$this->input->GET('idproposition');
        $result=$this->fonction_model->refuser($id);

        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pages/listeProposition';

        $result=$this->fonction_model->getotherproposition($idUser);

        $data['listeProposition'] = $result;

		$this->load->view('templates/templates', $data);
    }

    public function echange()
	{
        $idproposition=$this->input->GET('idproposition');
        $idutilisateur1=$this->input->GET('u1');
        $idutilisateur2=$this->session->userdata('user');;
        $idobjet1=$this->input->GET('o1');
        $idobjet2=$this->input->GET('o2');
        $this->fonction_model->echange($idproposition,$idutilisateur1,$idutilisateur2,$idobjet1,$idobjet2);

        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pages/listeProposition';
        $result=$this->fonction_model->getotherproposition($idUser);

        $data['listeProposition'] = $result;

		$this->load->view('templates/templates', $data);
	}

    public function propositionechange()
    {
        $idobjet1=$this->input->GET('ido1');
        $idobjet2=$this->input->GET('ido2');
        $this->load->model('fonction_model');
        $this->fonction_model->propositionechange($idobjet1,$idobjet2);
	    

        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
        $result=$this->fonction_model->getYourObjects($idUser);
        $data['listCategorie'] = $result;

		$data['contents'] = 'pages/AllCategorie';

		$this->load->view('templates/templates', $data);
    }

    public function addPhoto()
    {
        $idObject=$this->input->GET('idObjet');

        $this->load->library('upload');

        $config['upload_path'] = site_url("assets/image/");
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 1024;
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        
        if (!$this->upload->do_upload('photo'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $file_name = $data['upload_data']['file_name'];
        }

        $this->fonction_model->addPhoto($file_name,$idObject);
    }

    public function totalUser()
    {
        $result=$this->fonction_model->totalUser();
        $data['totalUser'] = $result;
	    $this->load->view('test',$data);
    }

    public function echangeInformation()
    {
        $result=$this->fonction_model->echangeInformation();
        $data['listObjet'] = $result;
	    $this->load->view('test',$data);
    }

    public function allCategorie()
	{
		$this->load->view('pages/allCategorie');
	}

    public function listeProposition()
	{
        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';

        $result=$this->fonction_model->getotherproposition($idUser);

        $data['listeProposition'] = $result;
        
		$data['contents'] = 'pages/listeProposition';

		$this->load->view('templates/templates', $data);

	}

    public function getotherproposition(){
        $idutilisateur=$this->session->userdata('user');
        $this->load->model('fonction');
        $this->fonction_model->getotherproposition($idutilisateur);
        $this->load->view('');
    }

    public function getmyproposition(){
        $idutilisateur=$this->input->GET('idutilisateur');
        $this->load->model('fonction');
        $this->fonction_model->getmyproposition($idutilisateur);
        $this->load->view('');
    }

    public function ajout()
    {
        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';

        $result=$this->fonction_model->getallcategorie();

        $data['listeCategorie'] = $result;
        
		$data['contents'] = 'pages/ajoutObjet';
        $this->load->view('templates/templates',$data);
    }

    public function ajoutCategorie()
    {
        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
        
		$data['contents'] = 'pageAdmin/ajoutCategorie';
        $this->load->view('templatesAdmin/templates',$data);
    }

    public function updateCategorie()
    {
        $id=$this->input->post('id');
        $nom=$this->input->post('nom');

        $this->fonction_model->updateCategorie($id,$nom);
        
        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pageAdmin/AllCategorie';

        $result=$this->fonction_model->getallcategorie();
        
        $data['listCategorie'] = $result;

        $this->load->view('templatesAdmin/templates',$data);
    }

    public function deleteCategorie()
    {
        $idcategorie=$this->input->GET('idCategorie');
        $this->fonction_model->deleteCategorie($idcategorie);

        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pageAdmin/AllCategorie';

        $result=$this->fonction_model->getallcategorie();
        
        $data['listCategorie'] = $result;

        $this->load->view('templatesAdmin/templates',$data);

    }

    public function modifiercategorie(){
        $idcategorie = $this->input->get('id');
        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pageAdmin/changecategorie';
        
        $result=$this->fonction_model->getCategorie($idcategorie);

        $data['categorie'] = $result;

        $this->load->view('templatesAdmin/templates',$data);
    }
    
    public function modifierSupprimerCategorie(){
        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pageAdmin/changecategorie';
        
        $result=$this->fonction_model->getallcategorie();
        
        $data['listeCategorie'] = $result;

        $this->load->view('templatesAdmin/templates',$data);
    }

    public function userInscrit()
    {
        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pageAdmin/userInscrit';
        
        $result=$this->fonction_model->totalUser();
        
        $data['userInscrit'] = $result;
        $data['listUser'] = $this->fonction_model->getAllUser();

        $this->load->view('templatesAdmin/templates',$data);
    }

    public function totalEchange()
    {
        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pageAdmin/echange';
        
        $result=$this->fonction_model->totalEchange();

        $data['totalEchange'] = $result;

        $this->load->view('templatesAdmin/templates',$data);        
    }

    public function rechercheObjet()
    {
        $idcategorie=$this->input->get('categorie');
        $motCle=$this->input->get('motcle');

        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pages/resultatRecherche';

        $result=$this->fonction_model->rechercheObjet($idcategorie,$motCle);
        $data['listCategorie'] = $result;

	    $this->load->view('templates/templates', $data);         
    }

    public function goRecherche()
    {
        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pages/recherche';

        $result=$this->fonction_model->getallcategorie();
        
        $data['listeCategorie'] = $result;

	    $this->load->view('templates/templates', $data);        
    }


    //////////////////////////////////////////////////////////////////////////////

    public function modifierobjet()
    {
        $idobjet=$this->input->GET('idobjet');
        $idcategorie=$this->input->GET('idcategorie');
        $nom=$this->input->GET('nom');
        $description=$this->input->GET('description');
        $prix=$this->input->GET('prix');
        $this->load->model('fonction_model');
        $this->fonction_model->modifierobjet($idobjet,$idcategorie,$nom,$description,$prix);

        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
        $result=$this->fonction_model->getYourObjects($idUser);
        $data['listCategorie'] = $result;

		$data['contents'] = 'pages/AllCategorie';

		$this->load->view('templates/templates', $data);
    }

    public function versmodifierobjet(){
        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pages/modifierObjet';
        
        $idobjet=$this->input->GET('idobjet');
        
        $result=$this->fonction_model->getallcategorie();
        $valueobjet=$this->fonction_model->getObjects($idobjet);

        $data['listeCategorie'] = $result;
        $data['valueobjet']=$valueobjet;

        $this->load->view('templates/templates',$data);   
    }

    public function deleteobjet(){
        $idobjet=$this->input->GET('idobjet');
        $this->fonction_model->deleteobjet($idobjet);

        $data['title'] = $this->session->userdata('user');
        $idUser = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
        $result=$this->fonction_model->getYourObjects($idUser);
        $data['listCategorie'] = $result;

		$data['contents'] = 'pages/AllCategorie';

		$this->load->view('templates/templates', $data);
    } 
    
    public function vershistorique(){
        $data['title'] = $this->session->userdata('user');
		$data['description'] = 'The description';
		$data['keywords'] = 'Les mots cles';
		$data['contents'] = 'pages/historiqueEchange';
        
        $result=$this->fonction_model->echangeInformation();

		$data['listehistorique'] = $result;
    
        $this->load->view('templates/templates',$data);   
    }
}
?>