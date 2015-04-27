<?php

/**
 * Created by PhpStorm.
 * User: THARANGA-PC
 * Date: 3/16/2015
 * Time: 6:13 PM
 */
class User extends CI_Model
{


    function login($username, $password)
    {
        $this->db->select('id, user_name, pass_word');
        $this->db->from('membership');
        $this->db->where('user_name', $username);
        $this->db->where('pass_word', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }


/*SELECT account_id,sum(amount) FROM treasurer.operation where type=2 and op_type=7 group by account_id;
SELECT account_id,sum(amount) FROM treasurer.operation where type=1 and op_type=6 group by account_id;
SELECT account_id,sum(amount) FROM treasurer.operation where type=3 and op_type=5 group by account_id;*/

} 