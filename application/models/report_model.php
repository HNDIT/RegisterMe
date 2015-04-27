<?php
/**
 * Created by PhpStorm.
 * User: THARANGA-PC
 * Date: 3/17/2015
 * Time: 12:50 AM
 */

class report_model extends CI_Model {
    function totalCreditPayments(){
        $this->db->select('sum(amount) AS TotalCreditPay');
        $this->db->from('operation');
        $this->db->where('type', 1);
        $this->db->where('op_type', 6);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function totalSharesPayments(){
        $this->db->select('sum(amount) AS TotalSharesPay');
        $this->db->from('operation');
        $this->db->where('type', 2);
        $this->db->where('op_type', 7);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    function totalReserve(){
        $this->db->select('sum(amount) AS TotalReserveAmount');
        $this->db->from('operation');
        $this->db->where('type', 3);
        $this->db->where('op_type', 5);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
} 