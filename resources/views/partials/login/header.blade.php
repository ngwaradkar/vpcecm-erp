<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="mt-2 mr-5 d-flex align-items-center">
        <a href="{{ route('login') }}" class="d-flex align-items-center text-white text-decoration-none">
            <img src="{{ asset('assets/images/college_emblem.png') }}" alt="VPCCECM Emblem" style="height: 44px; width: 44px; border-radius: 50%; background: #fff; padding: 2px; margin-right: 12px; box-shadow: 0 0 6px rgba(0,0,0,0.25);">
            <div>
                <h4 class="text-bold text-white mb-0" style="line-height: 1.2;">VPCCECM <span class="badge badge-warning font-size-xs ml-2 align-middle">NAAC Grade 'A+' (3.42 CGPA)</span></h4>
                <div class="font-size-xs text-white opacity-75 d-none d-lg-block">Vidya Prabodhini College of Commerce, Education, Computer & Management, Parvari-Goa</div>
            </div>
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="{{ route('login') }}" class="navbar-nav-link">
                    <i class="icon-user-tie"></i>
                    <span class="d-md-none ml-2">My Account</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
