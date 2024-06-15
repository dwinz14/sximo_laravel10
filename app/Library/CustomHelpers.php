<?php

use Illuminate\Foundation\Auth\User;

class CustomHelpers
{
	public static function showUploadedFile($file,$path , $width = 80) {
	
		$files =  public_path(). $path . $file ;		
		if(file_exists($files ) && $file !="") {
		//	echo $files ;
			$info = pathinfo($files);	
			if($info['extension'] == "jpg" || $info['extension'] == "jpeg" ||  $info['extension'] == "png" || $info['extension'] == "gif" || $info['extension'] == "JPG") 
			{
				$path_file = str_replace("./","",$path);
				return '<p><a "'.asset( $path_file . $file).'" target="_blank" class="previewImage">
				<img src="'.asset( $path_file . $file ).'" border="0" width="'. $width .'" class="img-thumbnail" /></a></p>';
			} else {
				$path_file = str_replace("./","",$path);
				return '<p> <a href="'.url($path_file . $file).'" target="_blank"> '.$file.' </a>';
			}
	
		} else {
			
			return "<img src='".asset('/uploads/images/no-image.png')."' border='0' width='".$width."' class='img-circle' /></a>";
				
		}

	}	
    
    public static function formatLookUp($val , $field, $arr )
	{
		$arr = explode(':',$arr);
		
		if(isset($arr['0']) && $arr['0'] ==1)
		{
			$Q = DB::select(" SELECT ".str_replace("|",",",$arr['3'])." FROM ".$arr['1']." WHERE ".$arr['2']." = '".$val."' ");
			if(count($Q) >= 1 )
			{
				$row = $Q[0];
				$fields = explode("|",$arr['3']);
				$v= '';
				$v .= (isset($fields[0]) && $fields[0] !='' ?  $row->{$fields[0]}.' ' : '');
				$v .= (isset($fields[1]) && $fields[1] !=''  ? $row->{$fields[1]}.' ' : '');
				$v .= (isset($fields[2]) && $fields[2] !=''  ? $row->{$fields[2]}.' ' : '');
				return $v;
			} else {
				return '';
			}
		} else {
			return $val;
		}		
	}

	public static function formatRows( $value ,$attr , $row = null )
	{
		$sximoconfig = config('sximo');
		$conn = (isset($attr['conn']) ? $attr['conn'] :array('valid'=>0,'db'=>'','key'=>'','display'=>'') );
		$field = $attr['field'];
		$format_as = (isset($attr['format_as']) ?  $attr['format_as'] : '');
		$format_value = (isset($attr['format_value']) ?  $attr['format_value'] : '');


		if ($conn['valid'] =='1'){
			$value = self::formatLookUp($value,$attr['field'],implode(':',$conn));
		}

		
		preg_match('~{([^{]*)}~i',$format_value, $match);
		if(isset($match[1]))
		{
			$real_value = $row->{$match[1]};
			$format_value	= str_replace($match[0],$real_value,$format_value);
		}

		if($format_as =='image')
		{
			// FORMAT AS IMAGE
			$vals = '';
			$values = explode(',',$value);

				foreach($values as $val)
				{
					if($val != '')
					{
						if(file_exists('.'.$format_value . $val))
						$vals .= '<a "'.url( $format_value . $val).'" target="_blank" class="previewImage"><img src="'.asset( $format_value . $val ).'" border="0" width="50" class="img-thumbnail" style="margin-right:2px;" /></a>';
					}
				}	 
		    $value = $vals;

		} elseif($format_as =='link') {
			// FORMAT AS LINK
			$value = '<a href="'.$format_value.'">'.$value.'</a>';

		} else if($format_as =='date') {
			// FORMAT AS DATE
			if($format_value =='')
			{
				if($sximoconfig['cnf_date'] !='' )
				{
					$value = date("".$sximoconfig['cnf_date']."",strtotime($value));
				} 
			} else {
				$value = date("$format_value",strtotime($value));
			}

		}  else if($format_as == 'file') {
			// FORMAT AS FILES DOWNLOAD
			$vals = '';
			$values = explode(',',$value);
			foreach($values as $val)
			{

				if(file_exists('.'.$format_value . $val))				
					$vals .= '<a href="'.asset($format_value. $val ).'"> '.$val.' </a><br />';
			}
			$value = $vals ;
		} else if( $format_as =='database') {
			// Database Lookup			
			if($value != '')
			{
				$fields = explode("|",$format_value);
				if(count($fields)>=2)
				{
					$field_table  =  str_replace(':',',',$fields[2]);
					$field_toShow =  explode(":",$fields[2]);
					//echo " SELECT ".$field_table." FROM ".$fields[0]." WHERE ".$fields[1]." IN(".$value.") ";
					$Q = DB::select(" SELECT ".$field_table." FROM ".$fields[0]." WHERE ".$fields[1]." IN(".$value.") ");
					if(count($Q) >= 1 )
					{
						$value = '';
						foreach($Q as $qv)
						{
							$sub_val = '';
							foreach($field_toShow as $fld)
							{
								$sub_val .= $qv->{$fld}.' '; 
							}	
							$value .= $sub_val.', ';					

						}
						$value = substr($value,0,strlen($value)-2);
					} 
				}
			}					
		}  else if($format_as == 'checkbox' or $format_as =='radio') {
			// FORMAT AS RADIO/CHECKBOX VALUES
				
				$values = explode(',',$format_value);
				if(count($values)>=1)
				{
					for($i=0; $i<count($values); $i++)
					{
						$val = explode(':',$values[$i]);
						if(trim($val[0]) == $value) $value = $val[1];	
					}
								
				} else {

					$value = '';	
				}
								
		} elseif ($format_as =='function'){

			$formaters  = $format_value;
			$c = explode("|",$formaters);
			$values = $c[2];
			foreach($row as $k=>$i)
			{
				if (preg_match("/$k/",$values))
					$values = str_replace($k, $i ,$values);				
			}			
			if(isset($c[0]) && class_exists($c[0]) )
			{
				$args = explode(':',$values);
				if(count($args)>=2)
				{
					$value = call_user_func( array($c[0],$c[1]) , $args )  ; 	
				} else {
					$value = call_user_func( array($c[0],$c[1]), $values); 	
				}				
			} else {
				$value = 'Class Doest Not Exists';
			}				
		
		}  else {

		}

		return $value;	 


	} 
	public static function imagehistory( $value ,$attr , $row = null )
	{
		$sximoconfig = config('sximo');
		$conn = (isset($attr['conn']) ? $attr['conn'] :array('valid'=>0,'db'=>'','key'=>'','display'=>'') );
		$field = $attr['field'];
		$format_as = (isset($attr['format_as']) ?  $attr['format_as'] : '');
		$format_value = (isset($attr['format_value']) ?  $attr['format_value'] : '');


		if ($conn['valid'] =='1'){
			$value = self::formatLookUp($value,$attr['field'],implode(':',$conn));
		}

		
		preg_match('~{([^{]*)}~i',$format_value, $match);
		if(isset($match[1]))
		{
			$real_value = $row->{$match[1]};
			$format_value	= str_replace($match[0],$real_value,$format_value);
		}

		if($format_as =='image')
		{
			// FORMAT AS IMAGE
			$vals = '';
			$values = explode(',',$value);

				foreach($values as $val)
				{
					if($val != '')
					{
						if(file_exists('.'.$format_value . $val))
						$vals .= '<a "'.url( $format_value . $val).'" target="_blank" class="previewImage"><img src="'.asset( $format_value . $val ).'" border="0" width="500" class="img-thumbnail" style="margin-right:2px;" /></a>';
					}
				}	 
		    $value = $vals;

		} elseif($format_as =='link') {
			// FORMAT AS LINK
			$value = '<a href="'.$format_value.'">'.$value.'</a>';

		} else if($format_as =='date') {
			// FORMAT AS DATE
			if($format_value =='')
			{
				if($sximoconfig['cnf_date'] !='' )
				{
					$value = date("".$sximoconfig['cnf_date']."",strtotime($value));
				} 
			} else {
				$value = date("$format_value",strtotime($value));
			}

		}  else if($format_as == 'file') {
			// FORMAT AS FILES DOWNLOAD
			$vals = '';
			$values = explode(',',$value);
			foreach($values as $val)
			{

				if(file_exists('.'.$format_value . $val))				
					$vals .= '<a href="'.asset($format_value. $val ).'"> '.$val.' </a><br />';
			}
			$value = $vals ;
		} else if( $format_as =='database') {
			// Database Lookup			
			if($value != '')
			{
				$fields = explode("|",$format_value);
				if(count($fields)>=2)
				{
					$field_table  =  str_replace(':',',',$fields[2]);
					$field_toShow =  explode(":",$fields[2]);
					//echo " SELECT ".$field_table." FROM ".$fields[0]." WHERE ".$fields[1]." IN(".$value.") ";
					$Q = DB::select(" SELECT ".$field_table." FROM ".$fields[0]." WHERE ".$fields[1]." IN(".$value.") ");
					if(count($Q) >= 1 )
					{
						$value = '';
						foreach($Q as $qv)
						{
							$sub_val = '';
							foreach($field_toShow as $fld)
							{
								$sub_val .= $qv->{$fld}.' '; 
							}	
							$value .= $sub_val.', ';					

						}
						$value = substr($value,0,strlen($value)-2);
					} 
				}
			}					
		}  else if($format_as == 'checkbox' or $format_as =='radio') {
			// FORMAT AS RADIO/CHECKBOX VALUES
				
				$values = explode(',',$format_value);
				if(count($values)>=1)
				{
					for($i=0; $i<count($values); $i++)
					{
						$val = explode(':',$values[$i]);
						if(trim($val[0]) == $value) $value = $val[1];	
					}
								
				} else {

					$value = '';	
				}
								
		} elseif ($format_as =='function'){

			$formaters  = $format_value;
			$c = explode("|",$formaters);
			$values = $c[2];
			foreach($row as $k=>$i)
			{
				if (preg_match("/$k/",$values))
					$values = str_replace($k, $i ,$values);				
			}			
			if(isset($c[0]) && class_exists($c[0]) )
			{
				$args = explode(':',$values);
				if(count($args)>=2)
				{
					$value = call_user_func( array($c[0],$c[1]) , $args )  ; 	
				} else {
					$value = call_user_func( array($c[0],$c[1]), $values); 	
				}				
			} else {
				$value = 'Class Doest Not Exists';
			}				
		
		}  else {

		}

		return $value;	 


	} 

	static public function buttonAction( $module , $access , $id , $setting, $labelView, $labelEdit)
	{

		$html ='<div class=" action " >
			<div class="dropdown ">
			  <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown"><i class="fas fa-tasks"></i></button>
			   <ul class="dropdown-menu">';
		if($access['is_detail'] ==1) {
			if($setting['view-method'] != 'expand')
			{
				$onclick = " onclick=\"ajaxViewDetail('#".$module."',this.href); return false; \"" ;
				if($setting['view-method'] =='modal')
						$onclick = " onclick=\"SximoModal(this.href,'View Detail'); return false; \"" ;
				$html .= '<li class="nav-item"><a href="'.url($module.'/'.$id).'" '.$onclick.' class="nav-link " > '.$labelView.' </a></li>';
			}
		}
		if($access['is_edit'] ==1) {
			$onclick = " onclick=\"ajaxViewDetail('#".$module."',this.href); return false; \"" ;
			if($setting['form-method'] =='modal')
					$onclick = " onclick=\"SximoModal(this.href,'Edit Form'); return false; \"" ;			
			
			$html .= '<li class="nav-item"><a href="'.url($module.'/'.$id).'/edit" '.$onclick.'  class="nav-link">  '.$labelEdit.' </a></li>';
		}
		$html .= '</ul></div></div>';
		return $html;
	}

	public static  function bulkForm( $field, $forms = array(), $value ='')
	{
		$type = ''; 
		$bulk ='true';
		$bulk = ($bulk == true ? '[]' : '');
		$mandatory = '';
		foreach($forms as $f)
		{
			if($f['field'] == $field && $f['search'] ==1)
			{
				$type = ($f['type'] !='file' ? $f['type'] : $f['type']); 
				$option = $f['option'];
				$required = $f['required'];
				
				if($required =='required') {
					$mandatory = "data-parsley-required='true'";
				} else if($required =='email') {
					$mandatory = "data-parsley-type'='email' ";
				} else if($required =='date') {
					$mandatory = "data-parsley-required='true'";
				} else if($required =='numeric') {
					$mandatory = "data-parsley-type='number' ";
				} else {
					$mandatory = '';
				}				
			}	
		}
		$field = 'bulk_'.$field;
		
		switch($type)
		{
			default;
				$form ='';
				break;
			
			case 'text';			
				$form = "<input  type='text' name='".$field."{$bulk}' class='form-control form-control-sm' $mandatory value='{$value}'/>";
				break;

			case 'text_date';
				$form = "<input  type='date' name='$field{$bulk}' class='date form-control form-control-sm' $mandatory value='{$value}'/> ";
				break;

			case 'text_datetime';
				$form = "<input  type='text' name='$field{$bulk}'  class='date form-control form-control-sm'  $mandatory value='{$value}'/> ";
				break;				

			case 'select';
				
			
				if($option['opt_type'] =='external')
				{
					
					$data = DB::table($option['lookup_table'])->get();
					$opts = '';
					foreach($data as $row):
						$selected = '';
						if($value == $row->{$option['lookup_key']}) $selected ='selected="selected"';
						$fields = explode("|",$option['lookup_value']);
						//print_r($fields);exit;
						$val = "";
						foreach($fields as $item=>$v)
						{
							if($v !="") $val .= $row->{$v}." " ;
						}
						$opts .= "<option $selected value='".$row->{$option['lookup_key']}."' $mandatory > ".$val." </option> ";
					endforeach;
						
				} else {
					$opt = explode("|",$option['lookup_query']);
					$opts = '';
					for($i=0; $i<count($opt);$i++) 
					{
						$selected = ''; 
						if($value == ltrim(rtrim($opt[0]))) $selected ='selected="selected"';
						$row =  explode(":",$opt[$i]); 
						$opts .= "<option $selected value ='".trim($row[0])."' > ".$row[1]." </option> ";
					}				
					
				}
				$form = "<select name='$field{$bulk}'  class='form-control form-control-sm' $mandatory >
							<option value=''> -- Select  -- </option>
							$opts
						</select>";
				break;	

			case 'radio';
			
				$opt = explode("|",$option['lookup_query']);
				$opts = '';
				for($i=0; $i<count($opt);$i++) 
				{
					$checked = '';
					$row =  explode(":",$opt[$i]);
					$opts .= "<option value ='".$row[0]."' > ".$row[1]." </option> ";
				}
				$form = "<select name='$field{$bulk}' class='form-control form-control-sm' $mandatory ><option value=''> -- Select  -- </option>$opts</select>";
				break;
			case 'file';
				$form = "<input type='file' name='".$field."{$bulk}' class='upload'   accept='image/x-png,image/gif,image/jpeg'    />";
				//var_dump($field);
				//exit;
				//$form .= self::showUploadedFile($value, $forms[$option]["option"]["path_to_upload"]);
				break;												
			
		}
		
		return $form;	
	}


}