<?php
namespace App\repository;
interface AdminRepositoryInterface{
    public function dashboard();
    public function read_lead_message();
    public function getFacebookId($name);
}