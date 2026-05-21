$(document).ready(function () {
    loadBlogs();

    function loadBlogs() {
        let search = $("#search").val();
        let category = $("#category").val();
        let date = $("#date").val();

        $("#blog-results").html("<div class='loading'>Loading blogs...</div>");

        $.ajax({
            url: "ajax/filter.php",
            method: "POST",
            data: {
                search: search,
                category: category,
                date: date
            },
            success: function (data) {
                $("#blog-results").html(data);
            },
            error: function () {
                $("#blog-results").html("<div class='empty-state'>Something went wrong. Please try again.</div>");
            }
        });
    }

    $("#search").keyup(function () {
        loadBlogs();
    });

    $("#category").change(function () {
        loadBlogs();
    });

    $("#date").change(function () {
        loadBlogs();
    });
});




