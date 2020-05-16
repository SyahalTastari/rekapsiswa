<nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href=""><img src="" class="img-responsive logo"></a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-left">
          <div class="input-group">
          
          </div>
        </form>
        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
          
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="" class="img-circle" > <span>
               @if(empty(auth()->user()->name)) 
               </span></a>
               @else
              
               {{auth()->user()->name}}
                 </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                <ul class="dropdown-menu">
                <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
              </ul>
               @endif
              
             
            </li>
            
          </ul>
        </div>
      </div>
    </nav>