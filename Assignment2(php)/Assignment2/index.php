<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creating Web Applications"/>
    <meta name="keyword" content="HTML, CSS, Javascript"/>
    <meta name="author" content="Dang Quynh Chi"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>


  <!-- Template Main CSS File -->
  <link href="Styles/main.css" rel="stylesheet">
  <link href="Styles/Index.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>

<body>
<!-- ======= Header ======= -->
<?php 
        require_once "header.inc";
        
    ?>



<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">


  <div class="image-container">
   

  <img src="Images/shutterstock_166852532.png" alt="IT" height="100%" width="100%">
  </div>


  <nav>
      <ol>
        <li><a href="index.php">Home</a></li>
        <li>/</li>
        <li>Get a Quote</li>
      </ol>
  </nav>
</div><!-- End Breadcrumbs -->

    
<!--Information-->
    <section class="info">
      <div class ="info-container">
        
        <div class ="column1">
        <h2 ><a href="https://www.youtube.com/watch?v=mxu5w4ClL80" >GroupVideoLink(clickhere)</a></h2>
        <br>
          <h2 >About Us</a></h2>
          <p>Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.</p>         
          <br>         
            <ul>
            <li class = "list">
              <img src ="Images/service.svg" alt ="Dang Chi Image">
              <strong>Service 1</strong>
              Provide expert advice and guidance on technology strategies, infrastructure planning, software selection, and IT project management.
            </li>  

            <li class = "list">
              <img src ="Images/service.svg" alt ="Dang Chi Image">
              <strong>Service 2</strong>
              Design, develop, and deploy custom software solutions tailored to meet the specific needs of clients
            </li>
            <li class = "list">
              <img src ="Images/service.svg" alt ="Dang Chi Image">
              <strong>Service 3</strong>
              Provide technical support and troubleshooting for hardware, software, and network issues.
            </li>
          </ul>
        </div>
        <img class="column2" src="Images/about.jpg" alt="Description of the image">

      </div>
      </section>

      <section class ="statitics">
        <ul>
          <li><div id ="countdown1"></div><hr>Clients</li>
          <li><div id ="countdown2"></div><hr>Clients</li>
          <li><div id ="countdown3"></div><hr>Clients</li>
          <li><div id ="countdown4"></div><hr>Clients</li>
        </ul>
      </section>
<!--End of Information-->


      <!--Team information-->


      <h1>Our Team</h1>
      <section class="team">
        <div class = "team-mate">
          <img src="Images/blanksvg.svg" alt="Team Member Image">
          <div class="team-info">
            <h1>Dang Chi</h1><p>Programmer</p>
          </div>
        </div>
        <div class = "team-mate">
          <img src="Images/blanksvg.svg" alt="Team Member Image">
          <div class="team-info">
            <h1>Trang Nguyen</h1><p>Programmer</p>
          </div>

        </div>
        <div class = "team-mate">
          <img src="Images/blanksvg.svg" alt="Team Member Image">
          <div class="team-info">
            <h1>Phan Thinh</h1><p>Programmer</p>
          </div>

        </div>
        <div class = "team-mate">
          <img src="Images/blanksvg.svg" alt="Team Member Image">
          <div class="team-info">
            <h1>Nguyen Long</h1><p>Programmer</p>
          </div>

        </div>

    </section>
<!--End Team information-->

      <!-- FAQ section-->
    <section class="Questions">
          <h1>Frequently Asked Questions</h1>
          <div class="faq">
          <input id ="ask1" type="checkbox" name="ask1" >
          <label for="ask1">Question 1</label>
          <div >
            This is the answer to the question.
          </div>
        </div>
        
        <div class="faq">
            <input id ="ask2" type="checkbox" name="ask2" >
            <label for="ask2">Question 2</label>
            <div>
              This is the answer to the question.
            </div>
          </div>

          <div class="faq">
            <input id ="ask3" type="checkbox" name="ask3" />
            <label for="ask3">Question 3</label>
            <div class="answer">
              This is the answer to the question.
            </div>
          </div>
          </section>
    
<!-- ======= Footer ======= -->
<?php 
        
        require_once "footer.inc";
    ?>




<!-- End #main -->

  
</body>
</html>
