<?php 
use Illuminate\Support\Facades\DB;
function getpresales(){
	$presales = DB::table('settings_presales')
				->get();
	$array=[];
	foreach( $presales as $row){
		$array[$row->id]['presales_name']= $row->presales_name;
		$array[$row->id]['parent_id']= $row->parent_id;
	}
	$html=treeview($array,0);
	return $html;
}

$html = "";

function treeview($array, $parent, $level = 0, $prelevel = -1){
	global $html;
	foreach( $array as $id => $data){
		if( $parent == $data['parent_id']){
        	if ($level>$prelevel) {
        		$html.='<div class="progressDiv-inbox"><span> <img src="http://localhost:8000/assets/images/settings/psale-icon1.png"> </span>';	
        	}
        	if($level==$prelevel){
        			$html.= '</h4>';
        	}
        		$html.='<h4>'. $data['presales_name'];
        	if ($level>$prelevel) {
        			$prelevel=$level;
        	}
        		$level++;
        		treeview($array,$id,$level,$prelevel);
        		$level--;
		}
	}if($level==$prelevel){
		$html.= '<a href="#" class="viewbtn" > View check list</a></div>';
	}
	return $html;
}



?>