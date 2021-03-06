<!-- Modal -->
<div class="modal fade" id="myModalResetPassword" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
      <div class="modal-body">
		@if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif

		<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
		    {{ csrf_field() }}

		    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

		        <div class="col-md-6">
		            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

		            @if ($errors->has('email'))
		                <span class="help-block">
		                    <strong>{{ $errors->first('email') }}</strong>
		                </span>
		            @endif
		        </div>
		    </div>

		    <div class="form-group">
		        <div class="col-md-6 col-md-offset-4">
		            <button type="submit" class="btn btn-primary">
		                <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
		            </button>
		        </div>
		    </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>