<?php 

//if(isset($_POST['submit'])){
	
	$request_data=array('company_name','looking_for','first_name','last_name','email_id','phone','address','city','country','post_code','message');
	
	$rules=array();
	
	$rules['company_name']=array('required');
	$rules['looking_for']=array('required');
	$rules['first_name']=array('required');
	$rules['last_name']=array('required');
	$rules['email_id']=array('required');
	$rules['phone']=array('required');
	$rules['address']=array('required');
	$rules['city']=array('required');
	$rules['country']=array('required');
	$rules['post_code']=array('required');
	$rules['message']=array('required');
	
	$store_data=array();
	$error_data=array();
	foreach($request_data as $field){
		
		$store_data[$field]=isset($_POST[$field])?$_POST[$field]:"";
		
		$field_name=str_replace('_',' ',$field);
		$field_name=ucwords($field_name);
		foreach($rules[$field] as $rule){
			if($rule=='required'){
				$error_data[]=$field_name.' is required';
			}
		}
	}
	
	
	if(empty($error_data)){
		//Submit Form
		$response_message=array(
			"status" =>1,
			"message" => "Message has been delivered"
		);
		echo json_encode($response_message);
	}else{
		$response_message=array(
			"status" =>0,
			"message" => $error_data
		);
		echo json_encode($response_message);
	}
	
//}
?>