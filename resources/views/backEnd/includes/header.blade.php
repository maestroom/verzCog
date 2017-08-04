<div class="app-header white box-shadow navbar-md">
    <div class="navbar">

        <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
            <i class="material-icons">&#xe5d2;</i>
        </a>



        <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>


        <ul class="nav navbar-nav pull-right">
            <li class="nav-item p-t p-b">
                <a class="btn btn-sm info marginTop2" href="" target="_blank"
                   title="{{ trans('backLang.sitePreview') }}">
                    <i class="material-icons">&#xe895;</i> {{ trans('backLang.sitePreview') }}
                </a>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link clear" href data-toggle="dropdown">
                  <span>


                          {{ Auth::user()->name }}

                      <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div class="dropdown-menu pull-right dropdown-menu-scale">


                    @if(Auth::user()->permissions ==0 || Auth::user()->permissions ==1)
                        <a class="dropdown-item"
                           href="{{ route('usersEdit',Auth::user()->id) }}"><span>{{ trans('backLang.profile') }}</span></a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="dropdown-item" href="{{ url('/logout') }}">{{ trans('backLang.logout') }}</a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>

            <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                    <i class="material-icons">&#xe5d4;</i>
                </a>
            </li>
        </ul>



       

    </div>
</div>