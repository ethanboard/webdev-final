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

/* General Layout */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Button Styles */
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

button:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

table th {
    background-color: #f2f2f2;
}
