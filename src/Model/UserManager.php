<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = "users";

    public function selectAll(): array
    {
        $query = 'SELECT * FROM ' . static::TABLE;

        return $this->pdo->query($query)->fetchAll();
    }


    public function insert(array $item)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $item['name'], \PDO::PARAM_STR);
        $statement->execute();
    }

    public function delete(int $id): void
    {
        $statement = $this->pdo->prepare("DELETE FROM " . static::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function update(array $item): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `name` = :name WHERE id=:id");
        $statement->bindValue('id', $item['id'], \PDO::PARAM_INT);
        $statement->bindValue('name', $item['name'], \PDO::PARAM_STR);

        return $statement->execute();
    }

    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }


    public function selectByUnCompleteUser(string $name): array
    {
        $statement = $this->pdo->prepare("
        SELECT *
        FROM " . static::TABLE . " 
        WHERE name LIKE CONCAT('%', :name, '%')
        ;");
        $statement->bindValue(':name', $name, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
