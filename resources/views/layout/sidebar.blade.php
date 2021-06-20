    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
           <!--  <div class="profile-userpic">
                <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
            </div> -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">{{Auth::user()->name}}</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
               Menu Admin
            </div>
        </form>
        <ul class="nav menu">
            @php $act = Session::get('menu'); @endphp
            <li class="{{ ( $act == 'home') ? 'active' : ''}}"><a href="{{url('home')}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="{{ ( $act == 'banks') ? 'active' : ''}}"><a href="{{url('banks')}}"><em class="fa fa-bank">&nbsp;</em> Bank </a></li>
            <li class="{{ ( $act == 'vendors') ? 'active' : ''}}"><a  href="{{url('vendors')}}"><em class="fa fa-industry">&nbsp;</em> Vendor car</a></li>
            <li class="{{ ( $act == 'cars') ? 'active' : ''}}"><a href="{{url('cars')}}"><em class="fa fa-car">&nbsp;</em> Car </a></li>
            <li class="{{ ( $act == 'transactions') ? 'active' : ''}}"><a href="{{url('transactions')}}"><em class="fa fa-exchange">&nbsp;</em> Transaction</a></li>
            <li class="{{ ( $act == 'return') ? 'active' : ''}}"><a href="{{url('transaction_return')}}"><em class="fa fa-undo">&nbsp;</em> Return Car</a></li>
            <li class="{{ ( $act == 'report') ? 'active' : ''}}"><a href="{{url('/report/transactions')}}"><em class="fa fa-file">&nbsp;</em> Report </a></li>
            <li class="parent {{ ( $act == 'user_admin') ? 'active' : ''}}">
                <a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-users">&nbsp;</em> User Menu <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="{{ ( $act == 'user_admin') ? 'active' : ''}}" href="{{url('users')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span> Admin dashboard
                    </a></li>
                    <li><a class="{{ ( $act == 'user_customer') ? 'active' : ''}}" href="{{url('customers')}}">
                        <span class="fa fa-arrow-right">&nbsp;</span> Customer Rental
                    </a></li>
                </ul>
            </li>
            <li>
                <form id="logout-form" action="{{ url('log_out_admin') }}"
                 method="POST" style="display: none;">@csrf </form>
                <a style="cursor: pointer;" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <em class="fa fa-power-off">&nbsp;
                    </em> 
                Logout
            </a></li>
        </ul>
    </div>/.sidebar