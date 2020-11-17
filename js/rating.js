var commited = false;
var previousRating = 0;
$(".rating > i").mouseover(function(e) {
    var target = $(e.target);
    var parent = target.parent();
    var index = target.index();
    var stars = parent.children();
    stars.removeClass("fa-star");
    stars.addClass("fa-star-o");
    for(var i = 0; i <= index;i++) {
        var curStar = $(stars[i]);
        curStar.removeClass("fa-star-o");
        curStar.addClass("fa-star");
    }
    parent.next().text(index+1);
});

$(".rating > i").click(function(e) {
    commited = true;
    var target = $(e.target);
    var parent = target.parent();
    previousRating = parseInt(parent.next().text());
});
$("div.rating").mouseenter(function(e) {
    commited = false;
});
$("div.rating").mouseleave(function(e) {
    var stars = $(this).children();
    if (!commited) {
        stars.removeClass("fa-star");
        stars.addClass("fa-star-o");
        for(var i = 0; i <= previousRating - 1;i++) {
            var curStar = $(stars[i]);
            curStar.removeClass("fa-star-o");
            curStar.addClass("fa-star");
        }
        $(this).next().text(previousRating===0 ? "" : previousRating);
    }
});