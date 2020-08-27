<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li id="dashboardsm">
                    <a href="/dashboard"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Users</h3><!-- /.menu-title -->
                <li id="empstaffnsg" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Employee</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li id="usrstfsm"><i class="fa fa-id-badge"></i><a href="/staff">Users (Staff) </a></li>
                        <li id="cshcltorsm"><i class="fa fa-share-square-o"></i><a href="/cashcollector">Cash
                                Collectors</a>
                        </li>
                    </ul>
                </li>
                <li id="cusmnusb" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-user"></i>Customers</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li id="customersm"><i class="fa fa-puzzle-piece"></i><a href="/customers">Customers</a></li>
                        <li id="customersm"><i class="fa fa-puzzle-piece"></i><a href="/guarantors">Guarantors</a></li>
                        <li id="customersm"><i class="fa fa-puzzle-piece"></i><a href="/customerarrears">Customer
                                Loan Details</a></li>
                    </ul>
                </li>
                <li id="privilagesmnusb" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Logins</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li id="utypsm"><i class="fa fa-bars"></i><a href="/usertypes">User Types</a></li>
                        <li id="lgmngsm"><i class="fa fa-bars"></i><a href="/loginmanage">Login Manage</a></li>
                    </ul>
                </li>


                <h3 class="menu-title">Cash Collect</h3><!-- /.menu-title -->

                <li id="cshclctmngmngsb" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-dollar"></i>Cash Collect Manage</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class=" fa fa-dollar"></i><a href="/cashcollect">Cash Collect Requests</a></li>
                        <li><i class="fa fa-dollar"></i><a href="/cashcollecthistory">Collected Cash
                                History</a>
                        </li>
                    </ul>
                </li>
                <li id="cshrcvlnpy" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-dollar"></i>Pay Loans</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class=" fa fa-dollar"></i><a href="/loanpayinstallment">Installment</a>
                        </li>
                        <li><i class="fa fa-dollar"></i><a href="/cashcollecthistory">Collected Cash
                                History</a>
                        </li>
                    </ul>
                </li>
                <li id="loanpaymng">
                    <a href="/loanpay">
                        <i class="menu-icon fa fa-credit-card"></i> Loan Pay</a>
                </li>

                <h3 class="menu-title">Loan</h3><!-- /.menu-title -->

                <li id="loanmngsb" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-tasks"></i>Loan Manage</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-dollar"></i><a href="/dailyloan_create">Create Loan</a></li>
                        <li><i class="menu-icon fa fa-check"></i><a href="/approveloans">Loan Approve</a>
                        </li>
                        <li><i class="menu-icon fa fa-arrows-h"></i><a href="/ArrearsRecorect">Arrears Loan
                                Re-Araange</a></li>
                        <li><i class="menu-icon fa fa-fighter-jet"></i><a href="/currentloanincrees">Loan Re-Arrange</a>
                        </li>
                    </ul>
                </li>

                <li id="loanreportsb" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-tasks"></i>Loan Reports</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class=" fa fa-list-alt"></i><a href="/dailyloanreports">Daily Loan Reports</a>
                        </li>
                        <li><i class=" fa fa-list-alt"></i><a href="/monthlyloanreports">Monthly Loan
                                Reports</a>
                        </li>
                        <li><i class=" fa fa-list-alt"></i><a href="/propertyloanreports">Property Loan
                                Reports</a></li>

                    </ul>
                </li>
                <li id="chqudrymng" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa fa-money"></i>Cheque Manage</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-arrows-h"></i><a href="/chequemanage">Cheque Diary Manage</a></li>
                        <li><i class="menu-icon fa fa-fighter-jet"></i><a href="/loanChequemanage">Customer Cheque
                                Manage</a>
                        </li>
                    </ul>
                </li>

                <li id="loaninterestsb" class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="menu-icon fa  fa-gear (alias)"></i> Settings</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-arrows"></i><a href="/createroute">Add Route</a></li>
                        <li><i class="menu-icon fa fa-arrows-h"></i><a href="/assingroute">Route Assignings</a></li>
                        <li><i class="menu-icon fa fa-gear"></i><a href="/addInterest">Settings</a></li>
                        {{-- <li><i class="menu-icon fa fa-fort-awesome"></i><a href="/privilage">Privilages</a></li> --}}

                    </ul>
                </li>
            </ul>



        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->