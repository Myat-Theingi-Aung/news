document.getElementById('delete-button').addEventListener('click', function(event) {
    event.preventDefault();
    if (confirm('Are you sure you want to delete this item?')) {
        document.getElementById('news').submit();
    }
});
