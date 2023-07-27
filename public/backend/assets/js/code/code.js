$(function () {
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "Delete This Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });
});

// Start Message

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    icon: "success",
    showConfirmButton: false,
    timer: 3000,
});
if ($.isEmptyObject(data.error)) {
    Toast.fire({
        type: "success",
        title: data.success,
    });
} else {
    Toast.fire({
        type: "error",
        title: data.error,
    });
}

// End Message
