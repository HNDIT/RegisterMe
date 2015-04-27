<?php
/**
 * Created by PhpStorm.
 * User: THARANGA-PC
 * Date: 3/16/2015
 * Time: 10:21 PM
 */

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Generic_model','',true);
        $this->load->model('report_model','',true);

    }

    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['totalCreditPayment']=$this->report_model->totalCreditPayments();
            $data['totalSharesPayment']=$this->report_model->totalSharesPayments();
            $data['totalReservation']=$this->report_model->totalReserve();
            //var_dump($data['totalCreditPayment']);die;
            $this->load->view('home/home_view', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }

}

?>