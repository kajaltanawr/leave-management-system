function searchFaculty() {
    let input = document.getElementById("searchBox").value.toLowerCase();
    let cards = document.getElementsByClassName("faculty-card");

    for (let i = 0; i < cards.length; i++) {
        let name = cards[i].getElementsByTagName("h3")[0].innerText.toLowerCase();

        if (name.includes(input)) {
            cards[i].style.display = "block";
        } else {
            cards[i].style.display = "none";
        }
    }
}