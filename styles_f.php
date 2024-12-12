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
