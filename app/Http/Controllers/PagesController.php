<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class PagesController extends Controller
{
    public function home() {
        return view('pages.home');
    }

     public function king() {
        return view('pages.king');
    }

     public function team() {
        return view('pages.team');
    }

    public function pics() {
        return view('pages.pics');
    }   

    public function testimonials() {
        return view('pages.testimonials');
    }   

    public function services() {
        return view('pages.services');
    } 

    public function facility() {
        return view('pages.facility');
    }    
}
