function showMessageDialog(message) {
    const dialogBox = $('<div>').addClass('dialog-box');
    const messageElement = $('<p>').addClass('message').text(message);
    const closeButton = $('<span>').addClass('close-button').html('&times;');
    dialogBox.append(messageElement, closeButton);

    $('body').append(dialogBox);
    dialogBox.hide().fadeIn(100);

    closeButton.on('click', function () {
        dialogBox.remove();
    });

    setTimeout(function () {
        dialogBox.fadeOut(100, function () {
            dialogBox.remove();
        });
    }, 5000);
}
