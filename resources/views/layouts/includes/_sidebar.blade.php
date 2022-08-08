<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
					<br>
					<li>
					<div class="text-center">
						<a href="/dashboard"><img src="{{asset('admin/kodamlogo.png')}}" width="150" height="150"></a>
					</div>
					</li>
						<li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="/prajurit" class=""><i class="lnr lnr-user"></i> <span>Hasil</span></a></li>						                  
						<li><a href="/penilaian" class=""><i class="lnr lnr-cog"></i> <span>Penilaian</span></a></li>
						@if(auth()->user()->role =='admin')
						<li><a href="/user" class=""><i class="lnr lnr-user"></i> <span>User</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>