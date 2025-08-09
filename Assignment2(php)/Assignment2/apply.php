<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creating Web Applications">
    <meta name="keyword" content="PHP, File, input, output">
    <meta name="author" content="Group">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Apply</title>

  <!-- Template Main CSS File -->
  <link href="Styles/main.css" rel="stylesheet">
  <link rel="stylesheet" href="Styles/apply.css">
</head>

<body>
  <!-- ======= Header ======= -->
  <?php 
        require_once "header.inc";
       
    ?>

  <main>

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

    <!-- Main -->
    <h1 class="title">Job Application Form</h1>
  <form method="post" action="processEOI.php" novalidate="novalidate">
      <div class="textbox-container">
      <input type="text" id="jobRef" name="jobReference" class="textbox" placeholder="Job Reference Number:">
      <input type="text" id="firstname" class="textbox" name="firstName" placeholder="First Name:" ></div>

      <div class="textbox-container">
      <input type="text" id="lastname" name="lastName" class="textbox" placeholder="Last Name:" >
      <input type="text" id="dob" name="DoB" class="textbox" placeholder="Date of Birth: dd/mm/yyyy" ></div>

      <fieldset class="gender">
      <legend>Gender:</legend>
      <p>
        <input type="radio" id="Male" name="Gender[]" value="Male" checked="checked" >
        <label for="Male">Male</label><br>
        <input type="radio" id="Female" name="Gender[]" value="Female" >
        <label for="Female">Female</label><br>
        <input type="radio" id="Other" name="Gender[]" value="Other" >
        <label for="Other">Other</label><br>
      </p></fieldset>

      <div class="textbox-container">
      <input type="text" id="streetaddress" name="streetAddress" class="textbox" placeholder="Street Address:" >
      <input type="text" id="suburb" name="suburbTown" class="textbox" placeholder="Suburb/Town:" ></div>

      <label for="state" class="modified">State:</label><br>
      <select id="state" name="state" >
      <option value="">Select State</option>
      <option value="VIC">VIC</option>
      <option value="NSW">NSW</option>
      <option value="QLD">QLD</option>
      <option value="NT">NT</option>
      <option value="WA">WA</option>
      <option value="SA">SA</option>
      <option value="TAS">TAS</option>
      <option value="ACT">ACT</option>
      </select>
      <br>

      <input type="text" id="postcode" name="postcode" class="postcode" placeholder="Postcode: ****" >
      <br>
    
      <div class="textbox-container">
      <input type="email" id="email" name="Email" class="textbox" placeholder="Email Address:" >
      <input type="tel" id="phone" name="phoneNumber" class="textbox" placeholder="Phone Number:" ></div>
      <br><br>

      <label class="modified">Skill List:</label>
      <p class="modified-skill">
      <input type="checkbox" name="skill1" value="Programming"> Programming <br>
      <input type="checkbox" name="skill2" value="Systems and networks"> Systems and networks <br>
      <input type="checkbox" name="skill3" value="Data analysis"> Data analysis <br>
      <input type="checkbox" name="other" value="other"> Other Skills <br></p><br>

      <label for="otherSkills" class="modified">Other Skills:</label><br>
      <div class="place">
      <textarea class="skill" id="otherSkills" rows="3" cols="50" name="otherSkills"></textarea>
      </div><br><br>

      <p class="submit">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
      </p>
  </form>
  <!-- End Main -->

 

  </main><!-- End #main -->
  <?php 
        require_once "footer.inc";
       
    ?>
  

  
</body>
</html>
