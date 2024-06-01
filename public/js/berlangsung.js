function cariUjian() {
    const formCari = document.getElementById('formCari');
    let keyword = document.getElementById('searching').value;
    formCari.setAttribute('action','/examify-platform-ujian/siswa-ujian/' + keyword);
    formCari.submit();
}