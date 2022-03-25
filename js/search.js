console.log("HEllo");

var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

$(document).ready(function () {
    $("#search").on("keyup", function () {
        var search_term = $(this).val();
        window.location.href = "search.php"

        $.ajax({
            url: "ajax_live_search.php",
            type: "post",
            data: { search: search_term },
            success: function (data) {
                // $(".bgmain").html(data);
            },
        });
    });
});

