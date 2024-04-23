@include('Chatify::layouts.headLinks')

<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView">
        {{-- Header and search bar --}}
        <div class="m-header">
           <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">KIBBS MESSAGES</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            {{-- <input type="text" class="messenger-search" placeholder="Search" /> --}}
             {{-- Clock --}}
             @include('layouts.clock')
            {{-- Tabs --}}
            <div class="messenger-listView-tabs">
                <a href="#" @if($route == 'user') class="active-tab" @endif data-view="users">
                    <span class="far fa-user"></span> Recent Messages</a>
                {{-- <a href="#" @if($route == 'group') class="active-tab" @endif data-view="groups">
                    <span class="fas fa-users"></span> Groups</a> --}}
            </div>
        </div>
        {{-- tabs and lists --}}
        <div class="m-body">
           {{-- Lists [Users/Group] --}}
           {{-- ---------------- [ User Tab ] ---------------- --}}
           <div class="@if($route == 'user') show @endif messenger-tab app-scroll" data-view="users">

               {{-- Favorites --}}
               <div class="favorites-section">
                <p class="messenger-title">Favorites</p>
                <div class="messenger-favorites app-scroll-thin"></div>
               </div>

               {{-- Saved Messages --}}
               {!! view('Chatify::layouts.listItem', ['get' => 'saved','id' => $id])->render() !!}

               {{-- Contact --}}
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

           </div>

           {{-- ---------------- [ Group Tab ] ---------------- --}}
           <div class="@if($route == 'group') show @endif messenger-tab app-scroll" data-view="groups">
                {{-- items --}}
                <p style="text-align: center;color:grey;">Soon will be available</p>
             </div>

             {{-- ---------------- [ Search Tab ] ---------------- --}}
           {{-- <div class="messenger-tab app-scroll" data-view="search">
                <p class="messenger-title">Search</p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Type to search..</span></p>
                </div>
             </div> --}}
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}

    
    <div class="messenger-messagingView">
        <nav class="navbar navbar-expand-lg m-header m-header-messaging">
            <a href="#" class="navbar-brand show-listView"><i class="fas fa-arrow-left"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav text-center mr-auto">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                    <i class="far fa-user text-muted"></i> 
                    <span id="chatUser"></span>
                    <small id="chatUserType" class="text-muted ml-1"></small>
                </a>
                
                <li class="nav-item">
                  <a class="nav-link add-to-favorite mt-1" href="#" style="display: inline-block"><i class="fas fa-star"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link show-infoSide mt-1" href="#"><i class="fas fa-info-circle"></i></a>
                </li>
              </ul>
              <div class="nav-item text-center dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-lock"></i> {{ \Auth::user()->name }}
                    @if (\Auth::check())
                        @if (\Auth::user()->is_admin == 1)
                            <small class="text-muted ml-1"> (Admin)</small>
                        @else
                            <small class="text-muted ml-1"> (Member)</small>
                        @endif
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if (\Auth::user()->is_admin == 1)
                    <a class="dropdown-item" href="{{ route('admin.bookings.index') }}">{{ __('Admin Panel') }}</a>
                @endif
                <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
              </div>
            </div>
          </nav>
        
        {{-- Internet connection --}}
        <div class="internet-connection">
            <span class="ic-connected">Connected</span>
            <span class="ic-connecting">Connecting...</span>
            <span class="ic-noInternet">No internet access</span>
        </div>
        {{-- Messaging area --}}
        <div class="m-body app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
            </div>
            {{-- Typing indicator --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <p>
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </p>
                </div>
            </div>
            {{-- Send Message Form --}}
            @include('Chatify::layouts.sendForm')
        </div>
    </div>
    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- nav actions --}}
        <nav>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
