<script>
var prizes = <?= json_encode($prizes);?>;
var createUrl = '<?=site_url('backend/createPrize');?>';
var editUrl = '<?=site_url('backend/editPrize');?>';
var orderUrl = '<?=site_url('backend/setOrder');?>';
var point = 0;
var prize = [];

$(function() {
});
</script>
<style>
.prizes{
 	text-align:center;
 	float:left;
 }

.prizes img{
	height:200px !important;
}

#sortable li {
	list-style: none;
	padding: 5px;
    border: 1px solid #999;
    background: #eee;
    margin: 5px;
    cursor: move;
    width: 500px;
}
</style>

<div ng-controller="prizeController">
	<button type="button" class="btn btn-default" ng-click="create_();"><span class="glyphicon glyphicon-plus"></span>新增獎品</button>

	<ul id="sortable">
		<li ng-repeat="pr in prizes" sn="{{ $index }}" ng-bind="pr.title">
		</li>
	</ul>

	<div ng-repeat="pr in prizes" sn="{{ $index }}">
		<div class="prizes">
			<img src="{{ pr.img }}"/><br/>兌換點數：{{pr.point}}
			<div>
			<button type="button" class="btn" ng-click="edit_(pr.serial_id);"><span class="glyphicon glyphicon-pencil"></span>編輯</button>
			</div>
		</div>
	</div>	
</div>