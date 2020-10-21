<?php

//Connections required
require_once('AfricasTalkingGateway.php');
require_once('config.php');
require_once('dbConnect.php');

//receives the POSTs from AT
$sessionId = $_POST['sessionId'];
$serviceCode = $_POST['serviceCode'];
$phoneNumber = $_POST['phoneNumber'];
$text = $_POST['text'];

$textArray = explode('*', $text);
$userResponse = trim(end($textArray));

$level = 0;

$sqlLv = "SELECT level FROM session_levels where session_id ='" . $sessionId . " '";
$levelQuery = $db->query($sqlLv);
if ($resultLv = $levelQuery->fetch_assoc()) {
    $level = $resultLv['level'];
}

$sqlCheckUser = "SELECT * FROM students WHERE phoneNumber LIKE '%" . $phoneNumber . "%' LIMIT 1";
$userQuery = $db->query($sqlCheckUser);
$userAvailability = $userQuery->fetch_assoc();

if ($userAvailability && $userAvailability['name'] != NULL && $userAvailability['regNumber'] != NULL) {

    if ($level == 0 || $level == 1) {
        switch ($userResponse) {
            case "":
                if ($level == 0) {

                    $sqluserLvl = "INSERT INTO `session_levels`(`session_id`,`phoneNumber`,`level`) VALUES('" . $sessionId . "','" . $phoneNumber . "',1)";
                    $resultsUserLvl = mysqli_query($db, $sqluserLvl);

                    $response = "CON Welcome.: " . $userAvailability['name'] . "\n Reg. Number.: " . $userAvailability['regNumber'] . "\n ";
                    $response .= "1) My Information \n";
                    $response .= " 2) Coursework \n";
                    $response .= " 3) Examination Results\n";
                    $response .= " 4) Payment & Fees \n";
                    $response .= " 5) Exit\n";




                    header('Content-type: text/plain');
                    echo $response;
                }
                break;



            case "0":
                if ($level == 0) {

                    $sqluserLvl1 = "INSERT INTO `session_levels`(`session_id`,`phoneNumber`,`level`) VALUES('" . $sessionId . "','" . $phoneNumber . "',1)";
                    $resultsUserLvl1 = mysqli_query($db, $sqluserLvl1);

                    $response = "CON Welcome.: " . $userAvailability['name'] . "\n Reg. Number.: " . $userAvailability['regNumber'] . "\n ";
                    $response .= "1) My Information \n";
                    $response .= " 2) Coursework \n";
                    $response .= " 3) Examination Results\n";
                    $response .= " 4) Payment & Fees \n";
                    $response .= " 5) Exit\n";



                    header('Content-type: text/plain');
                    echo $response;
                }
                break;


            


            case "1":
                if ($level == 1) {

                    $response = "CON MY INFORMATION \n";
                    $sql3 = "SELECT * FROM students WHERE phoneNumber='$phoneNumber'";
                    $result3 = mysqli_query($db, $sql3);
                    $checkData = mysqli_num_rows($result3);

                    while ($row3 = mysqli_fetch_array($result3)) {
                        $name3 = $row3['name'];
                        $sur3 = $row3['surName'];
                        $date3 = $row3['dateBirth'];
                        $sex3 = $row3['sex'];
                        $form = $row3['program'];
                        $reg = $row3['regNumber'];
                        $phone = $row3['phoneNumber'];
                    }
                    if ($checkData == 0) {
                        $response = "CON Information for provided Phone Number does not exist.\n";
                    } elseif ($checkData == 1) {


                        $response .= "First Name: " . $name3 . "\n";
                        $response .= "Surname: " . $sur3 . "\n";
                        $response .= "Date of Birth: " . $date3 . "\n";
                        $response .= "Sex: " . $sex3 . "\n";
                        $response .= "Program: " . $form . "\n";
                        $response .= "Reg. Number: " . $reg . "\n";
                        $response .= "Phone Number: " . $phone . "\n";
                        $response .= "00 to go Back\n";

                        $sqlLevelDemote = "UPDATE `session_levels` SET `level`=0 where `session_id`='" . $sessionId . "'";
                        $db->query($sqlLevelDemote);
                    }


                    header('Content-type: text/plain');
                    echo $response;
                }
                break;


            case "2":
                if ($level == 1) {

                    $response = "CON Are you sure, you want to view your current coursework?\n";
                    $response .= "1) Yes \n";
                    $response .= "2) No \n";





                    $sqlLvl2 = "UPDATE `session_levels` SET `level`=8 where `session_id`='" . $sessionId . "'";
                    $db->query($sqlLvl2);

                    header('Content-type: text/plain');
                    echo $response;
                }
                break;


            case "3":
                if ($level == 1) {

                    $response = "CON Examination Results - Year 19/20\n";
                    $response .= "1) Semester One\n";
                    $response .= "2) Semester Two\n";
                    $response .= "3) General\n";



                    $sqlLvl3 = "UPDATE `session_levels` SET `level`=7 where `session_id`='" . $sessionId . "'";
                    $db->query($sqlLvl3);

                    header('Content-type: text/plain');
                    echo $response;
                }
                break;

            case "4":
                if ($level == 1) {

                    $response = "CON Payment & Fees \n";
                    $response .= "1) Fee Status \n";





                    $sqlLvl3 = "UPDATE `session_levels` SET `level`=9 where `session_id`='" . $sessionId . "'";
                    $db->query($sqlLvl3);

                    header('Content-type: text/plain');
                    echo $response;
                }
                break;





            case "5":
                if ($level == 1) {
                    $response = "END Thank you for using MoCU USSD App.\n";


                    header('Content-type: text/plain');
                    echo $response;
                }
                break;









            default:
                if ($level == 1) {

                    $response = "CON Please, you have to choose a service.\n";
                    $response .= "*Press 00 to Main Menu.\n";

                    $sqlLevelDemote = "UPDATE `session_levels` SET `level`=00 where `session_id`='" . $sessionId . "'";
                    $db->query($sqlLevelDemote);


                    header('Content-type: text/plain');
                    echo $response;
                }
        }
    } else {
        switch ($level) {
            case 7:
                switch ($userResponse) {
                    case "1":
                        $sqlAd1 = "SELECT * FROM students WHERE phoneNumber LIKE '%" . $phoneNumber . "%' LIMIT 1";
                        $resultsAd1 = mysqli_query($db, $sqlAd1);
                        $resultsCheckSt = mysqli_num_rows($resultsAd1);
                        while ($rowAd1 = mysqli_fetch_array($resultsAd1)) {
                            $Adm1 = $rowAd1['regNumber'];
                            $phone = $rowAd1['phoneNumber'];
                        }
                        if ($resultsCheckSt == 0) {
                            $response = "END Your Information doesn't exist or Match with your Phone Number.";
                        } elseif ($resultsCheckSt == 1) {


                            $sqlResults = "SELECT * FROM results_one WHERE regNumber = '" . $Adm1 . "'";
                            $results1 = mysqli_query($db, $sqlResults);
                            $Sname = $sAdmission = $cit300r = $cit306 = $cit307 = $cit307 = $cit308 = $cit309 = $cit310 = $gpa = '';
                            while ($rowR = mysqli_fetch_array($results1)) {
                                $Sname = $rowR['name'];
                                $sAdmission = $rowR['regNumber'];
                                $cit300r = $rowR['cit 300r'];
                                $cit306 = $rowR['cit 306'];
                                $cit307 = $rowR['cit 307'];
                                $cit308 = $rowR['cit 308'];
                                $cit309 = $rowR['cit 309'];
                                $cit310 = $rowR['cit 310'];
                                $gpa = $rowR['gpa'];
                            }

                            $response = "CON SEMESTER ONE RESULTS \n";

                            $response .= "CIT 300R: " . $cit300r . "\n";
                            $response .= "CIT 306: " . $cit306 . "\n";
                            $response .= "CIT 307: " . $cit307 . "\n";
                            $response .= "CIT 308: " . $cit308 . "\n";
                            $response .= "CIT 309: " . $cit309 . "\n";
                            $response .= "CIT 310: " . $cit310 . "\n";
                            $response .= "GPA: " . $gpa . "\n";
                            $response .= "00 Main Menu \n";

                            $sqlLevelDemote = "UPDATE `session_levels` SET `level`=0 where `session_id`='" . $sessionId . "'";
                            $db->query($sqlLevelDemote);
                        }

                        header('Content-type: text/plain');
                        echo $response;
                        break;


                    case "2":

                        $sqlAd1 = "SELECT * FROM students WHERE phoneNumber LIKE '%" . $phoneNumber . "%' LIMIT 1";
                        $resultsAd1 = mysqli_query($db, $sqlAd1);
                        $resultsCheckSt = mysqli_num_rows($resultsAd1);
                        while ($rowAd1 = mysqli_fetch_array($resultsAd1)) {
                            $Adm1 = $rowAd1['regNumber'];
                            $phone = $rowAd1['phoneNumber'];
                        }
                        if ($resultsCheckSt == 0) {
                            $response = "END Your Information doesn't exist or Match with your Phone Number";
                        } elseif ($resultsCheckSt == 1) {


                            $sqlResults = "SELECT * FROM results_two WHERE regNumber = '" . $Adm1 . "'";
                            $results1 = mysqli_query($db, $sqlResults);
                            $Sname = $sAdmission = $cit301 = $cit302 = $cit303 = $cit304 = $cit305 = $mal336i = $gpa = '';
                            while ($rowR = mysqli_fetch_array($results1)) {
                                $Sname = $rowR['name'];
                                $sAdmission = $rowR['regNumber'];
                                $cit301 = $rowR['cit 301'];
                                $cit302 = $rowR['cit 302'];
                                $cit303 = $rowR['cit 303'];
                                $cit304 = $rowR['cit 304'];
                                $cit305 = $rowR['cit 305'];
                                $mal336i = $rowR['mal 336i'];
                                $gpa = $rowR['gpa'];
                            }

                            $response = "CON SEMESTER TWO RESULTS \n";
                            $response .= "CIT 301: " . $cit301 . "\n";
                            $response .= "CIT 302: " . $cit302 . "\n";
                            $response .= "CIT 303: " . $cit303 . "\n";
                            $response .= "CIT 304: " . $cit304 . "\n";
                            $response .= "CIT 305: " . $cit305 . "\n";
                            $response .= "MAL 336I: " . $mal336i . "\n";
                            $response .= "GPA: " . $gpa . "\n";
                            $response .= "00 Main Menu.";

                            $sqlLevelDemote = "UPDATE `session_levels` SET `level`=0 where `session_id`='" . $sessionId . "'";
                            $db->query($sqlLevelDemote);
                        }

                        header('Content-type: text/plain');
                        echo $response;
                        break;
                    case "3":

                        $sqlAd1 = "SELECT * FROM students WHERE phoneNumber LIKE '%" . $phoneNumber . "%' LIMIT 1";
                        $resultsAd1 = mysqli_query($db, $sqlAd1);
                        $resultsCheckSt = mysqli_num_rows($resultsAd1);
                        while ($rowAd1 = mysqli_fetch_array($resultsAd1)) {
                            $Adm1 = $rowAd1['regNumber'];
                            $phone = $rowAd1['phoneNumber'];
                        }
                        if ($resultsCheckSt == 0) {
                            $response = "END Your Information doesn't exist or Match with your Phone Number";
                        } elseif ($resultsCheckSt == 1) {


                            $sqlResults = "SELECT * FROM general WHERE regNumber = '" . $Adm1 . "'";
                            $results1 = mysqli_query($db, $sqlResults);
                            $Sname = $sAdmission = $sem1 = $sem2 = $gpa = '';
                            while ($rowR = mysqli_fetch_array($results1)) {
                                $Sname = $rowR['name'];
                                $sAdmission = $rowR['regNumber'];
                                $sem1 = $rowR['semester1'];
                                $sem2 = $rowR['semester2'];
                                $gpa = $rowR['cumulative'];
                            }

                            $response = "CON GENERAL RESULTS - 2019/20  \n";
                            $response .= "Semester 1 GPA: " . $sem1 . "\n";
                            $response .= "Semester 2 GPA: " . $sem2 . "\n";
                            $response .= "CUMULATIVE YEAR GPA: " . $gpa . "\n";
                            $response .= "00 Main Menu \n";


                            $sqlLevelDemote = "UPDATE `session_levels` SET `level`=0 where `session_id`='" . $sessionId . "'";
                            $db->query($sqlLevelDemote);
                        }

                        header('Content-type: text/plain');
                        echo $response;
                        break;
                }
                break;

            case 8:
                switch ($userResponse) {
                    case "1":

                        $sqlAd1 = "SELECT * FROM students WHERE phoneNumber LIKE '%" . $phoneNumber . "%' LIMIT 1";
                        $resultsAd1 = mysqli_query($db, $sqlAd1);
                        $resultsCheckSt = mysqli_num_rows($resultsAd1);
                        while ($rowAd1 = mysqli_fetch_array($resultsAd1)) {
                            $Adm1 = $rowAd1['regNumber'];
                            $phone = $rowAd1['phoneNumber'];
                        }
                        if ($resultsCheckSt == 0) {
                            $response = "END Your Information doesn't exist or Match with your Phone Number";
                        } elseif ($resultsCheckSt == 1) {


                            $sqlResults = "SELECT * FROM coursework WHERE regNumber = '" . $Adm1 . "'";
                            $results1 = mysqli_query($db, $sqlResults);
                            $Sname = $sAdmission = $cit301 = $cit302 = $cit303 = $cit304 = $cit305 = $mal336i = '';
                            while ($rowR = mysqli_fetch_array($results1)) {
                                $Sname = $rowR['name'];
                                $sAdmission = $rowR['regNumber'];
                                $cit301 = $rowR['cit 301'];
                                $cit302 = $rowR['cit 302'];
                                $cit303 = $rowR['cit 303'];
                                $cit304 = $rowR['cit 304'];
                                $cit305 = $rowR['cit 305'];
                                $mal336i = $rowR['mal 336i'];
                            }

                            $response = "CON COURSEWORK - 2019/20 \n";
                            $response .= "CIT 301: " . $cit301 . "\n";
                            $response .= "CIT 302: " . $cit302 . "\n";
                            $response .= "CIT 303: " . $cit303 . "\n";
                            $response .= "CIT 304: " . $cit304 . "\n";
                            $response .= "CIT 305: " . $cit305 . "\n";
                            $response .= "MAL 336I: " . $mal336i . "\n";
                            $response .= "00 Main Menu \n";


                            $sqlLevelDemote = "UPDATE `session_levels` SET `level`=0 where `session_id`='" . $sessionId . "'";
                            $db->query($sqlLevelDemote);
                        }

                        header('Content-type: text/plain');
                        echo $response;
                        break;

                    case "2":

                        $response = "END Thank you for using MoCU USSD App.";

                        header('Content-type: text/plain');
                        echo $response;
                        break;
                }
                break;

            case 9:
                switch ($userResponse) {
                    case "1":


                        $nameF = $admissionF = $formF = $feeAmt = $feePaid = $balance = $faculty = $credit3 = '';


                        $sqlFee = "SELECT * FROM fee_status WHERE phoneNumber LIKE '%" . $phoneNumber . "%' LIMIT 1";
                        $resultFee = mysqli_query($db, $sqlFee);


                        $checkUser = mysqli_num_rows($resultFee);
                        while ($rowFee = mysqli_fetch_array($resultFee)) {
                            $nameF = $rowFee['name'];
                            $admissionF = $rowFee['phoneNumber'];
                            $formF = $rowFee['regNumber'];
                            $feeAmt = $rowFee['tuitionFee'];
                            $feePaid = $rowFee['medicalFee'];
                            $balance = $rowFee['tcuQuality'];
                            $faculty = $rowFee['facultyDepreciation'];
                            $credit3 = $rowFee['credit'];
                        }
                        if ($checkUser == 0) {
                            $response = "END Your Information doesn't exist or Match with your Phone Number.";
                        } elseif ($checkUser == 1) {

                            $response = "END FEE STATUS - YEAR 19/20:\n";
                            $response .= "Name:  " . $nameF . "\n";
                            $response .= "Tuition Fee:  " . $feeAmt . "\n";
                            $response .= "Medical Fee:  " . $feePaid . "\n";
                            $response .= "Quality Assurance:  " . $balance . "\n";
                            $response .= "Faculty Depreciation:  " . $faculty . "\n";

                            $response .= "Credit:  " . $credit3 . "\n";
                        }
                        header('Content-type: text/plain');
                        echo $response;
                }
                break;
        }
    }
} 