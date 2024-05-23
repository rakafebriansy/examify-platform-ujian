//AJAX
function fetchUbahUjian(btn) {
    id = btn.previousElementSibling.value;
    fetch('/examify/ajax/ubah-ujian', {
        method: 'POST',
        body: new URLSearchParams('id='+id)
    }).then(res => res.json())
      .then(res => dropdownUbahUjian(res))
      .catch(e => console.error('Error'+e));
}

//DOM
function dropdownBuat(li) {
    document.getElementById('mapelBuatId').value = li.dataset.id;
    document.getElementById('dropdownBuatBtn').innerText = li.firstElementChild.innerText;
}
function dropdownUbah(li) {
    document.getElementById('mapelUbahId').value = li.dataset.id;
    document.getElementById('dropdownUbahBtn').innerText = li.firstElementChild.innerText;
    console.log(document.getElementById('mapelUbahId').value);
}
function dropdownUbahUjian(data) {
    const inputs = document.querySelectorAll('#ubahModal .modal-body > div');
    document.getElementById('ubahId').value = data['id'];
    inputs[0].lastElementChild.value = data['nama'];
    inputs[1].lastElementChild.value = data['tanggal_ujian'];
    inputs[2].lastElementChild.value = data['id_mata_pelajaran'];
    inputs[2].querySelectorAll('.dropdown-menu > li').forEach(e => {
        if(data['id_mata_pelajaran'] == e.dataset.id) {
            e.click();
        }
    });
}