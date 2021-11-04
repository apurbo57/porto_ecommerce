<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Syndash</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('staff.dashboard')}}">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="bx bx-clipboard"></i>
                </div>
                <div class="menu-title">Brand</div>
            </a>
            <ul>
                <li> <a href="{{route('staff.brand.create')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Manage Brand</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Web Apps</li>
        <li>
            <a href="emailbox.html">
                <div class="parent-icon icon-color-2"><i class="bx bx-envelope"></i>
                </div>
                <div class="menu-title">Email</div>
            </a>
        </li>
        <li>
            <a href="chat-box.html">
                <div class="parent-icon icon-color-3"> <i class="bx bx-conversation"></i>
                </div>
                <div class="menu-title">Chat Box</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>