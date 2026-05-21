$(document).ready(function () {
    loadBlogs();

    function loadBlogs() {
        let search = $("#search").val();
        let category = $("#category").val();
        let date = $("#date").val();

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


