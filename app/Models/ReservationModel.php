<?php

namespace App\Models;

use App\Models\BaseModel;

class ReservationModel extends BaseModel
{

    function __construct(){}

    function all(){
        $stmt = pdo()->prepare("
            SELECT 
                * 
            FROM 
                prf_reservations
            where
                deleted_at is null
        ");
        $stmt->execute(); 
        $data = $stmt->fetchAll();
        
        return $data;
    }

    function getReservationByDateTime($datetime){
        $stmt = pdo()->prepare("
            SELECT 
                * 
            FROM 
                prf_reservations 
            WHERE 
                datetime=:datetime 
                and deleted_at is null
            limit 1
        ");
        $stmt->execute([
            'datetime' => $datetime, 
        ]); 
        $row = $stmt->fetch();

        return $row;
    }

    function book($data){
        $stmt = pdo()->prepare("
            INSERT INTO 
                prf_reservations 
            SET 
                user_id=:user_id 
                , datetime=:datetime 
        ");
        $stmt->execute([
            'user_id' => $data["user_id"], 
            'datetime' => $data["datetime"], 
        ]); 

        return true;
    }

    function delete($data){
        $stmt = pdo()->prepare("
            UPDATE 
                prf_reservations 
            SET 
                deleted_at = current_timestamp()
            where
                user_id=:user_id 
                and datetime=:datetime 
        ");
        $stmt->execute([
            'user_id' => $data["user_id"], 
            'datetime' => $data["datetime"], 
        ]); 

        return true;
    }
}