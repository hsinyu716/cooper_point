
<script>

var posturl = '<?= site_url('main/po_wall') ?>';
var setDataurl = '<?= site_url('main/setData') ?>';
var refreshurl = '<?= site_url('main/ajax_point') ?>/true';
var shareurl = '<?= site_url('main/share') ?>';
var moreurl = '<?= site_url('main/more') ?>';
var exchangeurl = '<?= site_url('main/exchange') ?>';

var point = '<?=$score;?>';
var prizes = <?=json_encode($prizes);?>;

$(function(){
	
});
</script>

<div ng-app="myApp" ng-controller="resultController">

	<img src="<?=$user['pic_big'];?>" />

	目前有 {{point}}  點可用 <button ng-click="refresh();">刷新</button> <button ng-click="more();">獲得更多點數</button>
	 <button ng-click="share();">分享得x點</button>
	<div>
		<div ng-repeat="pr in prizes" sn="{{ $index }}" style="float:left;">
			<div>{{pr.title}}</div>
			<div><img height="200" src="{{pr.img}}" /></div>
			<div ng-bind-html="sanitize(pr.descr)"></div>
			<button ng-click="exchange(pr.serial_id,pr.point)">{{pr.point}} 點兌換</button>
			<div>{{pr.prize_date}}抽獎</div>
		</div>
	</div>


</div>