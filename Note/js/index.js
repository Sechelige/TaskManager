const savebtn = document.getElementById('savebtn');

savebtn.addEventListener('click', () => {
    const note = document.getElementById('mytextarea').value;

    // Save the note to the database
    fetch('/save', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ note })
    })
});