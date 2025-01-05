<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<style>
.circular--portrait {
  position: relative;
  width: 50px;
  height: 50px;
  overflow: hidden;
  border-radius: 50%;
}

.circular--portrait img {
  width: 100%;
  height: 100%;
}

@media screen and (max-width: 480px) {
  .card-profile {
    display: none;
    margin-top: 10px;
  }

  .mobile-bottom-nav {
    position: fixed;
    bottom: 30px;
    left: 25px;
    position: fixed;
    right: 25px;
    z-index: 1000;
    transform: translateZ(0);
    display: flex;
    height: 60px;
    background-color: #fff;
    border-radius: 16px;
  }

  .mobile-bottom-nav__item {
    padding: 20px;
    flex-grow: 1;
    text-align: center;
    font-size: 12px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #212529;
  }

  .mobile-bottom-nav__item:hover {
    color: #212529;
    text-decoration: none;
  }

  .mobile-bottom-nav__item--active {
    color: #FE6500;
  }

  .mobile-bottom-nav__item-content {
    display: flex;
    flex-direction: column;
  }

  .bi {
    font-size: 20px;
  }
}

@media screen and (min-width: 480px) {
  .card-profile {
    border: 0;
  }

  .cd__main {
    display: none;
  }
}
</style>
<div class="card shadow card-profile">
  <div class="card-header bg-white ">

    <h6 class="card-title">
      <div class="row">
        <div class="col-md-8 d-flex align-items-center">
          <span class="">{{auth()->user()->name}}</span>
        </div>
      </div>
    </h6>
  </div>
  <div class="card-body">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action" href="{{route('dashboard')}}">
        <i class="bi bi-speedometer2"></i>
        Dashboard</a>
      <a class="list-group-item list-group-item-action" href="{{route('user.tiket')}}">
        <i class="bi bi-receipt"></i> Tiket
      </a>

    </div>
  </div>
</div>




<div class="cd__main">
  <nav class="mobile-bottom-nav">
    <a href="{{route('dashboard')}}" class="mobile-bottom-nav__item">
      <div class="mobile-bottom-nav__item-content {{Request::path()==='/dashboard'?'mobile-bottom-nav__item--active':''}}">
        <i class="bi bi-speedometer2"></i>
        Dashboard
      </div>
    </a>
    <a href="{{route('user.tiket')}}" class="mobile-bottom-nav__item ">
      <div
        class="mobile-bottom-nav__item-content {{Request::path() === '/tiket'?'mobile-bottom-nav__item--active':''}}">
        <i class="bi bi-receipt"></i>
        Tiket
      </div>
    </a>

  </nav>
</div>
