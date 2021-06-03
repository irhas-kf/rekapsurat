<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_level extends MyBasecontroller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['superadmin/M_userlevel']);
	}

	public function index()
	{
		$data['content']='superadmin/level_v';
		$this->load->view('templates/index',$data);	
	}

	function tabelUserlevel()
	{
		// set column here
		$columns = array(
                            0 => 'ID',
                            1 => 'LEVEL',
                            2 => 'NO',
                            3 => 'ACTION',
                        );

		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  
        $totalData = $this->M_userlevel->allposts_count();
            
        $totalFiltered = $totalData; 
            
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->M_userlevel->allposts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->M_userlevel->posts_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->M_userlevel->posts_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $key=>$post)
            {
            	// set action button
            	$button = "<div class='btn-group'>";
            	$button .= "<button type='button' class='btn btn-sm btn-success' onclick='btnEditLevel($(this))'>Edit</button>";
            	$button .= "<button type='button' class='btn btn-sm btn-danger' onclick='btnHapusLevel($(this))'>Hapus</button>";
            	$button .="</div>";
            	// end : set action button

            	// set data here
                $nestedData['ID'] = $post->ID;
                $nestedData['LEVEL'] = $post->LEVEL;
                $nestedData['ACTION'] = $button;

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

	function simpan_level()
	{
		$input = $this->input->post();
		$data = [
				'ID'=>$input['id_level'],
				'LEVEL'=>strtoupper($input['level'])
			];

		$query = $this->M_userlevel->simpan_data_level($data);
		if($query=='true'){
			$result = [
				"type"=>"success",
				"text"=>"Data berhasil disimpan"
			];
		}else{
			$result = [
				"type"=>"error",
				"text"=>"Terjadi kesalahan!"
			];
		}

		echo json_encode($result);
	}

	function edit_level()
	{
		$input = $this->input->post();
		$data = [
				'ID'=>$input['id_level'],
				'LEVEL'=>strtoupper($input['level'])
			];
		$this->db->trans_begin();
		$query = $this->M_userlevel->edit_data_level($data);
		if($this->db->trans_status()==true){
			$this->db->trans_commit();
			$result = [
				"type"=>"info",
				"text"=>"Data berhasil diperbarui"
			];
		}else{
			$this->db->trans_rollback();
			$result = [
				"type"=>"error",
				"text"=>"Terjadi kesalahan!"
			];
		}

		echo json_encode($result);
	}

	function hapus_level()
	{
		$input = $this->input->post();
		$data = [
				'ID'=>$input['ID'],
			];

		$query = $this->M_userlevel->hapus_data_level($data);
		if($query){
			$result = [
				"type"=>"success",
				"text"=>"Data berhasil dihapus"
			];
		}else{
			$result = [
				"type"=>"error",
				"text"=>"Terjadi kesalahan!"
			];
		}

		echo json_encode($result);
	}
}