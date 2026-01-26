<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Artikel_model');
    }

    public function index() {
        if ($this->session->userdata('is_login')) {
            $data['articles'] = $this->Artikel_model->get_all();
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect('login','refresh');
        }
    }

    public function create() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/create_article');
        } else {
            $image = $this->_upload_image();
            
            $data = [
                'judul' => $this->input->post('title'),
                'slug'  => url_title($this->input->post('title'), 'dash', TRUE),
                'konten'=> $this->input->post('content'),
                'gambar' => $image,
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            ];
            $this->Artikel_model->insert($data);
            redirect('admin');
        }
    }

    public function edit($id) {
        $data['article'] = $this->Artikel_model->get_by_id($id);
        
        if (empty($data['article'])) show_404();

        $this->form_validation->set_rules('title', 'Title', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/edit_article', $data);
        } else {
            $update_data = [
                'judul' => $this->input->post('title'),
                'konten'=> $this->input->post('content'),
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            ];

            if (!empty($_FILES['image']['name'])) {
                $image = $this->_upload_image();
                if ($image) {
                    $update_data['gambar'] = $image;
                }
            }

            $this->Artikel_model->update($id, $update_data);
            redirect('admin');
        }
    }

    private function _upload_image()
    {
        $path = './uploads/artikel/';
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048; // 2MB
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return NULL; // Default to null or handle error
    }

    public function delete($id) {
        $this->Artikel_model->delete($id);
        redirect('admin');
    }
}