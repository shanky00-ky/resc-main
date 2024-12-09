<?php
include(".\conn.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $teamName = $_POST["teamName"];
    $coachName = $_POST["coachName"];
    $contactEmail = $_POST["contactEmail"];
    $contactPhone = $_POST["contactPhone"];
    $player1Name = $_POST["player1Name"];
    $player1Position = $_POST["player1Position"];
    $player2Name = $_POST["player2Name"];
    $player2Position = $_POST["player2Position"];
    $player3Name = $_POST["player3Name"];
    $player3Position = $_POST["player3Position"];
    $player4Name = $_POST["player4Name"];
    $player4Position = $_POST["player4Position"];
    $player5Name = $_POST["player5Name"];
    $player5Position = $_POST["player5Position"];
    $player6Name = $_POST["player6Name"];
    $player6Position = $_POST["player6Position"];
    $player7Name = $_POST["player7Name"];
    $player7Position = $_POST["player7Position"];
    
    if (!empty($teamName) && !empty($coachName) && !empty($contactEmail) && !empty($contactPhone) && 
        !empty($player1Name) && !empty($player1Position) && !empty($player2Name) && !empty($player2Position) && 
        !empty($player3Name) && !empty($player3Position) && !empty($player4Name) && !empty($player4Position) && 
        !empty($player5Name) && !empty($player5Position) && !empty($player6Name) && !empty($player6Position) && 
        !empty($player7Name) && !empty($player7Position)) {
        
        $sql = 'INSERT INTO m20_registrationform (m20_teamname, m20_coachname, m20_contactemail, m20_contactphone, 
                m20_player1name, m20_player1position, m20_player2name, m20_player2position, m20_player3name, 
                m20_player3position, m20_player4name, m20_player4position, m20_player5name, m20_player5position, 
                m20_player6name, m20_player6position, m20_player7name, m20_player7position) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $STMT = $conn->prepare($sql);
        if ($STMT === false) {
            die('Error preparing statement: ' . $conn->error);
        }

        $STMT->bind_param("ssssssssssssssssss", $teamName, $coachName, $contactEmail, $contactPhone, 
                          $player1Name, $player1Position, $player2Name, $player2Position, 
                          $player3Name, $player3Position, $player4Name, $player4Position, 
                          $player5Name, $player5Position, $player6Name, $player6Position, 
                          $player7Name, $player7Position);
        
        if ($STMT->execute()) {
            echo "<script>
            alert('Registration Done.');
            setTimeout(function() {
                window.location.href = 'registration.php';
            }, 1000); 
          </script>";
            exit();
        } else {
            die('Error executing statement: ' . $STMT->error);
        }
    } else {
        echo 'Please fill in all fields.';
    }
}
?>
<script src="..\scripts/overlay.js"></script>