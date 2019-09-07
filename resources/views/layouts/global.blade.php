<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Larakost @yield("title")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconic.css')}}">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src">
                    <div class="h4">Lara<b>Kost</b></div>
                </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="dropdown d-none d-md-block">
                                @if(\Auth::user())
                                <button class="btn btn-link btn-link-primary dropdown-toggle" id="navbar-dropdown" data-toggle="dropdown">
                                    {{Auth::user()->name}}
                                </button>
                                @endif
                                <div class="dropdown-menu dropdown-menu-right" id="navbardropdown">
                                    <a href="{{route('users.show', ['id' => Auth::user()->id])}}" class="dropdown-item">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <li>
                                        <form action="{{route("logout")}}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" style="cursor:pointer">Sign Out</button>
                                        </form>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                <a href="/home" class="">
                                    <i class="metismenu-icon pe-7s-menu"></i>
                                    Dashboard
                                </a>
                            </li>
                            @if(\Auth::user()->roles == "ADMIN")
                            <li class="app-sidebar__heading">Master</li>
                            <li>
                                <a href="{{route('users.index')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                    Users
                                </a>
                            </li>
                            <li>
                                <a href="{{route('rooms.index')}}">
                                    <i class="metismenu-icon pe-7s-home"></i>
                                    Rooms
                                </a>
                            </li>

                            <li class="app-sidebar__heading">Transaction</li>
                            <li>
                                <a href="{{route('bookings.index')}}">
                                    <i class="metismenu-icon pe-7s-cart"></i>
                                    List Orders
                                </a>
                            </li>


                            <li class="app-sidebar__heading">Reports</li>
                            <li>
                                <a href="{{route('reports.index')}}">
                                    <i class="metismenu-icon pe-7s-graph2">
                                    </i>Order Reports
                                </a>
                            </li>
                            @elseif(\Auth::user()->roles == "PEOPLE")
                            <li class="app-sidebar__heading">Booking</li>
                            <li>
                                <a href="{{route('buys.index')}}">
                                    <i class="metismenu-icon pe-7s-cart"></i>
                                    Choose Rooms
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="h2">@yield("title")</div>
                    </div>
                    @yield("content")
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="https://yudartcode.github.io" class="nav-link">
                                            yudartcode
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script type="text/javascript" src="/js/main.js"></script>
</body>

</html>