$('#sort, #foodType').change(function() {
    $('#searchSortForm').submit();
});
$(document).ready(function() {
    $('.category-link').click(function(e) {

    });

    function resetForm() {
        // Reset form fields
        $('#search, #sort, #category, #foodType').val('');

        // Submit the form
        $('#searchSortForm').submit();
    }

    $('#resetButton').click(function() {
        resetForm();
    });
});

$(document).ready(function() {
    // Initial visibility based on searchQuery
    toggleShowingAllProducts();

    $('#resetButton').click(function() {
        // Simulate clearing the search query
        $('#search').val('');
        // Toggle visibility after clearing the search query
        toggleShowingAllProducts();
    });

    function toggleShowingAllProducts() {
        var hasSearchQuery = '{{ isset($searchQuery) }}';
        if (hasSearchQuery) {
            $('#searchResults').show();
        } else {
            $('#searchResults').hide();
        }
    }
});

