<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_role extends MyBasecontroller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['superadmin/M_roles']);
	}

	public function index()
	{
		$data['user_level'] = array_reduce($this->M_roles->get_data_level()->result_array(), function($carry, $item) {
			// if($item['ID']!='0'){
				$carry[$item['ID']] = $item['LEVEL'];
			// }
			return $carry;
		});
        $data['selected_level'] = 1;
		$data['content']='superadmin/role_v';
		$this->load->view('templates/index',$data);	
	}

	function tabelrole($level_id)
	{
		// set column here
		$columns = array(
                            0 => 'ID',
                            1 => 'MODUL',
                            2 => '_CREATE',
                            3 => '_READ',
                            4 => '_UPDATE',
                            5 => '_DELETE',
                            6 => 'NO',
                        );

		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
        $where = [
        		"LEVEL_ID"=>$level_id,
        	];
  
        $totalData = $this->M_roles->allposts_count($where);
            
        $totalFiltered = $totalData; 
            
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->M_roles->allposts($where, $limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->M_roles->posts_search($where, $limit,$start,$search,$order,$dir);

            $totalFiltered = $this->M_roles->posts_search_count($where, $search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $key=>$post)
            {

            	// set data here
                $nestedData['ID'] = $post->ID;
                $nestedData['MODUL'] = $post->MODUL;
                $nestedData['_CREATE'] = $this->_roles_checkbox("_CREATE", $post);
                $nestedData['_READ'] = $this->_roles_checkbox("_READ", $post);
                $nestedData['_UPDATE'] = $this->_roles_checkbox("_UPDATE", $post);
                $nestedData['_DELETE'] = $this->_roles_checkbox("_DELETE", $post);

                $nestedData['NO'] = $key+1;
                
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data,
                    // "query"			  => $this->db->last_query()
                    );
            
        echo json_encode($json_data);
	}

	function set_role()
	{
		$input = $this->input->post();
		$where = [
				"ID"=>$input['id_role'],
			];
		$data = [
				$input['name']=>$input['value']
			];
		$query = $this->db->update("user_role", $data, $where);
		
		echo json_encode($query);
	}

	private function _roles_checkbox($name, $data)
	{
		$checked = false;
		if($data->{$name}=='1'){
			$checked = true;
		}

        $attr_opt = ['onclick'=>'set_role($(this))'];
        if($data->SUPERADMIN_ONLY==1 && $data->LEVEL_ID!=SUPERADMIN)
        {
            $attr_opt['disabled'] = "";
        }

		$formCheckbox = "<div class='checkbox'><label>";
		$formCheckbox .= form_checkbox($name, '1', $checked, $attr_opt);
		$formCheckbox .= "</label></div>";

		return $formCheckbox;
	}
}