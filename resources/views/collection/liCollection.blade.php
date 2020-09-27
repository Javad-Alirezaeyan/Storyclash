

        <li class="li-collection-hover liItem liItemCollection" id="liCollection{{ $collection['id'] }}">
            <div class="collection-header">
                <span  class="itemName" style="float: left;" id="collectionName{{ $collection['id'] }}">
                    <span id="collectionTitle{{ $collection['id'] }}"  class="collection-title">{{ $collection['name'] }}</span>
                    <i onclick="toggleReportList({{ $collection['id'] }})" class="fa fa-angle-down"></i>
                </span>
                <span>
                    <input class="input-collection hidden  "  collectionId="{{ $collection['id'] }}"
                           id="inputCollection{{  $collection['id'] }}" value="{{ $collection['name'] }}"  type="text"/>
                </span>
                <span class="filter-collection-row">
                     <div class="div-filter ">
                        <i  class="fa fa-ellipsis-v icon-filter-dropdown  "></i>
                    </div>
                    <div class="menu-collection-block dropdown-list hidden" id="dropdownList{{$collection['id']}}" >
                        <ul class="menu-collection dropdown-filters">
                            <li class="rename" onclick="showSelectedCollectionInput({{  $collection['id'] }})" ><i class="fa fa-pencil  "></i> Rename</li>
                            <li><i class="fa fa-share-alt"></i> Share with friends</li>
                            <li class="delete deleteCollection" onclick="deleteCollection({{  $collection['id'] }})"><i class="fa fa-trash-o"></i> Delete</li>
                        </ul>
                    </div>
                </span>
                <div style="clear:both"></div>
            </div>
            <div id="reportList{{$collection['id']}}">
                <div>
                    <ul class="ul-report" id="ulReport{{ $collection['id'] }}"  >
                        @foreach($collection['report'] as $report)
                            @include("collection.liReport", ["report" => $report] )
                        @endforeach
                    </ul>
                </div>

                <div >
                    <input class="reportNameInput hidden" type="text" id="reportNameInput{{ $collection['id'] }}"
                           collection="{{ $collection['id'] }}"
                           value=""
                           autocomplete="off"/>
                </div>
                <div class="link-create-report" onclick="showInputReport({{ $collection['id'] }})" >
                    <i class="fa fa-plus"></i>
                    <span class="title-link-create-collection">Save Report</span>
                </div>
            </div>

        </li>





