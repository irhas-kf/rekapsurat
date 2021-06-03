<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends MyBasecontroller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(['superadmin/M_akun']);
	}

	public function index()
	{
		$data['user_level'] = array_reduce($this->M_akun->get_data_level()->result_array(), function($carry, $item) {
			if($item['ID']!='0'){
				$carry[$item['ID']] = $item['LEVEL'];
			}
			return $carry;
		});
		$data['content']='superadmin/akun_v';
		$this->load->view('templates/index',$data);	
	}

	function tabelakun($level_id)
	{
		// set column here
		$columns = array(
                            0 => 'ID',
                            1 => 'USERNAME',
                            2 => 'PASSWORD',
                            3 => 'LEVEL',
                            4 => 'ACTION',
                            5 => 'NO',
                        );

		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
        $where = [
        		"LEVEL_ID"=>$level_id,
        	];
  
        $totalData = $this->M_akun->allposts_count($where);
            
        $totalFiltered = $totalData; 
            
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->M_akun->allposts($where, $limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->M_akun->posts_search($where, $limit,$start,$search,$order,$dir);

            $totalFiltered = $this->M_akun->posts_search_count($where, $search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $key=>$post)
            {
                // set action button
                $button = "<div class='btn-group'>";
                $button .= "<button type='button' class='btn btn-sm btn-warning' onclick='btnResetAkun($(this))'>Reset</button>";
                $button .= "<button type='button' class='btn btn-sm btn-danger' onclick='btnHapusAkun($(this))'>Hapus</button>";
                $button .="</div>";
                // end : set action button

            	// set data here
                $nestedData['ID'] = $post->ID;
                $nestedData['USERNAME'] = $post->USERNAME;
                $nestedData['PASSWORD'] = '*****';
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

    function simpan_akun()
    {        
        $input = $this->input->post();
        $data = [
                'USERNAME'=>$input['username'],
                'PASSWORD'=>sha1($input['password']),
                'LEVEL_ID'=>$input['level_id'],
            ];

        $query = $this->M_akun->simpan_data_akun($data);
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

    function edit_akun()
    {
        $input = $this->input->post();
        $data = [
                'ID'=>$input['id_akun'],
                'PASSWORD'=>sha1($input['password']),
            ];

        $query = $this->M_akun->edit_data_akun($data);
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

    function hapus_akun()
    {
        $input = $this->input->post();
        $data = [
                'ID'=>$input['id_akun'],
            ];

        $query = $this->M_akun->hapus_data_akun($data);
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

    function get_data_akun()
    {
        $input = $this->input->post();
        $where = [
                "a.ID"=>$input['ID'],
            ];
        $query = $this->M_akun->get_data_akun($where)->row();
        echo json_encode($query);
    }
}