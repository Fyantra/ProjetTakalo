<?php 
    $this->load->view("templatesAdmin/header");	
    $this->load->view("templatesAdmin/tableau");
    $this->load->view($contents); 
    $this->load->view("templatesAdmin/footer");	
?>
