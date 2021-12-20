var uploadBtn = _("uploadBtn");
var backBtn = _("backBtn");

function _(el) {
    return document.getElementById(el);
}

function uploadFile() {
    var files = _("files").files;
    if (!files.length) {
        alert("Pilih file terlebih dahulu.");
        return;
    }
    _("progressBar").classList.remove("d-none");

    backBtn.href = "javascript:void(0)";
    backBtn.style.cursor = "not-allowed";

    uploadBtn.blur();
    uploadBtn.innerText = "Batalkan";
    uploadBtn.classList.remove("btn-primary");
    uploadBtn.classList.add("btn-danger");
    uploadBtn.onclick = null;
    uploadBtn.addEventListener("click", function () {
        abortUpload();
        return;
    });

    var formData = new FormData();
    for (let i = 0; i < files.length; i++) {
        formData.append("files[]", files[i]);
    }

    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "/upload_proccess.php");
    ajax.send(formData);

    function abortUpload() {
        ajax.abort();
        return;
    }
}

function progressHandler(event) {
    _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
}

function completeHandler(event) {
    _("status").innerHTML = event.target.responseText;
    returnAllBtnStyle();
    setTimeout(function () {
        window.location.href = "/file.php";
    }, 1000);
}

function errorHandler(event) {
    _("status").innerHTML = "Upload Failed";
    returnAllBtnStyle();
}

function abortHandler(event) {
    _("status").innerHTML = "Upload Aborted";
    _("files").value = "";
    returnAllBtnStyle();
}

function returnAllBtnStyle() {
    backBtn.href = "/file.php";
    backBtn.style.cursor = "pointer";

    uploadBtn.blur();
    uploadBtn.innerText = "Unggah";
    uploadBtn.classList.remove("btn-danger");
    uploadBtn.classList.add("btn-primary");
    uploadBtn.onclick = null;
    uploadBtn.addEventListener("click", function () {
        uploadFile();
        return;
    });
}