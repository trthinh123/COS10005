<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Assign2">
    <meta name="keyword" content="PHP, MySQL">
    <link rel="stylesheet" href="Styles/main.css">
    <title></title>
</head>
<body>
<?php 
        require_once "header.inc";
        
    ?>
    <h1></h1>
    <form method="post">
    <fieldset><legend>Job Details</legend>
		<p class="row">	<label for="job_reference_number">Job Reference Number: </label>
			<input type="text" name="job_reference_number" id="job_reference_number" /></p>
		<p class="row">	<label for="first_name">First Name: </label>
			<input type="text" name="first_name" id="first_name" /></p>
		<p class="row">	<label for="last_name">Last Name: </label>
			<input type="text" name="last_name" id="last_name" /></p>
		<p>	<input type="submit" name="search" value="Search"/>
            <input type="submit" name="delete" value="Delete"/></p>
	</fieldset>
    </form>
    <?php
         
        function sanitise_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
       
        require_once("settings.php");
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (isset($_POST["search"])){
            $job_reference_number = sanitise_input($_POST["job_reference_number"]);
            $first_name = sanitise_input($_POST["first_name"]);
            $last_name = sanitise_input($_POST["last_name"]);
            $condition = "";
			if ($job_reference_number != ""){
                $condition .= "JobReference ='$job_reference_number'";
            }		
			if ($first_name != ""){
				if ($condition != ""){
                    $condition .= "and FirstName='$$first_name'";
                }
				else{
                    $condition .= "FirstName='$first_name'";
                }
			}
			if ($last_name != ""){
				if ($condition != ""){
                    $condition .= "and LastName='$last_name'";
                }
				else{
                    $condition .= "LastName='$last_name'";
                }
			}
            if (!$conn){
                echo"<p>Database connection failure</p>";
            } else {
                $query = "SELECT * FROM eoi WHERE $condition ORDER BY EOInumber";
                if(!$stmt = $conn->prepare($query)){
                    echo "<p>Something is wrong with ", $query, "</p>";
                } else {
                    $stmt->execute();
                    $result = $stmt->get_result();
                    echo "<table border =\"1\">\n";
                    echo "<tr>\n "
                    ."<th scope=\"col\">Number</th>\n "
                    ."<th scope=\"col\">Job Reference Number</th>\n "
                    ."<th scope=\"col\">First Name</th>\n "
                    ."<th scope=\"col\">Last Name</th>\n "
                    ."<th scope=\"col\">Street Address</th>\n "
                    ."<th scope=\"col\">Suburb Town</th>\n "
                    ."<th scope=\"col\">State</th>\n "
                    ."<th scope=\"col\">Postcode</th>\n "
                    ."<th scope=\"col\">EmailAddress</th>\n "
                    ."<th scope=\"col\">Phone Number</th>\n "
                    ."<th scope=\"col\">Skill 1</th>\n "
                    ."<th scope=\"col\">Skill 2</th>\n "
                    ."<th scope=\"col\">Skill 3</th>\n "
                    ."<th scope=\"col\">Other skills</th>\n "
                    ."<th scope=\"col\">Status</th>\n "
                    ."</tr>\n ";
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr>\n ";
                        echo "<td>", $row["EOInumber"], "</td>\n ";
                        echo "<td>", $row["JobReference"], "</td>\n ";
                        echo "<td>", $row["FirstName"], "</td>\n ";
                        echo "<td>", $row["LastName"], "</td>\n ";
                        echo "<td>", $row["StreetAddress"], "</td>\n ";
                        echo "<td>", $row["SuburbTown"], "</td>\n ";
                        echo "<td>", $row["State"], "</td>\n ";
                        echo "<td>", $row["Postcode"], "</td>\n ";
                        echo "<td>", $row["EmailAddress"], "</td>\n ";
                        echo "<td>", $row["PhoneNumber"], "</td>\n ";
                        echo "<td>", $row["Skill1"], "</td>\n ";
                        echo "<td>", $row["Skill2"], "</td>\n ";
                        echo "<td>", $row["Skill3"], "</td>\n ";
                        echo "<td>", $row["OtherSkills"], "</td>\n ";
                        echo "<td><select name=\"status\" id=\"status\"> 
                            <option value=\"new\">New</option> 
                            <option value=\"current\">Current</option> 
                            <option value=\"final\">Final</option> 
                        </select></td>"; echo "</tr>\n ";
                        echo "</tr>\n ";
                    }
                    echo "</table>\n ";
                    $stmt->close();
                }
            }
        } else if(isset($_POST["delete"])){
            $job_reference_number = sanitise_input($_POST["job_reference_number"]);
            $first_name = sanitise_input($_POST["first_name"]);
            $last_name = sanitise_input($_POST["last_name"]);
            $condition = "";
			if ($job_reference_number != ""){
                $condition = "JobReference ='$job_reference_number'";
            }			
            if (!$conn){
                echo"<p>Database connection failure</p>";
            } else {
                $query = "DELETE * FROM eoi WHERE $condition ORDER BY EOInumber";
                if(!$stmt = $conn->prepare($query)){
                    echo "<p>Something is wrong with ", $query, "</p>";
                } else {
                    $stmt->execute();
                    $result = $stmt->get_result();
                    echo "<table border =\"1\">\n";
                    echo "<tr>\n "
                    ."<th scope=\"col\">Number</th>\n "
                    ."<th scope=\"col\">Job Reference Number</th>\n "
                    ."<th scope=\"col\">First Name</th>\n "
                    ."<th scope=\"col\">Last Name</th>\n "
                    ."<th scope=\"col\">Street Address</th>\n "
                    ."<th scope=\"col\">Suburb Town</th>\n "
                    ."<th scope=\"col\">State</th>\n "
                    ."<th scope=\"col\">Postcode</th>\n "
                    ."<th scope=\"col\">EmailAddress</th>\n "
                    ."<th scope=\"col\">Phone Number</th>\n "
                    ."<th scope=\"col\">Skill 1</th>\n "
                    ."<th scope=\"col\">Skill 2</th>\n "
                    ."<th scope=\"col\">Skill 3</th>\n "
                    ."<th scope=\"col\">Other skills</th>\n "
                    ."<th scope=\"col\">Status</th>\n "
                    ."</tr>\n ";
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr>\n ";
                        echo "<td>", $row["EOInumber"], "</td>\n ";
                        echo "<td>", $row["JobReference"], "</td>\n ";
                        echo "<td>", $row["FirstName"], "</td>\n ";
                        echo "<td>", $row["LastName"], "</td>\n ";
                        echo "<td>", $row["StreetAddress"], "</td>\n ";
                        echo "<td>", $row["SuburbTown"], "</td>\n ";
                        echo "<td>", $row["State"], "</td>\n ";
                        echo "<td>", $row["Postcode"], "</td>\n ";
                        echo "<td>", $row["EmailAddress"], "</td>\n ";
                        echo "<td>", $row["PhoneNumber"], "</td>\n ";
                        echo "<td>", $row["Skill1"], "</td>\n ";
                        echo "<td>", $row["Skill2"], "</td>\n ";
                        echo "<td>", $row["Skill3"], "</td>\n ";
                        echo "<td>", $row["OtherSkills"], "</td>\n ";
                        echo "<td><select name=\"status\" id=\"status\"> 
                            <option value=\"new\">New</option> 
                            <option value=\"current\">Current</option> 
                            <option value=\"final\">Final</option> 
                        </select></td>"; echo "</tr>\n ";
                        echo "</tr>\n ";
                    }
                    echo "</table>\n ";
                    $stmt->close();
                }
            }
        } else {
            $query = "SELECT * FROM eoi ORDER BY EOInumber";
            if(!$stmt = $conn->prepare($query)){
                echo "<p>Something is wrong with ", $query, "</p>";
            } else {
                $stmt->execute();
                $result = $stmt->get_result();
                echo "<table border =\"1\">\n";
                echo "<tr>\n "
                ."<th scope=\"col\">Number</th>\n "
                ."<th scope=\"col\">Job Reference Number</th>\n "
                ."<th scope=\"col\">First Name</th>\n "
                ."<th scope=\"col\">Last Name</th>\n "
                ."<th scope=\"col\">Street Address</th>\n "
                ."<th scope=\"col\">Suburb Town</th>\n "
                ."<th scope=\"col\">State</th>\n "
                ."<th scope=\"col\">Postcode</th>\n "
                ."<th scope=\"col\">EmailAddress</th>\n "
                ."<th scope=\"col\">Phone Number</th>\n "
                ."<th scope=\"col\">Skill 1</th>\n "
                ."<th scope=\"col\">Skill 2</th>\n "
                ."<th scope=\"col\">Skill 3</th>\n "
                ."<th scope=\"col\">Other skills</th>\n "
                ."<th scope=\"col\">Status</th>\n "
                ."</tr>\n ";
            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>\n ";
                echo "<td>", $row["EOInumber"], "</td>\n ";
                echo "<td>", $row["JobReference"], "</td>\n ";
                echo "<td>", $row["FirstName"], "</td>\n ";
                echo "<td>", $row["LastName"], "</td>\n ";
                echo "<td>", $row["StreetAddress"], "</td>\n ";
                echo "<td>", $row["SuburbTown"], "</td>\n ";
                echo "<td>", $row["State"], "</td>\n ";
                echo "<td>", $row["Postcode"], "</td>\n ";
                echo "<td>", $row["EmailAddress"], "</td>\n ";
                echo "<td>", $row["PhoneNumber"], "</td>\n ";
                echo "<td>", $row["Skill1"], "</td>\n ";
                echo "<td>", $row["Skill2"], "</td>\n ";
                echo "<td>", $row["Skill3"], "</td>\n ";
                echo "<td>", $row["OtherSkills"], "</td>\n ";
                echo "<td><select name=\"status\" id=\"status\"> 
                    <option value=\"new\">New</option> 
                    <option value=\"current\">Current</option> 
                    <option value=\"final\">Final</option> 
                </select></td>"; echo "</tr>\n ";
                echo "</tr>\n ";
                }
            echo "</table>\n ";
            $stmt->close();
            }
        }
        
    ?>
    
</body>
</html>