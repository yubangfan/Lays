<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Index extends CI_Controller {
	var $whitelist;
	function __construct() {
		$this->whitelist = "notfound";
		parent::__construct ();

	}

	function index() {
	
		$useragent = $_SERVER ['HTTP_USER_AGENT'];

	    $this->load->model("doing_model");
	    $rownum=$this->doing_model->list_by_type_andquestionorartilce_cache_num();
	    $departstr = page($rownum, $this->setting['list_default'], 1, "content/index/new");
		/* SEO */
		$this->setting ['seo_index_title'] && $seo_title = str_replace ( "{wzmc}", $this->setting ['site_name'], $this->setting ['seo_index_title'] );
		$this->setting ['seo_index_description'] && $seo_description = str_replace ( "{wzmc}", $this->setting ['site_name'], $this->setting ['seo_index_description'] );
		$this->setting ['seo_index_keywords'] && $seo_keywords = str_replace ( "{wzmc}", $this->setting ['site_name'], $this->setting ['seo_index_keywords'] );
		$navtitle = $this->setting ['site_alias'];
		include template ( 'index' );
	
	}

	function getnewlist_bytime($arr) {

		$i = 0;
		$len = count ( $arr );
		$j = 0;
		$d = 0;
		for($i; $i < $len; $i ++) {
			for($j = 0; $j < $len; $j ++) {
				if ($arr [$i] ['sortime'] > $arr [$j] ['sortime']) {
					$d = $arr [$j];
					$arr [$j] = $arr [$i];
					$arr [$i] = $d;
				}
			}
		}
		return $arr;
	}

	function onhelp() {
		$this->message ( "即将跳转网站教程中...", "cat-219" );
	}

	function ondoing() {
		include template ( "doing" );
	}
	function onnotfound() {

		include template ( "404" );
	}
	/* 查询图片是否需要点击放大 */

	function onajaxchkimg() {
		list ( $width, $height, $type, $attr ) = getimagesize ( $this->post ['imgsrc'] );
		($width > 300) && exit ( '1' );
		exit ( '-1' );
	}

	function ononline() {
		$this->load->model ( 'user_model' );
		$navtitle = "当前在线";
		$this->load ( 'user' );
		@$page = max ( 1, intval ( $this->get [2] ) );
		$pagesize = 30;
		$startindex = ($page - 1) * $pagesize;
		$onlinelist = $this->user_model->list_online_user ( $startindex, $pagesize );
		$onlinetotal = $this->user_model->rownum_onlineuser ();
		$departstr = page ( $onlinetotal, $pagesize, $page, "index/online" );
		include template ( "online" );
	}

}

?>