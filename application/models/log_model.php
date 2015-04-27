<?php

class Log_model extends CI_Model {

    function write($tablename, $data_arr, $action,$trno) {
        $filename = "./log/system_log.txt";
        try {
            //History controler for DB
            $userdata = $this->session->userdata('logged_in');
            $username = $userdata['username'];
            $dataset = serialize($data_arr);
            $logdata_arr = array(array(
                    'trn_no'=>$trno,
                    'username' => $username,
                    'object_name' => $tablename,
                    'action' => $action,
                    'status' => 'Success',
                    'error_msg' => 'No Error',
                    'remarks' => json_encode($data_arr)
            ));

            $this->db->insert_batch('history', $logdata_arr);
            
        } catch (Exception $err) {
            $userdata = $this->session->userdata('logged_in');
            $username = $userdata['username'];
            $dataset = serialize($data_arr);
            $logeddata_arr = array(array(
                    'trn_no'=>$trno,
                    'username' => $username,
                    'object_name' => $tablename,
                    'action' => $action,
                    'status' => 'Failure',
                    'error_msg' => $err->getMessage(),
                    'remarks' => json_encode($data_arr)
            ));

            $this->db->insert_batch('history', $logeddata_arr);
            //History controller

            return $err->getMessage();
        }

        try {

            $space = "\r\n"; // For NewLine 
            $fileuserdata = $this->session->userdata('logged_in');
            $fileusername = $fileuserdata['username'];
            $filedataset = serialize($data_arr);
            $dataToBeWritten = array($space,
                "trn_no"=>$trno,
                "DATE" => date('Y-m-d H:i:s'),
                "USER" => $fileusername,
                "ACTION" => $action,
                "OBJECT NAME" => $tablename,
                "OPERATION RESULT" => $filedataset,
                "STATUS" => 'Success',
                "ERROR MESSAGE" => 'NO Error' . $space
            );

            // file_put_contents(LOG_FILE_NAME, json_encode($dataToBeWritten)."\n", FILE_APPEND);
            file_put_contents($filename, json_encode($dataToBeWritten) . $space, FILE_APPEND);
        } catch (Exception $fileError) {
            $space = "\r\n"; // For NewLine 
            $fileuserdata = $this->session->userdata('logged_in');
            $fileusername = $fileuserdata->username;
            $filedataset = serialize($data_arr);
            $dataToBeWritten = array($space,
                "trn_no"=>$trno,
                "DATE" => date('Y-m-d H:i:s'),
                "USER" => $fileusername,
                "ACTION" => $action,
                "OBJECT NAME" => $tablename,
                "OPERATION RESULT" => $filedataset,
                "STATUS" => 'Failure',
                "ERROR MESSAGE" => $fileError . $space
            );

            $this->db->insert_batch('history', $logeddata_arr);
            //History controller
            return $fileError->getMessage();
        }
    }

    /* function insertData($tablename, $data_arr) {
      try {
      $this->db->insert_batch($tablename, $data_arr);
      return $this->db->insert_id();
      } catch (Exception $e) {
      return $e->getMessage();
      }
      } */
}

?>
