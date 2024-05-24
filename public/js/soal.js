function dropdownKunciJawaban (li) {
    let kunci = li.innerText;
    document.getElementById('kunciJawaban').value = kunci.toLowerCase();
    document.querySelector('.dropdown > button').innerText = kunci;
}