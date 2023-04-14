<?php 
class DB_class 
{
	private $db_host,$db_name,$db_user,$db_pass,$db;
	function __construct($db_host,$db_name,$db_user,$db_pass)
	{
		if (!$this->db) {
			$con = @ new mysqli($db_host, $db_user, $db_pass, $db_name);
			if (!$con->connect_error) {
				$this->db = true;
				$con->set_charset("utf8");
				$this->con = $con;
				return true;
			}else{
				return false;
			}
		}
	}

	function select($while,$select,$from,$where = null, $type = null,$order = null)
	{
		if ($where != NULL) {
			$where = "WHERE ".$where;
		}
		if ($order != NULL) {
			$order = "ORDER BY ".$order." DESC LIMIT 1";
		}
		$sql = "SELECT ".$select." FROM `".$from."` ".$where." ".$order."";
		$u_query = $this->con->query($sql);
		if ($u_query->num_rows != 0) {
		    $count_row = 0;
			while ($query_row = $u_query->fetch_array(MYSQLI_ASSOC)) {
				$select_count = 0;
				$count_select = count($query_row);
				$select_array = NULL;
				while ($select_count < $count_select) {
					if ($while == true) {
						$return_array[$count_row] = $query_row;
						$select_count++; 
					}else{
						$return_array = $query_row;
						$select_count++;
					}
				}
				$count_row++;
			}
		}else{
			$return_array = 0;
		}
		return $return_array;
	}

	function update($from,$set,$where)
	{
		if ($where != NULL) {
			$where = "WHERE ".$where;
		}
		$update_sql = "UPDATE ".$from." SET ".$set." ".$where."";
		$update_query = $this->con->query($update_sql);
	}
	
	function delete($from,$where)
	{
		if ($where != NULL) {
			$where = "WHERE ".$where;
		}
		$delete_sql = "DELETE FROM ".$from." ".$where."";
		echo $delete_sql;
		$delete_query = $this->con->query($delete_sql);
	}

	function insert($from,$insert,$values)
	{
		$insert_sql = "INSERT INTO ".$from." (".$insert.") VALUES (".$values.")";
		$insert_query = $this->con->query($insert_sql);
	}

	function __destruct()
	{
		mysqli_close($this->con);
		$this->db = false;
	}
}
?>
