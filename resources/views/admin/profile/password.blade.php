@extends('layout.includepassword')
@section('content')

<div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Hei {{ Auth::user()->name }}!</li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i> </div>
                        <div class="notification-content pt-2 dropdown-menu">
                            <div class="notification-content__box dropdown-content">
                                <div class="notification-content__title">Notifications</div>
                                <div class="cursor-pointer relative flex items-center ">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white dark:border-darkmode-600"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Al Pacino</a> 
                                            <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">01:10 PM</div>
                                        </div>
                                        <div class="w-full truncate text-slate-500 mt-0.5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                            <img alt="Midone - HTML Admin Template" src="/avatars/{{ Auth::user()->avatar }}">
                        </div>
                        <div class="dropdown-menu w-56">
                            <ul class="dropdown-content bg-primary text-white">
                                <li class="p-2">
                                    <div class="font-medium">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ Auth::user()->email }}</div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider border-white/[0.08]">
                                </li>
                                <li>
                                    <a href="{{ route('password') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Ubah Password </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider border-white/[0.08]">
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> {{ __('Logout') }} </a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                <div class="grid grid-cols-12 gap-12 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-12">
                        <!-- BEGIN: Input -->
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Ubah Password
                                </h2>
                            </div>

                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show"> {{$error}}</p>
                                @endforeach

                            @endif

                            <form method="POST" action="{{ route ('update.password') }}">
                                @csrf
                            <div id="input" class="p-5">
                                <div class="preview">
                                    <div>
                                        <label for="regular-form-1" class="form-label">Password Lama</label>
                                        <input name="oldpassword" id="oldpassword" type="password" class="form-control" placeholder="Tuliskan Password Lama Anda Disini">
                                    </div>
                                    <div>
                                        <label for="regular-form-1" class="form-label mt-5">Password Baru</label>
                                        <input name="newpassword" id="newpassword" type="password" class="form-control" placeholder="Tuliskan Password Baru Anda Disini">
                                    </div>
                                    <div>
                                        <label for="regular-form-1" class="form-label mt-5">Ulangi Password Baru</label>
                                        <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Tuliskan Kembali Password Baru Anda Disini">
                                    </div>
                                </div> 
                                <input type ="submit" class="btn btn-primary waves-effect waves-light mt-5" value="Ubah Password">
                            </div>
                            </form>
                        </div>
                        <!-- END: Input -->
                    </div>
                </div>
                <div class="intro-y col-span-12 lg:col-span-12 text-center text-muted mt-5" style="border-top: 1px ; margin-top: 470px;">
                    All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
                </div>
            </div>
@endsection