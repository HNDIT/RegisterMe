<?php

class Generic_model extends CI_Model {

    //makes this to work with columns and without where,limit and offset
    function getData($tablename = '', $columns_arr = array(), $where_arr = array(), $limit = 0, $offset = 0) {
        $limit = ($limit == 0) ? Null : $limit;

        if (!empty($columns_arr)) {
            $this->db->select(implode(',', $columns_arr), FALSE);
        }

        if ($tablename == '') {
            return array();
        } else {
            $this->db->from($tablename);

            if (!empty($where_arr)) {
                $this->db->where($where_arr);
            }

            if ($limit > 0 AND $offset > 0) {
                $this->db->limit($limit, $offset);
            } elseif ($limit > 0 AND $offset == 0) {
                $this->db->limit($limit);
            } elseif ($limit == 0 AND $offset > 0) {
                $this->db->limit(0, $offset);
            }

            $query = $this->db->get();

            return $query->result();
        }
    }

    function getSetting($settingCode = '') {
        $settingValue = '';
        $retData = array();
        if ($settingCode == '') {
            $settingValue = '';
        } else {
            $retData = $this->getData('settings', array('setting_value'), array('setting_code' => $settingCode), 1);
            if (count($retData) > 0) {
                $settingValue = $retData[0]->setting_value;
            } else {
                $settingValue = '';
            }
        }
        return $settingValue;
    }

    function getMonthStatus($settingCode = FALSE) {
        $settingValue = FALSE;
        $retData = $this->getData('monthlock', array('status'), array('month' => $settingCode), 1);
        if ($retData[0]->status == 0) {
            $settingValue = FALSE;
        } else {
            $settingValue = TRUE;
        }

        return $settingValue;
    }

    function insertData($tablename, $data_arr, $trno = Null) {
        $ret = 0;
        $userdata = $this->session->userdata('logged_in');
        // $data_arr[0]['created_user']=$userdata->id;
        $action = "Insert";
        try {
            for ($i = 0; $i < count($data_arr); $i++) {
                $data_arr[$i]['created_user'] = $userdata['id'];
            }
            $this->db->insert_batch($tablename, $data_arr);
            $ret = $this->db->insert_id();
            // write($tablename, $data_arr, $action) {
            if (!is_null($trno)) {
                $this->Log_model->write($tablename, $data_arr, $action, $trno);
            }
            return $ret;
        } catch (Exception $err) {
            if (!is_null($trno)) {
                $this->Log_model->write($tablename, $data_arr, $action, $trno);
            }
            return $err->getMessage();
        }
    }

    function updateData($tablename, $data_arr, $where_arr, $trno = Null) {
        $action = "Update";
        try {
            if (!is_null($trno)) {
                $this->Log_model->write($tablename, array_merge($data_arr, $where_arr), $action, $trno);
            }
            return $this->db->update($tablename, $data_arr, $where_arr);
        } catch (Exception $err) {
            if (!is_null($trno)) {
                $this->Log_model->write($tablename, array_merge($data_arr, $where_arr), $action, $trno);
            }
            return $err->getMessage();
        }
    }

    function updateMultipleData($tablename, $data_arr, $keyColumn, $trno = Null) {
        $action = "M Update";
        try {
            // write($tablename, $data_arr, $action) {
            if (isset($trnno)) {
                $this->Log_model->write($tablename, $data_arr, $action, $trno);
            }
            return $this->db->update_batch($tablename, $data_arr, $keyColumn);
        } catch (Exception $err) {
            if (isset($trnno)) {
                $this->Log_model->write($tablename, $data_arr, $action, $trno);
            }
            return $err->getMessage();
        }
    }

    function deleteData($tablename, $where_arr, $trno = Null) {
        $action = "Delete";
        try {

            // write($tablename, $data_arr, $action) {
            if (!is_null($trno)) {
                $this->Log_model->write($tablename, $where_arr, $action, $trno);
            }
            $this->db->where($where_arr, NULL, FALSE);
            $result = $this->db->delete($tablename);
        } catch (Exception $err) {
            if (!is_null($trno)) {
                $this->Log_model->write($tablename, $where_arr, $action, $trno);
            }
            $result = $err->getMessage();
        }
        return $result;
    }

    function deleteMultipleData($tablename, $value_arr, $keyColumn, $trno = Null) {
        $action = "M Delete";
        try {
            // write($tablename, $data_arr, $action) {
            if (!is_null($trno)) {
                $this->Log_model->write($tablename, $value_arr, $action, $trno);
            }
            $this->db->where_in($keyColumn, $value_arr);
            $result = $this->db->delete($tablename);
        } catch (Exception $err) {
            // write($tablename, $data_arr, $action) {
            if (!is_null($trno)) {
                $this->Log_model->write($tablename, $value_arr, $action, $trno);
            }
            $result = $err->getMessage();
        }
        return $result;
    }

    /*     * ****** Grid Functions ********* */

    function getcount($tablename, $where_arr = false) {
        $count = 0;
        $count = $this->db->count_all($tablename);

        if ($where_arr == false) {
            if (isset($tablename)) {
                $count = $this->db->count_all($tablename);
            } else {
                $count = 0;
            }
        } else {
            $this->db->where($where_arr, NULL, FALSE);
            if (isset($tablename)) {
                $count = $this->db->count_all_results($tablename);
            }
        }
        return $count;
    }

    function getgriddata($tablename, $columns_arr, $where_arr, $like_arr, $sidx, $sord, $limit, $start) {

        if (!(empty($where_arr) OR $where_arr == '')) {
            $this->db->where($where_arr, NULL, FALSE);
        }

        if (!empty($columns_arr)) {
            $this->db->select(implode(',', $columns_arr));
        }

        if (!empty($like_arr)) {
            foreach ($like_arr as $fld => $searchString) {
                $this->db->like($fld, $searchString, 'after');
            }
        }

        $this->db->order_by($sidx, $sord);
        $query = $this->db->get($tablename, $limit, $start);
        return $query->result();
    }

    //Return the field names of the selected table
    function getColumnNames($tableName) {
        $fields = $this->db->list_fields($tableName);

        return $fields;
    }

    function dbprefix($tableName) {
        $prefix = $this->db->dbprefix($tableName);

        return $prefix;
    }

    function genericQuery($strSQL) {
        if (!empty($strSQL)) {
            try {
                $query = $this->db->query($strSQL);
                if (!$query) {
                    throw new Exception($this->db->_error_message(), $this->db->_error_number());
                    return FALSE;
                } else {
                    return $query->result();
                }
            } catch (Exception $e) {
                return;
            }
        } else {
            return FALSE;
        }
    }

    function getFirstValue($strSQL) {
        $ret = Null;
        if (!empty($strSQL)) {
            try {
                $query = $this->db->query($strSQL);
                if ($query) {
                    $result = $query->result();
                    if (count($result) > 0) {
                        $resultArray = (array) $result[0];
                        foreach ($result[0] as $key => $value) {
                            $ret = $value;
                            break;
                        }
                    } else {
                        $ret = Null;
                    }
                } else {
                    $ret = Null;
                }
                //var_dump($result);
            } catch (Exception $ex) {
                $ret = Null;
            }
        } else {
            $ret = Null;
        }
        return $ret;
    }

    function actionQuery($strSQL) {
        if (!empty($strSQL)) {
            try {
                $query = $this->db->query($strSQL);
                if (!$query) {
                    throw new Exception($this->db->_error_message(), $this->db->_error_number());
                    return FALSE;
                } else {
                    return TRUE;
                }
            } catch (Exception $e) {
                return;
            }
        } else {
            return FALSE;
        }
    }

    function getNextSerialNumber($Code) {
        try {
            $strSQL = "SELECT number from serials where code = '" . $Code . "'";
            $query = $this->db->query($strSQL);
            $currentSN = $query->result();
            if ($currentSN) {
                $serailno = ((int) $currentSN[0]->number) + 1;
            } else {
                $serailno = 99999;
            }
        } catch (Exception $ex) {
            $serailno = 900000;
        }
        //$serailno = 100;
        return $serailno;
    }

    function increaseSerialNumber($Code) {
        try {
            $strSQL = "UPDATE serials SET number = number + 1 WHERE code = '" . $Code . "'";
            $query = $this->db->query($strSQL);
            $rtn = TRUE;
        } catch (Exception $ex) {
            $rtn = FALSE;
        }
        return $rtn;
    }

    function getAutoFillData($tablename, $fieldName, $value, $keyfield, $limit, $offset) {
        $this->db->select($keyfield . ', ' . $fieldName);
        $this->db->from($tablename);
        $this->db->like($fieldName, $value, 'after');
        $this->db->limit($limit);
        $query = $this->db->get();
        //$query = $this->db->get_where($tablename, $where_arr, $limit, $offset);
        return $query->result();
    }

    function getFilteredAutoFillData($tablename, $fieldName, $value, $keyfield, $whereArr, $limit, $offset) {
        $this->db->select($keyfield . ', ' . $fieldName);
        $this->db->from($tablename);
        $this->db->like($fieldName, $value, 'after');
        $this->db->where($whereArr);
        $this->db->limit($limit);
        $query = $this->db->get();
        //$query = $this->db->get_where($tablename, $where_arr, $limit, $offset);
        return $query->result();
    }

    function getMultiAutoFillData($tablename, $fieldName, $value, $keyfield, $fieldNext, $limit, $offset) {
        $this->db->select($keyfield . ', ' . $fieldName . ', ' . $fieldNext);
        $this->db->from($tablename);
        $this->db->like($fieldName, $value, 'after');
        $this->db->limit($limit);
        $query = $this->db->get();
        //$query = $this->db->get_where($tablename, $where_arr, $limit, $offset);
        return $query->result();
    }

    function getAccountData($tablename, $fieldName, $value, $keyfield, $field1, $field2, $field3, $limit, $offset) {
        $this->db->select($keyfield . ', ' . $fieldName . ', ' . $field1 . ', ' . $field2 . ', ' . $field3);
        $this->db->from($tablename);
        $this->db->like($fieldName, $value, 'after');
        $this->db->limit($limit);
        $query = $this->db->get();
        //$query = $this->db->get_where($tablename, $where_arr, $limit, $offset);
        return $query->result();
    }

    function getMaxTransactionDate($trnType1, $trnNumber1, $trnType2, $trnNumber2) {
        $receipt_date = $this->getTransactionDate($trnType1, $trnNumber1);
        $transaction_date = $this->getTransactionDate($trnType2, $trnNumber2);

        if ($receipt_date > $transaction_date) {
            return $receipt_date;
        } else {
            return $transaction_date;
        }
    }

    public function getTransactionDate($trnType, $trnNumber) {
        $trnDate = '';
        $strSQL = '';
        if ($trnType == 'RC' OR $trnType == 'PRC' OR $trnType == 'RCV') {
            //Transaction is a Receipt
            $strSQL = "select date from receipt where rec_type = '" . $trnType . "' AND receipt_no = " . $trnNumber;
        } elseif ($trnType == 'MN' OR $trnType == 'SI' OR $trnType == 'DI' OR $trnType == 'PSI' OR $trnType == 'AI' OR $trnType == 'FC' OR $trnType == 'CM' OR $trnType == 'CN' OR $trnType == 'AC' OR $trnType == 'PAC' OR $trnType == 'PCN') {
            //Transaction is an Invoice OR Credit Note
            $strSQL = "select inv_date from invoice where inv_type = '" . $trnType . "' AND number = " . $trnNumber;
        } elseif ($trnType == 'BL' OR $trnType == 'PBL' OR $trnType == 'DN' OR $trnType == 'PDN') {
            //Transaction is a Bill
            $strSQL = "select bill_date from supplier_bill where bill_type = '" . $trnType . "' AND number = " . $trnNumber;
        } elseif ($trnType == 'PM' OR $trnType == 'PPM') {
            //Transaction is a Payment Voucher
            $strSQL = "select date from payment where paymentmode = '" . $trnType . "' AND voucher_no = " . $trnNumber;
        } elseif ($trnType == 'JN' OR $trnType == 'PJN') {
            //Transaction is a Journal
            $strSQL = "select date from view_journal_item where id = " . $trnNumber;
        }
        //echo $strSQL; die;
        if ($strSQL == '') {
            return '';
        } else {
            $trnDate = $this->Generic_model->getFirstValue($strSQL);
            //$trnDate =  $this->Generic_model->genericQuery($strSQL);
            //var_dump($trnDate);
            return $trnDate;
        }
    }

    function encrypt_data($input) {
        $key = "AquafreshKeyOfCreditCardsNumber";
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $key, urlencode(utf8_encode($input)), MCRYPT_MODE_ECB, $iv);
        $rep = trim(str_replace(chr(0), '', $encrypted_string));
        return $rep;
    }

    function decrypt_data($encryptedstr) {
        $key = 'AquafreshKeyOfCreditCardsNumber';
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $encryptedstr, MCRYPT_MODE_ECB, $iv);
        $rep = trim(str_replace(chr(0), '', $decrypted_string));
        return urldecode(utf8_decode($rep));
    }

    function checklock($date) {
        $checkLock = $this->session->userdata('logged_in');
        $date = date('Y-m-d', strtotime($date));
        $strSQL = "select IFNULL(max(lock_open_status),1) as LockStatus from date_lock where lock_open_date_from <= '" . $date . "' AND lock_open_date_to >= '" . $date . "'";
        $status = $this->getData('user_group', array('user_id'), array('group_id' => 5, 'user_id' => $checkLock->id));
        //$strSQL = "call sp_getLockStatus('".$date."')";
        //$lockStatus =  $this->db->query($strSQL);
        //$lockStatus = $this->getFirstValue($strSQL);
        $ret = 1;
        $lockStatus = $this->db->query($strSQL);
        if ($lockStatus) {
            $result = $lockStatus->result();
            if (count($result) > 0) {
                $resultArray = (array) $result[0];
                foreach ($result[0] as $key => $value) {
                    if ($value == 2) {
                        if (sizeof($status) > 0) {
                            $ret = 0;
                        } else {
                            $ret = 1;
                        }
                    } else {
                        $ret = $value;
                    }

                    break;
                }
            } else {
                $ret = 1;
            }
        } else {
            $ret = 1;
        }
        //$this->db->free_result();
        return $ret;
    }

    function getUserPermission($user) {
        $status = $this->getData('user_group', array('user_id'), array('group_id' => 5, 'user_id' => $user));
        if (sizeof($status) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
