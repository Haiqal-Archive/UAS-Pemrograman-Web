<?php
class Artikel_model extends CI_Model {
    public function get_all() {
        return $this->db->get('articles')->result_array();
    }

    public function get_by_slug($slug) {
        return $this->db->get_where('articles', ['slug' => $slug])->row_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('articles', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('articles', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('articles', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('articles');
    }
}