<?php

class GestionSQL
{
    private PDO $con;

    public function __construct()
    {
        $this->connexion();
    }


    /**
     * Connexion à la db
     *
     */
    public function connexion(): void
    {
        $this->con = new PDO('mysql:dbname=' . DB_NAME . ';host=localhost;charset=utf8', DB_USERNAME, DB_PASSWORD, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * Permet de récupérer des données
     *
     * @param string $requete
     * @param array $data
     * @return array
     */
    public function findAll(string $requete, array $data = []): array
    {
        // on prépare les requêtes pour pdo et on l'exécute
        $prepare = $this->con->prepare($requete);
        $prepare->execute($data);

        // puis, on récupère le résultat
        $result = $prepare->fetchAll();

        return $result ?? [];
    }

    /**
     * Retourne un seul résultat
     *
     * @param string $query
     * @param array $data
     * @return array
     */
    public function find(string $query, array $data): array
    {
        // on prépare les requêtes pour pdo et on l'exécute
        $prepare = $this->con->prepare($query);
        $prepare->execute($data);

        // puis, on récupère le résultat
        $result = $prepare->fetch();

        if (is_array($result)) {
            return $result;
        } else {
            return [];
        }
    }

    public function insert(string $query, array $data): int
    {
        $prepare = $this->con->prepare($query);
        $prepare->execute($data);

        return intval($this->con->lastInsertId());
    }

    public function updateOrDelete(string $query, array $data): int
    {
        $prepare = $this->con->prepare($query);
        $prepare->execute($data);

        return $prepare->rowCount();
    }
}
