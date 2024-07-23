<?php

abstract class Controller
{
    public function render(string $nomDuFichier, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        require_once('template/' . $nomDuFichier . '.php');
    }

    /**
     * Redirige sur une autre page
     *
     * @param string $nameFile (sans l'extension)
     *
     * @return never
     */
    public function redir(string $nameFile): never
    {
        header('Location: ' . $nameFile . '.php');
        die();
    }

    /**
     * Transforme une chaine en slug
     *
     * @param $string
     * @param $delimiter
     * @return string
     */
    public function slugify(string $string, string $delimiter = '-'): string
    {
        $oldLocale = setlocale(LC_ALL, '0');
        setlocale(LC_ALL, 'en_US.UTF-8');
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower($clean);
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        $clean = trim($clean, $delimiter);
        setlocale(LC_ALL, $oldLocale);

        return $clean;
    }

    /**
     * Vérifie qu'il y a des valeurs dans toutes les clés
     *
     * @param array $data
     * @return bool
     */
    public function checkAllDataTrue(array $data): bool
    {
        foreach ($data as $val) {
            if (!$val) {
                return false;
            }
        }

        return true;
    }
}
