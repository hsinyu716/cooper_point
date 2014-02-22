<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('gd_creater');
		$this->gd_creater->delimg();
	}
	
	private function _getBaseData(){
		$fansInfoArray = $this->getFansInfo();
		$data = array(
				'fb_title' => $this->APPTITLE(),
				'page_id' => $fansInfoArray['page_id'],
				'page_url' => $fansInfoArray['page_url'],
				'images' => $this->preload_images()
		);
		return $data;
	}

	public function index() {
// 		var_dump($_GET['t']);exit;
		$data = $this->_getBaseData();
// 		$friends = $this->facebook_model->get_friends_list();
// 		$fids = array();
// 		foreach($friends as $fk=>$fv){
// 			$fids[] = $fv['uid'];
// 		}
// 		echo (implode(',',$fids));

		$this->init_model->apply_template_with_ga($this->router->method . '_view', $data);
	}
	
	public function ajax_point($echo=false){
		$fbid = $this->facebook->getUser();
		$params = array();
		$articles = $this->article_info_md->getData($params);
		
		$params = array(
				'fbid' => $fbid,
				'dtype' => 'comment'
		);
		$point_comment = $this->point_record_md->getData($params);
		
		$point_comments = array();
		foreach($point_comment as $pk=>$pv):
		$point_comments[] = $pv['post_id'];
		endforeach;
		
		$params = array(
				'fbid' => $fbid,
				'dtype' => 'like'
		);
		$point_like = $this->point_record_md->getData($params);
		
		$point_likes = array();
		foreach($point_like as $pk=>$pv):
		$point_likes[] = $pv['post_id'];
		endforeach;
		
		foreach($articles as $ak=>$av):
		$fql = "select post_id from comment where post_id = '".$av['post_id']."' and fromid = '".$fbid."' limit 5000";
		$params = array('method' => 'fql.query','query' => $fql,'callback' => '');
		$rs = $this->facebook->api($params);
		if(sizeof($rs)>0 && !in_array($rs[0]['post_id'],$point_comments)):
// 		var_dump($rs);
		$params = array(
				'fbid' => $fbid,
				'post_id' => $rs[0]['post_id'],
				'dtype' => 'comment'
		);
		$this->point_record_md->insert($params);
		endif;
			
		$fql = "select object_id from like where object_id='" . $av['post_id'] . "' and user_id=me() ";
		$params = array('method' => 'fql.query', 'query' => $fql, 'callback' => '');
		$rs = $this->facebook->api($params);
		if(sizeof($rs)>0 && !in_array($rs[0]['object_id'],$point_likes)):
// 		var_dump($rs);
		$params = array(
				'fbid' => $fbid,
				'post_id' => $rs[0]['object_id'],
				'dtype' => 'like'
		);
		$this->point_record_md->insert($params);
		endif;
		endforeach;
		
		$params = array(
				'fbid' => $fbid
				);
		$rs = $this->point_record_md->getData($params);
		
		$score = 0;
		foreach($rs as $rk=>$rv):
			if($rv['dtype']=='comment'):
				$score += $this->comment_point;
			elseif($rv['dtype']=='like'):
				$score += $this->like_point;
			elseif($rv['dtype']=='share'):
				$score += $this->share_point;
			endif;
		endforeach;
		
		$rs = $this->exchange_info_md->getData($params);
		foreach($rs as $rk=>$rv):
			$score -= $rv['point'];
		endforeach;
		
		if($echo):
			echo $score;
		else:
			return $score;
		endif;
	}
	
	var $comment_point = 3;
	var $like_point = 1;
	var $share_point = 2;
	
	public function result() {
		$fbid = $this->facebook->getUser();
		$data = $this->_getBaseData();
		$data['fbid'] = $fbid;
		$user = $this->facebook_model->getUser($fbid);
		$data['user'] = $user;
		$score = $this->ajax_point();
		$data['score'] = $score;
// 		exit;

		$params = array();
		$order = array('order_id','asc');
		$rs = $this->prize_info_md->getData($params,$order);
		
		$data['prizes'] = json_encode($rs);
		
// 		var_dump($data);exit;

// 		$paste_e = array(
// 				array(142,68),
// 				array(233,68),
// 				array(322,80)
// 		);

// 		
// 		$filename = 'tmp/'.$fbid.'.jpg';
// 		copy($user['pic_big'],$filename);
			
// 		$img_array[] = array(
// 				'filename' => $filename,
// 				'imgw' => 76,
// 				'imgh' => 76,
// 				'imgx' => 43,
// 				'imgy' => 92,
// 				'makep_color' => '255,255,255',
// 				'resize' => false, //png要設為false
// 				'border' => 0, //png不可有border
// 				'borderw' => 0,
// 				// 					'del' => 'N'
// 		);
		
// 		$text_array = array();
// 		foreach($fids as $fk=>$fv){
// 			$fuser = $this->facebook_model->getUser($fv);
			
// 			$filename = 'tmp/'.$fv.'.jpg';
// 			copy($fuser['pic_big'],$filename);
			
// 			$img_array[] = array(
// 			        'filename' => $filename,
// 			        'imgw' => 76,
// 			        'imgh' => 76,
// 			        'imgx' => $paste_e[$fk][0],
// 					'imgy' => $paste_e[$fk][1],
// 			        'makep_color' => '255,255,255',
// 			        'resize' => false, //png要設為false
// 			        'border' => 0, //png不可有border
// 			        'borderw' => 0,
// // 					'del' => 'N'
// 			        );
// 		}
		
// 		$merge_data = array(
// 		    'fbid' => $fbid,
// 		    'bg' => 'img/wall.jpg',
// 		    'bw' => 440,
// 		    'bh' => 440,
// 		    'img_array' => $img_array,
// 		    'text_array' => $text_array,
// 				'output' => MERGE_PATH.$fbid.'_wall.jpg'
// 		    );
// 		$this->gd_creater->merge($merge_data);
// 		echo '<img src="'.MERGE_PATH.$fbid.'_wall.jpg"/>';

		$this->init_model->apply_template_with_ga($this->router->method . '_view', $data);
	}
	
	public function exchange(){
		$fbid = $this->facebook->getUser();
		
		$params = array(
				'fbid' => $fbid,
				'prize_serial' => $_POST['prize_serial']
				);
		$rs = $this->exchange_info_md->getCount($params);
		
		$success = false;
		if($rs==0):
			$params['point'] = $_POST['point'];
			$this->exchange_info_md->insert($params);
			$success = true;
		endif;
		
		$score = $this->ajax_point();
		
		$json = array(
				'success' => $success,
				'point' => $score
		);
		
		echo json_encode($json);
	}
	
	public function more(){
		$data = $this->_getBaseData();
		$params = array();
		$articles = $this->article_info_md->getData($params);
		$data['articles'] = $articles; 
		$this->init_model->apply_template_with_ga($this->router->method . '_view', $data);
	}
	
	public function share(){
		$fbid = $this->facebook->getUser();
		$params = array(
				'fbid' => $fbid,
				'dtype' => 'share',
				'post_id' => 0
				);
		$rs = $this->point_record_md->getCount($params);
		$success = false;
		if($rs==0):
			$this->point_record_md->insert($params);
			$success = true;
		endif;
		$score = $this->ajax_point();
		
		$json = array(
				'success' => $success,
				'point' => $score
				);
		
		echo json_encode($json);
	}
	
	public function message($fbid=0){
		$data = $this->_getBaseData();
		$data['fbid'] = $fbid;
		
		$this->init_model->apply_template_with_ga($this->router->method . '_view', $data);
	}
	
	public function check_msg(){
		$table = 'tag_record';
		$rs = $this->db_md->getCount($table,$_POST);
		$json = array(
				'cnt' => $rs
				);
		echo json_encode($json);
	}
	
	public function setMsg(){
		$table = 'tag_record';
		$params = array(
				'message' => $_POST['message']
				);
		unset($_POST['message']);
		$where = $_POST;
		$this->db->update($table,$params,$where);
		$json = array(
				'success' => true
		);
		echo json_encode($json);
	}
	
	public function redirect($fbid=0){
		if($fbid==0):
			echo '<script>window.open("'.APP_HOST.'","_top");</script>';
		else:
			echo '<script>window.open("'.APP_HOST.'index.php/main/message/'.$fbid.'","_top");</script>';
		endif;
		exit;
	}
	
	public function setData(){
		$table = 'user_info';
		$fbid = $this->facebook->getUser();
		
		$params = array(
				'fbid' => $fbid
				);
		$rs = $this->db_md->getCount($table,$params);
		$params = array(
				'username' => str_replace('%0D','',$_POST['username']),
				'email' => str_replace('%0D','',$_POST['email']),
				'tel' => str_replace('%0D','',$_POST['tel'])
				);
		$user = $this->facebook_model->getUser($fbid);
		$params['fbid'] = $fbid;
		$params['fbname'] = $user['name'];
		$params['is_join'] = 'Y';
		$where = array(
				'fbid' => $fbid
				);
		$this->db->update($table,$params,$where);
		$json = array(
				'success' => 1
				);
		echo json_encode($json);
	}

	public function po_wall() {
		$fb_title = $this->APPTITLE();
		$fbid = $this->facebook->getUser();
		
		$fuser = $_SESSION[$fbid.'fuser'];
		
		$table = 'user_info';
		$params = array(
				'fbid' => $fbid,
				'is_join' => 'Y'
		);
		$rs = $this->db_md->getCount($table,$params);
		if($rs==0){
			$params['is_join'] = 'N';
			$this->db->insert($table,$params);
			foreach($fuser as $fk=>$fv):
				$table = 'tag_record';
				$params = array(
						'fbid' => $fbid,
						'tofbid' => $fv['uid']
						);
				$this->db->insert($table,$params);
			endforeach;
		}
		
		$user = $this->facebook_model->getUser($fbid);
		$file = WEB_HOST.MERGE_PATH.$fbid.'_wall.jpg';
		$file = WEB_HOST.'images/wall-2.jpg';
		$file = str_replace('https','http',$file);
// 		$this->load->library('bitly');
		$url = site_url('main/redirect').'/'.$fbid;
// 		$bitly = '';
// 		$bitly = $this->bitly->shorten($url);
// 		$bitly = $bitly->$url->shortUrl;
		
		$message = '在家靠父母，出外靠朋友，是誰在你人生中的重要時刻為你撐腰，成為你的最佳戰友？

____是我的超完美強棒應援團，朋友們快來留言，讓我們一起擊出一支無人能擋的HOME RUN吧>>>'.$url;

		$params = array(
				'pic' => $file,
				'album_name' => $fb_title.' photos',
				'album_description' => $fb_title.' photos',
				'picture_description' => $message,
		);
		$pid = $this->facebook_model->album($params);
// 		foreach($fuser as $fk=>$fv):
// 			$params = array(
// 					'upload_photo_id' => $pid['id'],
// 					'x' => 5,
// 					'y' => 5,
// 					'uid' => $fv['uid']
// 			);
// 			$this->facebook_model->tag($params);
// 		endforeach;
		$json = array(
				'success' => true
		);
		echo json_encode($json);
	}

	public function ajaxrecord(){
		$table = $_POST['table'];
		$fbid = $this->facebook->getUser();
		$params = array(
				'fbid' => $fbid
		);
		$success = $this->db->insert($table,$params);
		$json = array(
				'success' => $success
		);
		echo json_encode($json);
	}
	
	private function preload_images(){
		foreach (glob(IMAGE_PATH."/*") as $f) $images[]=  "'$f'";
		return implode(',',$images);
	}

	public function add_tab()
	{
		$url = "http://www.facebook.com/dialog/pagetab?app_id=" . FBAPP_ID . "&next=" . APP_HOST;
		echo "<a href='$url'>$url</a>";
		exit;
	}

	private function getFansInfo() {
		$rows['page_id'] = fans_page_id;
		$rows['page_url'] = fans_page;

		return $rows;
	}

	public function ajaxtouch(){
	}

	private function APPTITLE(){
		$fbapp_title = $this->facebook_model->getAPPTitle();
		return $fbapp_title[0]['display_name'];
	}
}

?>
