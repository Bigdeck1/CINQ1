document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'scan.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById('result').textContent = xhr.responseText;
            } else {
                document.getElementById('result').textContent = 'Error occurred while scanning the file.';
            }
        }
    };
    xhr.send(formData);
});
