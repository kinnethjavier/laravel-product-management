// Events for specification field
$("#btn-add-spec").click(function () {
    var specRow =
        "<div id='spec-row' class='flex items-center space-x-2'>" +
        "<input name='specification[]' type='text' required class='block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6'>" +
        "<button type='button' id='btn-remove-spec' class='flex md:w-auto items-center justify-center rounded-md border border-transparent bg-red-600 px-2 py-[5px] text-base font-medium text-white hover:bg-red-700'>" +
        "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-trash-2'><path d='M3 6h18'/><path d='M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6'/><path d='M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2'/><line x1='10' x2='10' y1='11' y2='17'/><line x1='14' x2='14' y1='11' y2='17'/></svg>" +
        "</button>" +
        "</div>";

    $("#specs").append(specRow);
});

$("body").on("click", "#btn-remove-spec", function () {
    $(this).parents("#spec-row").remove();
});

// Other form event
$("form").submit(function (e) {
    // check if user doesn't select category
    if ($('input[name="category[]"]:checked').length === 0) {
        e.preventDefault();
        Swal.fire({
            title: "Missing Category",
            text: 'Please select at least 1 category. If no category is available, select "Other". You can also add new category in categories page.',
            icon: "error",
            confirmButtonText: "Ok",
            confirmButtonColor: "#1D9BF0",
        });
    }
});

// Preview photo
$("#photo").change(function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        $("#preview").attr("src", reader.result).show();
    };
    reader.readAsDataURL(event.target.files[0]);
});
