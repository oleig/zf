<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: config_global_default.php 17034 2010-09-19 07:38:41Z cnteacher $
 */

$_config = array();

// 数据库服务器设置
$_config['db']['map'] = array();
$_config['db'][1]['dbhost']  		= 'localhost';		// 服务器地址
$_config['db'][1]['dbuser']  		= 'root';		// 用户
$_config['db'][1]['dbpw'] 	 	= 'root';		// 密码
$_config['db'][1]['dbcharset'] 		= 'utf8';		// 字符集
$_config['db'][1]['pconnect'] 		= 0;			// 是否持续连接
$_config['db'][1]['dbname']  		= 'ultrax';		// 数据库
$_config['db'][1]['tablepre'] 		= 'pre_';		// 表名前缀

// 内存服务器优化设置（以下设置需要PHP扩展组件支持，其中 memcache 优先于其他设置，当 memcache 无法启用时，会自动开启另外的两种优化模式）
$_config['memory']['prefix'] = 'discuz_';
$_config['memory']['eaccelerator'] = 1;				// 启动对 eaccelerator 的支持
$_config['memory']['xcache'] = 1;				// 启动对 xcache 的支持
$_config['memory']['memcache']['server'] = '';			// memcache 服务器地址
$_config['memory']['memcache']['port'] = 11211;			// memcache 服务器端口
$_config['memory']['memcache']['pconnect'] = 1;			// memcache 是否长久连接
$_config['memory']['memcache']['timeout'] = 1;			// memcache 服务器连接超时

// 服务器相关设置
$_config['server']['id']		= 1;			// 服务器编号，多webserver的时候，用于标识当前服务器的ID

// 附件下载相关
$_config['download']['readmod'] = 2;				// 本地文件读取模式; 模式2为最节省内存方式，但不支持多线程下载
								// 1=fread 2=readfile 3=fpassthru 4=fpassthru+multiple
$_config['download']['xsendfile']['type'] = 0;			// 是否启用 X-Sendfile 功能（需要服务器支持）0=close 1=nginx 2=lighttpd 3=apache
$_config['download']['xsendfile']['dir'] = '/down/';		// 启用 nginx X-sendfile 时，论坛附件目录的虚拟映射路径，请使用 / 结尾

//  CONFIG CACHE
$_config['cache']['type'] 			= 'sql';	// 缓存类型 file=文件缓存, sql=数据库缓存

// 页面输出设置
$_config['output']['charset'] 			= 'utf-8';	// 页面字符集
$_config['output']['forceheader']		= 1;		// 强制输出页面字符集，用于避免某些环境乱码
$_config['output']['gzip'] 			= 0;		// 是否采用 Gzip 压缩输出
$_config['output']['tplrefresh'] 		= 1;		// 模板自动刷新开关 0=关闭, 1=打开
$_config['output']['language'] 			= 'zh_cn';	// 页面语言 zh_cn/zh_tw
$_config['output']['staticurl'] 		= 'static/';	// 站点静态文件路径，“/”结尾
$_config['output']['ajaxvalidate']		= 0;		// 是否严格验证 Ajax 页面的真实性 0=关闭，1=打开

// COOKIE 设置
$_config['cookie']['cookiepre'] 		= 'uchome_'; 	// COOKIE前缀
$_config['cookie']['cookiedomain'] 		= ''; 		// COOKIE作用域
$_config['cookie']['cookiepath'] 		= '/'; 		// COOKIE作用路径

// 站点安全设置
$_config['security']['authkey']			= 'asdfasfas';	// 站点加密密钥
$_config['security']['urlxssdefend']		= true;		// 自身 URL XSS 防御
$_config['security']['attackevasive']		= 0;		// CC 攻击防御 1|2|4

$_config['security']['querysafe']['status']	= 1;		// 是否开启SQL安全检测，可自动预防SQL注入攻击
$_config['security']['querysafe']['dfunction']	= array('load_file','hex','substring','if','ord','char');
$_config['security']['querysafe']['daction']	= array('intooutfile','intodumpfile','unionselect','(select');
$_config['security']['querysafe']['dnote']	= array('/*','*/','#','--','"');
$_config['security']['querysafe']['dlikehex']	= 1;
$_config['security']['querysafe']['afullnote']	= 1;

$_config['admincp']['founder']			= '1';		// 站点创始人：拥有站点管理后台的最高权限，每个站点可以设置 1名或多名创始人
								// 可以使用uid，也可以使用用户名；多个创始人之间请使用逗号",”分开;
$_config['admincp']['forcesecques']		= 0;		// 管理人员必须设置安全提问才能进入系统设置 0=否, 1=是[安全]
$_config['admincp']['checkip']			= 1;		// 后台管理操作是否验证管理员的 IP, 1=是[安全], 0=否。仅在管理员无法登陆后台时设置 0。
$_config['admincp']['runquery']			= 1;		// 是否允许后台运行 SQL 语句 1=是 0=否[安全]
$_config['admincp']['dbimport']			= 1;		// 是否允许后台恢复论坛数据  1=是 0=否[安全]

?>