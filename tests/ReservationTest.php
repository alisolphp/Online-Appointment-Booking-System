<?php

namespace Project\Tests;

use PHPUnit\Framework\TestCase;
use App\Controllers\ReservationController;

final class ReservationTest extends TestCase
{
    public function testGetAllReservations()
    {
        $ReservationController = new ReservationController();
        $allReservations = $ReservationController->getAllReservations();
        $this->assertIsArray($allReservations);
    }
}