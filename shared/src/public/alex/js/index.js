
function clear_forms() {
    console.log("here");
    for (let e of document.getElementsByClassName("form-control")) {
        e.value = "";
    }
}