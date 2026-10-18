<!doctype html>
<html lang ="en">

<head>
<title>Booking Confirmation</title>

</head>

<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>


    <?php

    function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    if (isset($_POST["firstname"])) {
        $err_msg="";
        $first_name = $_POST["firstname"];
        $last_name = $_POST["lastname"];
        $age = $_POST["age"];
        $date = $_POST["bookday"];
        $partysize = $_POST["partysize"];
    

        if (trim($first_name)=="") 
                    $err_msg .= "<p>Please enter first name. </p>";
        else {
            $first_name = sanitise_input($first_name);
            if (!preg_match("/^[a-zA-Z ]{2,40}$/", $first_name)){
                $err_msg .= "<p>Only letters are allowed in first name.</p>";
            }
        }

        if (trim($last_name)=="")
            $err_msg .= "<p>Please enter last name. </p>";
        else {
            $last_name = sanitise_input($last_name);
            if (!preg_match("/^[a-zA-Z ]{2,40}$/", $last_name)){
                $err_msg .= "<p>Only letters are allowed in last name.</p>";
            }
        }


        if (trim($age)=="")
            $err_msg .= "<p>Please enter first name. </p>";
        else {
                $age = sanitise_input($age);
                if (!preg_match("/^[0-9]{1,2}$/", $age)){
                    $err_msg .= "<p>Only numbers are allowed in age.</p>";
                }
        }

        if (trim($partysize)=="")
            $err_msg .= "<p>Please enter party size. </p>";
        else {
                $partysize = sanitise_input($partysize);
                if (!preg_match("/^[0-9]{1,2}$/", $partysize)){
                    $err_msg .= "<p>Only numbers are allowed in partysize.</p>";
                }
        }

        if (trim($date)=="")
            $err_msg .= "<p>Please enter the date. </p>";
        else {
                $date = sanitise_input($date);
                if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)){
                    $err_msg .= "<p>please set a valid date</p>";
                }
        }

        if (!isset($_POST["accom"]))
            $err_msg .= "<p>Please select your accomadation.</p>";
        else
                 $accom = sanitise_input($_POST["accom"]);

        if (!isset($_POST["4day"]))
            $err_msg .= "<p>Please select your tour number of days.</p>";
        else
                $tour4day = sanitise_input($_POST["4day"]);

        if (!isset($_POST["10day"]))
            $err_msg .= "<p>Please select your tour number of days.</p>";
        else
                $tour10day = sanitise_input($_POST["10day"]);

         if (!isset($_POST["food"]))
            $err_msg .= "<p>Please select your tour number of days.</p>";
        else
                $food = sanitise_input($_POST["food"]);

        // display error msg or welcome info
        if ($err_msg!="")
            echo $err_msg;
        else {
            echo "Welcome $first_name $last_name!<br>";
            echo "You are booked now on the Ten-day tour and Four-day tour <br>";
            echo "Age: $age<br>";
            echo "Meal Preference:$food<br>";
            echo "Number of Travellers: $partysize<br>";
        }
    }
    else {
        header("location:Register.html"); //redirect to the form 
    }
    ?>

</body>