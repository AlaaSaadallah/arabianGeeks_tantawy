<div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"> <span>مطابع طنطاوى</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> الرئيسية</a>
                  
                </li>
                <li><a href="{{ route('admin.products')}}"><i class="fa fa-tags"></i> المنتجات </a>
                
                </li>
 
              
                <li><a><i class="fa fa-clone"></i>المكونات الاساسية <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{route('admin.material.paperSize')}}">المقاس</a></li>
                    <li><a href="{{route('admin.material.printOption')}}">شكل الطباعة</a></li>
                    <li><a href="{{route('admin.material.paperType')}}">نوع الورق</a></li>
                    <!-- <li><a href="#"> الكمية</a></li> -->
                    <li><a href="{{route('admin.material.colors')}}">عدد الألوان</a></li>
                    <li><a href="{{route('admin.material.finishOptions')}}">التقفيل </a></li>
                    <!-- <li><a href="#">شرشرة</a></li> -->
                    <li><a href="{{route('admin.material.finishDirections')}}">جهة التقفيل </a></li>
                    <li><a href="{{route('admin.material.cutStyle')}}">القص</a></li>
                    <!-- <li><a href="fixed_footer.html">سلوفان </a></li> -->
                    <li><a href="{{route('admin.material.rega')}}">ريجة</a></li>
                    <!-- <li><a href="fixed_footer.html">تكسير</a></li> -->
                    <li><a href="{{route('admin.material.glue')}}">لزق</a></li>
                    <li><a href="{{route('admin.material.constants')}}">الثوابت</a></li>

              
                  </ul>
                </li>
                <li><a href="{{route('admin.customers')}}"><i class="fa fa-users"></i> عملاءنا</a>
                 
                </li>
                <!-- <li><a href="form_upload.html"><i class="fa fa-table"></i> قائمة التسعير </a> -->
                 
                </li>
                <li><a href="{{route('admin.cities')}}"><i class="fa fa-map-marker"></i> المحافظات </a>
                  
                </li>

                <li><a href="{{route('admin.carts')}}"><i class="fa fa-shopping-bag"></i> الطلبات </a>
                  
                  </li>
              </ul>
            </div>
            
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
        
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>
<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                     
              
                    <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div><!-- /top navigation -->
