<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_topic.php 17282 2010-09-28 09:04:15Z zhangguosheng $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
		exit('Access Denied');
}

cpheader();
$operation = 'list';

shownav('portal', 'topic');
$searchctrl = '<span style="float: right; padding-right: 40px;">'
				.'<a href="javascript:;" onclick="$(\'tb_search\').style.display=\'\';$(\'a_search_show\').style.display=\'none\';$(\'a_search_hide\').style.display=\'\';" id="a_search_show">'.cplang('show_search').'</a>'
				.'<a href="javascript:;" onclick="$(\'tb_search\').style.display=\'none\';$(\'a_search_show\').style.display=\'\';$(\'a_search_hide\').style.display=\'none\';" id="a_search_hide" style="display:none">'.cplang('hide_search').'</a>'
				.'</span>';
showsubmenu('topic',  array(
		array('list', 'topic', 1),
		array('topic_add', 'portal.php?mod=portalcp&ac=topic', 0, 1, 1)
	), $searchctrl);

if(submitcheck('opsubmit')) {

	if(empty($_POST['ids'])) {
		cpmsg('topic_choose_at_least_one_topic', 'action=topic', 'error');
	}

	if($_POST['optype'] == 'delete') {
		require_once libfile('function/delete');
		deleteportaltopic($_POST['ids']);
		cpmsg('topic_delete_succeed', 'action=topic', 'succeed');

	} elseif($_POST['optype'] == 'close') {
		DB::query('UPDATE '.DB::table('portal_topic')." SET closed = '1' WHERE topicid IN (".dimplode($_POST['ids']).")");
		cpmsg('topic_close_succeed', 'action=topic', 'succeed');

	} elseif($_POST['optype'] == 'open') {
		DB::query('UPDATE '.DB::table('portal_topic')." SET closed = '0' WHERE topicid IN (".dimplode($_POST['ids']).")");
		cpmsg('topic_open_succeed', 'action=topic', 'succeed');

	} else {
		cpmsg('topic_choose_at_least_one_optype', 'action=topic', 'error');
	}

} else {

	$intkeys = array('topicid', 'uid', 'closed');
	$strkeys = array();
	$randkeys = array();
	$likekeys = array('title', 'username');
	$results = getwheres($intkeys, $strkeys, $randkeys, $likekeys);
	foreach($likekeys as $k) {
		$_GET[$k] = htmlspecialchars(stripslashes($_GET[$k]));
	}
	$wherearr = $results['wherearr'];
	$mpurl = ADMINSCRIPT.'?action=topic';
	$mpurl .= '&'.implode('&', $results['urls']);
	$wheresql = empty($wherearr)?'1':implode(' AND ', $wherearr);
	if(strlen($_GET['closed'])) {
		$statusarr[$_GET['closed']] = ' selected';
	}

	$orders = getorders(array('dateline'), 'topicid');
	$ordersql = $orders['sql'];
	if($orders['urls']) $mpurl .= '&'.implode('&', $orders['urls']);
	$orderby = array($_GET['orderby']=>' selected');
	$ordersc = array($_GET['ordersc']=>' selected');

	$perpage = empty($_GET['perpage'])?0:intval($_GET['perpage']);
	if(!in_array($perpage, array(10,20,50,100))) $perpage = 10;

	$searchlang = array();
	$keys = array('search', 'likesupport', 'resultsort', 'defaultsort', 'orderdesc', 'orderasc', 'perpage_10', 'perpage_20', 'perpage_50', 'perpage_100',
	'topic_dateline', 'topic_id', 'topic_title', 'topic_uid', 'topic_username', 'topic_closed', 'nolimit', 'no', 'yes');
	foreach ($keys as $key) {
		$searchlang[$key] = cplang($key);
	}

	$adminscript = ADMINSCRIPT;
	echo <<<SEARCH
	<form method="get" autocomplete="off" action="$adminscript" id="tb_search" style="display:none">
		<div style="margin-top:8px;">
			<table cellspacing="3" cellpadding="3">
				<tr>
					<th>$searchlang[topic_id]</th><td><input type="text" class="txt" name="topicid" value="$_GET[topicid]"></td>
					<th>$searchlang[topic_title]*</th><td><input type="text" class="txt" name="title" value="$_GET[title]">*$searchlang[likesupport]</td>
				</tr>
				<tr>
					<th>$searchlang[topic_uid]</th><td><input type="text" class="txt" name="uid" value="$_GET[uid]"></td>
					<th>$searchlang[topic_username]*</th><td><input type="text" class="txt" name="username" value="$_GET[username]"></td>
				</tr>
				<tr>
					<th>$searchlang[topic_closed]</th>
					<td colspan="3">
						<select name="closed">
							<option value="">$searchlang[nolimit]</option>
							<option value="0" $statusarr[0]>$searchlang[no]</option>
							<option value="1" $statusarr[1]>$searchlang[yes]</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>$searchlang[resultsort]</th>
					<td colspan="3">
						<select name="orderby">
						<option value="">$searchlang[defaultsort]</option>
						<option value="dateline"$orderby[dateline]>$searchlang[topic_dateline]</option>
						</select>
						<select name="ordersc">
						<option value="desc"$ordersc[desc]>$searchlang[orderdesc]</option>
						<option value="asc"$ordersc[asc]>$searchlang[orderasc]</option>
						</select>
						<select name="perpage">
						<option value="10"$perpages[10]>$searchlang[perpage_10]</option>
						<option value="20"$perpages[20]>$searchlang[perpage_20]</option>
						<option value="50"$perpages[50]>$searchlang[perpage_50]</option>
						<option value="100"$perpages[100]>$searchlang[perpage_100]</option>
						</select>
						<input type="hidden" name="action" value="topic">
						<input type="submit" name="searchsubmit" value="$searchlang[search]" class="btn">
					</td>
				</tr>
			</table>
		</div>
	</form>
SEARCH;

	$start = ($page-1)*$perpage;

	$mpurl .= '&perpage='.$perpage;
	$perpages = array($perpage => ' selected');

	showformheader('topic');
	showtableheader('topic_list');
	showsubtitle(array('', 'topic_title', 'topic_domain', 'topic_name', 'topic_creator', 'topic_dateline', 'operation'));

	$multipage = '';
	$count = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('portal_topic')." WHERE $wheresql"), 0);
	if($count) {
		$query = DB::query("SELECT * FROM ".DB::table('portal_topic')." WHERE $wheresql $ordersql LIMIT $start,$perpage");
		while ($value = DB::fetch($query)) {
			showtablerow('', array('class="td25"', 'class=""', 'class="td28"'), array(
					"<input type=\"checkbox\" class=\"checkbox\" name=\"ids[]\" value=\"$value[topicid]\">",
					"<a href=\"portal.php?mod=topic&topicid=$value[topicid]\" target=\"_blank\">".$value[title]."</a>"
					.($value['closed'] ? ' ['.cplang('topic_closed_yes').']' : ''),
					$value['domain'] && !empty($_G['setting']['domain']['root']['topic']) ? 'http://'.$value['domain'].'.'.$_G['setting']['domain']['root']['topic'] : '',
					$value['name'],
					"<a href=\"home.php?mod=space&uid=$value[uid]&do=profile\" target=\"_blank\">$value[username]</a>",
					dgmdate($value[dateline]),
					"<a href=\"portal.php?mod=portalcp&ac=topic&topicid=$value[topicid]\" target=\"_blank\">".cplang('topic_edit')."</a>&nbsp;&nbsp;".
					"<a href=\"portal.php?mod=topic&topicid=$value[topicid]&diy=yes\" target=\"_blank\">DIY</a>".
					'&nbsp;&nbsp;<a href="'.ADMINSCRIPT.'?action=diytemplate&operation=perm&targettplname=portal/portal_topic_content_'.$value['topicid'].'">'.cplang('topic_perm').'</a>',
				));
		}
		$multipage = multi($count, $perpage, $page, $mpurl);
	}

	$ops = cplang('operation').': '
		."<input type='radio' class='radio' name='optype' value='open' id='op_close' /><label for='op_close'>".cplang('topic_closed_no')."</label>&nbsp;&nbsp;"
		."<input type='radio' class='radio' name='optype' value='close' id='op_open' /><label for='op_open'>".cplang('topic_closed_yes')."</label>&nbsp;&nbsp;"
		."<input type='radio' class='radio' name='optype' value='delete' id='op_delete' /><label for='op_delete'>".cplang('delete')."</label>&nbsp;&nbsp;";
	showsubmit('', '', '', '<input type="checkbox" name="chkall" id="chkall" class="checkbox" onclick="checkAll(\'prefix\', this.form, \'ids\')" /><label for="chkall">'.cplang('select_all').'</label>&nbsp;&nbsp;'.$ops.'<input type="submit" class="btn" name="opsubmit" value="'.cplang('submit').'" />', $multipage);
	showtablefooter();
	showformfooter();
}

?>