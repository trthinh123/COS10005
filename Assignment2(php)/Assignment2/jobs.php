<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Descriptions</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    
    <link rel="stylesheet" href="Styles/deco.css">
    <link rel="stylesheet" href="Styles/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" >
    
</head>
<body>
<!-- ======= Header ======= -->
   <?php 
        require_once "header.inc";
        
    ?>



  <!-- End Header -->
    <!-- End Header -->
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

      <!-- box-->
    
    
        <section class="companyname">
            <div class="img">
                <img src="Images/logo-fpt-inkythuatso-1.svg" alt="Ảnh mô tả" class="company-logo">
                <!-- Rest of your content -->
            </div>
            <h2>IT System Administrator</h2>
            <ul>
                <li><i class='fas fa-map-marker-alt '></i>Ho Chi Minh</li>
                <li><i class='fas fa-briefcase'></i>Information Technology</li>
                <li> $50,000 - $70,000</li>
                <li><button class="apply-button" onclick="window.location.href='apply.php'">Apply Now</button></li>

            </ul>
        </section>
    
        

    <!--end box-->
    <!--Job Details-->
    <div class="details">
      <section class="column1">
        <h3>Key Responsibilities:</h3>
        <ul>
            <li>configure, and maintain server infrastructure.</li>
            <li>Manage user accounts, permissions, and access control.</li>
            <li>Perform regular system updates and backups.</li>
            <li>Troubleshoot hardware and software issues.</li>
            <li>Implement and maintain security protocols and firewall settings.</li>
        </ul>
        
        
        <h3>Required Qualifications, Skills, Knowledge, and Attributes:</h3>
        
        <ul>
            <li>Bachelor's degree in Computer Science or related field.</li>
            <li>3+ years of experience in system administration.</li>
            <li>Proficiency in Linux and Windows operating systems.</li>
            <li>Strong knowledge of network protocols and security.</li>
        </ul>
      </section>
        <section class="column2">
        <h4>Preferable:</h4>
        <ul>
            <li>Certifications in system administration (e.g., CompTIA, Microsoft).</li>
            <li>Experience with virtualization technologies (e.g., VMware).</li>
        </ul>
        
        
        
                <h4>About Our Company</h4>
                <p>We are a leading IT solutions provider committed to innovation and excellence in the industry.</p>
        </section>
    

    
        
    
    </div>

    <section class="companyname">
    
      <div class="img">
        
        <img src="Images/Logo_of_Swinburne_University_of_Technology.svg.png" alt="Image description">
      </div>
        <h2>Web Developer (Security)</h2>
        <ul>
            <li><i class='fas fa-map-marker-alt '></i>Ho Chi Minh</li>
            <li><i class='fas fa-briefcase'></i>Information Technology</li>
            <li> $70,000 - $100,000</li>
            <li><button class="apply-button" onclick="window.location.href='apply.php'">Apply Now</button></li>

            <li></li>
        </ul>
        
      
    </section>
    
  <div class="details">
    <section class="column1">
        <h3>Key Responsibilities:</h3>
        <ul>
            <li>Implement and maintain security measures to protect web applications and databases.</li>
            <li>Conduct regular security assessments and vulnerability scans.</li>
            <li>Collaborate with development teams to integrate security best practices into the software development lifecycle.</li>
            <li>Monitor web traffic and respond to security incidents and breaches.</li>
        </ul>
    
    
        <h3>Required Qualifications, Skills, Knowledge, and Attributes:</h3>
        
        <ul>
            <li>Bachelor's degree in Computer Science or a related field.</li>
            <li>Proven experience in web application security.</li>
            <li>Knowledge of web security standards, protocols, and tools (e.g., OWASP Top Ten, Burp Suite).</li>
        </ul>
    </section>
        <section class="column2">
        <h4>Preferable:</h4>
        <ul>
            <li>Certifications in web security (e.g., Certified Information Systems Security Professional - CISSP).</li>
            <li>Experience with penetration testing and ethical hacking.</li>
        </ul>

        <h4>About Our Company</h4>
        <p>We are a leading IT solutions provider committed to innovation and excellence in the industry.</p>
     
      </section>
  </div> 
       
    

  <?php 
        
        require_once "footer.inc";
    ?>

</body>
</html>
