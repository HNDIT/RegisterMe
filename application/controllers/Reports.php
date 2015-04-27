<?php
/**
 * Created by PhpStorm.
 * User: THARANGA-PC
 * Date: 3/16/2015
 * Time: 11:46 PM
 */

class Reports extends CI_Controller {


    function __construct(){

    }

    function index(){
        $this->load->view('reports/reports_view');
    }

} 