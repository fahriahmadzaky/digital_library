@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{ $user->fullname }}!</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card profile-widget">
            <div class="profile-widget-header">                     
              <img alt="image" src="{{ asset('admin/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Account Created</div>
                    <div class="profile-widget-item-value">{{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y') }}</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Last Updated</div>
                    <div class="profile-widget-item-value">{{ \Carbon\Carbon::parse($user->updated_at)->format('F j, Y') }}</div>
                  </div>
                </div>
                </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">{{ $user->fullname }}<div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{ $user->role }}</div></div>
              </div>
              <div class="card-footer text-left">
                <a href="/profile/update" class="btn btn-primary mr-1">
                  <i class="fas fa-pen-to-square"></i> Edit
                </a>
                <a href="/profile/password/update" class="btn btn-primary mr-1">
                  <i class="fas fa-lock"></i> Change Password
                </a>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
    
@endsection