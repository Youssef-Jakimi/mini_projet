
document.getElementById('match-input').addEventListener('input', function() {
    var matchInput = document.getElementById('match-input').value;
    var options = document.querySelectorAll('#match option');
    var gameidField = document.getElementById('gameid');

    options.forEach(function(option) {
        if (option.value === matchInput) {
            gameidField.value = option.getAttribute('data-gameid');
        }
    });
});

