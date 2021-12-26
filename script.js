var uploadBtn = _("uploadBtn");
var backBtn = _("backBtn");
var formFile = _("files");

function _(el) {
    return document.getElementById(el);
}

function uploadFile() {
    var files = formFile.files;
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

    formFile.disabled = true;
    formFile.style.cursor = "not-allowed";

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

    window.onbeforeunload = function (e) {
        return "";
    };

    function abortUpload() {
        ajax.abort();
        return;
    }
}

function progressHandler(event) {
    _("loaded_n_total").innerHTML = "Terunggah " + event.loaded + " bytes dari " + event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent) + "% terunggah... mohon tunggu.";
}

function completeHandler(event) {
    _("status").innerText = event.target.responseText;
    returnAllBtnStyle();
    clearConfirmBeforeUnload();
}

function errorHandler() {
    _("status").innerHTML = "Gagal mengunggah file.";
    returnAllBtnStyle();
    clearConfirmBeforeUnload();
}

function abortHandler() {
    _("status").innerHTML = "Unggahan dibatalkan.";
    formFile.value = "";
    returnAllBtnStyle();
    clearConfirmBeforeUnload();
}

function returnAllBtnStyle() {
    backBtn.href = "/file.php";
    backBtn.style.cursor = "pointer";

    formFile.value = "";
    formFile.disabled = false;
    formFile.style.cursor = "pointer";

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

function clearConfirmBeforeUnload() {
    window.onbeforeunload = null;
}