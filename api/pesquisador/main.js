function bookSearch() {
    const search = $("#search").val()
    $("#results").text("")
    console.log(search);

    fetch("https://www.googleapis.com/books/v1/volumes?q=" + search)
        .then(response => response.json())
        .then(data => {
            data.items.forEach(item => {
                if (item.volumeInfo.imageLinks && item.volumeInfo.imageLinks.thumbnail) {
                    $("#results").append("<img src='" + item.volumeInfo.imageLinks.thumbnail + "' alt='Thumbnail'>");
                }
                $("#results").append("<h4>" + item.volumeInfo.title + "</h4>");
                $("#results").append("<h5>" + item.volumeInfo.authors + "</h5> <hr>")

            })
        })
        .catch(error => console.error('Erro:', error))

    $("#search").val("")
}

$("#button").click(bookSearch)