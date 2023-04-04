<ul class="side-nav">

<li class="side-nav-title side-nav-item">Navigation</li>

 <li class="side-nav-item">
    <a href="{{ route('dashboard-index') }}" class="side-nav-link">
        <i class="uil-calender"></i>
        <span> Dashboard </span>
    </a>
</li>

<li class="side-nav-title side-nav-item">Manage</li>

<li class="side-nav-item">
    <a href="{{ route('index') }}" class="side-nav-link">
        <i class="uil-users-alt"></i>
        <span> Voters </span>
    </a>
</li>
@if(auth()->user()->role == 'admin')
<li class="side-nav-item">
    <a href="{{ route('position-index') }}" class="side-nav-link">
        <i class="uil-location"></i>
        <span> Positions </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="{{ route('course-section-index') }}" class="side-nav-link">
        <i class="uil-book-open"></i>
        <span> Course & Section </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="{{ route('department-index') }}" class="side-nav-link">
        <i class="uil-shop"></i>
        <span> Departments </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="{{ route('college-index') }}" class="side-nav-link">
        <i class="uil-building"></i>
        <span> Colleges </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="{{ route('partylist-index') }}" class="side-nav-link">
        <i class="uil-comments-alt"></i>
        <span> Partylist </span>
    </a>
</li>
@endif
<li class="side-nav-item">
    <a href="{{ route('candidate-index') }}" class="side-nav-link">
        <i class="uil-user"></i>
        <span> Candidates </span>
    </a>
</li>

<li class="side-nav-title side-nav-item">Settings</li>
@if(auth()->user()->role == 'admin')
<li class="side-nav-item">
    <a href="{{ route('user-index') }}" class="side-nav-link">
        <i class="uil-users-alt"></i>
        <span> User Management </span>
    </a>
</li>


<li class="side-nav-item">
    <a href="{{ route('title-index') }}" class="side-nav-link">
        <i class="uil-comments-alt"></i>
        <span> Election Title </span>
    </a>
</li>
@endif
<li class="side-nav-item">
    <a href="{{ route('profile-index') }}" class="side-nav-link">
        <i class="uil-user"></i>
        <span> Profile </span>
    </a>
</li>
</ul>   