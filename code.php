public function apiProfilePic(){
		try{
			if($this->main_model->get_profilepic_id('images_pic',$_POST['id']) == true){
				$result['data'] = "<img alt='' class='img-circle' src='".base_url()."images/uploads/no_img.png' />";
			}
			else{
				$result = $this->main_model->get_profilepic_id('images_pic',$_POST['id']);
				$result['data'] = '<img src="data:image/jpeg;base64,'.base64_encode($result->images_pic ).'"class="img-circle"/>';
			}			
			$result['success'] = true;
		}
		catch(Exception $e){
			$result = array();
		    $result['success'] = false;
		    $result['errormsg'] = $e->getMessage();
		}
		echo json_encode($result);
		exit();
	}
