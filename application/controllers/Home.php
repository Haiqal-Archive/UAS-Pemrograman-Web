<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Artikel_model');
        $this->load->helper('text');
    }

    public function index()
    {
        $data['title'] = 'Home - RustHub Docs';
        $data['articles'] = $this->Artikel_model->get_all_artikel();
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('home/index', $data);
        $this->load->view('layout/footer');
    }

    public function detail($slug = NULL)
    {
        if ($slug === NULL) {
            redirect('home');
        }

        $data['artikel'] = $this->Artikel_model->get_artikel_by_slug($slug);
        
        if (empty($data['artikel'])) {
            show_404();
        }

        // Pass articles for potential sidebar usage or next/prev (even if view doesn't use it yet)
        $data['articles'] = $this->Artikel_model->get_all_artikel();
        $data['title'] = $data['artikel']['judul'] . ' - RustHub Docs';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('home/detail', $data);
        $this->load->view('layout/footer');
    }
}
