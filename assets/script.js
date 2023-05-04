let all_users = document.querySelector("#allUsers");
let one_user = document.querySelector("#oneUser");
let all_books = document.querySelector("#allBooks");
let one_book = document.querySelector("#oneBook");
let all_user = document.querySelector("#user");
const place_all_user = document.querySelector("#placeAllUsers");
const place_one_user = document.querySelector("#placeOneUser");
const place_all_book = document.querySelector("#placeAllBooks");
const place_one_book = document.querySelector("#placeOneBook")
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


    for(const user of data)
    {
        let div_user = document.createElement("div")
        place_all_user.append(div_user);

        div_user.innerHTML =        `
                                        <h3>${user.first_name} ${user.last_name}</h3>
                                        <p>${user.email}</p>
                                    `
    }


}

const displayOneUser = async(ev) => {
    ev.preventDefault();

    let place_one_user = document.querySelector("#placeOneUser")

    const response = await fetch("http://localhost/super-week/users/" + all_user.value);
    const data = await response.json();

    place_one_user.innerHTML =  `
                                    <h3>${data.first_name} ${data.last_name}</h3>
                                    <p>${data.email}</p>
                                `
}

const displayAllBooks = async(ev) => {
    ev.preventDefault();

    let place_all_book = document.querySelector("#placeAllBooks")


    const response = await fetch("http://localhost/super-week/books");
    const data = await response.json();
console.log(data)
    for(const book of data)
    {
        let div_book = document.createElement("div")
        place_all_book.append(div_book);

        div_book.innerHTML =        `
                                        <h3>${book.title}</h3>
                                        <p>${book.content}</p>
                                    `
    }
}

const displayOneBook = async(ev) => {
    ev.preventDefault();

    let place_one_book = document.querySelector("#placeOneBook")


    const response = await fetch("http://localhost/super-week/books/" + input_book.value);
    const data = await response.json();

    place_one_book.innerHTML =  `
                                    <h3>${data.title}</h3>
                                    <p>${data.content}</p>
                                `


}

all_users.addEventListener("click", async(ev) => {
    if(place_all_user.innerHTML.length  <= 10)
    {
        await displayAllUsers(ev);
    }else {
        place_all_user.innerHTML = "";
    }
})

one_user.addEventListener("click", async(ev) => {
    await displayOneUser(ev);

    if(place_one_user.innerHTML === "false")
    {
        place_one_user.innerHTML = "There is no user with this id";
    }
})

all_books.addEventListener("click", async(ev) => {
    if(place_all_book.innerHTML.length  <= 10)
    {
        await displayAllBooks(ev);
    }else {
        place_all_book.innerHTML = "";
    }
})

one_book.addEventListener("click", async(ev) => {
    await displayOneBook(ev);

    if(place_one_book.innerHTML === "false")
    {
        place_one_book.innerHTML = "There is no book with this id";
    }
})