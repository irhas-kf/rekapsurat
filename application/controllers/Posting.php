<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends MyBasecontroller {

	private $getAcl;
	function __construct()
	{
		parent::__construct();
		$this->load->model(['M_posting']);
		$this->getAcl = $this->middlewares['user_management']->acl[$this->modulId-1];
	}

	private $modulId = 7;
	public $acl = array(
		'index' => '7|_READ',
		'daftar_posting' => '7|_READ',
		'tambah' => '7|_CREATE',
		'simpan' => '7|_CREATE',
		'ubah' => '7|_UPDATE',
		'perbarui' => '7|_UPDATE',
		'hapus' => '7|_DELETE',
		);

    protected function middleware()
    {
        return array('user_management');
    }

	public function index()
	{
		$data['acl'] = $this->getAcl;
		$data['content'] = 'posting/daftar_posting_v';
		$this->load->view('templates/index', $data);
	}

	public function daftar_posting()
	{
		// set column here
		$columns = array(
                            0 => 'id',
                            1 => 'judul',
                            2 => 'author',
                            3 => 'aksi',
                        );

		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  
        $totalData = $this->M_posting->allposts_count();
            
        $totalFiltered = $totalData; 
            
        if(empty($this->input->post('search')['value']))
        {            
            $posts = $this->M_posting->allposts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $posts =  $this->M_posting->posts_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->M_posting->posts_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $key=>$post)
            {
            	// set action button
            	$button = "<div class='btn-group'>";
            	if(filterhref("update", $this->getAcl)){
            		$button .= "<a href='".base_url('posting/ubah/'.$post->id)."' class='btn btn-sm btn-success'>Edit</a>";
            	}
            	$button .= allowAction("delete", $this->getAcl, "<button type='button' class='btn btn-sm btn-danger' onclick='btnHapusModul($(this))'>Hapus</button>");
            	$button .="</div>";
            	// end : set action button

            	// set data here
                $nestedData['id'] = $post->id;
                $nestedData['judul'] = $post->judul;
                $nestedData['author'] = $post->username;
                $nestedData['aksi'] = $button;

                $nestedData['no'] = $key+1;
                
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

	public function tambah()
	{
		$userdata = $this->session->userdata('admin');
		$data['userdata'] = $this->M_posting->data_author(['ID'=>$userdata['ID']])->row_array();
		$data['content'] = 'posting/buat_posting_V';
		$this->load->view('templates/index', $data);
	}

	public function simpan()
	{
		$input = $this->input->post();
		$data = [
				"judul"=>$input['judul'],
				"konten"=>$input['konten'],
				"id_user"=>$input['id_user'],
			];
		$this->db->insert("posting", $data);

		redirect( base_url('posting') );
	}

	public function ubah($id)
	{
		$data['posting'] = $this->M_posting->data_posting(['p.id'=>$id])->row_array();

		$data['content'] = 'posting/ubah_posting_V';
		$this->load->view('templates/index', $data);		
	}

	public function perbarui()
	{
		$input = $this->input->post();
		$data = [
				"judul"=>$input['judul'],
				"konten"=>$input['konten'],
				"id_user"=>$input['id_user'],
			];
		$this->db->update("posting", $data, ['id'=>$input['id']]);

		redirect( base_url('posting') );
	}

	public function hapus()
	{
		$input = $this->input->post();
		$where = [
				'id'=>$input['id'],
			];

		$query = $this->db->delete("posting", $where);
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