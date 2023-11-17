const searchInput = document.getElementById("searchInput");
    const items = document.querySelectorAll(".mundo_aventura, .parque, .simon_bolivar, .estadio, .cine_colombia, .el_corral");

    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();

        items.forEach(item => {
            const title = item.querySelector("h3").textContent.toLowerCase();
            const itemText = item.textContent.toLowerCase();

            if (title.includes(searchTerm) || itemText.includes(searchTerm)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    });