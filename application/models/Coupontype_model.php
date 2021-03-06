<?php
/*
 * Developed By : OptiSoft
 * www.optisoft.in
 */

class Coupontype_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    private $Table = 'coupons';
    private $Table_id = 'coupon_id';

    public function Insert($data){

      $result = $this->db->insert($this->Table, $this->security->xss_clean($data) );
      if($result == 1)
        return true;//$this->db->insert_id();
      else
        return false;
    }
    public function ListData()
    {
      $this->db->select('*');
      $this->db->from($this->Table);
      $this->db->order_by($this->Table_id,'DESC');
        $query = $this->db->get();
      return $query->result_array();
    }


    public function RowData($id)
    {
      $this->db->select('*');
      $this->db->from($this->Table);
      $this->db->where($this->Table_id,$id);
      $query = $this->db->get();
      return $query->row_array();
    }


    public function Update($data,$id){

      $result = $this->db->update($this->Table, $this->security->xss_clean($data), [ $this->Table_id => $id] );
      if($result == 1)
        return true;
      else
        return false;
    }

    public function Delete($id){
      $this->db->where($this->Table_id, $id);
      $res = $this->db->delete($this->Table);
      if($res == 1)
        return true;
      else
        return false;

    }

}
