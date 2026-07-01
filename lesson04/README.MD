# Створення власних тем
Для створення власної теми важливою складовою є опис того, як сайт має виглядати.  
З точки зору опис є типові технічні елементи:
* Шапка (хедер)
* Меню
* Вивід основного елементу (циклу WordPress)
* Виведення значень користувацьких полів
* Нижня частина (футер)
Також може бути різне оформлення під різний тип контенту (пости, сторінки, сторінки 404) можуть підбиратися різні варіанти оформлення.  При цьому для виведення сторінок можуть бути різні формати шаблонів.  
  
Проте, окрім технічної складової відмінності можуть стосуватися саме контенту.  Для певного типу сайтів є типові розідли, створення яких дозволяє використовувати сайт зацікавленими учасниками зручно і швидко.  
За основу візьмемо сайт громадської організації.  
Типовими розділами для такого типу сайтів є:  

* каталог членів організації
* інформація щодо заходів організації
* інформація щодо постійних напрямків діяльності організації (регульна школа, надання консультацій, тощо).  
* інформація щодо членства
* інтерактивні сервіси (розрахунок, рекомендація, тощо).

Отже, для того, щоб створити шаблон, який зручно використовувати для створення сайту громадської організації необхідно реалізувати організаційні можливості із використанням технічних засобів.  

## Підходи до створення теми

Можна виділити 2 основних підходи до створення теми для WordPress:

* Класичний - коли інформація з бази даних переноситься на FrontEnd шляхом вставки PHP-коду
* AJAX - коли дані для розміщення на FrontEnd отримуються з REST API, який генерується WordPress

Розглянемо найпростішу реалізацію кожного з цих двох типів:  
для AJAX важливою складовою буде отримання адреси сторінки - адже FrontEnd має мати розуміння на якій сторінці ми знаходимося, і, відповідно до цього робити запит на BackEnd та виводити результати цього запиту.   

## Проста тема
Найпростіша тема створюється створенням файлу index.php та файлу style.css  
На такій мемі можна створити просту стрінку, яка отрмиує дані з певного бекенду.  

```
<script>
fetch('http://localhost/wordpress/wp-json/wp/v2/posts?id=27')
  .then(response => response.json())
  .then(data => console.log(data));
</script>
```


```
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


    <h2>Перелік сторінок</h2>
    <p id="page_list"></p>
    <p id="a_list"></p>
    
</body>
</html>



<script>
const url = window.location.href;
console.log(url);
address.innerHTML=url;

const result = url.replace("http://localhost/wordpress/", "");
console.log(result);
address_element.innerHTML = result;


const slug_name = url.split("/").filter(Boolean).pop();
slug.innerHTML = slug_name;

fetch('http://localhost/wordpress/wp-json/wp/v2/posts?id=27')
  .then(response => response.json())
  .then(data => {
    console.log(data.length);
    data.forEach(element => {
        console.log(element);
        let d = document.createElement("div");
        d.innerHTML = element.title.rendered;
        page_list.appendChild(d);

        let a = document.createElement("a");
        a.href = element.guid.rendered;
        a.textContent = element.title.rendered;
        a_list.appendChild(a);

    });
    });
</script>
```

```
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
        a.href = element.guid.rendered;
        a.textContent = element.title.rendered;
        a_list.appendChild(a);

    });
    });
```

## Класичний варіант

Для класичного варіанту ключовими елементами сторінки є вивдення циклу WordPress (блок для вивдення основного тексту), виведення меню, підключення хедера та футера.


### Цикл WordPress

```
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h2><?php echo wp_title("", true); ?></h2>
					<?php echo get_the_content(); ?>
					<?php endwhile; else: ?>
						<p>	Нажаль, немає записів, що задовільняють критеріям </p>
				<?php endif; ?>
```

### Меню

```
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
```



### Підключення сайдбару

```
<?php dynamic_sidebar('sidebar2') ?>
```


### Підключення картинки

```
<img src = "<?php echo get_bloginfo('template_url'); ?>/images/img.png">
```

### Вивденення заголовку сторінки

```
					<h2><?php echo wp_title("", true); ?></h2>
```


### Активація сайдбару та меню в файлі functions.php

```
<?php
  register_sidebar(array('name'=>'sidebar1'));
  register_sidebar(array('name'=>'sidebar2'));
  
  function register_my_menus(){
    register_nav_menus(array( 'main-menu' => 'Головне', 'sidebar-menu' => 'Бокове'));
  }

if (function_exists('register_nav_menus'))
{
	add_action( 'init', 'register_my_menus' );
}
 ?>	
```