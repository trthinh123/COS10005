<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creating Web Applications">
    <meta name="keyword" content="HTML, CSS, Javascript">
    <meta name="author" content="Group">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" >
    <title>Index</title>

  <!-- Template Main CSS File -->
  <link href="Styles/main.css" rel="stylesheet">
  <link rel="stylesheet" href="Styles/about.css">
</head>

<body>
    <?php 
        require_once "header.inc";
       
    ?>

  
  <!--information-->
  <dl>
    <div class="hr-line">
      <dt>Group name</dt>
      <dd>1080 px</dd>
  </div>
  <div class="hr-line">
      <dt>Group ID</dt>
      <dd></dd>
  </div>
  <div class="hr-line">
      <dt>Tutor's name</dt>
      <dd>Eric Le</dd>
  </div>
  <div class="hr-line" id="group">
      <dt>Course we are doing</dt>
      <dd id="course">COS10026 - Computing Technology Inquiry Project</dd>
  </div>
  </dl>
  <!--timetable-->
  <div style="overflow-x:auto;">
    <table>
      <caption>Timetable</caption>
      <thead>
        <tr>
          <th>8:00 AM</th>
          <th>9:00 AM - 11:00 AM</th>
          <th>11:30 PM</th>
          <th>12:00 PM</th>
          <th>13:00 PM - 17:00 PM</th>
          <th>18:00 PM</th>
          <th>19:00 PM</th>
          <th>20:00 PM - 22:00 PM</th>
        </tr>
      </thead>
      <Tbody>
          <tr>
              <td>Breakfast</td>
              <td>Study</td>
              <td>Lunch</td>
              <td>Sleep</td>
              <td>Study</td>
              <td>Eat dinner</td>
              <td>Break time</td>
              <td>Homework</td>
          </tr>
      </Tbody>
    </table>
  </div>
<!--favorite-->
  <main>
    <div class="section-header">
      <h3>About our group</h3>
    </div>
    <section class="member">
      <img class="image" src="Images/blanksvg.svg" alt="trang">
      <h4>Chi</h4>
      <ul>
        <li>Norwegian Wood (book)</li>
        <li>K-pop (music)</li>
        <li>Blue Lock (movie)</li>
      </ul>
    </section>
    <section class="member">
      <img class="image" src="Images/blanksvg.svg" alt="trang">
      <h4>Thinh</h4>
      <ul>
        <li>Win People's Hearts (book)</li>
        <li>Maroon 5 Music (music)</li>
        <li>Greyhounds 2020 (movie)</li>
      </ul>
    </section>
    <section class="member">
      <img class="image" src="Images/blanksvg.svg" alt="trang">
      <h4>Long</h4>
      <ul>
        <li>The Invisible Guest (movie) </li>
        <li>Henna ie (book)</li>
        <li>Nightcore (music)</li>
      </ul>
      </section>
      <section class="member">
        <img class="image" src="Images/blanksvg.svg" alt="trang">
        <h4>Trang</h4>
        <ul>
          <li>The King's Man</li>
          <li>Olympus Has Fallen (2013)</li>
          <li>Wreck It Ralph</li>
        </ul>
      </section>
  </main>
  <?php 
       
        require_once "footer.inc";
    ?>
  
  
</body>
</html>

