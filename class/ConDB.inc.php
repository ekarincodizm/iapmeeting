<?php
include_once("../config.inc.php");
class Con_DB extends ConfigDB
{
	protected $conn;
	protected $sl_query;

	public function __construct()
	{
		$this->conn = new mysqli($this->hostdb,$this->userdb,$this->passdb,$this->dbname);
		if(mysqli_connect_errno())
		{
			die("Connect Database ERROR !!".mysqli_connect_errno());
		}
		$this->conn->set_charset("UTF8");
	}
	public function SelectSQL($sql)
	{
		$this->sl_query = $this->conn->query($sql);
		while($result = $this->sl_query->fetch_assoc())
		{
			$row[] = $result;
		}
		return $row;
	}
	public function SelectSQLOne($sql,$value)
	{
		$this->sl_query = $this->conn->query($sql);
		$result = $this->sl_query->fetch_assoc();

		return $result[$value];
	}
	public function NumRows($sql="")
	{	
		if($sql != ""){
		return $this->conn->query($sql)->num_rows;
		}else{
		return $this->sl_query->num_rows;
		}
	}
	public function NumRowsTwo($sql)
	{
		return $this->conn->query($sql)->num_rows;
	}
	public function QuerySQL($sql)
	{		
		return $this->conn->query($sql);
	}
	public function ListBox($name,$value,$opname,$sql)
	{	
		$conn = new Con_DB();
		$sl_sql = $conn->SelectSQL($sql);
		echo "<select name='$name'>";
		
		foreach($sl_sql as $rs)
		{
			echo "<option value='".$rs[$value]."'>".$rs[$opname]."</option>";
		}
		echo "</select>";

	}
	public function BudgetYear()
	{
		$this->sl_query = $this->conn->query("select * from budget_year");
		$result = $this->sl_query->fetch_assoc();

		return $result['year'];
	}
	public function EchoName($id)
	{
		$this->sl_query = $this->conn->query("select * FROM tbl_useriop WHERE EmpNo = '".$id."' ");
		$result = $this->sl_query->fetch_assoc();
		return $result['EmpFirstName']." ".$result['EmpLastName'];
	}
}

?>