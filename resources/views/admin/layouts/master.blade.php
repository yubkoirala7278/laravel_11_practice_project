<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="/img//favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/plugins//simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/plugins//perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/plugins//metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="/css/dark-theme.css" />
    <link rel="stylesheet" href="/css/semi-dark.css" />
    <link rel="stylesheet" href="/css/header-colors.css" />
    <!-- data tables css  -->
    <link href="/plugins//datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="/css/dataTables.dateTime.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.3/css/fixedColumns.dataTables.min.css">
    <!-- custom style  -->
    <link rel="stylesheet" href="/css/mysticstyle.min.css">
    <title>Practice Project </title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="/img//logo.png" class="logo-slogan" alt="logo icon">
                </div>

                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li class="active">
                    <a href="{{route('admin.home')}}">
                        <div class="parent-icon"><i class='bx bx-home-alt'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('users.index')}}">
                        <div class="parent-icon"><i class='bx bx-user'></i></div>
                        <div class="menu-title">User</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand gap-3">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <input class="form-control px-5" disabled type="search" placeholder="Search Users here . . .">
                        <span
                            class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                                class='bx bx-search'></i></span>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center gap-1">
                            <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                                data-bs-target="#SearchModal">
                                <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                                </a>
                            </li>
                            <li class="nav-item dark-mode d-sm-flex">
                                <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                    href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-badge">8 New</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item unread" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="/img/avatars/avatar-1.png" class="msg-avatar"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Withdraw Request<span
                                                            class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">Withdraw request by Daisy Anderson </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item unread" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class="bx bx-dollar-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Deposit Request<span
                                                            class="msg-time float-end">2 min
                                                            ago</span></h6>
                                                    <p class="msg-info">$500 deposit request by Katherine</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="/img/avatars/avatar-2.png" class="msg-avatar"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Password Reset Request<span
                                                            class="msg-time float-end">14
                                                            sec ago</span></h6>
                                                    <p class="msg-info">Althea Cabardo has request to change password.
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="/img/avatars/avatar-1.png" class="msg-avatar"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Withdraw Request<span
                                                            class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">Withdraw request by Daisy Anderson </p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class="bx bx-dollar-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Deposit Request<span
                                                            class="msg-time float-end">2 min
                                                            ago</span></h6>
                                                    <p class="msg-info">$500 deposit request by Katherine</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="/img/avatars/avatar-2.png" class="msg-avatar"
                                                        alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Password Reset Request<span
                                                            class="msg-time float-end">14
                                                            sec ago</span></h6>
                                                    <p class="msg-info">Althea Cabardo has request to change password.
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">
                                            <a href="notification.html" class="btn btn-primary w-100">View All
                                                Notifications</a>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="wallet-holder">
                        <div class="balance-dis" data-bs-toggle="modal" data-bs-target="#withdrawInsuranceModal">
                            <i class="bx bx-coin-stack"></i>
                            <span>20,4150</span>
                        </div>
                        <div class="user-box dropdown px-3">
                            <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/img/avatars/Asset 20.png" class="user-img" alt="user avatar">
                                <div class="user-info">
                                    <p class="user-name mb-0">Pauline Seitz</p>
                                    <p class="designattion mb-0">Sr. P - Manager</p>
                                    <i class="bx bx-chevron-down"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center"
                                        href="main-manager-profile.html"><i
                                            class="bx bx-user fs-5"></i><span>Profile</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center" href="wallet.html"><i
                                            class="bx bx-history fs-5"></i><span>Transaction History</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"
                                        data-bs-toggle="modal" data-bs-target="#withdrawInsuranceModal"><i
                                            class="bx bx-coin fs-5"></i><span>Purchase Tokens</span></a>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"
                                        data-bs-toggle="modal" data-bs-target="#withdrawInsuranceModal"><i
                                            class="bx bx-trash-alt fs-5"></i><span>Withdraw Insurance</span></a>
                                </li>
                                <li>
                                    <div class="dropdown-divider mb-0"></div>
                                </li>
                                <li><a class="dropdown-item d-flex align-items-center text-danger" href="javascript:;"
                                        data-bs-toggle="modal" data-bs-target="#logoutModal"><i
                                            class="bx bx-log-out-circle"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        @yield('content')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>

    @yield('model')
     <!-- Purchase & Withdraw Modal -->
    <div class="modal fade" id="withdrawInsuranceModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Wallet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills nav-pills-dark mb-3 d-flex justify-content-center" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link round-pills active" data-bs-toggle="pill" href="#primary-pills-home"
                                role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Purchase Tokens</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link round-pills" data-bs-toggle="pill" href="#primary-pills-profile"
                                role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Withdraw Insurance</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="withdrawAmount" class="form-label"
                                        style="display:flex; justify-content: space-between;">You USDT deposit
                                        address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="withdrawAmount" value="0.0000">
                                        <a class="input-group-text max-amt"><i class="bx bx-refresh"></i></a>
                                        <a class="input-group-text max-amt"><i class="bx bx-copy-alt"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="depo-qr">
                                        <img src="/img/qr.png" alt="">
                                    </div>
                                </div>
                                <p class="text-center mb-0">Only send USDT to this address, 1 confirmation required.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                            <form class="row g-3 px-3" id="withdrawForm">
                                <div class="col-md-12">
                                    <label for="adressInput" class="form-label">USDT Adress<span
                                            class="cumpolsary">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="adressInput">
                                    </div>
                                    <p class="error">This Field is Required</p>
                                </div>
                                <div class="col-md-12">
                                    <label for="withdrawAmount" class="form-label"
                                        style="display:flex; justify-content: space-between;"><span>Amount<span
                                                class="cumpolsary">*</span></span> <span>$1,238.54</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="withdrawAmount" value="0.0000">
                                        <a class="input-group-text max-amt">Max</a>
                                    </div>
                                    <p class="error">Amount cannot be greater then max amount</p>
                                </div>
                                <div class="col-md-12">
                                    <label for="twoFactorInput" class="form-label">Two Factor<span
                                            class="cumpolsary">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="twoFactorInput">
                                    </div>
                                    <p class="error">Enter your 2FA code</p>
                                </div>
                                <button type="submit" class="btn btn-dark px-5 py-3">Withdraw</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm Logout Modal  -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Logout ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to logout.</div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary px-5 py-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger px-5 py-2">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Disable Modal -->
    <div class="modal fade" id="disableModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Disable <span class="text-primary">Oliver Stone</span>?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="sendBonus" action="#">
                        <div class="col-md-12">
                            <label for="input04" class="form-label d-flex justify-content-between">Reason (Optional)<span
                                    class="text-secondary">0/350</span></label>
                            <textarea class="form-control" id="input40" name="address" rows="5" placeholder="Write reason here ..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="input24" checked>
                                <label class="form-check-label" for="input24"><span class="text-primary">Withdraw Tokens
                                        & Disable</span></label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Disable</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/dynamic-nav.js"></script>
    <script src="/plugins//simplebar/js/simplebar.min.js"></script>
    <script src="/plugins//metismenu/js/metisMenu.min.js"></script>
    <script src="/plugins//perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--app JS-->
    <script src="/js/app.js"></script>
    <!-- Date range filter data table js  -->
    <script src="/plugins//datatable/js/jquery.dataTables.min.js"></script>
    <script src="/plugins//datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/dataTables.dateTime.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tables = [{
                    tableId: 'user-list-table',
                    minId: 'min',
                    maxId: 'max'
                },
                {
                    tableId: 'user-list-table01',
                    minId: 'min01',
                    maxId: 'max01'
                }
            ];

            tables.forEach(function(tableData) {
                var minDate = new DateTime($('#' + tableData.minId), {
                    format: 'YYYY MM Do'
                });
                var maxDate = new DateTime($('#' + tableData.maxId), {
                    format: 'YYYY MM Do'
                });

                var table = $('#' + tableData.tableId).DataTable();

                $('#' + tableData.minId + ', #' + tableData.maxId).on('change', function() {
                    table.draw();
                });

                // Custom filtering function which will search data in the specified date column between two values
                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    var min = minDate.val();
                    var max = maxDate.val();
                    var date = new Date(data[
                        5]); // Update the index to match the correct date column

                    if (
                        (min === null && max === null) ||
                        (min === null && date <= max) ||
                        (min <= date && max === null) ||
                        (min <= date && date <= max)
                    ) {
                        return true;
                    }
                    return false;
                });
            });
        });
    </script>
</body>

</html>
