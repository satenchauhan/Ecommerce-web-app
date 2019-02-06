<div class="d-block logo">
  <h3 style="color:yellow"><img src="{{asset('images/bimages/logo1.jpg') }}" style="margin-top:10px; margin-left:5px;" width="3%" alt="Logo" />&nbsp;Saten E-Shop</h3>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">

    <li class=""><a title="" href="{{url('/admin/edit')}}"><i class="icon icon-cog"></i> <span class="text">Setting</span></a></li>
    <li class=""><a title="" href="{{url('/logout')}}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>

  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->