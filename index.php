<!--
author: Boostraptheme
author URL: https://boostraptheme.com
License: Creative Commons Attribution 4.0 Unported
License URL: https://creativecommons.org/licenses/by/4.0/
-->
<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "swadesh.soyel@gmail.com";
    $email_subject = "soyelherein blog - new form submissions";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    function problem($error)
    {
        $msg = "We are very sorry, but there were error(s) found with the form you submitted. ";
        // $msg .= "These errors appear below.<br><br>";
        // $msg .= $error . "<br><br>";
        // $msg .= "Please go back and fix these errors.<br><br>";
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])||
        !isset($_POST['Subject'])
    ) {
        problem("We are sorry, but there appears to be a problem with the form you submitted.");
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required
    $subject = $_POST['Subject']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        $err_msg = problem($error_message);
        $msg = "I am very sorry, but there were error(s) found with the form you submitted.";
        $msg .= "These errors appear below.<br>";
        $msg .= $error_message . "<br>";
        $msg .= "Please try again!";
    }
    else {

    $email_message = "Form details below.<br>";


    $email_message .= "<strong>Name: </strong>" . clean_string($name) . "<br>";
    $email_message .= "<strong>Email: </strong>" . clean_string($email) . "<br>";
    $email_message .= "<strong>Subject: </strong>" . clean_string($subject) . "<br>";
    $email_message .= "<strong>Message: </strong>" . clean_string($message) . "<br>";

    // create email headers
    $headers = 'From: ' . $email_to . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    $msg .= "Thank you for contacting me. I will be in touch with you very soon.<br>"; 
    $msg .= $email_message;  

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="img/blog-solid.ico">
    <title>Soyel Alam</title>

    <!-- Global stylesheets -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/004e4d6853.js" crossorigin="anonymous"></script>
    <link href="css/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="css/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none  mx-0 px-0"><img src="img/logo-white.png" alt="" class="img-fluid"></span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
        </span>
      </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#portfolio">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#awards">Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
                <li>
                <ul class="list-inline social-icon-f top-data">
                  <li><a href="https://www.linkedin.com/in/soyel-alam-98945598/" target="_empty"><i class="fa top-social fa-linkedin" style="color: #4AB3F4; border-color:#4AB3F4;"></i></a></li>
                  <li><a href="https://www.github.com/soyelherein" target="_empty"><i class="fa top-social fa-github" style="color:#101110; border-color:#101110;"></i></a></li>
                  <li><a href="https://twitter.com/Soyelherein" target="_empty"><i class="fa top-social fa-twitter" style="color: #4AB3F4; border-color:#4AB3F4;"></i></a></li>
                  <li><a href="https://www.medium.com/@soyelherein" target="_empty"><i class="fa top-social fa-medium" style="color: #101110; border-color:#101110;"></i></a></li>
                </ul>
              </li>
            </ul>
            
        </div>
    </nav>

    <div class="container-fluid p-0">

    <!--====================================================
                        ABOUT
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
          <div class="my-auto" >
              <!-- <img src="img/logo-s.png" class="img-fluid mb-3" alt=""> -->
              <h1 class="mb-0">Soyel
                <span class="text-primary">Alam</span>
              </h1>
              <!-- <div class="subheading mb-5">THE NEXT BIG IDEA IS WAITING FOR ITS NEXT BIG CHANGER WITH
                  <a href="#">THEMSBIT</a>
              </div> -->
              <p class="mb-5" style="max-width: 500px;" >A technical enthusiastic and dedicated IT professional with diverse experience in Big data, data warehousing and cloud computing. I am eager to be challenged in order to grow and further improve my IT skills.</p>
              <ul class="list-inline list-social-icons mb-0">
                  <li class="list-inline-item">
                      <a href="https://www.linkedin.com/in/soyel-alam-98945598/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                  </li>
                  </li>
                  <li class="list-inline-item">
                      <a href="https://github.com/soyelherein">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                  </li>
                  <li class="list-inline-item">
                      <a href="https://twitter.com/Soyelherein">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                  <li class="list-inline-item">
                    <a href="https://medium.com/@soyelherein">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-medium fa-stack-1x fa-inverse"></i>
                </span>
              </a>
                </li>
              </ul>
          </div>
      </section>


    <!--====================================================
                        PORTFOLIO
    ======================================================-->
    <section class="resume-section p-3 p-lg-12 d-flex flex-column" id="portfolio">
      <div class="row my-auto">
          <div class="col-12">
            <h2 class="  text-center">Blog</h2>
            <div class="mb-12 heading-border"></div>
          </div>
          <div class="col-md-12">
            <div class="port-head-cont">
              <button class="btn btn-general btn-green filter-b" data-filter="all">All</button>
              <button class="btn btn-general btn-green filter-b" data-filter="consulting">Spark</button>
              <button class="btn btn-general btn-green filter-b" data-filter="finance">Airflow</button>
            </div>
          </div>
      </div>
      <div class="row my-auto">
          <div class="resume-item col-md-6 col-sm-12 filter consulting">
            <div class="card mx-0 p-4 mb-5" style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21)">
              <div class=" resume-content mr-auto">
                  <h3 class="mb-3"><i class="far fa-star mr-3 text-info" ></i>Dr. PySpark: How I Learned to Stop Worrying and Love Data Pipeline Testing</h3>
                  <p>One major challenge in data pipeline implementation is reliably testing the pipeline codes. The outcome of the code is tightly coupled with data and the environment.<br/>
                     One way to overcome the reliability challenge is to use immutable data to run and test the pipeline so that the result of ETL functions can be matched against known outputs.
                     This blog-post focuses on providing a model of self-contained data pipelines with CICD.</p>
              </div>
              <div class="resume-date text-md-right">
                  <span class="text-primary"><a href='blog/pyspark-cicd.html'>read more...</a></span>
              </div>
            </div>
          </div>
          <div class="resume-item col-md-6 col-sm-12 filter finance consulting">
            <div class="card mx-0 p-4 mb-5" style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21)">
              <div class=" resume-content mr-auto">
                  <h3 class="mb-3"><i class="fas fa-fan mr-3 text-info"></i>Where are my spark logs! Adding external link to an Airflow operator</h3>
                  <p>
                    Apache Airflow's LivyOperator makes life easy when it comes to running a spark jobs in EMR.
                    But, everytime we want to see the application logs we have to get the livy batch id, go to livy portal, take the spark application id and go to master and container logs.
                    Thanks to Airflow custom link that made the log accessible in just a click, with some little coding.
                    This blog-post discuss how to add a custom link to an Airflow Opetaror </p>
              </div>
              <div class="resume-date text-md-right">
                  <span class="text-primary"><a href='index.html#blog'>coming soon...</a></span>
              </div>
            </div>
          </div>
          <div class="resume-item col-md-6 col-sm-12 filter finance">
            <div class="card mx-0 p-4 mb-5" style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21)">
              <div class=" resume-content mr-auto">
                  <h3 class="mb-3"><i class="fas fa-fan mr-3 text-info"></i>I want the all the tasks in the DAG to finish! before the next DAG run.</h3>
                  <p>Coming soon</p>
              </div>
              <div class="resume-date text-md-right">
                  <span class="text-primary"><a href='index.html#blog'>coming soon...</a></span>
              </div>
            </div>
          </div>
      </div>
  </section>

    <!--====================================================
                        EXPERIENCE
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 " id="experience">
          <div class="row my-auto">
              <div class="col-12">
                <h2 class="  text-center">Experience</h2>
                <div class="mb-5 heading-border"></div>
              </div>
              <div class="resume-item col-md-12 col-sm-12 " >
                <div class="card mx-0 p-4 mb-5" style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                  <div class=" resume-content mr-auto">
                      <h4 class="mb-3"><i class="fa fa-cloud-upload mr-3 text-info"></i>Cloud Data Engineer</h4>
                      <p>Migrated legacy data-warehouse code and data into AWS and Snowflake using Spark and Airflow.
                      Setup  PySpark project template using cookiecutter to standardize the data-pipeline.
                      Developing Airflow dags to orchestrate the tasks, writing custom reusable Airflow operators.
                      Setup an AWS and Airflow environment using Terraform.
                      Maintaining and enhancing the existing data warehouse system in Teradata and Hadoop ecosystem.
                    </p>
                  </div>
                  <div class="resume-date text-md-right">
                      <span class="text-primary">May 2018 - Present</span>
                  </div>
                </div>
              </div>
              <div class="resume-item col-md-6 col-sm-12">
                <div class="card mx-0 p-4 mb-5" style="border-color: #28a745; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                  <div class="resume-content mr-auto">
                      <h4 class="mb-3"><i class="fa fa-area-chart mr-3 text-success"></i> Business Analyst</h4>
                      <p>Analyzing Business Intelligence Reporting requirements and translating them into data sourcing and modeling requirements including Facts, Dimensions, Star Schemas, Snowflake Schemas.
                        Re-designed application processes, data interfaces, data retention & aggregation policy to reduce the run time and storage by 30%
                      </p>
                  </div>
                  <div class="resume-date text-md-right">
                      <span class="text-primary">March 2016 - August 2017</span>
                  </div>
                </div>
              </div>
              <div class="resume-item col-md-6 col-sm-12">
                <div class="card mx-0 p-4 mb-5" style="border-color: #2196f3; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                  <div class="resume-content mr-auto">
                      <h4 class="mb-3"><i class="fa fa-database mr-3 text-primary"></i> Data Warehouse Engineer</h4>
                      <p>Developing Oracle packages by implementing advance PL/SQL concepts i.e.  Dynamic SQL, Analytical functions, Bulk collect, Cursor and Hierarchical Query.
                        Producing Logical and Physical data model and data mapping using Erwin and Excel. Re-wrote Legacy Ab initio graphs into PL/SQL standard codes.
                      </p>
                  </div>
                  <div class="resume-date text-md-right">
                      <span class="text-primary">August 2011 - March 2016</span>
                  </div>
                </div>
              </div>
          </div>
      </section>


    <!--====================================================
                        SKILLS
    ======================================================-->
      <section class=" d-flex flex-column" id="skills">
         <div class="p-lg-5 p-3 skill-cover">
          <h2 class="text-center">Skills</h2>
          <div class="mb-5 heading-border"></div>
          <div class="row text-center my-auto ">
              <div class="col-md-3 col-sm-6">
                  <div class="skill-item">
                      <h2>
                      <ul>Python</ul>
                      <ul>AWS</ul>
                      <ul>Airflow</ul>
                      </h2>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="skill-item">
                    <h2>
                    <ul>Pyspark</ul>
                    <ul>Hadoop</ul>
                    <ul>Teradata</ul>
                    </h2>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="skill-item">
                    <h2>
                    <ul>Jenkins</ul>
                    <ul>Docker</ul>
                    <ul>Terraform</ul>
                    </h2>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="skill-item">
                    <h2>
                    <ul>Oracle</ul>
                    <ul>HBase</ul>
                    </h2>
                </div>
              </div>
          </div>
         </div>
      </section>

    <!--====================================================
                           AWARDS
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
          <div class="row my-auto">
              <div class="col-12">
                <h2 class="  text-center">Education</h2>
                <div class="mb-5 heading-border"></div>
              </div>
              <div class="main-award" id="award-box">
                  <div class="award">
                      <div class="award-icon"></div>
                      <div class="award-content">
                          <span class="date">Nov 2019</span>
                          <h5 class="title">AWS Certified Developer - Associate</h5>
                          <p class="description">
                          </p>
                      </div>
                  </div>
                    <div class="award">
                      <div class="award-icon"></div>
                      <div class="award-content">
                          <span class="date">May 2017</span>
                          <h5 class="title">Oracle Data Integrator 11g Certified Implementation Specialist</h5>
                          <p class="description">
                          </p>
                      </div>
                  </div>
                  <div class="award">
                      <div class="award-icon"></div>
                      <div class="award-content">
                          <span class="date">May 2015</span>
                          <h5 class="title"><a href='https://www.youracclaim.com/badges/f38bbf67-ed83-40ad-bfbe-889be49dc0fa'>Oracle Business Intelligence Foundation Suite 11g Certified Implementation Specialist</h5></a>
                          <p class="description">
                          </p>
                      </div>
                  </div>
                  <div class="award">
                      <div class="award-icon"></div>
                      <div class="award-content">
                          <span class="date">Jul 2014</span>
                          <h5 class="title"><a href='https://www.youracclaim.com/badges/d90b9f88-83b8-4d38-9e48-772f2cac0d3a'>Oracle PL/SQL Developer Certified Associate</h5></a>
                          <p class="description">
                          </p>
                      </div>
                  </div>
                  <div class="award">
                    <div class="award-icon"></div>
                    <div class="award-content">
                        <span class="date">2017 - 2018</span>
                        <h5 class="title">Masters in Computer science</h5>
                        <p class="description">
                        </p>
                    </div>
                </div>
                <div class="award">
                  <div class="award-icon"></div>
                  <div class="award-content">
                      <span class="date">2007 - 2011</span>
                      <h5 class="title">Bachelor In Technology</h5>
                      <p class="description">
                      </p>
                  </div>
              </div>
              </div>
          </div>
      </section>
    

    <!--====================================================
                          CONTACT
    ======================================================-->
      <section class="resume-section p-3 p-lg-5 d-flex flex-column">
          <div class="row my-auto" id="contact">
            <div class="col-md-8">
              <div class="contact-cont">
                <h3>CONTACT ME</h3>
                <div class="heading-border-light"></div>
                <!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.</p> -->
              </div>
              <form id="contact-form" action="#contact" method="POST" data-netlify="true" data-netlify-recaptcha="true">
              <?php echo $msg; ?>
              <div class="row con-form">
                <div class="col-md-12">
                  <input type="text" name="Name" placeholder="Full Name" class="form-control">
                </div>
                <div class="col-md-12">
                  <input type="text" name="Email" placeholder="Email Id" class="form-control">
                </div>
                <div class="col-md-12">
                  <input type="text" name="Subject" placeholder="Subject" class="form-control">
                </div>
                <div class="col-md-12"><textarea name="Message" id=""></textarea></div>
                </p>
                <div data-netlify-recaptcha="true"></div>
                <p>
                <div class="col-md-12 sub-but"><button class="btn btn-general btn-white" role="button">Send</button></div>
              </div>
            </div>
          </form>
            <div class="col-md-4 col-sm-12 mt-5">
              <div class="contact-cont2">
                <!-- <div class="contact-add contact-box-desc">
                  <h3><i class="fa fa-map-marker cl-atlantis fa-2x"></i> Address</h3>
                  <p>128 Gleann Na Ri <br>
                  Dublin, Ireland <br></p>
                </div> -->
                <!-- <div class="contact-phone contact-side-desc contact-box-desc">
                  <h3><i class="fa fa-phone cl-atlantis fa-2x"></i> Phone</h3>
                  <p>800 123 3456 <br>900 123 3457</p>
                </div> -->
                <div class="contact-mail contact-side-desc contact-box-desc">
                  <!-- <h3><i class="fa fa-envelope-o cl-atlantis fa-2x"></i> Email</h3>
                <address class="address-details-f">
                  Email: <a href="mailto:soyel.alam@ucdconnect.ie" class="">soyel.alam@ucdconnect.ie</a>
                </address> -->
                
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>
    <!-- Global javascript -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/counter/jquery.waypoints.min.js"></script>
    <script src="js/counter/jquery.counterup.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).ready(function(){

        $(".filter-b").click(function(){
            var value = $(this).attr('data-filter');
            if(value == "all")
            {
                $('.filter').show('1000');
            }
            else
            {
                $(".filter").not('.'+value).hide('3000');
                $('.filter').filter('.'+value).show('3000');
            }
        });

        if ($(".filter-b").removeClass("active")) {
          $(this).removeClass("active");
        }
        $(this).addClass("active");
        });

        // SKILLS
        $(function () {
            $('.counter').counterUp({
                delay: 10,
                time: 2000
            });

        });
    </script>
</body>

</html>
