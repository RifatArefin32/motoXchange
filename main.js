var acBox = document.querySelector("#navbarNav");
var lnk = document.querySelector("#accnBox");
var toggle = true;
document.addEventListener("click", function (e) {
    // console.log(e.target);
    if (toggle && e.target.id === 'accnBox1') {
        acBox.style.display = "none";
        toggle = false;

    }else if (e.target.id === 'accnBox') {
        acBox.style.display = "none";
        toggle = true;

    } 
    else if (!toggle && e.target.id === 'accnBox1') {
        acBox.style.display = "none";
        lnk.style.display = "none";
        toggle = true;

    }
});


// var acBox = document.querySelector("#navbarNav");
// var toggle = true;
// document.addEventListener("click", function (e) {
//     // console.log(e.target);
//     if (toggle && e.target.id === 'accnBox' || acBox.contains(e.target)) {
//         acBox.style.display = "block";
//         toggle = false;

//     } else {
//         acBox.style.display = "none";
//         toggle = true;
//     }
// });