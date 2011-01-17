<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: space_album.php 19158 2010-12-20 08:21:50Z zhengqingpeng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$minhot = $_G['setting']['feedhotmin']<1?3:$_G['setting']['feedhotmin'];
$id = empty($_GET['id'])?0:intval($_GET['id']);
$picid = empty($_GET['picid'])?0:intval($_GET['picid']);

$page = empty($_GET['page'])?1:intval($_GET['page']);
if($page<1) $page=1;

if($id) {

	$perpage = 20;
	$perpage = mob_perpage($perpage);

	$start = ($page-1)*$perpage;

	ckstart($start, $perpage);

	if($id > 0) {
		$query = DB::query("SELECT * FROM ".DB::table('home_album')." WHERE albumid='$id' AND uid='$space[uid]' LIMIT 1");
		$album = DB::fetch($query);
		if(empty($album)) {
			showmessage('to_view_the_photo_does_not_exist');
		}

		ckfriend_album($album);

		$wheresql = "albumid='$id'";

		$album['picnum'] = $count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('home_pic')." WHERE albumid='$id'");

		if(empty($count) && !$space['self']) {
			DB::query("DELETE FROM ".DB::table('home_album')." WHERE albumid='$id'");
			showmessage('to_view_the_photo_does_not_exist', "home.php?mod=space&uid=$album[uid]&do=album&view=me");
		}

		if($album['catid']) {
			$album['catname'] = DB::result(DB::query("SELECT catname FROM ".DB::table('home_album_category')." WHERE catid='$album[catid]'"), 0);
			$album['catname'] = dhtmlspecialchars($album['catname']);
		}

	} else {
		$wheresql = "albumid='0' AND uid='$space[uid]'";
		$count = getcount('home_pic', array('albumid'=>0, 'uid'=>$space['uid']));

		$album = array(
			'uid' => $space['uid'],
			'albumid' => -1,
			'albumname' => lang('space', 'default_albumname'),
			'picnum' => $count
		);
	}

	$albumlist = array();
	$maxalbum = $nowalbum = $key = 0;
	$query = DB::query("SELECT * FROM ".DB::table('home_album')." WHERE uid='$space[uid]' ORDER BY updatetime DESC LIMIT 0, 100");
	while ($value = DB::fetch($query)) {
		if($value['friend'] != 4 && ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
			$value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
		} elseif ($value['picnum']) {
			$value['pic'] = STATICURL.'image/common/nopublish.gif';
		} else {
			$value['pic'] = '';
		}
		$albumlist[$key][$value['albumid']] = $value;
		$key = count($albumlist[$key]) == 5 ? ++$key : $key;
	}
	$maxalbum = count($albumlist);

	$list = array();
	$pricount = 0;
	if($count) {
		$query = DB::query("SELECT * FROM ".DB::table('home_pic')." WHERE $wheresql ORDER BY dateline DESC LIMIT $start,$perpage");
		while ($value = DB::fetch($query)) {
			if($value['status'] == 0 || $value['uid'] == $_G['uid'] || $_G['adminid'] == 1) {
				$value['pic'] = pic_get($value['filepath'], 'album', $value['thumb'], $value['remote']);
				$list[] = $value;
			} else {
				$pricount++;
			}
		}
	}
	$multi = multi($count, $perpage, $page, "home.php?mod=space&uid=$album[uid]&do=$do&id=$id#comment");

	$actives = array('me' =>' class="a"');

	$_G['home_css'] = 'album';

	$diymode = intval($_G['cookie']['home_diymode']);

	$navtitle = $album['albumname'].' - '.lang('space', 'sb_album', array('who' => $album['username']));
	$metakeywords = $album['albumname'];
	$metadescription = $album['albumname'];

	include_once template("diy:home/space_album_view");

} elseif ($picid) {

	$query = DB::query("SELECT * FROM ".DB::table('home_pic')." WHERE picid='$picid' AND uid='$space[uid]' LIMIT 1");
	$pic = DB::fetch($query);
	if(!$pic || ($pic['status'] == 1 && $pic['uid'] != $_G['uid'] && $_G['adminid'] != 1 && $_G['gp_modpickey'] != modauthkey($pic['picid']))) {
		showmessage('view_images_do_not_exist');
	}

	$picid = $pic['picid'];
	$theurl = "home.php?mod=space&uid=$pic[uid]&do=$do&picid=$picid";

	$album = array();
	if($pic['albumid']) {
		$query = DB::query("SELECT * FROM ".DB::table('home_album')." WHERE albumid='$pic[albumid]'");
		if(!$album = DB::fetch($query)) {
			DB::update('home_pic', array('albumid'=>0), array('albumid'=>$pic['albumid']));
		}
	}

	if($album) {
		ckfriend_album($album);
		$wheresql = "albumid='$pic[albumid]'";
	} else {
		$album['picnum'] = getcount('home_pic', array('uid'=>$pic['uid'], 'albumid'=>0));
		$album['albumid'] = $pic['albumid'] = '-1';
		$wheresql = "uid='$space[uid]' AND albumid='0'";
	}

	$piclist = $list = $keys = array();
	$keycount = 0;
	$query = DB::query("SELECT * FROM ".DB::table('home_pic')." WHERE $wheresql ORDER BY dateline DESC");
	while ($value = DB::fetch($query)) {
		if($value['status'] == 0 || $value['uid'] == $_G['uid'] || $_G['adminid'] == 1) {
			$keys[$value['picid']] = $keycount;
			$list[$keycount] = $value;
			$keycount++;
		}
	}

	$upid = $nextid = 0;
	$nowkey = $keys[$picid];
	$endkey = $keycount - 1;
	if($endkey>4) {
		$newkeys = array($nowkey-2, $nowkey-1, $nowkey, $nowkey+1, $nowkey+2);
		if($newkeys[1] < 0) {
			$newkeys[0] = $endkey-1;
			$newkeys[1] = $endkey;
		} elseif($newkeys[0] < 0) {
			$newkeys[0] = $endkey;
		}
		if($newkeys[3] > $endkey) {
			$newkeys[3] = 0;
			$newkeys[4] = 1;
		} elseif($newkeys[4] > $endkey) {
			$newkeys[4] = 0;
		}
		$upid = $list[$newkeys[1]]['picid'];
		$nextid = $list[$newkeys[3]]['picid'];

		foreach ($newkeys as $nkey) {
			$piclist[] = $list[$nkey];
		}
	} else {
		$newkeys = array($nowkey-1, $nowkey, $nowkey+1);
		if($newkeys[0] < 0) {
			$newkeys[0] = $endkey;
		}
		if($newkeys[2] > $endkey) {
			$newkeys[2] = 0;
		}
		$upid = $list[$newkeys[0]]['picid'];
		$nextid = $list[$newkeys[2]]['picid'];

		$piclist = $list;
	}
	foreach ($piclist as $key => $value) {
		$value['pic'] = pic_get($value['filepath'], 'album', $value['thumb'], $value['remote']);
		$piclist[$key] = $value;
	}

	$pic['pic'] = pic_get($pic['filepath'], 'album', $pic['thumb'], $pic['remote'], 0);
	$pic['size'] = formatsize($pic['size']);

	$exifs = array();
	$allowexif = function_exists('exif_read_data');
	if(isset($_GET['exif']) && $allowexif) {
		require_once libfile('function/exif');
		$exifs = getexif($pic['pic']);
	}

	$perpage = 20;
	$perpage = mob_perpage($perpage);

	$start = ($page-1)*$perpage;

	ckstart($start, $perpage);

	$cid = empty($_GET['cid'])?0:intval($_GET['cid']);
	$csql = $cid?"cid='$cid' AND":'';

	$siteurl = getsiteurl();
	$list = array();
	$count = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('home_comment')." WHERE $csql id='$pic[picid]' AND idtype='picid'"),0);
	if($count) {
		$query = DB::query("SELECT * FROM ".DB::table('home_comment')." WHERE $csql id='$pic[picid]' AND idtype='picid' ORDER BY dateline LIMIT $start,$perpage");
		while ($value = DB::fetch($query)) {
			$list[] = $value;
		}
	}

	$multi = multi($count, $perpage, $page, $theurl);

	if(empty($album['albumname'])) $album['albumname'] = lang('space', 'default_albumname');

	$pic_url = $pic['pic'];
	if(!preg_match("/^http\:\/\/.+?/i", $pic['pic'])) {
		$pic_url = getsiteurl().$pic['pic'];
	}
	$pic_url2 = rawurlencode($pic['pic']);

	$hash = md5($pic['uid']."\t".$pic['dateline']);
	$id = $pic['picid'];
	$idtype = 'picid';

	$maxclicknum = 0;
	loadcache('click');
	$clicks = empty($_G['cache']['click']['picid'])?array():$_G['cache']['click']['picid'];
	foreach ($clicks as $key => $value) {
		$value['clicknum'] = $pic["click{$key}"];
		$value['classid'] = mt_rand(1, 4);
		if($value['clicknum'] > $maxclicknum) $maxclicknum = $value['clicknum'];
		$clicks[$key] = $value;
	}

	$clickuserlist = array();
	$query = DB::query("SELECT * FROM ".DB::table('home_clickuser')."
		WHERE id='$id' AND idtype='$idtype'
		ORDER BY dateline DESC
		LIMIT 0,20");
	while ($value = DB::fetch($query)) {
		$value['clickname'] = $clicks[$value['clickid']]['name'];
		$clickuserlist[] = $value;
	}

	$actives = array('me' =>' class="a"');

	if($album['picnum']) {
		if($_GET['goto']=='down') {
			$sequence = empty($_G['cookie']['pic_sequence'])?$album['picnum']:intval($_G['cookie']['pic_sequence']);
			$sequence++;
			if($sequence>$album['picnum']) {
				$sequence = 1;
			}
		} elseif($_GET['goto']=='up') {
			$sequence = empty($_G['cookie']['pic_sequence'])?$album['picnum']:intval($_G['cookie']['pic_sequence']);
			$sequence--;
			if($sequence<1) {
				$sequence = $album['picnum'];
			}
		} else {
			$sequence = 1;
		}
		dsetcookie('pic_sequence', $sequence);
	}

	$diymode = intval($_G['cookie']['home_diymode']);

	$navtitle = $album['albumname'];
	if($pic['title']) {
		$navtitle = $pic['title'].' - '.$navtitle;
	}
	$metakeywords = $pic['title'] ? $pic['title'] : $album['albumname'];
	$metadescription = $pic['title'] ? $pic['title'] : $albumname['albumname'];

	include_once template("diy:home/space_album_pic");

} else {

	loadcache('albumcategory');
	$category = $_G['cache']['albumcategory'];

	$perpage = 20;
	$perpage = mob_perpage($perpage);

	$start = ($page-1)*$perpage;

	ckstart($start, $perpage);

	$_GET['friend'] = intval($_GET['friend']);

	$default = array();
	$f_index = '';
	$list = array();
	$pricount = 0;
	$picmode = 0;

	if(empty($_GET['view'])) {
		$_GET['view'] = 'we';
	}

	$gets = array(
		'mod' => 'space',
		'uid' => $space['uid'],
		'do' => 'album',
		'view' => $_GET['view'],
		'catid' => $_GET['catid'],
		'order' => $_GET['order'],
		'fuid' => $_GET['fuid'],
		'searchkey' => $_GET['searchkey'],
		'from' => $_GET['from']
	);
	$theurl = 'home.php?'.url_implode($gets);
	$actives = array($_GET['view'] =>' class="a"');

	$need_count = true;

	if($_GET['view'] == 'all') {

		$wheresql = '1';

		if($_GET['order'] == 'hot') {
			$orderactives = array('hot' => ' class="a"');
			$picmode = 1;
			$need_count = false;

			$ordersql = 'p.dateline';
			$wheresql = "p.hot>='$minhot'";

			$count = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('home_pic')." p WHERE $wheresql"),0);
			if($count) {
				$query = DB::query("SELECT p.*, a.albumname, a.friend, a.target_ids FROM ".DB::table('home_pic')." p
					LEFT JOIN ".DB::table('home_album')." a ON a.albumid=p.albumid
					WHERE $wheresql
					ORDER BY $ordersql DESC
					LIMIT $start,$perpage");
				while ($value = DB::fetch($query)) {
					if($value['friend'] != 4 && ckfriend($value['uid'], $value['friend'], $value['target_ids']) && ($value['status'] == 0 || $value['uid'] == $_G['uid'] || $_G['adminid'] == 1)) {
						$value['pic'] = pic_get($value['filepath'], 'album', $value['thumb'], $value['remote']);
						$list[] = $value;
					} else {
						$pricount++;
					}
				}
			}

		} else {
			$orderactives = array('dateline' => ' class="a"');
		}

	} elseif($_GET['view'] == 'we') {

		space_merge($space, 'field_home');

		if($space['feedfriend']) {

			$wheresql = "uid IN ($space[feedfriend])";
			$f_index = 'USE INDEX(updatetime)';

			$fuid_actives = array();

			require_once libfile('function/friend');
			$fuid = intval($_GET['fuid']);
			if($fuid && friend_check($fuid)) {
				$wheresql = "uid='$fuid'";
				$f_index = '';
				$fuid_actives = array($fuid=>' selected');
			}

			$query = DB::query("SELECT * FROM ".DB::table('home_friend')." WHERE uid='$space[uid]' ORDER BY num DESC, dateline DESC LIMIT 0,500");
			while ($value = DB::fetch($query)) {
				$userlist[] = $value;
			}
		} else {
			$need_count = false;
		}

	} else {

		if($_GET['from'] == 'space') $diymode = 1;

		$wheresql = "uid='$space[uid]'";
	}

	if($need_count) {

		if($searchkey = stripsearchkey($_GET['searchkey'])) {
			$wheresql .= " AND albumname LIKE '%$searchkey%'";
			$searchkey = dhtmlspecialchars($searchkey);
		}

		$catid = empty($_GET['catid'])?0:intval($_GET['catid']);
		if($catid) {
			$wheresql .= " AND catid='$catid'";
		}

		$count = DB::result(DB::query("SELECT COUNT(*) FROM ".DB::table('home_album')." WHERE $wheresql"),0);

		if($count) {
			$query = DB::query("SELECT * FROM ".DB::table('home_album')." $f_index WHERE $wheresql ORDER BY updatetime DESC LIMIT $start,$perpage");
			while ($value = DB::fetch($query)) {
				if($value['friend'] != 4 && ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
					$value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
				} elseif ($value['picnum']) {
					$value['pic'] = STATICURL.'image/common/nopublish.gif';
				} else {
					$value['pic'] = '';
				}
				$list[] = $value;
			}
		}
	}

	$multi = multi($count, $perpage, $page, $theurl);

	dsetcookie('home_diymode', $diymode);

	if($_G['uid']) {
		if($_G['gp_view'] == 'all') {
			$navtitle = lang('core', 'title_view_all').lang('core', 'title_album');
		} elseif($_G['gp_view'] == 'me') {
			$navtitle = lang('core', 'title_my_album');
		} else {
			$navtitle = lang('core', 'title_friend_album');
		}
	} else {
		if($_G['gp_order'] == 'hot') {
			$navtitle = lang('core', 'title_hot_pic_recommend');
		} else {
			$navtitle = lang('core', 'title_newest_update_album');
		}
	}
	if($space['username']) {
		$navtitle = lang('space', 'sb_album', array('who' => $space['username']));
	}

	$metakeywords = $navtitle;
	$metadescription = $navtitle;
	include_once template("diy:home/space_album_list");
}

function ckfriend_album($album) {
	global $_G, $space;

	if($_G['adminid'] != 1) {
		if(!ckfriend($album['uid'], $album['friend'], $album['target_ids'])) {
			if(empty($_G['uid'])) {
				showmessage('to_login', null, array(), array('showmsg' => true, 'login' => 1));
			}
			require_once libfile('function/friend');
			$isfriend = friend_check($album['uid']);
			space_merge($space, 'count');
			space_merge($space, 'profile');
			$_G['privacy'] = 1;
			require_once libfile('space/profile', 'include');
			include template('home/space_privacy');
			exit();
		} elseif(!$space['self'] && $album['friend'] == 4) {
			$cookiename = "view_pwd_album_$album[albumid]";
			$cookievalue = empty($_G['cookie'][$cookiename])?'':$_G['cookie'][$cookiename];
			if($cookievalue != md5(md5($album['password']))) {
				$invalue = $album;
				include template('home/misc_inputpwd');
				exit();
			}
		}
	}
}

?>