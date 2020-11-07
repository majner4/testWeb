<?php
$charset = "iso-8859-2";
$dmy= date('r', time());
$today = date("d.m.Y");
$boundary = "Multipart_Boundary_x".strtoupper(md5(uniqid("bound")))."x";
$succes = "Zpráva byla odeslána";
$error = "Někde se stala chyba";
$to = "t.zifcak@seznam.cz" ;

// odeslání emailu z formuláře v hlavičce se zájmem o aplikaci
if (isset($_POST['email'])) {
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) ) {
        
        $name = $_POST['name'];
        $from = $_POST['email'];
        $message = $_POST['message'];
        $subject = "Dotaz";

        $email = 
            '<div>
                <h2 style="color: #16409f; font-size: 20px;">Dotaz ze dne: ' .$today.'</h2>
                <table>
                    <tr>
                        <td><strong>Jméno</strong>:</td>
                        <td>'.$name.'</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong>:</td>
                        <td>'.$from.'<td>
                    </tr>
                    <tr>
                        <td><strong>Zpráva</strong>:</td>
                        <td>'.$message.'<td>
                    </tr>
                </table>
            </div>';
        $message = base64_encode($email);
        $subject = iconv($charset,"iso-8859-2", $subject);
        $subject = base64_encode ($subject);
        $subject = "=?".$charset."?B?".$subject."?=";

        $from="From:".$from;

        $hlavicka = "Date:".$dmy."\n";
        $hlavicka .= "MIME-Version: 1.0\n"; 
        $hlavicka .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";  // multipart/mixed
        $hlavicka .= "X-Mailer: PHP JV-HTMLmailer\n";
        $hlavicka .= "X-MSMail-Priority: Normal\n"; 
        $hlavicka .= "X-Custommail:".$to."\n";
        $hlavicka .= "X-SMTP-MAIL-FROM:".$from."\n";
        $hlavicka .= "X-SMTP-RCPT-TO:".$to."\n";
        $hlavicka .= "Importance: normal\n"; 
        $hlavicka .= "Priority: normal\n"; 

        $telo  = "\n--".$boundary."\n"; 
        $telo .= "Content-Type: text/plain; charset=\"utf-8\"\n"; 
        $telo .= "Content-Transfer-Encoding: base64\n";
        $telo .= "\n".$message."\n"; //text zprávy  
        $telo .= "\n--$boundary--\n"; 

        $telo  = "\n--".$boundary."\n"; 
        $telo .= "Content-Type: text/html; charset=\"utf-8\"\n"; 
        $telo .= "Content-Transfer-Encoding: base64\n";
        $telo .= "\n" .$message."\n"; //text zprávy 
        $telo .= "--".$boundary."--\n"; 

        $headers = $from."\n";
        $headers .= $hlavicka."\n";

        if(mail($to, $subject, $telo, $headers)) {
          echo '<div class="succes-message">'.$succes.'</div>';
          } else {
            echo '<div class="error-message">'.$error.'</div>';
          }   
      }
} 
// --------------------------------------------------------------------------------

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>iCoders</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
<script data-ad-client="ca-pub-7503499873285208" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  
  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <a href="#intro" class="scrollto"><img src="img/icoders-logo.png" alt="logo" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Úvod</a></li>
          <li><a href="#about">O mě</a></li>
          <li><a href="#services">Služby</a></li>
          <li><a href="#portfolio">Reference</a></li>
          <li><a href="#team">Tým</a></li>
          <li><a href="#contact">Kontakt</a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">
      <div class="intro-info  wow fadeInUp">
        <h2>iCoders</h2>
        <p>Tvorba vašeho webu na míru </p>
      </div>

      <div class="intro-img  wow fadeInRight" data-wow-delay="0.3s">
        <img src="img/pc.png" alt="pc" class="img-fluid">
      </div>

     

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>O mě</h3>
          <p>
            Tvorba webových stránek pro mě není jen práce, ale i koníček, proto kladeu důraz na preciznost a kvalitu.
            Vždy se snažím využívát ty nejmodernější technologie a zároveň se držet designu podle přání
            mých klientů. Každý nový projekt je pro mě výzva.
          </p>
        </header>
        <div class="section-header">
          <h3>Technologie</h3>
          <p> Technologie se kterými pracuji. </p>
        </div>

        <div class="row about-container">
          <div class="col-lg-4 content">
            <div class="icon-box wow fadeInUp">
              <div class="icon"><img src="img/technologie/css3.png" alt="css3" class="img-fluid" /></div>
              <h4 class="title">CSS 3</h4>
            </div>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><img src="img/technologie/sass.png" alt="sass" class="img-fluid" /></div>
              <h4 class="title">Sass</h4>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><img src="img/technologie/less.png" alt="less" class="img-fluid" /></div>
              <h4 class="title"><a href="">Less</a></h4>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><img src="img/technologie/bootstrap.png" alt="bootstrap" class="img-fluid" /></div>
              <h4 class="title"><a href="">Bootstrap</a></h4>
            </div>
          </div>

          <div class="col-lg-4 content">
            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><img src="img/technologie/javascript.png" alt="javascript" class="img-fluid" /></div>
              <h4 class="title"><a href="">Javascript</a></h4>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><img src="img/technologie/nodejs.png" alt="nodejs" class="img-fluid" /></div>
              <h4 class="title"><a href="">NodeJS</a></h4>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><img src="img/technologie/jquery.png" alt="jquery" class="img-fluid" /></div>
              <h4 class="title"><a href="">jQuery</a></h4>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><img src="img/technologie/reactjs.png" alt="reactjs" class="img-fluid" /></div>
              <h4 class="title"><a href="">React JS</a></h4>
            </div>
          </div>
          <div class="col-lg-4 content">
            <div class="icon-box wow fadeInUp">
              <div class="icon"><img src="img/technologie/wordpress.png" alt="wordpress" class="img-fluid" /></div>
              <h4 class="title">Wordpress</h4>
            </div>

            <div class="icon-box wow fadeInUp">
              <div class="icon"><img src="img/technologie/php.png" alt="php" class="img-fluid" /></div>
              <h4 class="title">PHP</h4>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              <div class="icon"><img src="img/technologie/meteorjs.png" alt="meteorjs" class="img-fluid" /></div>
              <h4 class="title"><a href="">Meteor</a></h4>
            </div>
  
            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <div class="icon"><img src="img/technologie/git.png" alt="git" class="img-fluid" /></div>
              <h4 class="title"><a href="">Git</a></h4>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Služby</h3>
        </header>

        <div class="row">
          <div class="col-md-6 col-lg-5 offset-lg-1 mb-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box" data-toggle="modal" data-target="#responsive">
              <div class="icon"><i class="fa fa-mobile"></i></div>
              <h4 class="title">Responzivní web</h4>
              <p class="description">Váš web odladěný pro každé zařízení.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 mb-4 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box" data-toggle="modal" data-target="#redesign">
              <div class="icon"><i class="fa fa-pencil"></i></div>
              <h4 class="title">Redesign</h4>
              <p class="description">Modernizace vašeho webu.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 mb-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box" data-toggle="modal" data-target="#optimalization">
              <div class="icon"><i class="fa fa-history"></i></div>
              <h4 class="title">Optimalizace</h4>
              <p class="description">Optimalizace vašich stránek.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 mb-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box" data-toggle="modal" data-target="#konzultation">
              <div class="icon"><i class="fa fa-info-circle"></i></div>
              <h4 class="title">Konzultace</h4>
              <p class="description">Odpovědi na vaše otázky týkající se webu.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="responsive" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="responsive">Responzivní web</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Responzivní web je web, který se přizpůsobuje šířce zařízení na kterém je zobrazen.</p>
              <p>V dnešní době je nutností z důvodu rozšíření mobilních zařízení mezi lidmi.</p>
              <div class="d-flex justify-content-center align-items-center">
                <i class="fa fa-mobile"></i>
                <i class="fa fa-tablet"></i>
                <i class="fa fa-desktop"></i>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Zavřít</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="redesign" tabindex="-1" role="dialog" aria-labelledby="redesign" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="redesign">Redesign</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Doba jde dopředu a co bylo moderní včera, dnes už není.</p>
              <p>Kompletní modernizace vašeho webu dle vašich přání.</p>
              <div class="d-flex justify-content-center align-items-center">
                <i class="fa fa-edit"></i>
                <i class="fa fa-pencil"></i>
                <i class="fa fa-picture-o"></i>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Zavřít</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="optimalization" tabindex="-1" role="dialog" aria-labelledby="optimalization" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="optimalization">Optimalizace</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Pomalý web, pomalé načítání, špatné hodnocení na google?</p>
              <p>Zkontrolujeme váš kód a na základě SEO optimalizace upravíme a zrychlíme načítání vašeho webu</p>
              <div class="d-flex justify-content-center align-items-center">
                <i class="fa fa-line-chart"></i>
                <i class="fa fa-history"></i>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Zavřít</button>
            </div>
          </div>
        </div>
      </div>
  
      <div class="modal fade" id="konzultation" tabindex="-1" role="dialog" aria-labelledby="konzultation" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="konzultation">Konzultace</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Nevíte si rady s vaším webem a potřebujete radu?</p>
              <p>Rádi vám ukážeme správnou cestu k vašemu dokonalému webu.</p>
              <div class="d-flex justify-content-center align-items-center">
                <i class="fa fa-map-signs"></i>
                <i class="fa fa-wrench"></i>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Zavřít</button>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #services -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio" class="clearfix">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Moje tvorba</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Vše</li>
              <li data-filter=".filter-web">Web</li>
              <li data-filter=".filter-redesign">Redesign</li>              
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="img/tvorba/dystonia.png" class="img-fluid" alt="dystonia">
              <div class="portfolio-info">
                <h4><a href="http://www.dystonia.cz/" target="_blank">Dystonia.cz</a></h4>
                <p>Web pro organiaci, která pomáhá pacientům s dystonií.</p>
                <div>
                  <a href="img/tvorba/dystonia.png" class="link-preview" data-lightbox="portfolio" data-title="Dystonia" title="Preview"><i class="ion ion-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-redesign" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="img/tvorba/itzif1.png" class="img-fluid" alt="itzif 1">
              <div class="portfolio-info">
                <h4>ITZIF 1.verze</a></h4>
                <p>Osobní stránky</p>
                <div>
                  <a href="img/tvorba/itzif1.png" class="link-preview" data-lightbox="portfolio" data-title="ITZIF 1. verze" title="Preview"><i class="ion ion-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web filter-redesign" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="img/tvorba/itzif2.png" class="img-fluid" alt="Itzif 2">
              <div class="portfolio-info">
                <h4><a href="#">ITZIF redesign</a></h4>
                <p>Osobní stránky po redesignu</p>
                <div>
                  <a href="img/tvorba/itzif2.png" class="link-preview" data-lightbox="portfolio" data-title="ITZIF po redesignu" title="Preview"><i class="ion ion-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Reference</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="owl-carousel testimonials-carousel wow fadeInUp">
              <div class="testimonial-item">
                <img src="img/reference/dystonie.png" class="testimonial-img" alt="dystonie">
                <h3>Bc. Jana Vičarová</h3>
                <h4>Zástupce pacientské organizace</h4>
                <h4>IČ 22854606 </h4>
                <p>
                  Děkujeme Tomáši Zifčákovi za webové stránky pro pacientskou organizaci. 
                  Ceníme si zejména schopnosti stránek zobrazovat se na všech zařízení, mobilu, 
                  tabletu a počítači v potřebných poměrech, ale také uživatelsky jednoduchého a 
                  přehledného uspořádání, což ocení lidé se zdravotním handicapem. 
                  Navíc byla spolupráce svižná, srozumitelná a přizpůsobena zcela našim požadavkům.
                </p>
                <p>
                  Na základě této zkušenosti budeme spolupracovat i v budoucnosti a můžeme tyto služby doporučit.
                </p>                    
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Tým</h3>
        </div>

        <div class="row d-flex justify-content-center">
          <div class="col-lg-4 col-md-4 wow fadeInUp">
            <div class="member">
              <img src="img/tym/tomas.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Tomáš Zifčák</h4>
                  <span>Front-End Developer</span>
                  <div class="social">
                    <a href="https://www.facebook.com/majny.zifcakuj" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/tomyzify/" target="_blank"><i class="fa fa-instagram"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================ -->
    <section id="contact" class="section-bg footer-contact-area">
      <div class="container">
        <div class="section-header">
          <h3>Kontakt</h3>
        </div>

        <div class="row wow fadeInUp">
          <div class="col-md-6 mb-5">
              <!-- Heading Text  -->
              <div class="section-heading">
                  <h2>Kontaktujte mne!</h2>
                  <div class="line-shape"></div>
              </div>
              <div class="footer-text">
                  <p>V případě dotazů, mne neváhejte kontaktovat!</p>
              </div>
              <div class="address-text">
                  <p><span>Adresa:</span> Božice 421, 671 64, Božice</p>
              </div>
              <div class="phone-text">
                  <p><span>Telefon:</span> +420 730 681 147</p>
              </div>
              <div class="email-text">
                  <p><span>Email:</span> <a href="mailto:info@icoders.cz">info@icoders.cz</a></p>
              </div>
          </div>
          <div class="col-md-6 mb-5">
              <div class="contact_from">
                  <form action="index.php" method="post">
                      <div class="contact_input_area">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="name" id="name" placeholder="Vaše Jméno" required>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <input type="email" class="form-control" name="email" id="email" placeholder="Váš E-mail" required>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Vaše Zpráva" required></textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <button type="submit" class="btn submit-btn">Odeslat</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </section>

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>iCoders.cz</strong>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>
