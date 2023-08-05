<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Car_model extends CI_Model
{
    public function get_all()
    {
        $query = $this->db->query("select * from `tbl_cars`");
        return $query->result_array();
    }

    public function get_user($id)
    {
        $query = $this->db->query("select * from `tbl_cars` where id = $id");
        return $query->row();
    }

    public function insert($data)
    {

        $data = array(
            'make' => $data['make'],
            'model' => $data['model'],
            'type' => $data['type']
        );
        $result = $this->db->insert('tbl_cars', $data);

        if ($result) {
            return 'Data is inserted successfully';
        } else {
            return "Error has occured";
        }
    }
    public function update($id, $data)
    {
        $data = array(
            'make' => $data['make'],
            'model' => $data['model'],
            'type' => $data['type']
        );

        $result = $this->db->where('id',$id)->update('tbl_cars',$data);
        
        if ($result) {
            return "Data is updated successfully";
        } else {
            return "Error has occurred";
        }
    }
    public function delete($id)
    {
        $result = $this->db->query("delete from `tbl_cars` where id = $id");
        if ($result) {
            return "Data is deleted successfully";
        } else {
            return "Error has occurred";
        }
    }
}