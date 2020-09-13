<?php
require 'database.php';
class Profile{
    public function createProfile($user_id,$profession,$company,$website,$location,$skills,$githubusername,$bio,$twitter,$facebook,$youtube,$linkedin,$instagram){
        try{
            $db = DB();
            $query = $db->prepare("INSERT INTO user_profile(user_id,profession,company,website,location,skills,githubusername,bio,twitter,facebook,youtube,linkedin,instagram) VALUES(:user_id,:profession,:company,:website,:location,:skills,:githubusername,:bio,:twitter,:facebook,:youtube,:linkedin,:instagram)");
            $query->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $query->bindParam("profession", $profession, PDO::PARAM_STR);
            $query->bindParam("company", $company, PDO::PARAM_STR);
            $query->bindParam("website", $website, PDO::PARAM_STR);
            $query->bindParam("location", $location, PDO::PARAM_STR);
            $query->bindParam("skills", $skills, PDO::PARAM_STR);
            $query->bindParam("githubusername", $githubusername, PDO::PARAM_STR);
            $query->bindParam("bio", $bio, PDO::PARAM_STR);
            $query->bindParam("twitter", $twitter, PDO::PARAM_STR);
            $query->bindParam("facebook", $facebook, PDO::PARAM_STR);
            $query->bindParam("youtube", $youtube, PDO::PARAM_STR);
            $query->bindParam("linkedin", $linkedin, PDO::PARAM_STR);
            $query->bindParam("instagram", $instagram, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();

        }catch(PDOException $e){
            echo "Error is :" .$e->getMessage();
            exit($e->getMessage());
        }
    }

    public function readProfile($user_id){
        try{
            $db= DB();
            $query =$db->prepare("SELECT * FROM user_profile WHERE user_id=:user_id");
            $query->bindValue("user_id",$user_id, PDO::PARAM_INT);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }

        }catch(PDOException $e){
            echo "Error is :" .$e->getMessage();
            exit($e->getMessage());
        }
    }
}
?>