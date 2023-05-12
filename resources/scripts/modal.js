jQuery(document).ready(function($){
    if ($(window).width() > 768) {
        $("div.holder").jPages({
            containerID: "ulAmbul",
            perPage: 9,
            first: "Đầu",
            previous: "Previous",
            next: "Next",
            last: "Cuối",
            midRange: 2,
        });
    }
    else {
        $("div.holder").jPages({
            containerID: "ulAmbul",
            perPage: 10,
            first: "Đầu",
            previous: "Previous",
            next: "Next",
            last: "Cuối",
            midRange: 2,
        });
    }
});