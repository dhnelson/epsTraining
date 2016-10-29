@extends('layouts.layout')

@section('title', 'Contact')

@include('js._comments')

@section('content') 

<div class="row">
	<div class="col-sm-8 col-md-offset-2">

        <h2 class="text-center blue">Email Subscribers</h2>

    {!! Form::open (array('action' => 'MailChimpController@emailSubscribers', 'data-parsley-validate' => '')) !!} 
            <!-- Subject input-->
            <div class="form-group red">
                {{ Form::label('Subject:') }}
                {{ Form::text('subject', null, 
                    array('required' => '', 'class'=>'form-control', 'placeholder'=>'Your Subject')) }}
            </div>

            <!-- From name input-->
            <div class="form-group red">
                {{ Form::label('From:') }}
                {{ Form::text('from_name', null, 
                    array('required' => '', 'class'=>'form-control', 'placeholder'=>'From...')) }}
            </div>

            <!-- Message body -->
            <div class="form-group red">
                {{ Form::label('Message:') }}
                {{ Form::textarea('message', null, 
                    array('class'=>'form-control', 'rows' => '10', 'placeholder' => 'Please enter your message here...')) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Send Email', 
                  array('class'=>'btn btn-primary btn-block')) }}
            </div>
    {!! Form::close() !!}                       
    </div>
</div>

{{-- <p><b>Ray Padilla - Evolution Performance Systems</b><br>
Cell: <a href="tel:1-646-717-3142">(646) 717-3142</a> | Email: ray@traineps.com<br>
<a href="https://www.facebook.com/Evolution-Performance-Systems-131558953564049/?fref=ts"><i class="fa fa-facebook-official" aria-hidden="true" target="_blank"></i> Facebook</a> | Website: <i><a href="https://www.traineps.com" target="_blank"><b>www.traineps.com</b></a></i><br>
BFS certified Strength & Conditioning Coach<br>
Level 1 Crossfit Instructor<br>
National Strength & Conditioning Association Member</p> --}}
    
@stop