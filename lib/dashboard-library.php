<?php
require 'database.php';
class Experience{
    public function addExperience($user_id, $job_title,$company, $location, $start_tdate, $end_date, $description,$current){
        //echo "user_id :" .$user_id.$job_title.$company.$location.$start_tdate.$end_date.$description;
        try{
            $db=DB();
            $db = DB();
            $query = $db->prepare("INSERT INTO experience(user_id,job_title,company,location,start_date,end_date,description,now_working) VALUES (:user_id,:job_title,:company,:location,:start_date,:end_date,:description,:current)");
            $query->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $query->bindParam("job_title", $job_title, PDO::PARAM_STR);
            $query->bindParam("company", $company, PDO::PARAM_STR);
            $query->bindParam("location", $location, PDO::PARAM_STR);
            $query->bindParam("start_date", $start_tdate, PDO::PARAM_STR);
            $query->bindParam("end_date", $end_date, PDO::PARAM_STR);
            $query->bindParam("description", $description, PDO::PARAM_STR);
            $query->bindParam("current", $current, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();

        }catch(PDOException $e){
            echo "Error is :" .$e->getMessage();
            exit($e->getMessage());
        }
    }

    public function readExperiences($user_id){
        try{
            $db = DB();
            $query = $db->prepare("SELECT * FROM experience WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id,PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            return $result;    

        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }
    public function deleteExperiences($experience_id){
        try{
            $db= DB();
            $query = $db->prepare("DELETE FROM experience WHERE experience_id=:experience_id");
            $query->bindParam(':experience_id',$experience_id);
            $query->execute();
                

        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }
    public function UserDetails($user_id)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id, name, username, email FROM users WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function addEducation($user_id, $school,$digree,$fieldofstudy,$start_date, $end_date,$description,$current){
        //echo "user_id :" .$user_id.$job_title.$company.$location.$start_tdate.$end_date.$description;
        try{
            $db=DB();
            $query = $db->prepare("INSERT INTO education(user_id,school,digree,fieldofstudy,start_date,end_date,description,current) VALUES (:user_id,:school,:digree,:fieldofstudy,:start_date,:end_date,:description,:current)");
            $query->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $query->bindParam("school", $school, PDO::PARAM_STR);
            $query->bindParam("digree", $digree, PDO::PARAM_STR);
            $query->bindParam("fieldofstudy", $fieldofstudy, PDO::PARAM_STR);
            $query->bindParam("start_date", $start_date, PDO::PARAM_STR);
            $query->bindParam("end_date", $end_date, PDO::PARAM_STR);
            $query->bindParam("description", $description, PDO::PARAM_STR);
            $query->bindParam("current", $current, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();

        }catch(PDOException $e){
            echo "Error is :" .$e->getMessage();
            exit($e->getMessage());
        }
    }
    public function readEducation($user_id){
        try{
            $db = DB();
            $query = $db->prepare("SELECT * FROM education WHERE user_id=:user_id");
            $query->bindParam("user_id", $user_id,PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll();
            return $result;    
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }
    public function deleteEducation($education_id){
        try{
            $db= DB();
            $query = $db->prepare("DELETE FROM education WHERE education_id=:education_id");
            $query->bindParam(':education_id',$education_id);
            $query->execute();

        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }
}