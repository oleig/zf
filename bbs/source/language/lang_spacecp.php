<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_spacecp.php 17526 2010-10-21 01:30:46Z zhangguosheng $
 */

$lang = array(

	'by' => '通过',
	'tab_space' => ' ',

	'share' => '分享',
	'share_action' => '分享了',

	'pm_comment' => '答复点评',
	'pm_thread_about' => '关于你在“{subject}”的帖子',

	'wall_pm_subject' => '你好，我给你留言了',
	'wall_pm_message' => '我在你的留言板给你留言了，[url=\\1]点击这里去留言板看看吧[/url]',
	'reward' => '悬赏',
	'reward_info' => '参与投票可获得  \\1 积分',
	'poll_separator' => '"、"',


	'friend_subject' => '<a href="{url}" target="_blank">{username} 请求加你为好友</a>',
	'comment_friend' =>'<a href="\\2" target="_blank">\\1 给你留言了</a>',
	'photo_comment' => '<a href="\\2" target="_blank">\\1 评论了你的照片</a>',
	'blog_comment' => '<a href="\\2" target="_blank">\\1 评论了你的日志</a>',
	'poll_comment' => '<a href="\\2" target="_blank">\\1 评论了你的投票</a>',
	'share_comment' => '<a href="\\2" target="_blank">\\1 评论了你的分享</a>',
	'friend_pm' => '<a href="\\2" target="_blank">\\1 给你发私信了</a>',
	'poke_subject' => '<a href="\\2" target="_blank">\\1 向你打招呼</a>',
	'mtag_reply' => '<a href="\\2" target="_blank">\\1 回复了你的话题</a>',
	'event_comment' => '<a href="\\2" target="_blank">\\1 评论了你的活动</a>',

	'friend_pm_reply' => '\\1 回复了你的私信',
	'comment_friend_reply' => '\\1 回复了你的留言',
	'blog_comment_reply' => '\\1 回复了你的日志评论',
	'photo_comment_reply' => '\\1 回复了你的照片评论',
	'poll_comment_reply' => '\\1 回复了你的投票评论',
	'share_comment_reply' => '\\1 回复了你的分享评论',
	'event_comment_reply' => '\\1 回复了你的活动评论',

	'invite_subject' => '{username}邀请你加入{sitename}，并成为好友',
	'invite_massage' => '<table border="0">
		<tr>
		<td valign="top">{avatar}</td>
		<td valign="top">
		<h3>Hi，我是{username}，邀请你也加入{sitename}并成为我的好友</h3><br>
		请加入到我的好友中，你就可以了解我的近况，与我一起交流，随时与我保持联系。<br>
		<br>
		邀请附言：<br>{saymsg}
		<br><br>
		<strong>请你点击以下链接，接受好友邀请：</strong><br>
		<a href="{inviteurl}">{inviteurl}</a><br>
		<br>
		<strong>如果你拥有{sitename}上面的账号，请点击以下链接查看我的个人主页：</strong><br>
		<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
		</td></tr></table>',

	'app_invite_subject' => '{username}邀请你加入{sitename}，一起来玩{appname}',
	'app_invite_massage' => '<table border="0">
		<tr>
		<td valign="top">{avatar}</td>
		<td valign="top">
		<h3>Hi，我是{username}，在{sitename}上玩 {appname}，邀请你也加入一起玩</h3><br>
		<br>
		邀请附言：<br>
		{saymsg}
		<br><br>
		<strong>请你点击以下链接，接受好友邀请一起玩{appname}：</strong><br>
		<a href="{inviteurl}">{inviteurl}</a><br>
		<br>
		<strong>如果你拥有{sitename}上面的账号，请点击以下链接查看我的个人主页：</strong><br>
		<a href="{siteurl}home.php?mod=space&uid={uid}">{siteurl}home.php?mod=space&uid={uid}</a><br>
		</td></tr></table>',

	'person' => '人',
	'delete' => '删除',

	'space_update' => '{actor} 被SHOW了一下',

	'active_email_subject' => '你的邮箱激活邮件',
	'active_email_msg' => '请复制下面的激活链接到浏览器进行访问，以便激活你的邮箱。<br>邮箱激活链接:<br><a href="{url}" target="_blank">{url}</a>',
	'share_space' => '分享了一个用户',
	'share_blog' => '分享了一篇日志',
	'share_album' => '分享了一个相册',
	'default_albumname' => '默认相册',
	'share_image' => '分享了一张图片',
	'share_article' => '分享了一篇文章',
	'album' => '相册',
	'share_thread' => '分享了一个帖子',
	'mtag' => '{$_G[setting][navs][3][navname]}',
	'share_mtag' => '分享了一个{$_G[setting][navs][3][navname]}',
	'share_mtag_membernum' => '现有 {membernum} 名成员',
	'share_tag' => '分享了一个标签',
	'share_tag_blognum' => '现有 {blognum} 篇日志',
	'share_link' => '分享了一个网址',
	'share_video' => '分享了一个视频',
	'share_music' => '分享了一个音乐',
	'share_flash' => '分享了一个 Flash',
	'share_event' => '分享了一个活动',
	'share_poll' => '分享了一个\\1投票',
	'event_time' => '活动时间',
	'event_location' => '活动地点',
	'event_creator' => '发起人',
	'the_default_style' => '默认风格',
	'the_diy_style' => '自定义风格',

	'thread_edit_trail' => '<ins class="modify">[本话题由 \\1 于 \\2 编辑]</ins>',
	'create_a_new_album' => '创建了新相册',
	'not_allow_upload' => '你现在没有权限上传图片',
	'get_passwd_subject' => '取回密码邮件',
	'get_passwd_message' => '你只需在提交请求后的三天之内，通过点击下面的链接重置你的密码：<br />\\1<br />(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)<br />上面的页面打开后，输入新的密码后提交，之后你即可使用新的密码登录了。',
	'file_is_too_big' => '文件过大',

	'take_part_in_the_voting' => '{actor} 参与了 {touser} 的{reward}投票 <a href="{url}" target="_blank">{subject}</a>',
	'lack_of_access_to_upload_file_size' => '无法获取上传文件大小',
	'only_allows_upload_file_types' => '只允许上传jpg、jpeg、gif、png标准格式的图片',
	'unable_to_create_upload_directory_server' => '服务器无法创建上传目录',
	'inadequate_capacity_space' => '空间容量不足，不能上传新附件',
	'mobile_picture_temporary_failure' => '无法转移临时文件到服务器指定目录',
	'ftp_upload_file_size' => '远程上传图片失败',
	'comment' => '评论',
	'upload_a_new_picture' => '上传了新图片',
	'upload_album' => '更新了相册',
	'the_total_picture' => '共 \\1 张图片',

	'space_open_subject' => '快来打理一下你的个人主页吧',
	'space_open_message' => 'hi，我今天去拜访了一下你的个人主页，发现你自己还没有打理过呢。赶快来看看吧。地址是：\\1space.php',



	'apply_mtag_manager' => '想申请成为 <a href="\\1" target="_blank">\\2</a> 的群主，理由如下:\\3。<a href="\\1" target="_blank">(点击这里进入管理)</a>',


	'magicunit' => '个',
	'magic_note_wall' => '{actor}在留言板上给你<a href="{url}" target="_blank">留言</a>',
	'magic_call' => '在日志中点了你的名，<a href="{url}" target="_blank">快去看看吧</a>',


	'present_user_magics' => '你收到了管理员赠送的道具：\\1',
	'has_not_more_doodle' => '你没有涂鸦板了',

	'do_stat_login' => '来访用户',
	'do_stat_register' => '新注册用户',
	'do_stat_invite' => '好友邀请',
	'do_stat_appinvite' => '应用邀请',
	'do_stat_add' => '信息发布',
	'do_stat_comment' => '信息互动',
	'do_stat_space' => '互动',
	'do_stat_doing' => '记录',
	'do_stat_blog' => '日志',
	'do_stat_activity' => '活动',
	'do_stat_reward' => '悬赏',
	'do_stat_debate' => '辩论',
	'do_stat_trade' => '商品',
	'do_stat_group' => "创建{$_G[setting][navs][3][navname]}",
	'do_stat_tgroup' => "{$_G[setting][navs][3][navname]}",
	'do_stat_home' => "{$_G[setting][navs][4][navname]}",
	'do_stat_forum' => "{$_G[setting][navs][2][navname]}",
	'do_stat_groupthread' => '群组主题',
	'do_stat_post' => '主题回复',
	'do_stat_grouppost' => '群组回复',
	'do_stat_pic' => '图片',
	'do_stat_poll' => '投票',
	'do_stat_event' => '活动',
	'do_stat_share' => '分享',
	'do_stat_thread' => '主题',
	'do_stat_docomment' => '记录回复',
	'do_stat_blogcomment' => '日志评论',
	'do_stat_piccomment' => '图片评论',
	'do_stat_pollcomment' => '投票评论',
	'do_stat_pollvote' => '参与投票',
	'do_stat_eventcomment' => '活动评论',
	'do_stat_eventjoin' => '参加活动',
	'do_stat_sharecomment' => '分享评论',
	'do_stat_post' => '主题回帖',
	'do_stat_click' => '表态',
	'do_stat_wall' => '留言',
	'do_stat_poke' => '打招呼',
	'do_stat_post_number' => '发帖量',
	'do_stat_statistic' => '合并统计',

	'profile_unchangeable' => '此项资料提交后不可修改',
	'profile_is_verifying' => '此项资料正在审核中',
	'profile_mypost' => '我提交的内容',
	'profile_need_verifying' => '此项资料提交后需要审核',
	'profile_edit' => '修改',
	'profile_censor' => '(含有敏感词汇)',
	'profile_verify_modify_error' => '{verify}已经认证通过不允许修改',

	'district_level_1' => '-省份-',
	'district_level_2' => '-城市-',
	'district_level_3' => '-州县-',
	'district_level_4' => '-乡镇-',

	'spacecp_message_prompt' => '(支持 {msg} 代码,最大 1000 字)',
	'card_update_doing' => ' <a class="xi2" href="###">[更新记录]</a>',

);

?>