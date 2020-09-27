/**
 * listener for showing the dropdown filter
 */
document.addEventListener('click', function(e) {
    e = e || window.event;
    var target = e.target || e.srcElement ;

    // if a user clicks on the one of filters
    if (target.classList.contains("div-filter")){
        let tempTarget = target.nextElementSibling;
        if ( tempTarget.classList.contains("hidden")){
            hiddenAllDropDownList();
            tempTarget.classList.remove("hidden");
        }
        else{
            tempTarget.classList.add("hidden");
        }
    }
}, false);

//----------------------------------------------------------------------------------------------------------------------

document.addEventListener('keyup', function(e) {
    e = e || window.event;
    var target = e.target || e.srcElement ;

    if (target.id === "collectionNameInput"){
        if (e.key === 'Enter') {
            // code for enter
            saveCollection( document.getElementById("collectionNameInput").value);
        }

        if (e.key === 'Escape') {
            // code for Escape
            hideInputCollection()

        }
    }

    if (target.classList.contains('input-collection')){
        if (e.key === 'Enter') {
            // code for enter
            updateCollectionName(target.getAttribute("collectionId"), target.value );
        }

        if (e.key === 'Escape') {
            resetInputs();
        }
    }

    if (target.classList.contains('reportNameInput')){
        if (e.key === 'Enter') {
            // code for enter
            saveReport(target.getAttribute("collection"), target.value);
        }
        if (e.key === 'Escape') {
            // code for Escape
            hideInputReports();
        }
    }

    if (target.classList.contains('input-report')){
        if (e.key === 'Enter') {
            updateReportName(target.getAttribute("report"), target.value );
        }
        if (e.key === 'Escape') {
            resetInputs();
        }
    }


}, false);
//----------------------------------------------------------------------------------------------------------------------