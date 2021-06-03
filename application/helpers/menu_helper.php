<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// if(!function_exists('create_menu')){
// 	function create_menu($value)
// 	{
// 		echo "<pre>"; print_r($value); exit();
// 	}
// }

if(!function_exists('menu_item')){
	function menu_item()
	{
		$ci =& get_instance();
		$data = $ci->db
				->select("user_menu.*, user_modul.MODUL")
				->join("user_modul", "user_modul.ID=user_menu.MODUL_ID")
				->order_by("user_menu.ID, user_menu.MENU")
				->get("user_menu")
				->result();

		// hold all references 
		$ref = [];
		// hold all menu items
		$items = [];

		// loop over the result
		foreach ($data as $key => $value) {
		    // Assign by reference 
		    $this_ref = &$ref[$value->ID];
		    
		    // add the menu parent
		    $this_ref['modul_id'] = $value->MODUL_ID;
		    $this_ref['modul'] = $value->MODUL;
		    $this_ref['menu'] = $value->MENU;
		    $this_ref['link'] = $value->LINK;
		    $this_ref['icon'] = $value->ICON;
		    $this_ref['main_menu'] = $value->MAIN_MENU;
		    
		   // if there is no parent push it into items array()
		   if($value->MAIN_MENU == 0) {
		       $items[$value->ID] = &$this_ref;
		   } else {
		       $ref[$value->MAIN_MENU]['child'][$value->ID] = &$this_ref;
		   }
		}

		return $items;
	}
} 
 
if(!function_exists('menu_create')){
	function menu_create($items, $modul, $class = 'sidebar-menu', $segment) {
		$html = "<ul class='$class'>";
	    foreach($items as $key=>$value) {
	    	if( (isset($modul[$value['modul']]) && preg_match("/1\w{3}/", $modul[$value['modul']], $output_array)) ){

		    	$li_class = "";
		    	$value_subicon = "";

		        if(array_key_exists('child',$value)) {
		    		$li_class .= "treeview";
		    		$value_subicon = "<span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span>";
		        }

		        $a_styled = "";
		    	if(strtolower($segment)===strtolower($value['menu'])){
		    		$a_styled .= "color : #FFF; background : #1e282c";
		    	}

		        $html.= "<li class='$li_class'><a href='".base_url($value['link'])."' style='$a_styled'><i class='$value[icon]'></i> $value[menu] $value_subicon";

		        if(array_key_exists('child',$value)) {
		          $html .= "</a>";
		          $html .= menu_create($value['child'], $modul, 'treeview-menu', $segment);
		        }

		        $html .= "</a></li>";
		    }
	    }
	    $html .= "</ul>";
	    
	    return $html;
	}
}
 
 
if(!function_exists('menu_create_1')){
	function menu_create_1($items, $class = 'sidebar-menu') {
	    $html = "";
	    foreach($items as $key=>$value) {
	        echo json_encode(["1"=>$value]);
	        if(array_key_exists('child',$value)) {
	          echo json_encode(["2"=>$value]);
	        }
	        // $html .= "</li>n";
	    }
	    
	    // return $html;
	}
}