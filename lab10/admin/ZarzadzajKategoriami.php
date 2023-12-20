<?php

class ZarzadzajKategoriami
{
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function DodajKategorie($name, $parentId = 0) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM categories WHERE name = ?");
        $stmt->execute([$name]);
        $existingCount = $stmt->fetchColumn();

        if ($existingCount > 0) {
            echo "Kategoria {$name} istnieje.";
            return;
        }
        $stmt = $this->pdo->prepare("INSERT INTO categories (parent, name) VALUES (?, ?)");
        $stmt->execute([$parentId, $name]);

        echo "Kategoria '{$name}' została dodana.";
    }

    public function UsunKategorie($categoryId) {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$categoryId]);
    }

    public function EdytujKategorie($categoryId, $name) {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
        $stmt->execute([$name, $categoryId]);
    }

    public function KategoriaGet() {
        $stmt = $this->pdo->query("SELECT * FROM categories ORDER BY parent, id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function PokazKategorie()
    {
        $categories = $this->KategoriaGet();
        $tree = [];

        foreach ($categories as $category) {
            if ($category['parent'] == 0) {
                $this->DrzewoKategorii($categories, $category['id'], $tree, 1);
            }
        }

        foreach ($tree as $category) {
            echo $category['name'] . "<br>";

            if (!empty($category['children'])) {
                $this->WyswietlPodkategorie($category['children'], 1);
            }
        }
    }

    private function DrzewoKategorii($categories, $parentId, &$tree, $depth = 0)
    {
        if ($depth >= 2) {
            return;
        }

        foreach ($categories as $category) {
            if ($category['parent'] == $parentId) {
                $children = [];
                $this->DrzewoKategorii($categories, $category['id'], $children, $depth + 1);
                if (!empty($children)) {
                    $category['children'] = $children;
                }
                $tree[] = $category;
            }
        }
    }


    private function WyswietlPodkategorie($subcategories, $indent) {
        foreach ($subcategories as $subcategory) {
            echo str_repeat('&nbsp;', $indent * 4) . $subcategory['name'] . "<br>";

            if (!empty($subcategory['children'])) {
                $this->WyswietlPodkategorie($subcategory['children'], $indent + 1);
            }
        }
    }
}