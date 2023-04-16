function pat_showpassword() {
    var x = document.getElementById("pat-password");
    x.type === "password";
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function doc_showpassword() {
    var y = document.getElementById("doc-password");
    y.type === "password";
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}
