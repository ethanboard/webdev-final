<?php
header("Content-type: text/css");
?>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.hero {
    background: url('351shoes.webp') no-repeat center center / cover;
    color: white;
    text-align: center;
    padding: 50px 20px;
}

.cta {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.layout .row {
    display: flex;
    flex-direction: column;
    padding: 20px;
    background: #f4f4f4;
}

.layout .row.flexbox {
    flex-direction: row;
}

.column {
    flex: 1;
    padding: 20px;
}

.column img {
    max-width: 100%;
}

nav {
    background-color: #333;
    padding: 1rem;
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin: 0;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: #f0a500;
}
