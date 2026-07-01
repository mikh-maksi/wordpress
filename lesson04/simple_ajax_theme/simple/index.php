<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Адреса</h2>
    <p id="address"></p>
    <p id="address_element"></p>
    <p id="slug"></p>

    <h2>Заголовок сторінки</h2>
    <p id="header"></p>
    <p id="additional"></p>
    <h2>Контент сторінки</h2>
    <p id="content"></p>

    <h2>Перелік сторінок</h2>
    <p id="page_list"></p>
    <p id="a_list"></p>
    
</body>
</html>



<script>
// робота із адресою
const url = window.location.href;
console.log(url);
address.innerHTML=url;

const result = url.replace("http://localhost/wordpress/", "");
console.log(result);
address_element.innerHTML = result;


const slug_name = url.split("/").filter(Boolean).pop();
slug.innerHTML = slug_name;


// Робота із даними сторінки
fetch(
    `http://localhost/wordpress/wp-json/wp/v2/posts?slug=${slug_name}`
) .then(response => response.json())
  .then(data => {
    console.log(data);
    header.innerHTML=data[0].title.rendered;
    additional.innerHTML = data[0].acf.dodatkovo;
    content.innerHTML = data[0].content.rendered;
  });



// Робота із переліком сторінок
fetch('http://localhost/wordpress/wp-json/wp/v2/posts')
  .then(response => response.json())
  .then(data => {
    console.log(data.length);
    data.forEach(element => {
        console.log(element);
        let d = document.createElement("div");
        d.innerHTML = element.title.rendered;
        page_list.appendChild(d);

        let a = document.createElement("a");
        let da = document.createElement("div");
        a.href = element.guid.rendered;
        a.textContent = element.title.rendered;
        da.appendChild(a)
        a_list.appendChild(da);

    });
    });
</script>