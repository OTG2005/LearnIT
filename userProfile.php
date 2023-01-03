<?php
require 'Header.php';
?>
<head>
    <link rel="stylesheet" type="text/css" href="./css/userProfile.css">
</head>
<div class="main">
    <table class="userInfoTable">
        <tr>
            <td class="shading">
                <div class="personalInfo">Personal Information</div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="generalText">Name: <?php if(isset($_SESSION['userId'])){echo'<divclass="generalText" style="word-spacing:0;display:inline">'.ucfirst($_SESSION['firstname']." ". ucfirst( $_SESSION['lastname'])).'</div>';}else{print"";}?>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="generalText">Birthdate:
                    <?php 
                        if (isset($_SESSION['userId'])) {
                            echo ucfirst($_SESSION['birthdate']);
                        }
                        else {print "";}
                    ?>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="generalText">Nationality: 
                    <?php 
                        if (isset($_SESSION['userId'])) {
                            echo ucfirst($_SESSION['nationality']);
                        }
                        else {print "";}
                    ?>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="generalText">Gender:
                    <?php 
                        if (isset($_SESSION['userId'])) {
                            echo ucfirst($_SESSION['gender']);
                        }
                        else {print "";}
                    ?>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div class="generalText" style="word-spacing: 0;">Phone Number:
                    <?php 
                        if (isset($_SESSION['userId'])) {
                                echo '<div class="generalText" style="padding:5px;display:inline">'.($_SESSION['phonenumber']).'</div>';
                        }
                        else {echo "";}
                    ?>
                </div>
            </td>
        </tr>

    </table>
</div>