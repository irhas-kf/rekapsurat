<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends MyBasecontroller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['superadmin/M_modul']);
	}

	public function index()
	{
		$data['content']='superadmin/modul_v';
		$this->load->view('templates/index',$data);	
	}

	function tabelmodul()
	{
		// set column here
		$columns = array(
                            0 => 'ID',
                            1 => 'MODUL',
                            2 => 'NO',
                            3 => 'ACTION',
                            4 => 'SUPERADMIN'
                        );

		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  
        $totalData = $this->M_modul->allposts_count();
            
        $totalFiltered = $totalData; 
            
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->M_modul->allposts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->M_modul->posts_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->M_modul->posts_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $key=>$post)
            {
            	// set action button
            	$button = "<div class='btn-group'>";
            	$button .= "<button type='button' class='btn btn-sm btn-success' onclick='btnEditModul($(this))'>Edit</button>";
            	$button .= "<button type='button' class='btn btn-sm btn-danger' onclick='btnHapusModul($(this))'>Hapus</button>";
            	$button .="</div>";
            	// end : set action button

            	// set data here
                $nestedData['ID'] = $post->ID;
                $nestedData['MODUL'] = $post->MODUL;
                $nestedData['ACTION'] = $button;
                $nestedData['SUPERADMIN'] = $post->SUPERADMIN_ONLY;

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

	function simpan_modul()
	{
		$input = $this->input->post();
		$data = [
				'ID'=>$input['id_modul'],
				'MODUL'=>strtoupper($input['modul']),
				'SUPERADMIN_ONLY'=>$input['superadmin']
			];

		$query = $this->M_modul->simpan_data_modul($data);
		if($query){
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

	function edit_modul()
	{
		$input = $this->input->post();
		$data = [
				'ID'=>$input['id_modul'],
				'MODUL'=>strtoupper($input['modul']),
				'SUPERADMIN_ONLY'=>$input['superadmin']
			];

		$query = $this->M_modul->edit_data_modul($data);
		if($query){
			$result = [
				"type"=>"info",
				"text"=>"Data berhasil diperbarui"
			];
		}else{
			$result = [
				"type"=>"error",
				"text"=>"Terjadi kesalahan!"
			];
		}

		echo json_encode($result);
	}

	function hapus_modul()
	{
		$input = $this->input->post();
		$data = [
				'ID'=>$input['id_modul'],
			];

		$query = $this->M_modul->hapus_data_modul($data);
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