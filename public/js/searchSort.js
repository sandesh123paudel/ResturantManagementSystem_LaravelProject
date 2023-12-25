// scripts.js

$(document).ready(function() {
    $('.category-link').click(function(e) {
        e.preventDefault(); // Prevent the default behavior of the link

        var categoryId = $(this).data('category');

        // Set the selected category in the hidden input field
        $('#category').val(categoryId);

        // Submit the form
        $('#searchSortForm').submit();
    });

    function resetForm() {
        // Reset search input
        $('#search').val('');

        // Reset sorting dropdown
        $('#sort').val('');

        // Reset category input
        $('#category').val('');

        $('#foodType').val('');

        // Submit the form
        $('#searchSortForm').submit();
    }

    // Attach the resetForm function to the reset button
    $('#resetButton').click(function() {
        resetForm();
    });
});

function submitForm() {
    var formData = $('#searchSortForm').serialize();

    // Use AJAX to submit the form
    $.ajax({
        url: '{{ route('products.searchSort')}}', // Adjust the route name
        type: 'GET',
        data: formData,
        success: function(data) {
            // Update your product list or perform other actions with the response
            console.log(data);
        },
        error: function(error) {
            // Handle errors if needed
            console.error(error);
        }
    });

    return false; // Prevent the default form submission
}
