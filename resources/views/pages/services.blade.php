@extends('layouts.layout')

@section('title', 'Services')

@section('content') 

<div class="row">
    <div class="col-md-5 col-md-offset-1"><br>
        <div class="well well-spacing">
            <h1><u>Training Options:</u></h1>

            <h3>Weight Loss:</h3>
                <p class="text-justify">Body recomposition training including customized diet, training, and cardio plans to increase lean muscle mass, decrease body fat, and improve overall health and fitness.</p>

            <h3>Body Building:</h3>
                <p class="text-justify">Contest Prep with customized diet and training programming to look your best on stage including day of show coaching and assistance.</p>

            <h3>Power Lifting:</h3>
                <p class="text-justify">One on one coaching or programming including nutrition, mobility, offseason hypertrophy, strength cycles, and meet peaking cycles</p>

            <h3>Sports Specific:</h3>
                <p class="text-justify">Sports performance programs designed to increase speed, power, agility, and core strength. Available in 1-on-1 or group settings.</p>
        </div>
    </div>

    <div class="col-md-5"><br>
        <div class="well well-spacing">
            <h1><u>Pricing Options:</u></h1>
              	<table class="table table-bordered table-hover form-spacing-top" >
              	    <th colspan="2">Package Pricing:</th>
                    		<tr>
                      			<td width="50%">1 Session</td>
                      			<td>$80</td>
                    		</tr>
                        
                    		<tr>
                      			<td>5 Sessions</td>
                      			<td>$375</td>
                    		</tr>

                    		<tr>
                      			<td>10 Sessions</td>
                      			<td>$700</td>
                    		</tr>

                    		<tr>
                      			<td>15 Sessions</td>
                      			<td>$1,020</td>
                    		</tr>

                    		<tr>
                      			<td>20 Sessions</td>
                      			<td>$1,300</td>
                    		</tr>

                        <th colspan="2">Monthly Pricing:</th>
                      	
                    		<tr>
                      			<td>1 Session Per Week</td>
                      			<td>$240</td>
                    		</tr>

                    		<tr>
                      			<td>2 Sessions Per Week</td>
                      			<td>$400</td>
                    		</tr>  	

                    		<tr>
                      			<td>3 Sessions Per Week</td>
                      			<td>$480</td>
                    		</tr>
                </table>
        </div>
    </div>
</div>

@stop