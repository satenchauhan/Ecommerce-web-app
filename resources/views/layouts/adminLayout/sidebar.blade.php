<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (preg_match("/dashboard/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('/admin/dashboard')}} "><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>&nbsp;Categories</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/category/i",$url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/add-category/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('/admin/add-category')}}">Add Category</a></li>
        <li <?php if (preg_match("/show-categories/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('admin/show-categories')}}">Categories List</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>&nbsp;Products</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/product/i",$url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/add-product/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('/admin/add-product')}}">Add Product</a></li>
        <li <?php if (preg_match("/show-products/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('admin/show-products')}}">Products List</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>&nbsp;Coupons</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/coupon/i",$url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/add-coupon/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('admin/add-coupon')}}">Add Coupon</a></li>
        <li <?php if (preg_match("/show-coupons/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('admin/show-coupons')}}">Coupons List</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>&nbsp;Orders</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/orders/i",$url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/view-orders/i",$url)){ ?> class="active" <?php } ?>><a href="{{url('admin/view-orders')}}">Order List</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>&nbsp;Banners</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/banner/i",$url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/add-banner/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('admin/add-banner')}}">Add Banner</a></li>
        <li <?php if (preg_match("/show-banners/i",$url)){ ?>  class="active" <?php } ?>><a href="{{url('admin/show-banners')}}">Banners List</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>&nbsp;Users</span> <span class="label label-important">1</span></a>
      <ul <?php if (preg_match("/users/i",$url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/view-users/i",$url)){ ?> class="active" <?php } ?>><a href="{{url('admin/view-users')}}">Order List</a></li>
      </ul>
    </li>  
  </ul>
</div>
<!--sidebar-menu-->