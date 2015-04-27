<?php

/**
 * Created by PhpStorm.
 * User: THARANGA-PC
 * Date: 3/16/2015
 * Time: 6:13 PM
 */
class login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Generic_model', '', TRUE);


    }

    function index()
    {
        if($this->session->userdata('logged_in')){
            redirect('home','refresh');
        }else{
            $this->load->view('login/login_view');
        }

    }

    function validate_login()
    {

        $username=$this->input->post('username');
        $password=$this->input->post('password');

        $is_authenticate = $this->Generic_model->getData('membership', '', array('user_name'=>$username,'pass_word'=>md5($password)), 0, 0);

        if(count($is_authenticate)>0)
        {
           // var_dump($is_authenticate);die;
            $sess_array = array();
            foreach($is_authenticate as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->user_name,
                    'email' => $row->email_addres
                );

                $this->session->set_userdata('logged_in', $sess_array);
            }
            $data = array();
            if ($is_authenticate) {
                $data['status'] = true;
            } else {
                $data['status'] = false;
                $data['error'] = 'error';
            }
        }
        else
        {
            $data['status'] = false;
            $data['error'] = 'Data Not Matching';
        }

        echo json_encode($data);
    }

    function check_database($password)
    {

    }
} 