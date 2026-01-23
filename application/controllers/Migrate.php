<?php

class Migrate extends CI_Controller
{

    public function index()
    {
        $this->load->library('migration');

        $target_version = $this->input->get('version');

        if ($target_version !== NULL) {
             if ($this->migration->version($target_version) === FALSE) {
                show_error($this->migration->error_string());
             } else {
                 echo 'Migration to version ' . $target_version . ' executed successfully!';
             }
             return;
        }

        if ($this->migration->latest() === FALSE)
        {
            show_error($this->migration->error_string());
        }
        else
        {
            echo 'Migration executed successfully!';
        }
    }

}
