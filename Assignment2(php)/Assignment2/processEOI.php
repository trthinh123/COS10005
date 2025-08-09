<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Process EOI Records" />
    <meta name="keywords" content="Database, MySQL, PHP, Server, Data _validation, EOI" />
    <meta name="author" content="Doan Nhat Long" />
	<link rel="stylesheet" href="Styles/main.css">
    <title>EOI Submission Confirmation</title>
</head>

<body>
    
    <h1>EOI Submission Confirmation</h1>
    <?php

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header("HTTP/1.0 403 Forbidden");
		exit("Direct access to this page is not allowed.");
	}

    require_once("settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    
	if (!$conn) {
		// Connection was not successful

		echo "<p>Database connection failure</p>";

	} else {
		// Check if the 'eoi' table exists
        $tableExistsQuery = "SHOW TABLES LIKE 'eoi'";
        $result = mysqli_query($conn, $tableExistsQuery);

        if (mysqli_num_rows($result) === 0) {
            // Create the 'eoi' table if it doesn't exist
            $createTableQuery = "CREATE TABLE `eoi` (
                `EOInumber` INT AUTO_INCREMENT PRIMARY KEY,
                `JobReference` VARCHAR(5) NOT NULL,
                `FirstName` VARCHAR(20) NOT NULL,
                `LastName` VARCHAR(20) NOT NULL,
                `StreetAddress` VARCHAR(40) NOT NULL,
                `SuburbTown` VARCHAR(40) NOT NULL,
                `State` VARCHAR(3) NOT NULL,
                `Postcode` CHAR(4) NOT NULL,
                `EmailAddress` VARCHAR(100) NOT NULL,
                `PhoneNumber` VARCHAR(12) NOT NULL,
                `Skill1` VARCHAR(50) NOT NULL,
                `Skill2` VARCHAR(50) NOT NULL,
                `Skill3` VARCHAR(50) NOT NULL,
                `OtherSkills` TEXT,
                `status` ENUM('New', 'Current', 'Final')
            )";

            if (mysqli_query($conn, $createTableQuery)) {

                echo "Table 'eoi' created successfully.";

            } else {

                echo "Error creating table: " . mysqli_error($conn);

            }
        }

		// Get the maximum ID from the table
		$query = "SELECT MAX(`EOInumber`) AS max_id FROM `eoi`";
		$result = mysqli_query($conn, $query);
	
		if (!$result) {

			echo "Error: " . mysqli_error($conn);

		} else {
			$row = mysqli_fetch_assoc($result);
			$max_id = $row['max_id'];
	
			// Calculate the next ID
			$generated_id = $max_id + 1;
	
			// Check if there are any gaps in the sequence
			$query = "SELECT `EOInumber` FROM `eoi` WHERE `EOInumber` = ?";
			$stmt = mysqli_prepare($conn, $query);
			mysqli_stmt_bind_param($stmt, "i", $generated_id);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
	
			if (!$result) {

				echo "Error: " . mysqli_error($conn);

			} else {
				if (mysqli_num_rows($result) > 0) {
					// There is a record with the generated ID, find the next available ID
					$query = "SELECT `EOInumber` FROM `eoi` WHERE `EOInumber` > ? ORDER BY `EOInumber` ASC";
					$stmt = mysqli_prepare($conn, $query);
					mysqli_stmt_bind_param($stmt, "i", $generated_id);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
	
					if (!$result) {

						echo "Error: " . mysqli_error($conn);

					} else {
						while ($row = mysqli_fetch_assoc($result)) {
							if ($row['EOInumber'] != $generated_id) {
								break;
							}
							$generated_id++;
						}
					}
				}}
		echo "<p>Your identification number is $generated_id. We will review your application as soon as possible.</p>";

		
		function sanitise_input($data, $conn)
    	{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;
    	}

        $job_ref = sanitise_input($_POST['jobReference'], $conn);
        $firstname = sanitise_input($_POST['firstName'], $conn);
        $lastname = sanitise_input($_POST['lastName'], $conn);
		$dob = sanitise_input($_POST['DoB'], $conn);
        $street = sanitise_input($_POST['streetAddress'], $conn);
        $suburb = sanitise_input($_POST['suburbTown'], $conn);
        $state = sanitise_input($_POST['state'], $conn);
        $postcode = sanitise_input($_POST['postcode'], $conn);
        $email = sanitise_input($_POST['Email'], $conn);
        $phone = sanitise_input($_POST['phoneNumber'], $conn);
        $skill1 = isset($_POST['skill1']) ? sanitise_input($_POST['skill1'], $conn) : '';
		$skill2 = isset($_POST['skill2']) ? sanitise_input($_POST['skill2'], $conn) : '';
		$skill3 = isset($_POST['skill3']) ? sanitise_input($_POST['skill3'], $conn) : '';
		$other = isset($_POST['other']) ? sanitise_input($_POST['other'], $conn) : '';

		// Validate the required fields
		$errors = [];
		if (empty($job_ref)) {
			$errors[] = "Job reference number is required.";
		} elseif (!preg_match('/^[A-Za-z0-9]{5}$/', $job_ref)) {
			$errors[] = "Job reference number must be exactly 5 alphanumeric characters.";
		}

		if (empty($firstname)) {
			$errors[] = "First name is required.";
		} elseif (!preg_match('/^[A-Za-z]{1,20}$/', $firstname)) {
			$errors[] = "First name must contain maximum 20 alphabetical characters.";
		}

		if (empty($lastname)) {
			$errors[] = "Last name is required.";
		} elseif (!preg_match('/^[A-Za-z]{1,20}$/', $lastname)) {
			$errors[] = "Last name must contain maximum 20 alphabetical characters.";
		}

		if (empty($street)) {
			$errors[] = "Street address is required.";
		} elseif (strlen($street) > 40) {
			$errors[] = "Street address must contain maximum 40 characters.";
		}

		if (empty($suburb)) {
			$errors[] = "Suburb/town is required.";
		} elseif (strlen($suburb) > 40) {
			$errors[] = "Suburb/town must contain maximum 40 characters.";
		}

		if (empty($state)) {
			$errors[] = "State is required.";
		} elseif (!in_array($state, ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'])) {
			$errors[] = "Invalid state selected.";
		}

		if (empty($postcode)) {
			$errors[] = "Postcode is required.";
		} elseif (!preg_match('/^\d{4}$/', $postcode)) {
			$errors[] = "Postcode must be exactly 4 digits.";
		} elseif ($state === 'VIC' && substr($postcode, 0, 1) !== '3') {
			$errors[] = "Postcode does not match the selected state.";
		} elseif ($state === 'NSW' && substr($postcode, 0, 1) !== '2') {
			$errors[] = "Postcode does not match the selected state.";
		} elseif ($state === 'QLD' && substr($postcode, 0, 1) !== '4') {
			$errors[] = "Postcode does not match the selected state.";
		} elseif ($state === 'NT' && substr($postcode, 0, 1) !== '0') {
			$errors[] = "Postcode does not match the selected state.";
		} elseif ($state === 'WA' && substr($postcode, 0, 1) !== '6') {
			$errors[] = "Postcode does not match the selected state.";
		} elseif ($state === 'SA' && substr($postcode, 0, 1) !== '5') {
			$errors[] = "Postcode does not match the selected state.";
		} elseif ($state === 'TAS' && substr($postcode, 0, 1) !== '7') {
			$errors[] = "Postcode does not match the selected state.";
		} elseif ($state === 'ACT' && substr($postcode, 0, 1) !== '0') {
			$errors[] = "Postcode does not match the selected state.";
		}

		if (empty($email)) {
			$errors[] = "Email address is required.";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Invalid email address format.";
		}

		if (empty($phone)) {
			$errors[] = "Phone number is required.";
		} elseif (!preg_match('/^\d{8,12}$/', $phone)) {
			$errors[] = "Phone number must contain 8 to 12 digits.";
		}

		if (empty($dob)) {
			$errors[] = "Date of birth is required.";
		} else {
			$date_parts = explode('/', $dob);
			if (count($date_parts) !== 3) {
				$errors[] = "Invalid date of birth format. Please use dd/mm/yyyy format.";
			} else {
				$day = intval($date_parts[0]);
				$month = intval($date_parts[1]);
				$year = intval($date_parts[2]);
				
				// Check if date is valid
				if (!checkdate($month, $day, $year)) {
					$errors[] = "Invalid date of birth.";
				} else {
					// Calculate age based on date of birth
					$currentYear = date('Y');
					$age = $currentYear - $year;
					
					// Check if age is within the specified range
					if ($age < 15 || $age > 80) {
						$errors[] = "Age must be between 15 and 80.";
					}
				}
			}
		}

		if (isset($_POST['other']) && empty($_POST['otherSkills'])) {
			$errors[] = "Other skills cannot be empty if the checkbox is selected.";
		} elseif (!isset($_POST['other']) && !empty($_POST['otherSkills'])) {
			$errors[] = "You should select Other Skills if you want to write in the text box.";
		}

        if (empty($errors)) {
			$other = isset($_POST['otherSkills']) ? $_POST['otherSkills'] : '';
			$status = "New";
		
			$query = "INSERT INTO `eoi` (`EOInumber`, `JobReference`, `FirstName`, `LastName`, `StreetAddress`, `SuburbTown`, `State`, `Postcode`, `EmailAddress`, `PhoneNumber`, `Skill1`, `Skill2`, `Skill3`, `OtherSkills`, `Status`)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
			$stmt = mysqli_prepare($conn, $query);
			mysqli_stmt_bind_param($stmt, "issssssisssssss", $generated_id, $job_ref, $firstname, $lastname, $street, $suburb, $state, $postcode, $email, $phone, $skill1, $skill2, $skill3, $other, $status);
		
			$result = mysqli_stmt_execute($stmt);

			if ($result) {
				echo "<p class=\"ok\">Thank you for submitting your expression of interest</p>";
			} else {
				if ($result = true) // Enhancements but not done because my friend don't want to do it
				{
					echo "<p class=\"wrong\">Something is wrong with", $query, "</p>";
				} else {
					echo "<p class=\"wrong\">An error occurred. Please try again later.</p>";
				}
			}
		
			mysqli_stmt_close($stmt);
		} else {
			echo "<h2>Error:</h2>";
			foreach ($errors as $error) {
				echo "<p>$error</p>";
			}
		}
		
		mysqli_close($conn);
    }}
    ?>
</body>

</html>