<div class="">
    <div class="b-b b-primary nav-active-primary">
        <ul class="nav nav-tabs">
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'personal_info' ? 'active' : '' }}">
                <a class="nav-link" href="#personal_info" data-toggle="tab" aria-expanded="false">Personal Info</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'birth_detail' ? 'active' : '' }}">
                <a class="nav-link" href="#birth_detail" data-toggle="tab" aria-expanded="false">Birth Detail</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'emergency_info' ? 'active' : '' }}">
                <a class="nav-link" href="#emergency_info" data-toggle="tab" aria-expanded="false">Emergency Info</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'secondary_info' ? 'active' : '' }}">
                <a class="nav-link" href="#secondary_info" data-toggle="tab" aria-expanded="false">Secondary Info</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'appearance_and_features' ? 'active' : '' }}">
                <a class="nav-link" href="#appearance_and_features" data-toggle="tab" aria-expanded="false">Appearance & Disable</a>
            </li>
            <li class="nav-item {{ empty($sub_tab) || $sub_tab == 'professional_info' ? 'active' : '' }}">
                <a class="nav-link" href="#professional_info" data-toggle="tab" aria-expanded="false">Professional Info</a>
            </li>
        </ul>
    </div>
    <div class="tab-content p-a m-b-md">
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'personal_info' ? 'active' : '' }}"
            id="personal_info" aria-expanded="true">
            @include('dashboard.consumers.tabs.personal.personal_information')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'birth_detail' ? 'active' : '' }}"
            id="birth_detail" aria-expanded="true">
            @include('dashboard.consumers.tabs.personal.birth_detail')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'emergency_info' ? 'active' : '' }}"
            id="emergency_info" aria-expanded="true">
            @include('dashboard.consumers.tabs.personal.emergency_info')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'secondary_info' ? 'active' : '' }}"
            id="secondary_info" aria-expanded="true">
            @include('dashboard.consumers.tabs.personal.secondary_info')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'appearance_and_features' ? 'active' : '' }}"
            id="appearance_and_features" aria-expanded="true">
            @include('dashboard.consumers.tabs.personal.appearance_and_features')
        </div>
        <div
            class="tab-pane animated fadeIn text-muted {{ empty($sub_tab) || $sub_tab == 'professional_info' ? 'active' : '' }}"
            id="professional_info" aria-expanded="true">
            @include('dashboard.consumers.tabs.personal.professional_info')
        </div>
    </div>
</div>
