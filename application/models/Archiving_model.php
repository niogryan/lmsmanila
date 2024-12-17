<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class archiving_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	
	function index()
	{	

		// $sql = "DELETE FROM temp_loan";			
		// $this->db->query($sql);	
		
		// $sql = "INSERT INTO temp_loan
				// SELECT DISTINCT loanid
				// FROM tbl_loans a
				// WHERE a.balance<=0 AND a.duedate< DATE(NOW()-INTERVAL 1 YEAR)
				// AND loanid NOT IN (SELECT DISTINCT loanid FROM tbl_loans_archived)
				// AND loanid NOT IN (SELECT DISTINCT loanid FROM tbl_loans_payments WHERE YEAR(paymentdate)>=YEAR(NOW()))
				// ";			
		// $this->db->query($sql);	
		
		
		// $sql = "INSERT INTO tbl_loans_archived
				// SELECT a.*,'F' FROM tbl_loans a
				// WHERE loanid IN (SELECT DISTINCT loanid FROM temp_loan)
				// ";			
		// $this->db->query($sql);	
		
		
		// $sql = "INSERT INTO tbl_loans_payments_archived
				// (loanid,ornumber,paymenttype,paymentdate,paymentamount,paymentremarks,entryuserid,entrydate,isfinal)
				// SELECT loanid,ornumber,paymenttype,paymentdate,paymentamount,paymentremarks,entryuserid,entrydate,'F'
				// FROM tbl_loans_payments
				// WHERE  loanid IN (
				// SELECT DISTINCT loanid FROM temp_loan)
				// ";			
		// $this->db->query($sql);	
		
		
		//$sql = "DELETE FROM tbl_loans WHERE loanid IN (SELECT DISTINCT loanid FROM temp_loan)";			
		//$this->db->query($sql);	
		
		$sql = "SELECT DISTINCT loanid FROM temp_loan";			
		$result = $this->db->query($sql);	
		
		foreach($result->result_array() as $row)
		{
			$sql = "DELETE FROM tbl_loans_payments WHERE loanid=".$row['loanid'];			
			$this->db->query($sql);	
			
			$sql = "DELETE FROM temp_loan WHERE loanid=".$row['loanid'];			
			$this->db->query($sql);	
			
		}
		
		echo "done";
		
	
	}
	
	
}