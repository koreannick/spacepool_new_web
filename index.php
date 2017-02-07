<?
include $_SERVER["DOCUMENT_ROOT"]."/conf/config.php";
include $_SERVER["DOCUMENT_ROOT"]."/conf/function.php";



$connect = dbcon();

require $_SERVER["DOCUMENT_ROOT"]."/count.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php virtual('include/headinfo.php'); ?>
  <?
    // require "popup_proc.php";
    // require "popup_layer.php";
  ?>
    <style>

    .border5{
     border-style:groove;
     border-width:2px;
    }
    headerintext {
        margin: 0;
        padding: 0;
        font-size: 2em;
    }
    /* rem : 부모 font-size를 상속받지 않고 2em 으로 표시됨 */
    headerintext span:first-child {
        font-size: 2rem;
    }
    /** em : 부모 font-size를 상속받음 */
    headerintext span:last-child {
        font-size: 2em;
    }

    /** 브라우저 비율에 따라서 */
    headerintext.vw {
        /* 4vw : 브라우저너비의 4% */
        font-size: 4vw;
    }
    headerintext.vw2 {
        /* 브라우저너비의 2% */
        font-size: 2vw;
    }
    headerintext.vmin {
        /* 5vmin : 브라우저 너비와 높이중 짧은쪽의 5% */
        font-size: 5vmin;
    }
    headerintext.5vmax {
        /* 5vmax : 브라우저 너비와 높이중 큰쪽의 5% */
        font-size: 5vmax;
    }
    </style>
</head>

<body id="page-top" class="index">

    <!-- Header -->
    <header>
      		<?php virtual('include/header.php'); ?>
        <div class="container">
            <div class="intro-text">
                <div><headerintext class="vw"><b>공간을 나누다, 가능성을 더하다.</b></headerintext></div>
                <div><headerintext class="vw2">수 많은 오피스 공간들이 당신을 기다립니다.</headerintext></div>
            </div>
        </div>
    </header>


    <!-- 여기서부터 추천 Space 나열 -->
    <section id="portfolio">
        <div class="container">


            <div class="row">
                <div class="col-lg-12 text-left">
                    <?require "include/search2.php";?>
                    <br>
                    <br>
                    <h2 >추천 공간</h2>
                </div>
            </div>
            <div class="row">

              <?
								$result = mysql_query("Select uid,bimg,img1,img2,img3,subject,addr1,addr2,gubun,price From es_product where status='ok' and main='Y' Order By rand() limit 0,8");
								if($result&&mysql_num_rows($result)>0){
									while($r=mysql_fetch_array($result)){
										foreach($r as $key=>$val){
											$$key = stripslashes($val);
										}

										$address = $addr1." ".$addr2;
								?>

                <div class="col-md-3 col-sm-6 portfolio-item">
          <a href="/<?=$uid?>"  class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    <img src="/DATAS/es_product/thum/<?=$bimg?>" class="img-responsive" alt="">
                  </a>
                    <div class="text-left">
                        <a href="/<?=$uid?>"><h4><font color="#50C3FA">￦<?=number_format($price)?></font></h4></a>
                        <?
                        $txtLen = strlen($address);
                        $numCut = 46;
                        $dot = ($txtLen > $numCut)?'...':'';
                        ?>
                        <p class="text-muted"><? echo mb_strcut($address, 0, $numCut, "utf-8").$dot; ?></p>
                    </div>
                </div>
								<?
									}
									flush2();
								}
								@mysql_free_result($result);
								?>
                <!--  여기까지 추천Space 나열. 총 8개-->
                <!--  더보기 누르면 8개 추가하기.-->
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">SpacePool의 공간들</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">[ My Desk ]</h4>
                    <p class="text-muted">나만의 자리를 지정받아<br>언제든지 사용할 수 있는 자리입니다.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">[ My Room ]</h4>
                    <p class="text-muted">나와 팀만을 위한 독립된 공간으로서<br>외부로부터 방해를 받지 않습니다.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">[ 비상주 Desk ]</h4>
                    <p class="text-muted">오픈된 공간에서 자유롭게 사용할 수 있는<br>자리입니다. 비어있는 자리 어디서든<br>자유롭게 일할 수 있습니다.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">[ 세미나·미팅룸 ]</h4>
                    <p class="text-muted">세미나, 컨퍼런스, 미팅에 적합한 공간으로 시간단위로 사용합니다.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">SpacePool의 Review<br></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/images/temp/user_01.jpg" class="img-responsive img-circle" alt="">
                        <h4>아름다운SNS 어쓰 CEO 이정훈</h4>
                        <p class="text-muted">
                          저희 어쓰팀은 열정을 쏟을 수 있는<br>
                          공간이 항상 필요했는데 딱 맞는<br>
                          공간을 찾을 수 있어서 좋았습니다.<br>
                          스페이스풀은 창업자들에게 도약의<br>
                          기회를 제공하는 좋은 서비스입니다.
                        </p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/images/temp/user_02.jpg" class="img-responsive img-circle" alt="">
                        <h4>버디찬스 대표 박희락</h4>
                        <p class="text-muted">
                          아직은 작은 기업으로서 1년씩 계약하는<br>
                          사무실들은 너무 부담이었어요.<br>
                          기업이 성장하면서 공간도 유동적으로 변하기에<br>
                          스페이스풀의 서비스는 저희가 마음껏<br>
                          성장할 수 있도록 도와주었습니다.
                        </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="/images/temp/user_03.jpg" class="img-responsive img-circle" alt="">
                        <h4>애즈원 CDO 김석환</h4>
                        <p class="text-muted">
                          개인 사무실은 없지만 외부인들을<br>
                          만나야 하는 경우가 많아요.<br>
                          접대실도 회의실도 없어 초라해 보였지만<br>
                          이제는 언제든지 원하는 공간을<br>
                          찾을 수 있어 매우 기쁩니다.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
      <img src="/images/temp/event.jpg" width="100%" alt="">


    <footer>
        		<?php virtual('include/footer.php'); ?>
    </footer>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
