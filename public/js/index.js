function sendEmail() {
    const hubungiKami = document.getElementById('hubungiKami');
    let su = hubungiKami.querySelector('#subjek').value;
    let body = hubungiKami.querySelector('#pesan').value;
    let link = `https://mail.google.com/mail/?view=cm&fs=1&to=examify.mail@gmail.com&su=${su}&body=${body}&bcc=contact.rakafebrian@gmail.com`
    window.location = link;
}