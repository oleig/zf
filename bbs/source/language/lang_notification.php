<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_notification.php 17932 2010-11-08 02:35:34Z zhangguosheng $
 */

$lang = array
(

	'type_wall' => '留言',
	'type_piccomment' => '图片评论',
	'type_blogcomment' => '日志评论',
	'type_clickblog' => '日志表态',
	'type_clickarticle' => '文章表态',
	'type_clickpic' => '图片表态',
	'type_sharecomment' => '分享评论',
	'type_doing' => '记录',
	'type_friend' => '好友',
	'type_credit' => '积分',
	'type_bbs' => '论坛',
	'type_system' => '系统',
	'type_thread' => '主题',
	'type_task' => '任务',
	'type_group' => '群组',

	'mail_to_user' => '有新的通知',
	'showcredit' => '{actor} 赠送给你 {credit} 个竞价积分，帮助提升在 <a href="misc.php?mod=ranklist&type=member" target="_blank">竞价排行榜</a> 中的名次',
	'share_space' => '{actor} 分享了你的空间',
	'share_blog' => '{actor} 分享了你的日志 <a href="{url}" target="_blank">{subject}</a>',
	'share_album' => '{actor} 分享了你的相册 <a href="{url}" target="_blank">{albumname}</a>',
	'share_pic' => '{actor} 分享了你的相册 {albumname} 中的 <a href="{url}" target="_blank"> 图片</a>',
	'share_thread' => '{actor} 分享了你的帖子 <a href="{url}" target="_blank">{subject}</a>',
	'share_article' => '{actor} 分享了你的文章 <a href="{url}" target="_blank">{subject}</a>',
	'magic_present_note' => '送给你一个道具 <a href="{url}" target="_blank">{name}</a>',
	'friend_add' => '{actor} 和你成为了好友',
	'doing_reply' => '{actor} 在 <a href="{url}" target="_blank">记录</a> 中对你进行了回复',
	'wall_reply' => '{actor} 回复了你的 <a href="{url}" target="_blank">留言</a>',
	'pic_comment_reply' => '{actor} 回复了你的 <a href="{url}" target="_blank">图片评论</a>',
	'blog_comment_reply' => '{actor} 回复了你的 <a href="{url}" target="_blank">日志评论</a>',
	'share_comment_reply' => '{actor} 回复了你的 <a href="{url}" target="_blank">分享评论</a>',
	'wall' => '{actor} 在留言板上给你 <a href="{url}" target="_blank">留言</a>',
	'pic_comment' => '{actor} 评论了你的 <a href="{url}" target="_blank">图片</a>',
	'blog_comment' => '{actor} 评论了你的日志 <a href="{url}" target="_blank">{subject}</a>',
	'share_comment' => '{actor} 评论了你的 <a href="{url}" target="_blank">分享</a>',
	'click_blog' => '{actor} 对你的日志 <a href="{url}" target="_blank">{subject}</a> 做了表态',
	'click_pic' => '{actor} 对你的 <a href="{url}" target="_blank">图片</a> 做了表态',
	'click_article' => '{actor} 对你的文章 <a href="{url}" target="_blank">{subject}</a> 做了表态',
	'show_out' => '{actor} 访问了你的主页后，你在竞价排名榜中最后一个积分也被消费掉了',
	'puse_article' => '恭喜你，你的<a href="{url}" target="_blank">{subject}</a>已被添加到文章列表， <a href="{newurl}" target="_blank">点击查看</a>',


	'group_member_join' => '{actor} 加入你的 <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> 群组需要审核，请到群组<a href="{url}" target="_blank">管理后台</a> 进行审核',
	'group_member_invite' => '{actor} 邀请你加入 <a href="forum.php?mod=group&fid={fid}" target="_blank">{groupname}</a> 群组，<a href="{url}" target="_blank">点此马上加入</a>',
	'group_member_check' => '你已经通过了 <a href="{url}" target="_blank">{groupname}</a> 群组的审核，请 <a href="{url}" target="_blank">点击访问</a>',
	'group_member_check_failed' => '你没有通过 <a href="{url}" target="_blank">{groupname}</a> 群组的审核。',

	'reason_moderate' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_merge' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_post' => '你在 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_delete_comment' => '你在 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的点评被 {actor} 删除 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_ban_post' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_warn_post' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} {modaction}<br />
连续 {warningexpiration} 天内累计 {warninglimit} 次警告，你将被自动禁止发帖 {warningexpiration} 天。<br />
截至目前，你已被警告 {authorwarnings} 次，请注意！<div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_move' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 移动到 <a href="forum.php?mod=forumdisplay&fid={tofid}" target="_blank">{toname}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_copy' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 复制为 <a href="forum.php?mod=viewthread&tid={threadid}" target="_blank">{subject}</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_remove_reward' => '你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_update' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图章 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamp_delete' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图章 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_update' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 添加了图标 {stamp} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stamplist_delete' => '你的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 撤销了图标 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickreply' => '你在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回帖被 {actor} 置顶 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'reason_stickdeletereply' => '你在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的回帖被 {actor} 撤销置顶 <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_delete' => '你发表的主题 {threadsubject} 没有通过审核，现已被删除！<div class="quote"><blockquote>{reason}</blockquote></div>',

	'modthreads_validate' => '你发表的主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{threadsubject}</a> 已经审核通过！ &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_delete' => '你发表回复没有通过审核，现已被删除！ <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'modreplies_validate' => '你发表的回复已经审核通过！ &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <p class="summary">回复内容：<span>{post}</span></p> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'transfer' => '你收到一笔来自 {actor} 的积分转账 {credit} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=log&suboperation=creditslog" target="_blank" class="lit">查看 &rsaquo;</a>
<p class="summary">{actor} 说：<span>{transfermessage}</span></p>',

	'addfunds' => '你提交的积分充值请求已成功完成，相应数额的积分已经存入你的积分账户 &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看 &rsaquo;</a>
<p class="summary">订单号：<span>{orderid}</span></p><p class="summary">支出：<span>人民币 {price} 元</span></p><p class="summary">收入：<span>{value}</span></p>',

	'rate_reason' => '你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 的帖子被 {actor} 评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'rate_removereason' => '{actor} 撤销了你在主题 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> 中帖子的评分 {ratescore} <div class="quote"><blockquote>{reason}</blockquote></div>',

	'trade_seller_send' => '<a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 购买你的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，对方已经付款，等待你发货 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_buyer_confirm' => '你购买的商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a>，<a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 已发货，等待你确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_fefund_success' => '商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已退款成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_success' => '商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 已交易成功 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">评价 &rsaquo;</a>',

	'trade_order_update_sellerid' => '卖家 <a href="home.php?mod=space&uid={sellerid}" target="_blank">{seller}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'trade_order_update_buyerid' => '买家 <a href="home.php?mod=space&uid={buyerid}" target="_blank">{buyer}</a> 修改了商品 <a href="forum.php?mod=trade&orderid={orderid}" target="_blank">{subject}</a> 的交易单，请确认 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'eccredit' => '与你交易的 {actor} 已经给你作了评价 &nbsp; <a href="forum.php?mod=trade&orderid={orderid}" target="_blank" class="lit">回评 &rsaquo;</a>',

	'activity_notice' => '{actor} 申请加入你举办的活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a>，请审核 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'activity_apply' => '活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 已批准你参加此活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_replenish' => '活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 通知你需要完善活动报名信息 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_delete' => '活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 拒绝你参加此活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_cancel' => '{actor} 取消了参加 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 活动 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}"  target="_blank" class="lit">查看 &rsaquo;</a> <div class="quote"><blockquote>{reason}</blockquote></div>',

	'activity_notification' => '活动 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的发起人 {actor} 发来通知&nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看活动 &rsaquo;</a> <div class="quote"><blockquote>{msg}</blockquote></div>',

	'reward_question' => '你的悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 被 {actor} 设置了最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'reward_bestanswer' => '你的回复被悬赏主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 的作者 {actor} 选为悬赏最佳答案 &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'comment_add' => '{actor} 点评了你曾经在主题 <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> 发表的帖子 &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',

	'repquote_noticeauthor' => '{actor} 引用了你的帖子 <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">{subject}</a> &nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">查看</a>',

	'reppost_noticeauthor' => '{actor} 答复了你的帖子 <a href="forum.php?mod=redirect&goto=findpost&ptid={tid}&pid={pid}" target="_blank">{subject}</a> &nbsp; <a class="lit" href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank">查看</a>',

	'task_reward_credit' => '恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得积分 {creditbonus} &nbsp; <a href="home.php?mod=spacecp&ac=credit&op=base" target="_blank" class="lit">查看我的积分 &rsaquo;</a></p>',

	'task_reward_magic' => '恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得道具 <a href="home.php?mod=magic&action=mybox" target="_blank">{rewardtext}</a> {bonus} 张',

	'task_reward_medal' => '恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得勋章 <a href="home.php?mod=medal" target="_blank">{rewardtext}</a> 有效期 {bonus} 天',

	'task_reward_invite' => '恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得<a href="home.php?mod=spacecp&ac=invite" target="_blank">邀请码 {rewardtext}个</a> 有效期 {bonus} 天',

	'task_reward_group' => '恭喜你完成任务：<a href="home.php?mod=task&do=view&id={taskid}" target="_blank">{name}</a>，获得用户组 {rewardtext} 有效期 {bonus} 天 &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'user_usergroup' => '你的用户组升级为 {usergroup} &nbsp; <a href="home.php?mod=spacecp&ac=usergroup" target="_blank" class="lit">看看我能做什么 &rsaquo;</a>',

	'grouplevel_update' => '恭喜你，你的群组 {groupname} 已经升级到了 {newlevel}。',

	'thread_invite' => '{actor} 邀请你{invitename} <a href="forum.php?mod=viewthread&tid={tid}" target="_blank">{subject}</a> &nbsp; <a href="forum.php?mod=viewthread&tid={tid}" target="_blank" class="lit">查看 &rsaquo;</a>',
	'invite_friend' => '恭喜你成功邀请到 {actor} 并成为你的好友',

	'profile_verify_error' => '{verify}资料审核被拒绝,以下字段需要重新填写:<br/>{profile}<br/>拒绝理由:{reason}',
	'profile_verify_pass' => '恭喜你，你填写的{verify}资料审核通过了',
	'profile_verify_pass_refusal' => '很遗憾，你填写的{verify}资料审核被拒绝了',
	'member_ban_speak' => '你已被 {user} 禁止发言，期限：{day}天(0：代表永久禁言)，禁言理由：{reason}',

	'member_moderate_invalidate' => '你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_validate' => '你的账号已经通过审核。<br />管理员留言: <b>{remark}</b>',
	'member_moderate_invalidate_no_remark' => '你的账号未能通过管理员的审核，请<a href="home.php?mod=spacecp&ac=profile">重新提交注册信息</a>。',
	'member_moderate_validate_no_remark' => '你的账号已经通过审核。',

	'system_notice' => '{subject}<p class="summary">{message}</p>',
	'report_change_credits' => '{actor} 处理了你的举报，你的 {creditchange}',
	'new_report' => '有新的举报等待处理，<a href="admin.php?action=report" target="_blank">点此进入后台处理</a>。',
	'magics_receive' => '你收到 {actor} 送给你的道具 {magicname}
<p class="summary">{actor} 说：<span>{msg}</span></p>
<p class="mbn"><a href="home.php?mod=magic" target="_blank">回赠道具</a><span class="pipe">|</span><a href="home.php?mod=magic&action=mybox" target="_blank">查看我的道具箱</a></p>',

);

?>