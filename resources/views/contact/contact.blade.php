@extends('layouts.layout')

@section('title', 'Contact')

@section('content') 

<div class="row">
	<div class="col-sm-6 col-md-offset-1">

        <h2 class="text-center">Contact Me Today!</h2>

    {!! Form::open (array('action' => 'ContactController@ContactForm', 'data-parsley-validate' => '')) !!} 
    {{ csrf_field() }}
    
            <div class="form-group red">
                {{ Form::label('Name:') }}
                {{ Form::text('name', null, 
                    array('required' => '', 'class'=>'form-control', 'placeholder'=>'John Doe')) }}
            </div>

            <div class="form-group red">
                {{ Form::label('E-mail Address:') }}
                {{ Form::text('email', null, 
                    array('required' => '', 'class'=>'form-control', 'placeholder'=>'JohnDoe@jd.com')) }}
            </div>
            
            <div class="form-group red">
                {{ Form::label('Subject:') }}
                {{ Form::text('subject', null, 
                    array('required' => '', 'class'=>'form-control', 'placeholder'=>'Can You Please Train Me')) }}
            </div>

            <div class="form-group red">
                {{ Form::label('Message:') }}
                {{ Form::textarea('message', null, 
                    array('required' => '', 'class'=>'form-control', 'rows' => '6', 'placeholder'=>'What\'s Up?')) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Send Message', 
                  array('class'=>'btn btn-primary')) }}
            </div>
    {!! Form::close() !!}                       
    </div>

    <div class="col-md-4 contact-box-spacing">
        <div class="well">
            <dl>
                <dt class="red"><span class="glyphicon glyphicon-earphone"></span> Call or Text:</dt>
                    <ul>
                        <li><dd><span>Whippany Athletic Club: <a href="tel:1-973-887-2496">(973) 887-2496</a></span></dd></li>
                       <li><dd><span>Cellphone: <a href="tel:1-646-717-3142">(646) 717-3142</a></span></dd></li>
                    </ul>
            </dl>

            <dl>
                <dt class="red"><span class="glyphicon glyphicon-globe"></span> Social Media:</dt>
                    <ul>
                        <li><dd><a href="https://www.facebook.com/Evolution-Performance-Systems-131558953564049/?fref=ts"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></dd></li>
                    <li><dd><a href="https://www.instagram.com/eps_training"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></dd></li>
                    </ul>
            </dl>   
        </div>
    </div>
</div>
    
@stop