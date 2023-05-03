let all_users = document.querySelector("#allUsers");
let one_user = document.querySelector("#oneUser");
let all_books = document.querySelector("#allBook");
let one_book = document.querySelector("#oneBook");
let all_user = document.querySelector("#user");
let place_all_user = document.querySelector("#placeAllUsers");
let place_one_user = document.querySelector("#placeOneUser");
let place_all_book = document.querySelector("#placeAllBooks");
let place_one_book = document.querySelector("#placeOneBook")
let input_book = document.querySelector("#book")
let display = (place, data)  =>{
    place.innerHTML = "";
    place.innerHTML = data;
}

const displayAllUsers = async(ev) => {
    ev.preventDefault();

    let place_all_user = document.querySelector("#placeAllUsers")


    const response = await fetch("http://localhost/super-week/users");
    const data = await response.json();
    const string = JSON.stringify(data)


    await display(place_all_user, string)
}

const displayOneUser = async(ev) => {
    ev.preventDefault();

    let place_one_user = document.querySelector("#placeOneUser")

    const response = await fetch("http://localhost/super-week/users/" + all_user.value);
    const data = await response.json();
    const string = JSON.stringify(data)

    await display(place_one_user, string);
}

const displayAllBooks = async(ev) => {
    ev.preventDefault();

    let place_all_book = document.querySelector("#placeAllBooks")


    const response = await fetch("http://localhost/super-week/books");
    const data = await response.json();
    const string = JSON.stringify(data)


    await display(place_all_book, string)
}

const displayOneBook = async(ev) => {
    ev.preventDefault();

    let place_one_book = document.querySelector("#placeOneBook")


    const response = await fetch("http://localhost/super-week/books/" + input_book.value);
    const data = await response.json();
    const string = JSON.stringify(data)


    await display(place_one_book, string)
}

all_users.addEventListener("submit", async(ev) => {
    if(place_all_user.innerHTML.length  == 10)
    {
        await displayAllUsers(ev);
    }else {
        place_all_user.innerHTML = "";
    }
})

one_user.addEventListener("submit", async(ev) => {
    await displayOneUser(ev);
})

all_books.addEventListener("submit", async(ev) => {
    if(place_all_book.innerHTML.length  == 10)
    {
        await displayAllBooks(ev);
    }else {
        place_all_book.innerHTML = "";
    }
})

one_book.addEventListener("submit", async(ev) => {
    await displayOneBook(ev);
})