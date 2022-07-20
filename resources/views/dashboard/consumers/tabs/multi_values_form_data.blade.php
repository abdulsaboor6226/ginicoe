<div class="">
    <div class="b-b b-primary nav-active-primary">
        <ul class="nav nav-tabs">
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'driving_licence' ? 'active' : '' }}">
                <a class="nav-link" href="#driving_licence" data-toggle="tab" aria-expanded="false">Driving Licence</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'passport' ? 'active' : '' }}">
                <a class="nav-link" href="#passport" data-toggle="tab" aria-expanded="false">Passport</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'twins' ? 'active' : '' }}">
                <a class="nav-link" href="#twins" data-toggle="tab" aria-expanded="false">Twins</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'hunting' ? 'active' : '' }}">
                <a class="nav-link" href="#hunting" data-toggle="tab" aria-expanded="false">Hunting</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'fishing' ? 'active' : '' }}">
                <a class="nav-link" href="#fishing" data-toggle="tab" aria-expanded="false">Fishing</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'medicaids' ? 'active' : '' }}">
                <a class="nav-link" href="#medicaids" data-toggle="tab" aria-expanded="false">Medicaids</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'medicares' ? 'active' : '' }}">
                <a class="nav-link" href="#medicares" data-toggle="tab" aria-expanded="false">Medicares</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'aviation' ? 'active' : '' }}">
                <a class="nav-link" href="#aviation" data-toggle="tab" aria-expanded="false">Aviation</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'fire_arms' ? 'active' : '' }}">
                <a class="nav-link" href="#fire_arms" data-toggle="tab" aria-expanded="false">Fire Arm</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'non_US_employment' ? 'active' : '' }}">
                <a class="nav-link" href="#non_US_employment" data-toggle="tab" aria-expanded="false">Non US Employment</a>
            </li>
        </ul>
    </div>
    <div class="tab-content p-a m-b-md">
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'driving_licence' ? 'active' : '' }}"
            id="driving_licence" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.driving_licence')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'passport' ? 'active' : '' }}"
            id="passport" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.passport')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'twins' ? 'active' : '' }}"
            id="twins" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.twins')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'hunting' ? 'active' : '' }}"
            id="hunting" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.hunting')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'fishing' ? 'active' : '' }}"
            id="fishing" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.fishing')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'medicaids' ? 'active' : '' }}"
            id="medicaids" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.medicaids')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'medicares' ? 'active' : '' }}"
            id="medicares" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.medicares')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'aviation' ? 'active' : '' }}"
            id="aviation" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.aviation')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'fire_arms' ? 'active' : '' }}"
            id="fire_arms" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.fire_arms')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'non_US_employment' ? 'active' : '' }}"
            id="non_US_employment" aria-expanded="true">
            @include('dashboard.consumers.tabs.multi_values.non_US_employment')
        </div>
    </div>
</div>
