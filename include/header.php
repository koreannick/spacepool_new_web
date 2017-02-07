<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89662290-1', 'auto');
  ga('send', 'pageview');

</script>
<?
//휴대폰 번호가 등록안되어있는 경우 강제적으로 수정페이지로 이동시킴
if($USESSION[0]&&$PHP_SELF!="/member/member_info.php"){
	if(!$connect)		$connect = dbcon();

	$resultm = mysql_query("select replace(mobile,'-',''),n_talk from $t_member where email='$USESSION[0]'");
	if($resultm&&mysql_num_rows($resultm)>0){
		$chk_m = trim(mysql_result($resultm,0,0));
		$n_talk = trim(mysql_result($resultm,0,1));

		if($n_talk){
			//$n_talk = str_replace("http://","",$n_talk);
		}

		if(!$n_talk)		$n_talk = "#";

		if(!$chk_m){
			redir_proc3("/member/member_info.php","기본정보를 등록해주셔야 이용가능합니다.");
		}
	}else{
		redir_proc3("/member/member_info.php","기본정보를 등록해주셔야 이용가능합니다.");
	}
	@mysql_free_result($resultm);

	unset($chk_m);
}

$prev_date = mktime(23,59,59,date("m"),date("d")-1,date("Y"));

$naver = new Naver();
?>
<!-- Navigation -->
<!-- <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top"> -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
  <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
          <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
          </button> -->
          <a href="/"><img height="40px" src="img/Main_logo_white.png"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
              <li>
                  <a href="#" class="h_search_btn">검색</a>
              </li>
              <li>
                  <a href="member/space_apply.php">공간등록하기</a>
              </li>
              <li>
                <?
                if($USESSION[0]){
                ?>
                <a href="/member/member.php?mode=logout_ok">로그아웃</a>
                <?
                }else{
                  $top_login = true;
                  echo $naver->login();

                  unset($top_login);
                }
                ?>
              </li>
              <li>
                <a href="#" class="h_all_menu_btn">
                  <img src="/images/common/menu.png">
                </a>
              </li>
          </ul>
      </div>

      <!-- /.navbar-collapse -->
  </div>
    <!-- /.container-fluid -->
</nav>
