var companyName='';
var companyURL='';
$(".nonlog-cmpy-visit").click(function(e) {
    var target = $(e.target);
    companyName = target.parent().children("h1.card-title").html();
    companyURL = target.prev().text();
    $("#signInPrompt").modal("show");
});
$("#signInPrompt").on("show.bs.modal", function() {
    $("#modalCompanyName").text(companyName);
});
$("#prompt-visit").click(function(e) {
    window.location.href = companyURL;
});
$("#prompt-login").click(function(e) {
    window.location.href = "signin.php";
})