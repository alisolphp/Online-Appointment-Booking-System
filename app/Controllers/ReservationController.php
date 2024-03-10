<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ReservationModel;
use App\Utils\Date\JDF;

class ReservationController extends BaseController
{

    public function __construct(){
        $this->user = new UserModel();
        $this->reservation = new ReservationModel();
        $this->JDF = new JDF();
    }

    function index(){

        if( ($_COOKIE['user_id']??0) == 0 ){
            response()->redirect(url('auth.signin'));
        }

        $currentReservations = $this->getAllReservations();
        
        return view('reservations/index', [
            'JDF' => $this->JDF,
            'currentReservations' => $currentReservations,
        ]);
    }

    function toggle(){
        $datetime = input('toggle');
        
        $currentStatus = $this->reservation->getReservationByDateTime($datetime);

        if( $currentStatus === false ){
            $this->reservation->book([
                'user_id' => $_COOKIE['user_id'],
                'datetime' => $datetime,
            ]);
            response()->redirect(url('reservations').'?msg=1');
        }            

        if( $currentStatus['user_id'] == $_COOKIE['user_id'] ){
            $this->reservation->delete([
                'user_id' => $_COOKIE['user_id'],
                'datetime' => $datetime,
            ]);
            response()->redirect(url('reservations').'?msg=2');
        }
        
        response()->redirect(url('reservations').'?msg=3');

    }

    function getAllReservations(){
        return $this->reservation->all();
    }


}
