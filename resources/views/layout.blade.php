<!DOCTYPE html>
<html  lang="en" >

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link  href="{{ asset("css/app.css") }}" rel="stylesheet">
    <title>@yield("title")</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script >
        window.Laravel =
        <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'baseUrl' => URL::to('/')
        ]); ?>
    </script>
</head>

<body >

<div id="app" >
    <div class="left-wrapper">
        <div class="sidebar">
            <div class="small-logo">
                <img src="{{ asset("images/logo.png")  }}">
            </div>

        </div>
        <div class="sidebar-visible" onclick="toggleSidebar();">
            <i class="fa fa-bookmark-o " aria-hidden="false"></i>
        </div>

        <div class="submenu"  style="font-size: smaller"  id="submenu">
            <div class="subm-navi-container subm-navi-container-posts">
                <div class="submenu-header" onclick="toggleSidebar();" >
                    <div class="submenu-header-title">
                        <i  class="fa fa-angle-left small-icon-collection"></i>
                        <!--                    <i class="far fa-rocket"></i><span>Trending Posts</span>                -->
                        <i class=" fa fa-bookmark-o"></i> <span>Saved Reports</span>
                    </div>
                </div>
            </div>
            <div class="submenu-body  " >
                <div style="padding: 10px;">
                    @if (empty($collections))
                        <div class="img-create-collection ">
                            <img src="{{ asset("images/card_drop.png") }}" />
                            <div class="txt-create-collection">Create your first Collection to organize your Views</div>
                        </div>
                    @else
                        <div class="img-create-collection hidden">
                            <img src="{{ asset("images/card_drop.png") }}" />
                            <div class="txt-create-collection">Create your first Collection to organize your Views</div>
                        </div>
                    @endif


                    <div >
                        <ul class="ul-collection" id="ulCollection">
                            @foreach($collections as $collection)
                                @include("collection.liCollection", ['collection'=>$collection])
                            @endforeach

                        </ul>
                        <div id="formNewCollection"  >
                            <input type="text" style="width: 80%" id="collectionNameInput"  value="" autocomplete="off" />
                        </div>
                    </div>

                    <div  class="link-create-collection">
                        <i class="fa fa-plus"></i>
                        <span onclick="showInputCollection()" class="title-link-create-collection">Create new Collection</span>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <div class="main-content">
        <header class="top-header"></header>
    </div>
    @yield('content')



    <footer>

    </footer>

</div>



<script   src="{{ asset('js/app.js') }}" ></script>
</body>
</html>