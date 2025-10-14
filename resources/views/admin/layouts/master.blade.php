<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <button id="sidebarToggle" class="btn bg-dark d-lg-none">
                <i class="fa fa-bars"></i>      
        </button>
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="sidebar"
            style="min-height: 100vh; padding-top: 10px; background-color:darkslategray">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <img alt="Logo" class="rounded-circle logo__image" width="50" height="50"
                        src="{{ asset('adminProfile/laravel.png') }}">
                </div>
                <span class="logo__text text-white text-lg ml-2"> POS </span>
                
            </a>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a href="{{ route('adminDashboard') }}" class="btn text-start mb-2">
                    <i class="fas fa-home"></i>Dashboard
                </a>
            </li>

            <li class="nav-item flex-column">
                <!-- Main Reports Menu -->
                <a class="btn text-start mb-2 toggle-submenu" href="#"> 
                    <i class="fas fa-th-list"></i>Categoies
                </a>

                <!-- Submenu (Hidden by Default) -->
                <ul class="submenu list-unstyled ms-3" style="display: none;">
                    <li class="nav-item mb-2">
                        <a class="submenu-btn ajax-link" href="{{ route('categoryCreatePage') }}">
                            <i class="fa fa-plus-circle"></i> Add Categories
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="submenu-btn ajax-link" href="{{ route('categoryList') }}">
                            <i class="fa fa-list"></i> Categories List
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item flex-column">
                <!-- Main Reports Menu -->
                <a class="btn text-start mb-2 toggle-submenu" href="#">
                    <i class="fas fa-box"></i>Product
                </a>

                <!-- Submenu (Hidden by Default) -->
                <ul class="submenu list-unstyled ms-3" style="display: none;">
                    <li class="nav-item mb-2">
                        <a class="submenu-btn ajax-link " href="{{ route('productCreate') }}">
                            <i class="fa fa-plus-circle"></i> Add Product
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="submenu-btn ajax-link" href="{{ route('productList') }}">
                            <i class="fa fa-list"></i> Product List
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="btn text-start mb-2 ajax-link" href="{{ route('orderListPage') }}">
                    <i class="fas fa-shopping-cart"></i>Orders
                </a>
            </li>

            <li class="nav-item">
                <a class="btn text-start mb-2 ajax-link" href="{{ route('saleInfoList') }}">
                    <i class="fas fa-chart-line "></i>Sales
                </a>
            </li>

            <li class="nav-item">
                <a class="btn text-start mb-2 ajax-link" href="{{ route('paymentList') }}">
                    <i class="fa-solid fa-dollar-sign"></i>Payments
                </a>
            </li>


            @if (auth()->user()->role == 'superadmin')

            <li class="nav-item flex-column">
                <!-- Main Reports Menu -->
                <a class="btn text-start mb-2 toggle-submenu" href="#">
                    <i class="fa-solid fa-users"></i>Manage Users
                </a>

                <!-- Submenu (Hidden by Default) -->
                <ul class="submenu list-unstyled ms-2" style="display: none;">
                    <li class="nav-item mb-2">
                        <a class="submenu-btn" href="{{ route('createAdminAccount') }}">
                            <i class="fa-solid fa-users"></i> Add New Admin
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="submenu-btn" href="{{ route('resetPasswordPage') }}">
                            <i class="fas fa-lock fa-sm fa-fw"></i> Reset Password
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="submenu-btn" href="{{ route('adminList') }}">
                            <i class="fa-solid fa-user-tie"></i> Profile Info
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            <li class="nav-item flex-column">
                <!-- Main Reports Menu -->
                <a class="btn text-start mb-2 toggle-submenu" href="#">
                    <i class="fa-solid fa-magnifying-glass-chart"></i>Reports
                </a>

                <!-- Submenu (Hidden by Default) -->
                <ul class="submenu list-unstyled ms-3" style="display: none;">
                    <li class="nav-item mb-2">
                        <a class="submenu-btn ajax-link" href="{{ route('salesReportPage') }}">
                            <i class="fa-solid fa-chart-bar"></i> Sales Report
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="submenu-btn ajax-link" href="{{ route('productReportPage') }}">
                            <i class="fa-solid fa-chart-bar"></i> Products Info
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="submenu-btn ajax-link" href="{{ route('profitlossreportpage') }}">
                            <i class="fa-solid fa-chart-bar"></i> Profit & Loss
                        </a>
                    </li>
                </ul>
            </li>

            <hr class="sidebar-divider my-2">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <li class="nav-item">
                    <button type="submit" class="btn text-start mb-2">
                        <i class="fas fa-sign-out-alt"></i>Logout
                    </button>
                </li>
            </form>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper"  style="background-color: #f8f9fc;">
            <!-- Main Content -->
            <div id="content" >
                @yield(' content')
                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow mb-4 px-3" >
                    <!-- Navbar toggler (for mobile view) -->
                    <button id="toggleSidebarBtn" class="btn btn-secondary mb-3">
                        <i class="fa fa-bars"></i> 
                    </button>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarContent" >
                        <ul class="navbar-nav">
                            <!-- User Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="mr-2 text-dark">
                                        @if (auth()->user()->name != null)
                                            {{ auth()->user()->name }}
                                        @else
                                            {{ auth()->user()->nickname }}
                                        @endif
                                    </span>
                                    <img class="rounded-circle" width="40" height="40"
                                        src="{{ auth()->user()->profile ? asset('adminProfile/' . auth()->user()->profile) : asset('admin/img/undraw_profile.svg') }}">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profileDetails') }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-600"></i> Profile
                                    </a>
                                    @if (auth()->user()->role == 'superadmin')
                                        <a class="dropdown-item" href="{{ route('createAdminAccount') }}">
                                            <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-600"></i> Add Admin
                                        </a>
                                    @endif
                                    @if (auth()->user()->provider == 'simple')
                                        <a class="dropdown-item" href="{{ route('passwordChange') }}">
                                            <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-600"></i> Change Password
                                        </a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}" class="dropdown-item p-0">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-link dropdown-item text-danger">Logout</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->

                @yield('content')
                @include('sweetalert::alert')

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    {{-- <script>
        $(document).ready(function () {
          // Sidebar toggle
          $("#sidebarToggle").click(function () {
            $(".sidebar").toggleClass("active");
          });
      
          // Close sidebar when clicking outside
          $(document).click(function (event) {
            if (!$(event.target).closest(".sidebar, #sidebarToggle").length) {
              $(".sidebar").removeClass("active");
            }
          });
      
          // Image preview
          window.loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function () {
              $('#output').attr('src', reader.result);
            };
            reader.readAsDataURL(event.target.files[0]);
          };
      
          // Submenu toggle: only one open at a time
          $(".toggle-submenu").click(function (e) {
            e.preventDefault();
      
            var $submenu = $(this).next(".submenu");
      
            // Close all other submenus
            $(".submenu").not($submenu).slideUp();
      
            // Toggle the clicked one
            $submenu.slideToggle();
          });
        });
      </script> --}}


      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- <script>
    $(document).ready(function () {
        // Toggle submenu on click
        $('.toggle-submenu').on('click', function (e) {
            e.preventDefault();

            // Toggle the current submenu
            var $submenu = $(this).next('.submenu');
            $('.submenu').not($submenu).slideUp(); // close others
            $submenu.slideToggle(); // toggle this one

            // Highlight active parent link
            $('.toggle-submenu').removeClass('active');
            $(this).addClass('active');
        });
    });
    $(document).ready(function () {
        $(document).on('click', '.ajax-link', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    // Grab only the content section and replace it
                    const newContent = $(data).find('#content-wrapper').html();
                    $('#content-wrapper').html(newContent);
                },
                error: function (xhr) {
                        alert('Error loading content');
                        console.error(xhr);
                    }
                });
            });
        });
    </script> --}}

    <script>
    $(document).ready(function () {
        // Sidebar toggle
        $('#toggleSidebarBtn').on('click', function () {
            $('#sidebar').toggleClass('d-none');
        });

        // Toggle submenu on click
        $('.toggle-submenu').on('click', function (e) {
            e.preventDefault();
            var $submenu = $(this).next('.submenu');
            $('.submenu').not($submenu).slideUp();
            $submenu.slideToggle();
            $('.toggle-submenu').removeClass('active');
            $(this).addClass('active');
        });

        // AJAX content loading
        $(document).on('click', '.ajax-link', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    const newContent = $(data).find('#content-wrapper').html();
                    $('#content-wrapper').html(newContent);
                },
                error: function (xhr) {
                    alert('Error loading content');
                    console.error(xhr);
                }
            });
        });
    });
</script>
    






      {{-- <script>
        $(document).ready(function () {
          // Sidebar toggle
          $("#sidebarToggle").click(function () {
            $(".sidebar").toggleClass("active");
          });
      
          // Close sidebar when clicking outside
          $(document).click(function (event) {
            if (!$(event.target).closest(".sidebar, #sidebarToggle").length) {
              $(".sidebar").removeClass("active");
            }
          });
      
          // Submenu toggle
          $(".toggle-submenu").click(function (e) {
            e.preventDefault();
            var $submenu = $(this).next(".submenu");
            $(".submenu").not($submenu).slideUp();
            $submenu.slideToggle();
          });
      
          // AJAX load for menu and submenu links
          $(".sidebar a[href]:not([href='#'])").click(function (e) {
            const url = $(this).attr("href");
      
            // Check for Laravel logout or non-AJAX targets
            if ($(this).closest("form").length > 0 || $(this).attr("target") === "_blank") return;
      
            e.preventDefault();
      
            $("#content").html('<div class="text-center mt-5"><i class="fas fa-spinner fa-spin"></i> Loading...</div>');
      
            // Load content into the content area
            $("#content").load(url, function (response, status, xhr) {
              if (status === "error") {
                $("#content").html("<div class='text-danger p-4'>Error loading content: " + xhr.status + " " + xhr.statusText + "</div>");
              }
      
              // Re-initialize any JS plugins if necessary (like tooltips, charts, etc.)
            });
          });
        });
      </script> --}}


      {{-- $(document).ready(function () {
    // Load content dynamically
    $(".submenu-btn").on("click", function (e) {
        e.preventDefault();
        var url = $(this).data("url");
        var id = $(this).data("id");

        // Load content via AJAX
        $("#dynamic-content").load(url, function () {
            // Update active submenu
            $(".submenu-btn").removeClass("active");
            $('[data-id="' + id + '"]').addClass("active");
            localStorage.setItem("activeSubmenu", id);
        });
    });

    // On page load: restore submenu highlight
    var activeId = localStorage.getItem("activeSubmenu");
    if (activeId) {
        var $activeLink = $('.submenu-btn[data-id="' + activeId + '"]');
        $activeLink.addClass("active");
        $activeLink.closest(".submenu").show();

        // Optional: auto-load content for saved submenu
        $("#dynamic-content").load($activeLink.data("url"));
    }
}); --}}



{{-- $(document).ready(function () {
    // Sidebar toggle
    $("#sidebarToggle").click(function () {
      $(".sidebar").toggleClass("active");
    });
  
    // Close sidebar when clicking outside
    $(document).click(function (event) {
      if (!$(event.target).closest(".sidebar, #sidebarToggle").length) {
        $(".sidebar").removeClass("active");
      }
    });
  
    // Submenu toggle
    $(".toggle-submenu").on("click", function (e) {
      e.preventDefault();
      const $submenu = $(this).next(".submenu");
  
      // Toggle the clicked submenu only
      $(".submenu").not($submenu).slideUp(); // Close others
      $submenu.slideToggle(); // Toggle current
    });
  
    // Dynamic content load
    $(".submenu-btn").on("click", function (e) {
      e.preventDefault();
      const url = $(this).data("url");
      const id = $(this).data("id");
  
      $("#dynamic-content").load(url, function () {
        $(".submenu-btn").removeClass("active");
        $('[data-id="' + id + '"]').addClass("active");
        localStorage.setItem("activeSubmenu", id);
      });
    });
  
    // Restore last active submenu
    const activeId = localStorage.getItem("activeSubmenu");
    if (activeId) {
      const $activeLink = $('.submenu-btn[data-id="' + activeId + '"]');
      $activeLink.addClass("active");
      $activeLink.closest(".submenu").show();
      $("#dynamic-content").load($activeLink.data("url"));
    }
  }); --}}
  

    
      
      
</body>

@yield('js-section')

</html>
