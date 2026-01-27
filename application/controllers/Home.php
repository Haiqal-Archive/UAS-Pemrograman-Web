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
        $data['articles'] = $this->Artikel_model->get_all();
        
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

        $data['article'] = $this->Artikel_model->get_by_slug($slug);
        
        if (empty($data['article'])) {
            show_404();
        }

        // Parse Markdown-style code blocks
        $data['article']['konten'] = $this->_parse_content($data['article']['konten']);

        // Pass articles for potential sidebar usage or next/prev (even if view doesn't use it yet)
        $data['articles'] = $this->Artikel_model->get_all();
        $data['title'] = $data['article']['judul'] . ' - RustHub Docs';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('home/detail', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Parse Markdown content with syntax highlighting support
     * Uses Parsedown for standard Markdown, then enhances code blocks for Prism.js
     */
    private function _parse_content($text)
    {
        // Load Parsedown library
        require_once FCPATH . 'vendor/autoload.php';
        $parsedown = new Parsedown();
        
        // Convert Markdown to HTML
        $html = $parsedown->text($text);
        
        // Enhance code blocks for Prism.js syntax highlighting
        // Parsedown creates: <code class="language-rust">...</code>
        // Prism.js needs: <pre><code class="language-rust">...</code></pre>
        // We need to ensure proper wrapping and class names
        
        // Replace fenced code blocks with Prism-compatible format
        $html = preg_replace_callback(
            '/<code class="language-(\w+)">(.*?)<\/code>/s',
            function($matches) {
                $language = $matches[1];
                $code = $matches[2];
                return '<code class="language-' . $language . '">' . $code . '</code>';
            },
            $html
        );
        
        return $html;
    }
}
