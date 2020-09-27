

        <li class="liReport liItem liItemReport" id="liReport{{ $report['id'] }}">
            <div class="collection-header">
                <i style="background: #D65554; float: left; width: 28px; height: 28px; line-height: 2.2; text-align: center;
                                     border-radius: 15px; color: white; margin-right: 5px" class="fa fa-rocket"></i>
                <span class="itemName" style="float: left;" id="reportName{{ $report['id'] }}">

                    <span class="collection-title">{{ $report['name'] }}</span>

                </span>
                <span >
                    <input class="input-report hidden " report="{{ $report['id']  }}" value="{{ $report['name'] }}" id="inputReport{{ $report['id'] }}" type="text"  />
                </span>
                <span class="filter-collection-row">
                    <div class="div-filter ">
                        <i style="" class="fa fa-ellipsis-v icon-filter-dropdown  "></i>
                    </div>
                    <div class="menu-collection-block  dropdown-list hidden" dataRecordType="report" data-report-id="{{ $report['id'] }}">
                        <ul class="menu-collection dropdown-filters">
                            <li class="rename" onclick="showSelectedReportInput({{ $report['id'] }})"><i class="fa fa-pencil"></i> Rename</li>
                            <li ><i class="fa fa-share-alt"></i> Share with friends</li>
                            <li class="delete deleteReport" onclick="deleteReport({{  $report['id'] }})" >
                                <i class="fa fa-trash-o" ></i>
                                Delete
                            </li>
                        </ul>
                    </div>
                </span>
                <div style="clear:both;"></div>
            </div>
        </li>



