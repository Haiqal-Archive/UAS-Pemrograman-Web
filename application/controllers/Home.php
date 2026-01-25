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

        // Parse Markdown-style code blocks
        $data['artikel']['konten'] = $this->_parse_content($data['artikel']['konten']);

        // Pass articles for potential sidebar usage or next/prev (even if view doesn't use it yet)
        $data['articles'] = $this->Artikel_model->get_all_artikel();
        $data['title'] = $data['artikel']['judul'] . ' - RustHub Docs';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view('home/detail', $data);
        $this->load->view('layout/footer');
    }

    /**
     * Simple parser for Markdown Code Fences
     * Wraps ```rust ... ``` in <pre><code class="language-rust">...</code></pre>
     */
    private function _parse_content($text)
    {
        // Split by code blocks
        $parts = preg_split('/(```[\s\S]*?```)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
        
        $output = '';
        foreach ($parts as $part) {
            if (preg_match('/^```/', $part)) {
                // Code block found
                $lines = explode("\n", $part);
                
                // Get language (e.g., ```rust)
                $first_line = trim($lines[0]); 
                $language = str_replace('```', '', $first_line);
                if (empty($language)) $language = 'text'; // Default to text/none

                // Remove first line (```lang) and last line (```)
                array_shift($lines);
                if (trim(end($lines)) === '```') array_pop($lines);
                
                $code = implode("\n", $lines);
                
                // Escape code content but wrap in pre/code tags
                $output .= '<pre><code class="language-' . html_escape($language) . '">' . html_escape($code) . '</code></pre>';
            } else {
                // Regular Text
                // Escape HTML and convert newlines
                $output .= nl2br(html_escape($part));
            }
        }
        
        return $output;
    }
}
