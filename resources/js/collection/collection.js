
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



