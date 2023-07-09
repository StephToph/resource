<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    ////////////////// CLEAR CACHE ///////////////////
	public function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	//////////////////// C - CREATE ///////////////////////
	public function create($table, $data) {
		$this->db->insert($table, $data);
		return $this->db->insert_id();	
	}
	
	//////////////////// R - READ /////////////////////////
	public function read($table, $limit='', $offset='') {
		$query = $this->db->order_by('id', 'DESC');
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_order($table, $field, $type, $limit='', $offset='') {
		$query = $this->db->order_by($field, $type);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_single($field, $value, $table, $limit='', $offset='') {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_single_order($field, $value, $table, $or_field, $or_value, $limit='', $offset='') {
		$query = $this->db->order_by($or_field, $or_value);
		$query = $this->db->where($field, $value);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_like($field, $value, $table, $limit='', $offset='') {
		$query = $this->db->like($field, $value);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_like2($field, $value, $field2, $value2, $table, $limit='', $offset='') {
		$query = $this->db->like($field, $value);
		$query = $this->db->or_like($field2, $value2);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_like3($field, $value, $field2, $value2, $field3, $value3, $table, $limit='', $offset='') {
		$query = $this->db->like($field, $value);
		$query = $this->db->or_like($field2, $value2);
		$query = $this->db->or_like($field3, $value3);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read_field($field, $value, $table, $call) {
		$return_call = '';
		$getresult = $this->read_single($field, $value, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}

	public function read_field2($field, $value, $field2, $value2, $table, $call) {
		$return_call = '';
		$getresult = $this->read2($field, $value, $field2, $value2, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}

	public function read_field3($field, $value, $field2, $value2, $field3, $value3, $table, $call) {
		$return_call = '';
		$getresult = $this->read3($field, $value, $field2, $value2, $field3, $value3, $table);
		if(!empty($getresult)) {
			foreach($getresult as $result)  {
				$return_call = $result->$call;
			}
		}
		return $return_call;
	}
	
	public function read2($field, $value, $field2, $value2, $table, $limit='', $offset='') {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function read3($field, $value, $field2, $value2, $field3, $value3, $table, $limit='', $offset='') {
		$query = $this->db->order_by('id', 'DESC');
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		if($limit && $offset) {
			$query = $this->db->limit($limit, $offset);
		} else if($limit) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get($table);
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	
	public function check($field, $value, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function check2($field, $value, $field2, $value2, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	public function check3($field, $value, $field2, $value2, $field3, $value3, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	public function check4($field, $value, $field2, $value2, $field3, $value3, $field4, $value4, $table){
		$query = $this->db->where($field, $value);
		$query = $this->db->where($field2, $value2);
		$query = $this->db->where($field3, $value3);
		$query = $this->db->where($field4, $value4);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	//////////////////// U - UPDATE ///////////////////////
	public function update($field, $value, $table, $data) {
		$this->db->where($field, $value);
		$this->db->update($table, $data);
		return $this->db->affected_rows();	
	}
	
	//////////////////// D - DELETE ///////////////////////
	public function delete($field, $value, $table) {
		$this->db->where($field, $value);
		$this->db->delete($table);
		return $this->db->affected_rows();	
	}
	public function delete2($field, $value, $field2, $value2, $table) {
		$this->db->where($field, $value);
		$this->db->where($field2, $value2);
		$this->db->delete($table);
		return $this->db->affected_rows();	
	}
	//////////////////// END DATABASE CRUD ///////////////////////
	
	//////////////////// DATATABLE AJAX CRUD ///////////////////////
	public function datatable_query($table, $column_order, $column_search, $order, $where='') {
		// where clause
		if(!empty($where)) {
			$this->db->where(key($where), $where[key($where)]);
		}
		
		$this->db->from($table);
 
		// here combine like queries for search processing
		$i = 0;
		if($_POST['search']['value']) {
			foreach($column_search as $item) {
				if($i == 0) {
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				
				$i++;
			}
		}
		 
		// here order processing
		if(isset($_POST['order'])) { // order by click column
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else { // order by default defined
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
 
	public function datatable_load($table, $column_order, $column_search, $order, $where='') {
		$this->datatable_query($table, $column_order, $column_search, $order, $where);
		
		if($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		
		$query = $this->db->get();
		return $query->result();
	}
 
	public function datatable_filtered($table, $column_order, $column_search, $order, $where='') {
		$this->datatable_query($table, $column_order, $column_search, $order, $where);
		$query = $this->db->get();
		return $query->num_rows();
	}
 
	public function datatable_count($table, $where='') {
		$this->db->select("*");
		
		// where clause
		if(!empty($where)) {
			$this->db->where(key($where), $where[key($where)]);
		}
		
		$this->db->from($table);
		return $this->db->count_all_results();
	} 
	//////////////////// END DATATABLE AJAX CRUD ///////////////////
	
	//////////////////// NOTIFICATION CRUD ///////////////////////
	public function msg($type = '', $text = ''){
		if($type == 'success'){
			$icon = 'anticon anticon-check-circle';
			$icon_text = 'Successful!';
		} else if($type == 'info'){
			$icon = 'anticon anticon-info-circle';
			$icon_text = 'Head up!';
		} else if($type == 'warning'){
			$icon = 'anticon anticon-exclamation-circle';
			$icon_text = 'Please check!';
		} else if($type == 'danger'){
			$icon = 'anticon anticon-close-circle';
			$icon_text = 'Oops!';
		}
		
		return '
			<div class="alert alert-'.$type.' alert-dismissible">
				<div class="d-flex justify-content-start">
					<span class="alert-icon m-r-20 font-size-30">
						<i class="'.$icon.'"></i>
					</span>
					<div>
						<div class="alert-heading"><b>'.$icon_text.'</b></div>
						<p>'.$text.'</p>
					</div>
				</div>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  			<span aria-hidden="true">×</span>
				</button>
			</div>
		';	
	}
	//////////////////// END NOTIFICATION CRUD ///////////////////////
	
	//////////////////// EMAIL CRUD ///////////////////////
	public function send_email($to, $from, $subject, $body_msg, $name, $subhead, $brand_name='', $brand_logo='') {
		//clear initial email variables
		$this->email->clear(); 
		$email_status = '';
		
		$this->email->to($to);
		$this->email->from($from, $name);
		$this->email->subject($subject);
						
		$mail_data = array('message'=>$body_msg, 'subhead'=>$subhead, 'brand_name'=>$brand_name, 'brand_logo'=>$brand_logo);
		$this->email->set_mailtype("html"); //use HTML format
		$mail_design = $this->load->view('designs/email_template', $mail_data, TRUE);
				
		$this->email->message($mail_design);
		if(!$this->email->send()) {
			$email_status = FALSE;
		} else {
			$email_status = TRUE;
		}
		
		return $email_status;
	}
	//////////////////// END EMAIL CRUD ///////////////////////

	//////////////////// IMAGE CRUD ///////////////////////
	public function img_upload($log_id, $name, $path, $file='') {
		$img_id = 0;
		if(empty($name)) {$stamp = time().rand();} else {$stamp = $name;}
		$save_path = '';
		$save_path303 = '';
		$save_path150 = '';
		$msg = '';
		
		if (!is_dir($path))
			mkdir($path, 0755);

		$pathMain = './'.$path;
		if (!is_dir($pathMain))
			mkdir($pathMain, 0755);

		if($file == ''){$file = 'pics';}
		$result = $this->do_upload($file, $pathMain);

		if (!$result['status']){
			$msg = 'Upload Failed';
		} else {
			$save_path = $path . '/' . $result['upload_data']['file_name'];

			// check size
			if($result['image_width'] > 2000) {
				$msg = 'Size must not be more than 2MB';
			} else {
				//if size not up to 400px above
				if($result['image_width'] >= 192){
					if($result['image_width'] >= 400 || $result['image_height'] >= 400) {
						if($this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $stamp .'-303.gif','400','400', $result['image_width'], $result['image_height'])){
							$resize400 = $pathMain . '/' . $stamp.'-303.gif';
							$resize400_dest = $resize400;
							
							if($this->crop_image($resize400, $resize400_dest,'303','220')){
								$save_path303 = $path . '/' . $stamp .'-303.gif';
							}
						}
					}
						
					if($result['image_width'] >= 200 || $result['image_height'] >= 200){
						if($this->resize_image($pathMain . '/' . $result['upload_data']['file_name'], $stamp .'-150.gif','200','200', $result['image_width'], $result['image_height'])){
							$resize100 = $pathMain . '/' . $stamp.'-150.gif';
							$resize100_dest = $resize100;	
							
							if($this->crop_image($resize100, $resize100_dest,'150','150')){
								$save_path150 = $path . '/' . $stamp .'-150.gif';
							}
						}
					}
					
					//save picture in system
					if($log_id) {
						$pics_data = array(
							'user_id' => $log_id,
							'type' => 'image',
							'path' => $save_path,
							'pics_small' => $save_path303,
							'pics_square' => $save_path150,
							'reg_date' => date(fdate)
						);
						$pics_ins = $this->create('file', $pics_data);
						// update in user table
						if($pics_ins) {
							$img_id = $pics_ins;
							$save_path = $save_path;
						}
					}
				} else {
					$msg = 'Dimension must not be less than 2 X 2 inches (or 192px X 192px).';
				}
			}
		}

		return (object)array('id'=>$img_id, 'msg'=>$msg, 'path'=>$save_path);
	}

	public function doc_upload($log_id, $name, $path, $file='', $formats='') {
		if($name == '') {$stamp = time().rand();} else {$stamp = $name;}
		$save_path = '';
		$msg = '';

		$file_id = 0;
		$file_size = 0;
		$file_ext = '';
		
		if (!is_dir($path))
			mkdir($path, 0755);

		$pathMain = './'.$path;
		if (!is_dir($pathMain))
			mkdir($pathMain, 0755);

		if($file == ''){$file = 'file';}
		if($formats == '') {
			$allow_ext = 'doc|docx|ppt|pptx|xls|xlsx|jpg|jpeg|pdf|png|rar|txt|zip';
		} else {
			$allow_ext = $formats;
		}
		$result = $this->do_upload($file, $pathMain, $stamp, $allow_ext);

		if (!$result['status']){
			$msg = 'Upload Failed';
		} else {
			$save_path = $path . '/' . $result['upload_data']['file_name'];
			$file_size = $result['size'];
			$file_ext = $result['ext'];

			$file_data = array(
				'user_id' => $log_id,
				'type' => 'file',
				'path' => $save_path,
				'ext' => $file_ext,
				'reg_date' => date(fdate)
			);
			$file_ins = $this->create('file', $file_data);
			// update in user table
			if($file_ins) {
				$file_id = $file_ins;
			}
		}

		return (object)array('id'=>$file_id, 'msg'=>$msg, 'path'=>$save_path, 'size'=>$file_size, 'ext'=>$file_ext);
	}
	
	public function do_upload($htmlFieldName, $path, $name='', $ext='gif|jpg|jpeg|png|tif|bmp') {
		if($name == ''){$name = time();}
		$config['file_name'] = $name;
        $config['upload_path'] = $path;
        $config['allowed_types'] = $ext;
		// $config['max_size'] = '10000';
		$config['max_size'] = 0;
        $config['max_width'] = 6000;
        $config['max_height'] = 6000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        unset($config);
        
		if (!$this->upload->do_upload($htmlFieldName)){
            return array('error' => $this->upload->display_errors(), 'status' => 0);
        } else {
            $up_data = $this->upload->data();
			return array('status' => 1, 'upload_data' => $this->upload->data(), 'image_width' => $up_data['image_width'], 'image_height' => $up_data['image_height'], 'size' => $up_data['file_size'], 'ext' => $up_data['file_ext']);
        }
    }
	
	public function resize_image($sourcePath, $desPath, $width = '500', $height = '500', $real_width='', $real_height='') {
        $this->image_lib->clear();
		$config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath;
        $config['new_image'] = $desPath;
        $config['quality'] = '100%';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
		$config['width'] = $width;
        $config['height'] = $height;
		
		$dim = (intval($real_width) / intval($real_height)) - ($config['width'] / $config['height']);
		$config['master_dim'] = ($dim > 0)? "height" : "width";
		
		$this->image_lib->initialize($config);
 
        if ($this->image_lib->resize())
            return true;
        return false;
    }
	
	public function crop_image($sourcePath, $desPath, $width = '320', $height = '320') {
        $this->image_lib->clear();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath;
        $config['new_image'] = $desPath;
        $config['quality'] = '100%';
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $height;
		$config['x_axis'] = '20';
		$config['y_axis'] = '20';
        
		$this->image_lib->initialize($config);
 
        if ($this->image_lib->crop())
            return true;
        return false;
    }
	//////////////////// END IMAGE LIBRARY ///////////////////////
	
	//////////////////// DATETIME ///////////////////////
	public function date_diff($now, $end, $type='days') {
		$now = new DateTime($now);
		$end = new DateTime($end);
		$date_left = $end->getTimestamp() - $now->getTimestamp();
		
		if($type == 'seconds') {
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'minutes') {
			$date_left = $date_left / 60;
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'hours') {
			$date_left = $date_left / (60*60);
			if($date_left <= 0){$date_left = 0;}
		} else if($type == 'days') {
			$date_left = $date_left / (60*60*24);
			if($date_left <= 0){$date_left = 0;}
		} else {
			$date_left = $date_left / (60*60*24*365);
			if($date_left <= 0){$date_left = 0;}
		}	
		
		return $date_left;
	}

	

	public function date_range_order($firstDate, $col1, $secondDate, $col2, $table, $field='', $type='asc'){
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		 
		 $query = $this->db->order_by($field, $type);

		 $query = $this->db->get($table);
		 if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	

	public function date_range1($firstDate, $col1, $secondDate, $col2,$col3, $val3, $table){
		$this->db->where($col3, $val3);
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		 
		 $query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function date_range($firstDate, $col1, $secondDate, $col2, $table){
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function date_range2($firstDate, $col1, $secondDate, $col2, $col3, $val3, $col4, $val4, $table){
		$this->db->where($col3, $val3);
		$this->db->where($col4, $val4);		
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function date_range3($firstDate, $col1, $secondDate, $col2, $col3, $val3, $col4, $val4, $col5, $val5, $table){
		$this->db->where($col3, $val3);
		$this->db->where($col4, $val4);		
		$this->db->where($col5, $val5);		
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function date_check($firstDate, $col1, $secondDate, $col2, $table){
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 return $query->num_rows();
	}

	public function date_range1_group($firstDate, $col1, $secondDate, $col2, $col3, $val3, $group, $table){
		$this->db->group_by($group);
		$this->db->where($col3, $val3);	
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function date_range2_group($firstDate, $col1, $secondDate, $col2, $col3, $val3, $col4, $val4, $group, $table){
		$this->db->group_by($group);
		$this->db->where($col3, $val3);
		$this->db->where($col4, $val4);		
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 if($query->num_rows() > 0) {
			return $query->result();
		}
	}

	public function date_group_check1($firstDate, $col1, $secondDate, $col2, $col3, $val3, $group, $table){
		$this->db->group_by($group);
		$this->db->where($col3, $val3);
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 return $query->num_rows();
	}

	public function date_check1($firstDate, $col1, $secondDate, $col2, $col3, $val3, $table){
		$this->db->where($col3, $val3);
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 return $query->num_rows();
	}

	public function date_check2($firstDate, $col1, $secondDate, $col2, $col3, $val3, $col4, $val4, $table){
		$this->db->where($col3, $val3);
		$this->db->where($col4, $val4);		
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 return $query->num_rows();
	}

	public function date_check3($firstDate, $col1, $secondDate, $col2, $col3, $val3, $col4, $val4, $col5, $val5, $table){
		$this->db->where($col3, $val3);
		$this->db->where($col4, $val4);		
		$this->db->where($col5, $val5);		
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 return $query->num_rows();
	}

	public function date_check4($firstDate, $col1, $secondDate, $col2, $col3, $val3, $col4, $val4, $col5, $val5,$col6, $val6, $table){
		$this->db->where($col3, $val3);
		$this->db->where($col4, $val4);		
		$this->db->where($col5, $val5);
		$this->db->where($col6, $val6);		
		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') >= '".$firstDate."'",NULL,FALSE);
   		$this->db->where("DATE_FORMAT(".$col1.",'%Y-%m-%d') <= '".$secondDate."'",NULL,FALSE);
		$query = $this->db->order_by('id', 'DESC');

		 $query = $this->db->get($table);
		 return $query->num_rows();
	}
	//////////////////// END DATETIME ///////////////////////

	
	

	/// timspan
	public function timespan($datetime) {
        $difference = time() - $datetime;
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");

        if ($difference > 0) { 
            $ending = 'ago';
        } else { 
            $difference = -$difference;
            $ending = 'to go';
        }
		
		for($j = 0; $difference >= $lengths[$j]; $j++) {
            $difference /= $lengths[$j];
        } 
        $difference = round($difference);

        if($difference != 1) { 
            $period = strtolower($periods[$j].'s');
        } else {
            $period = strtolower($periods[$j]);
        }

        return "$difference $period $ending";
	}
	//// filter activities
	public function filter_activity($limit='', $offset='', $user_id='', $search='', $start_date='', $end_date='') {
		// build query
		$query = $this->db->order_by('id', 'DESC');

		// filter
		if(!empty($search)) { 
			$query = $this->db->like('action', $search);
		}

		if(!empty($start_date) && !empty($end_date)){
			$this->db->where("DATE_FORMAT(reg_date,'%Y-%m-%d') >= '".$start_date."'",NULL,FALSE);
			$this->db->where("DATE_FORMAT(reg_date,'%Y-%m-%d') <= '".$end_date."'",NULL,FALSE); 
		}
		
		if(!empty($limit) && !empty($offset)) {
			$query = $this->db->limit($limit, $offset);
		} else if(!empty($limit)) {
			$query = $this->db->limit($limit);
		}
		$query = $this->db->get('activity');
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
	//////////////////// IMAGE DATA //////////////////
	public function image($id, $size='small') {
		if($id) {
			if($size == 'small') {
				$path = $this->read_field('id', $id, 'file', 'pics_small');
			} else if($size == 'big') {
				$path = $this->read_field('id', $id, 'file', 'path');
			} else {
				$path = $this->read_field('id', $id, 'file', 'pics_square');
			}
		} 

		if(empty($path)) {
			$path = 'assets/images/avatar.png';
		}

		return $path;
	}
	//////////////////// END //////////////////

	public function to_number($text) {
		$number = preg_replace('/\s+/', '', $text); // remove all in between white spaces
		$number = str_replace(',', '', $number); // remove money format
		$number = floatval($number);
		return $number;
	}

	public function to_hours($time, $format='%02dh %02dm') {
		if ($time < 1) { return; }
		$hours = floor($time / 60);
		$minutes = ($time % 60);
		return sprintf($format, $hours, $minutes);
	}

	public function books () {
		return array(
			'Genesis',
			'Exodus',
			'Leviticus',
			'Numbers',
			'Deuteronomy',
			'Joshua',
			'Judges',
			'Ruth',
			'1 Samuel',
			'2 Samuel',
			'1 Kings',
			'2 Kings',
			'1 Chronicles',
			'2 Chronicles',
			'Ezra',
			'Nehemiah',
			'Esther',
			'Job',
			'Psalm',
			'Proverbs',
			'Ecclesiastes',
			'Song of Solomon',
			'Isaiah',
			'Jeremiah',
			'Lamentations',
			'Ezekiel',
			'Daniel',
			'Hosea',
			'Joel',
			'Amos',
			'Obadiah',
			'Jonah',
			'Micah',
			'Nahum',
			'Habakkuk',
			'Zephaniah',
			'Haggai',
			'Zechariah',
			'Malachi',
			'Matthew',
			'Mark',
			'Luke',
			'John',
			'Acts',
			'Romans',
			'1 Corinthians',
			'2 Corinthians',
			'Galatians',
			'Ephesians',
			'Philippians',
			'Colossians',
			'1 Thessalonians',
			'2 Thessalonians',
			'1 Timothy',
			'2 Timothy',
			'Titus',
			'Philemon',
			'Hebrews',
			'James',
			'1 Peter',
			'2 Peter',
			'1 John',
			'2 John',
			'3 John',
			'Jude',
			'Revelation'
		);
	}
	
	////////////////// BIBLE API /////////////////////////
	public function bible_api($endpoint) {
	    $ch = curl_init();  
		// $header = array('api-key: 0b8a9624f2bfb6a24b795d32f18aae96');
        // $url = 'https://api.scripture.api.bible/v1/'.$endpoint;

		$url = 'https://getbible.net/json?'.$endpoint;

		$chead = array();
		$chead[] = 'Content-Type: application/json';
    
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $chead);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 
        $result = curl_exec($ch);

        curl_close($ch);

		return $result;
	}
	public function api($method='get', $endpoint, $param) {
		$curl = curl_init();

		$link = site_url('api/').$endpoint;
		
		if($method == 'get') {
			if(!empty($param)) $link .= '?'.$param;
		}

		$key = getenv('api_key');
		
		$chead = array();
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'Authorization: Bearer '.$key;

		curl_setopt($curl, CURLOPT_URL, $link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		if($method == 'post') {
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($param));
		}
		if($method == 'delete') {
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($param));
		}
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		$result = curl_exec($curl);
		curl_close($curl);

		return $result;

	}

	public function bible($endpoint='') {
		// create a new cURL resource
		$curl = curl_init();

		$key = 'fe053a49a7df9f6f1c0b2aef794c9bd0';
		// parameters
		$api_link = 'https://api.scripture.api.bible/v1/'.$endpoint;
		
		$chead = array();
		$chead[] = 'Content-Type: application/json';
		$chead[] = 'api-key: '.$key;

		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $api_link);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $chead);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		// grab URL and pass it to the browser
		$result = curl_exec($curl);

		// close cURL resource, and free up system resources
		curl_close($curl);

		return $result;
	}
	
	////////////////// END BIBLE API /////////////////////

	//////////////////// MODULE ///////////////////////
	public function module($role, $module, $type) {
		$result = 0;
		
		$mod_id = $this->read_field('link', $module, 'access_module', 'id');
		$crud = $this->read_field('role_id', $role, 'access', 'crud');
		if($mod_id) {
			if(!empty($crud)) {
				$crud = json_decode($crud);
				foreach($crud as $cr) {
					$cr = explode('.', $cr);
					if($mod_id == $cr[0]) {
						if($type == 'create'){$result = $cr[1];}
						if($type == 'read'){$result = $cr[2];}
						if($type == 'update'){$result = $cr[3];}
						if($type == 'delete'){$result = $cr[4];}
						break;
					}
				}
			}
		}
		
		return $result;
	}
	public function mod_read($role, $module) {
		$rs = $this->module($role, $module, 'read');
		return $rs;
	}
	//////////////////// END MODULE ///////////////////////
	
	////// store activities
	public function activity($item, $item_id, $action) {
		$ins['item'] = $item;
		$ins['item_id'] = $item_id;
		$ins['action'] = $action;
		$ins['reg_date'] = date(fdate);
		return $this->create('activity', $ins);
	}
	
	//// filter customers
	public function filter_customer($limit='', $offset='', $user_id='',$search='') {
		$acc_role_id = $this->read_field('name', 'user', 'access_role', 'id');
		
		// check role
		$role_id = $this->read_field('id', $user_id, 'user', 'role_id');
		$role = $this->read_field('id', $role_id, 'access_role', 'name');
		
        $query = $this->db->where('role_id', $acc_role_id);
		// filter
		if(!empty($search)) { 
			$query = $this->db->like('username', $search); 
			$query = $this->db->or_like('email', $search);
			// $query = $this->db->or_like('phone', $search);
		}

        if(!empty($limit) && !empty($offset)) {
			$query = $this->db->limit($limit, $offset);
		} else if(!empty($limit)) {
			$query = $this->db->limit($limit);
		}

		$query = $this->db->order_by('id', 'DESC');

		$query = $this->db->get('user');
		if($query->num_rows() > 0) {
			return $query->result();
		}
	}
}
