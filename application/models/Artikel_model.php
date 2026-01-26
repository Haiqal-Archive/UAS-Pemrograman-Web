<?php
class Artikel_model extends CI_Model {
    public function get_all() {
        return $this->db->get('artikel')->result_array();
    }

    public function get_by_slug($slug) {
        return $this->db->get_where('artikel', ['slug' => $slug])->row_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('artikel', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('artikel', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('artikel', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('artikel');
    }
}