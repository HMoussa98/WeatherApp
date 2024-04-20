

function clearFilters() {
    // Reset all input values to empty
    document.querySelectorAll('input').forEach(input => {
        input.value = '';
    });

    // Submit the form
    document.querySelector('form').submit();
}