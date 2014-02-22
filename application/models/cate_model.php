<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cate_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
	function get(){
		return array(
			1 => array(
				'style'=>'甜美風',
				'style_id'=>'C',				
				'title'=>"甜心教主",
				'interests'=>array("巡迴演唱會","音樂流行榜","音樂家/樂團","音樂影片","音樂獎項","唱片公司","專輯","電影/音樂","電影院","歌曲","演員/導演","樂器"),
			),

			2 => array(
				'style'=>'甜美風',
				'style_id'=>'C',				
				'title'=>"浪漫公主",
				'interests'=>array("美食/飲料","美食/雜貨","喜劇演員","媒體/新聞/出版業","新聞名人","電視/電影獎項","電視節目","電視網絡","雜誌","廚房/烹飪","廚師","藝人"),
			),			
			
			3 => array(
				'style'=>'甜美風',
				'style_id'=>'C',				
				'title'=>"漂亮寶貝",
				'interests'=>array("產品/服務","設備用品","遊戲中心/玩具","零售和消費商品","電子產品","電腦/科技","網站","網際網路/軟體","廣播電台","應用程式專頁","製作人","記者"),
			),	

			4 => array(
				'style'=>'輕熟風',
				'style_id'=>'M',				
				'title'=>"性感女神",
				'interests'=>array("小型企業","酒吧","公司","房地產","保險公司","商業人士","商業服務","商業設備","銀行/金融服務","銀行/金融機構","舞者","葡萄酒/烈酒"),
			),	

			5 => array(
				'style'=>'輕熟風',
				'style_id'=>'M',				
				'title'=>"典雅皇后",
				'interests'=>array("作家","汽車","非政府組織 （NGO）","非營利組織","書局","書籍","提袋/行李","活動企劃/活動服務","博物館/藝廊","餐廳/咖啡館","服飾","諮商顧問/商業服務"),
			),	

			6 => array(
				'style'=>'輕熟風',
				'style_id'=>'M',				
				'title'=>"時尚名媛",
				'interests'=>array("水療/美容/個人護理","社群/政府機構","政府機關","政治人物","政治組織","政黨","法律相關/法律","律師","購物/零售業","藝術家","藝術/休閒娛樂/夜生活","珠寶/鐘錶"),
			),	

			7 => array(
				'style'=>'簡約風',
				'style_id'=>'S',				
				'title'=>"鄰家女孩",
				'interests'=>array("大學","本地商店","居家裝飾","家庭用品","家庭裝修","教育","教堂/宗教團體","學校","圖書館","寵物用品","寵物服務","嬰兒用品/兒童用品"),
			),	

			8 => array(
				'style'=>'簡約風',
				'style_id'=>'S',				
				'title'=>"率真甜姊兒",
				'interests'=>array("公共場所","公眾人物","交通運輸","交通轉運點","地標","相機/相片","旅遊/休閒旅遊","旅遊/觀光","旅館","景點/景點活動","機場","工作室"),
			),	

			9 => array(
				'style'=>'簡約風',
				'style_id'=>'S',				
				'title'=>"陽光美人",
				'interests'=>array("戶外裝備/體育用品","校隊","業餘運動團隊","運動員","運動場所","運動聯盟","職業球隊","體育類/休閒活動/活動","健康保健/美容","健康保健/醫療/藥房","醫院/診所","俱樂部"),
			),	
				
		
		);		
	}


	
}

?>