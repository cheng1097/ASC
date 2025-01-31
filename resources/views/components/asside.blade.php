 @php
     $menus = sidebar();
 @endphp

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         @foreach ($menus as $nameRoute => $valuePath)
             @php
                 $route = url($valuePath['path']);
                 $path = $valuePath['path'];
                 $icon = $valuePath['icon'];
                 url_tab(0) == $path ? ($active = '') : ($active = 'collapsed');
                 $subactive = $active == 'collapsed' ? 'collapse ' : 'collapse show'; 
             @endphp

             @if (!isset($valuePath['items']))

                 <li class="nav-item">
                     <a class="nav-link {{$active}}" href="{{ $route ?? '/' }}">
                         <i class="{{ $icon ?? '' }}"></i>
                         <span>{{ $nameRoute ?? '' }}</span>
                     </a>
                 </li>
             @else
                 <li class="nav-item">
                     <a class="nav-link {{$active}}" data-bs-target="#nav-{{$path}}" data-bs-toggle="collapse"
                         href="{{ $route ?? '/' }}">
                         <i class="{{ $icon ?? '' }}"></i><span>{{ $nameRoute ?? '' }}</span><i
                             class="bi bi-chevron-down ms-auto"></i>
                     </a>
                     <ul id="nav-{{$path}}" class="nav-content {{$subactive}}" data-bs-parent="#sidebar-nav">
                         @foreach ($valuePath['items'] as $subNameRoute => $item)
                         @php
                              //url_() ==  $item['path'] ? ($itemActive = 'class="active"') : ($itemActive = '');
                              url_tab(1) ==  explode('/', $item['path'])[1] ? ($itemActive = 'class="active"') : ($itemActive = '');
                         @endphp
                             <li>
                                 <a href="{{ url($item['path']) ?? '' }}" {!!$itemActive!!}>
                                     <i class="bi bi-circle"></i><span>{{ $subNameRoute ?? '' }}</span>
                                 </a>
                             </li>
                         @endforeach
                     </ul>
                 </li>

             @endisset
         @endforeach

 </ul>

</aside><!-- End Sidebar-->
