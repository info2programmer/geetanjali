<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Common_model extends CI_Model

{

	var $table;

	

    function  __construct(){

        parent::__construct();

    }

################################ FETCH DATA ########################################

    

	function find_data($table,$return_type='array',$list=NULL,$conditions='',$select='*',$join='',$group_by='',$order_by='',$limit=0,$offset=0,$or_where_in='',$or_like='')

	{

		

		$result = array();		

		

		$this->db->select($select);		

		

		if(!empty($table['alias_name']))

		{

			$table_name = $table['name'].' as '.$table['alias_name'];

		}

		else

		{

			$table_name = $table['name'];

		}

		$this->db->from($table_name);

		

		if(is_array($join))

		{

			for($j=0;$j<count($join);$j++)

			{

				if($join[$j]['table'])

				{

					/*$table_join = $join[$j]['table'].' as '.$join[$j]['table_alias']*/;

					//$table_join_name = $join[$j]['table_alias'];

					$table_join = $join[$j]['table'];

					$table_join_name = $join[$j]['table'];

				}

				else

				{

					/*$table_join = $join[$j]['table'];

					$table_join_name = $join[$j]['table'];*/

				}

				if(!empty($join[$j]['table_master_alias']))

				{

					$table_master_join = $join[$j]['table_master_alias'];

				}

				else

				{

					$table_master_join = $join[$j]['table_master'];

				}

				$this->db->join($table_join,$table_join_name.'.'.$join[$j]['field'].'='.$table_master_join.'.'.$join[$j]['field_table_master']/*.$join[$j]['and']*/,$join[$j]['type']);

			}

		}

		

		if($conditions != '')$this->db->where($conditions);	

		if($or_where_in != '')$this->db->or_where_in($or_where_in);

		

		if($or_like != '')$this->db->or_like($or_like);		

		

		if(is_array($group_by))

		{

			for($g=0;$g<count($group_by);$g++)

			{

				$this->db->group_by($group_by[$g]);

			}

		}

		

		if(is_array($order_by))

		{

			for($o=0;$o<count($order_by);$o++)

			{

				$this->db->order_by($order_by[$o]['field'],$order_by[$o]['type']);

			}

		}

		

		if($limit != 0)$this->db->limit($limit,$offset);

		

		

		$query = $this->db->get();

		

		//echo $this->db->last_query();

		switch ($return_type) 

		{

			case 'array':

			case '':

				if($query->num_rows() > 0){$result = $query->result();}

				break;

				

			case 'row':

				if($query->num_rows() > 0){$result = $query->row();}

				break;

			

			case 'row-array':

				if($query->num_rows() > 0){$result = $query->row_array();}

				break;

				

			case 'list':

			

				$list_arr[''] = 'Choose'. $list['empty_name'];



				if($query->num_rows() > 0)

				{

					foreach ($query->result() as $row)

					{

						$list_arr[$row->$list['key']] = $row->$list['value'];

					}



				} else {

					$list_arr[] = 'No City Found';

				}

				$result = $list_arr;

				break;

				

			case 'count':

				$result = $query->num_rows();

				break;

		}

		//echo $this->db->last_query();die;

        return $result;

    }

	

############################## INSERT/UPDATE DATA ##################################

	

	function save_data($table,$postdata = array(),$id=0,$field)

	{

		if($id == 0)

		{

			$this->db->insert($table['name'],$postdata);

		}

		else

		{

			$this->db->where($field, $id);

			$this->db->update($table['name'],$postdata);

			//echo $this->db->last_query();die;

		}

        return $this->db->affected_rows();

	}

################################# DELETE DATA ######################################	

	

	function delete_data($table,$id,$field)

	{

	 	$this->db->where($field,$id);

		$this->db->delete($table['name']);

		if($this->db->affected_rows()>0)

		{

			return true;

		}

		else

		{

			return false;

		}

    }

#####################################################################################	



	function student_file_upload($img,$tmp)

	   {

		   $image_path = 'uploads/header_panel/';

		   //echo $image_path;die;

		   if(move_uploaded_file($tmp,$image_path.$img))

		   return true;

	   }



}