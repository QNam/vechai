<div class="menu">
    <nav class="navbar navbar-default bg-1">
       <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
                 @foreach ($data as $item)
                 @if($item->subMenus->count() > 0) 
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $item->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach ($item->subMenus as $sub)
                       <li><a href="{{ $sub->link }}">{{ $sub->name }}</a></li>
                       @endforeach
                    </ul>
                 </li>
                 @else
                 <li><a href="{{ $item->link }}">{{ $item->name }}</a></li>    
                 @endif 
                 @endforeach
             </ul>
             <form method="GET" action="{{ route('news.index') }}"  class="form-search navbar-form navbar-right" role="search">
                <div class="form-group">
                   <input type="text" class="form-control" placeholder="Nhập từ khóa" name="q">
                   {{-- <input type="hidden" name="post_type" value="product"> --}}
                </div>
                <button type="submit" class="button btn btn-default">Tìm kiếm</button>
             </form>
          </div>
          <!-- /.navbar-collapse -->
       </div>
       <!-- /.container-fluid -->
    </nav>
 </div>