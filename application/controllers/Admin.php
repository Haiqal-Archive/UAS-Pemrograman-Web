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
            $data['artikel'] = $this->Artikel_model->get_semua();
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect('login','refresh');
        }
    }

    public function tambah() {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/tambah_artikel');
        } else {
            $gambar = $this->_upload_gambar();
            
            $data = [
                'judul' => $this->input->post('judul'),
                'slug'  => url_title($this->input->post('judul'), 'dash', TRUE),
                'konten'=> $this->input->post('konten'),
                'gambar' => $gambar,
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            ];
            $this->Artikel_model->simpan($data);
            redirect('admin');
        }
    }

    public function edit($id) {
        $data['artikel'] = $this->Artikel_model->get_by_id($id);
        
        if (empty($data['artikel'])) show_404();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/edit_artikel', $data);
        } else {
            $update_data = [
                'judul' => $this->input->post('judul'),
                'konten'=> $this->input->post('konten'),
                'tanggal_dibuat' => date('Y-m-d H:i:s')
            ];

            if (!empty($_FILES['gambar']['name'])) {
                $gambar = $this->_upload_gambar();
                if ($gambar) {
                    $update_data['gambar'] = $gambar;
                }
            }

            $this->Artikel_model->update($id, $update_data);
            redirect('admin');
        }
    }

    private function _upload_gambar()
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

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        
        return NULL;
    }

    public function hapus($id) {
        $this->Artikel_model->hapus($id);
        redirect('admin');
    }
}