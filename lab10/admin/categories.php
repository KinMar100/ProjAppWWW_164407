<?php
echo '<script src="../css/form.css"></script>';
include "admin.php";
include "ZarzadzajKategoriami.php";


$link = new PDO('mysql:host=localhost;dbname=moja_strona', 'root', '');

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $categoryManager = new ZarzadzajKategoriami($link);

    if (isset($_POST['add_category'])) {
        $name = $_POST['category_name'];
        $parent = $_POST['parent_category'] ?? 0;
        $categoryManager->DodajKategorie($name, $parent);
    }

    if (isset($_POST['delete_category'])) {
        $categoryId = $_POST['delete_category'];
        $categoryManager->UsunKategorie($categoryId);
    }

    if (isset($_POST['edit_category'])) {
        $categoryId = $_POST['edit_category'];
        $name = $_POST['edited_category_name'];
        $categoryManager->EdytujKategorie($categoryId, $name);
    }

    // Display categories
    echo "<h2>Categories:</h2>";
    $categoryManager->PokazKategorie();

    // Add Category Form
    echo '<h2>Dodaj Kategorie:</h2>
        <form method="post" action="'.$_SERVER['REQUEST_URI'].'">
            <label for="category_name">Category Name:</label>
            <input type="text" name="category_name" required>
            <label for="parent_category">Parent Category:</label>
            <select name="parent_category">
                <option value="0">Main Category</option>';
    $categories = $categoryManager->KategoriaGet();
    foreach ($categories as $category) {
        echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
    }
    echo '</select>
            <input type="submit" name="add_category" value="Add Category">
        </form>';

    // Delete Category Form
    echo '<h2>Usun kategorie:</h2>
        <form method="post" action="'.$_SERVER['REQUEST_URI'].'">
            <label for="delete_category">Wybierz kategorie:</label>
            <select name="delete_category">';
    foreach ($categories as $category) {
        echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
    }
    echo '</select>
            <input type="submit" name="delete_category_submit" value="Delete Category">
        </form>';

    // Edit Category Form
    echo '<h2>Edytuj kategorie:</h2>
        <form method="post" action="'.$_SERVER['REQUEST_URI'].'">
            <label for="edit_category">Wybierz kategorie:</label>
            <select name="edit_category">';
    foreach ($categories as $category) {
        echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
    }
    echo '</select>
            <label for="edited_category_name">New Category Name:</label>
            <input type="text" name="edited_category_name" required>
            <input type="submit" name="edit_category_submit" value="Edit Category">
        </form>';
}