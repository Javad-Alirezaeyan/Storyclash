var openSidebar = false;

function toggleSidebar(){
    let el = document.getElementById("submenu")
    if (openSidebar){
        el.style.display = "none";
        el.style.left = "-300px";
        openSidebar = false;
    }
    else{
        el.style.display = "block";
        el.style.left = "60px";
        openSidebar = true;
    }
}












//-------------------------------------sending data to the server for collection operation------------------------------

function  updateCollectionName (id,  name)
{
    //calling API
    clientWebApi('put', '/collection/'+id, {"name" : name} ).then(function (res) {
        if (res.status == "ok"){
            resetInputs();
            updateCollectionNode(id,  name);
        }
    });
}

function  deleteCollection(id)
{
    if (confirm("Would you like to delete a collection?")){
        clientWebApi('delete', '/collection/'+id, {} ).then(function (res) {
            if (res.status == "ok"){
                deleteCollectionNode(res['data']['id']);
            }
        })
    }


}
function  saveCollection (name)
{
    clientWebApi('post', '/collection', {"name" : name} ).then(function (res) {
        if (res.status == "ok"){
            createCollection(res['data']['html']);
            hideInputCollection();
        }

    });
    
}

//------------------------------------sending data to the server for collection operation-------------------------------

function  updateReportName (id,  name)
{
    //calling API
    clientWebApi('put', '/report/'+id, {"name" : name} ).then(function (res) {
        if (res.status == "ok"){
            resetInputs();
            updateReportNode(id,  name);
        }
    });
}

function  deleteReport(id)
{
    if (confirm("Would you like to delete a report?")){
        clientWebApi('delete', '/report/'+id, {} ).then(function (res) {
            if (res.status == "ok"){
                deleteReportNode(res['data']['id']);
            }
        })
    }

}
function  saveReport (collection, name)
{
    clientWebApi('post', '/report', {"name" : name, 'collection' : collection} ).then(function (res) {
        if (res.status == "ok"){
            createReport(collection, res['data']['html']);
            hideInputReports();
        }

    });

}

//----------------------------------------------------------------------------------------------------------------------

function showSelectedReportInput(id) {

    resetInputs();
    let input = document.getElementById("inputReport"+id);
    input.classList.remove("hidden");
    let reportNameTag = document.getElementById("reportName"+id);
    reportNameTag.classList.add("hidden");

    hiddenAllDropDownList();
}
//----------------------------------------------------------------------------------------------------------------------
function showSelectedCollectionInput(id) {
    resetInputs();
    let input = document.getElementById("inputCollection"+id);
    input.classList.remove("hidden");
    let collectionNameTag = document.getElementById("collectionName"+id);
    collectionNameTag.classList.add("hidden");

    hiddenAllDropDownList();
}
//----------------------------------------------------------------------------------------------------------------------
function resetInputs() {
    document.getElementById("formNewCollection").style.display = "none";

    var elements = document.getElementsByClassName("input-collection");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.add('hidden');
    }

    elements = document.getElementsByClassName("reportNameInput");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.add('hidden');
    }

    elements = document.getElementsByClassName("itemName");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove('hidden');
    }
}
//----------------------------------------------------------------------------------------------------------------------

function hiddenAllDropDownList(){
    var elements = document.getElementsByClassName("dropdown-list");
    for (var i = 0; i < elements.length; i++) {
        if (!elements[i].classList.contains('hidden')){
            elements[i].classList.add('hidden');
        }
    }
}

//----------------------------------------------------------------------------------------------------------------------


function  showInputCollection(){
    resetInputs();
    let el =document.getElementById("collectionNameInput");
    el.style.display = "block";
    document.getElementById("formNewCollection").style.display = "block";
    el.focus();
}


function  hideInputCollection(){
    let input = document.getElementById("collectionNameInput");
    input.style.display = "none";
    input.value = "";
}

//----------------------------------------------------------------------------------------------------------------------

function  hideInputReports(){
    let elements = document.getElementsByClassName("reportNameInput");
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.add('hidden');
        elements[i].value = "";
    }
}
function showInputReport(id) {
    resetInputs();
    let el = document.getElementById("reportNameInput"+id);
    el.classList.remove("hidden");
    el.focus();
}


//----------------------------------------------------------------------------------------------------------------------

function  toggleReportList(id){
    let x = document.getElementById("reportList"+id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}


//----------------------------------------------------------------------------------------------------------------------
function deleteCollectionNode(id) {
    let el = document.getElementById("liCollection"+id);
    el.remove();
}

function updateCollectionNode(id, name) {
    document.getElementById("collectionTitle"+id).innerText= name;
}
function createCollection(collectionHtml){
    let ulTag = document.getElementById("ulCollection");
    ulTag.innerHTML += collectionHtml;
}

//----------------------------------------------------------------------------------------------------------------------
function deleteReportNode(id) {
    let el = document.getElementById("liReport"+id);
    el.remove();
}

function createReport(collection, reportHtml){
    let ulTag = document.getElementById("ulReport"+collection);

    ulTag.innerHTML += reportHtml;
}
function updateReportNode(id, name) {
    document.getElementById("reportName"+id).innerText= name;
}
//----------------------------------------------------------------------------------------------------------------------




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
async function clientWebApi(method, url, data) {
    return promiseObj = new Promise(function(resolve, reject){
        var xhr = new XMLHttpRequest();
        xhr.open(method, url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
        xhr.send(JSON.stringify(data));
        xhr.onreadystatechange = function(){
            if (xhr.readyState === 4){
                if (xhr.status === 200){
                    //console.log("xhr done successfully");
                    var resp = xhr.responseText;
                    var respJson = JSON.parse(resp);
                    resolve(respJson);
                } else {
                    reject(xhr.status);
                    console.log("error");
                }
            } else {
               // console.log("xhr processing going on");
            }
        }
       // console.log("request sent succesfully");
    });

}


function stringToHTML (str) {
    var parser = new DOMParser();
    var doc = parser.parseFromString(str, 'text/html');
    return doc.body;
};


function findAncestor (el, cls) {
    while ((el = el.parentElement) && !el.classList.contains(cls));
    return el;
}

