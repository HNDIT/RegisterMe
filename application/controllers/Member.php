<?php

/**
 * Created by PhpStorm.
 * User: THARANGA-PC
 * Date: 3/19/2015
 * Time: 10:18 PM
 */
class Member extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Generic_model', '', TRUE);
    }

    function index()
    {
        $data['memberinfo']=$this->Generic_model->getData('member','','',0,0);
        $this->load->view('member/index',$data);
    }

    function addMember()
    {
        $this->load->view('member/addmember');
    }

    function addMemberForm()
    {
        $arr_data = array(array(
            'member_id' => $this->input->post('txtMemberID'),
            'name' => $this->input->post('txtName'),
            'address' => $this->input->post('txtAddress'),
            'account_id' => $this->input->post('txtAccountID'),
            'open_balance' => $this->input->post('txtOPBalance')

        ));

        $this->db->trans_start();
        $result = $this->Generic_model->insertData('member', $arr_data);
        $data = array();
        if (gettype($result) == "integer") {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['error'] = 'error';
        }
        $this->db->trans_complete();

        echo json_encode($data);
    }

    function updateMember($id=null)
    {
        $data['memberinfo']=$this->Generic_model->getData('member','',array('id'=>$id),1,0)[0];
        $this->load->view('member/updatemember',$data);
    }

    function updateMemberForm()
    {
        $arr_data = array(array(
            'member_id' => $this->input->post('txtMemberID'),
            'name' => $this->input->post('txtName'),
            'address' => $this->input->post('txtAddress'),
            'account_id' => $this->input->post('txtAccountID'),
            'open_balance' => $this->input->post('txtOPBalance')

        ));
$memberid=$this->input->post('hdnMemberId');
        $this->db->trans_start();
        $result = $this->Generic_model->updateData('member', $arr_data,array('id'=>''));
        $data = array();
        if (gettype($result) == "integer") {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['error'] = 'error';
        }
        $this->db->trans_complete();

        echo json_encode($data);
    }

    public function addMembership()
    {
        $this->load->view('');
    }

    function addMembershipForm()
    {
        $arr_data = array(array(
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

        ));
        $this->db->trans_start();
        $result = $this->Generic_model->insertData('membership', $arr_data);
        $data = array();
        if (gettype($result) == "integer") {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['error'] = 'error';
        }
        $this->db->trans_complete();

        echo json_encode($data);
    }

    public function updateMembership()
    {
        $this->load->view('process/updateMembership');
    }

    function updateMembershipForm()
    {
        array(
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

        );
        $memberid = $this->input->post('hdnMemberId');
        $this->db->trans_start();
        $result = $this->Generic_model->updateData('member', $arr_data, array('id' => ''));
        $data = array();
        if (gettype($result) == "integer") {
            $data['status'] = true;
        } else {
            $data['status'] = false;
            $data['error'] = 'error';
        }
        $this->db->trans_complete();

        echo json_encode($data);

    }

} 