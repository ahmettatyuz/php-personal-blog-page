$(document).ready(function () {
    $(".eye").click(function () {
        if ($(".pw").attr("type") == "password") {
            $(".pw").attr("type", "text");
            $(".eye").removeClass("fa-eye");
            $(".eye").addClass("fa-eye-slash");
        } else {
            $(".pw").attr("type", "password");
            $(".eye").removeClass("fa-eye-slash");
            $(".eye").addClass("fa-eye");
        }
    });

    var pagename = $("#pagename").text().trim();
    var pagename2;
    if (pagename.includes("makale")) {
        pagename2 = pagename;
        pagename = "makaleler";
    }
    if (pagename.includes("ders")) {
        pagename2 = pagename;
        pagename = "dersler";
    }
    console.log(pagename);
    $(".nav-link").each(function () {
        if ($(this).attr("href") == pagename) {
            $(this).addClass("active");
        }
    });
    $(".dropdown-item").each(function () {
        if ($(this).attr("href") == pagename2) {
            $(this).addClass("active");
        }
    });
})

