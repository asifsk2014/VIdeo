<div id="navbar" class="navbar navbar-default          ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="{{URL::to('admin/home')}}" class="navbar-brand">
				<small>
					Worker Visa Admin
				</small>
			</a>
		</div>
		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li>
					<a href="{{URL::to('admin/user_edit')}}">
						<i class="ace-icon fa fa-cog"></i>
						Change Password
					</a>
				</li>
				<li>
					<a href="{{URL::to('admin/do_logout')}}">
						Logout
					</a>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>