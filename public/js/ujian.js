function dropdownMataPelajaran(li) {
    document.getElementById('mataPelajaranId').value = li.dataset.id;
    document.getElementById('dropdownMataPelajaranBtn').innerText = li.firstElementChild.innerText;
}