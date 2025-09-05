document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'l') {
        window.location.href = 'logout.php';
    }
});
